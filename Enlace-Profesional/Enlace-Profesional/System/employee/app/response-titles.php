<?php
//Ejecuta el pedido AJAX de filtrar cantones por provincia, recibe el id de la provincia
    require '../../constants/db_config.php';

    //echo 'SELECT * FROM tbl_degree where academic_degree like '. $grado;
if(isset($_POST['grado'])){

    $grado = $_POST['grado']; 
    $area = $_POST['area']; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        $stmt = $conn->prepare("SELECT d.name FROM tbl_degree d inner join tbl_area a on d.area_id=a.id where d.academic_degree like ". $grado."  and a.area='".$area."'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $options="<option selected>Seleccionar</option>";
        foreach($result as $row)
        {
            $options= $options.'<option value="'.$row['name'].'">'.$row['name'].'</option>';

        }
    echo $options;
    //echo $titulo;
    }
    catch(PDOException $e){
        echo $e;

    }

}

?>