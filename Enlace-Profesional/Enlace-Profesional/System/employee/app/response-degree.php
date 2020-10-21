<?php
//Ejecuta el pedido AJAX de filtrar cantones por provincia, recibe el id de la provincia
    require '../../constants/db_config.php';

    //echo 'SELECT * FROM tbl_degree where academic_degree like '. $grado;
if(isset($_POST['grado'])){

    $grado = $_POST['grado']; 
    $titulo = $_POST['titulo']; 
    $area = $_POST['area']; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        $stmt = $conn->prepare("SELECT * FROM tbl_degree where academic_degree like ". $grado." and area_id=".$area);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $options="<option disabled value=''>Seleccionar</option>";
        foreach($result as $row)
        {
            if($row['name']==$titulo){
                //$options = "aqui";
                $options= $options.'<option value="'.$row['name'].'" selected>'.$row['name'].'</option>';
            }else{
            $options= $options.'<option value="'.$row['name'].'">'.$row['name'].'</option>';
            }

        }
    echo $options;
    
    }
    catch(PDOException $e){

    }

}


if(isset($_POST['idDB'])){

    $idDB = $_POST['idDB']; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $stmt = $conn->prepare("SELECT d.academic_degree, d.name FROM tbl_degree d inner join tbl_users u on d.id=u.title where u.id='".$idDB."'");
        $stmt->execute();
        $result = $stmt->fetch();
            $options = $result['academic_degree']." ".$result['name'];
    echo $options;
    }
    catch(PDOException $e){

    }

}
?>