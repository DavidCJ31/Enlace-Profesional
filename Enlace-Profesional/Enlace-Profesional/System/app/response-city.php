<?php
//Ejecuta el pedido AJAX de filtrar cantones por provincia, recibe el id de la provincia
    require '../constants/db_config.php';

    //echo 'SELECT * FROM tbl_degree where academic_degree like '. $grado;
if(isset($_POST['provincia'])){

    $prov = $_POST['provincia']; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT id FROM tbl_states where parent_id is null and state_name='".$prov."'");
        $stmt->execute();
        $result1 = $stmt->fetchAll();
        foreach($result1 as $row)
        {
            $id = $row['id'];

        }
        

        $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id =". $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $options="";
        foreach($result as $row)
        {
            $options= $options.'<option value="'.$row['state_name'].'">'.$row['state_name'].'</option>';

        }
    echo $options;
    //echo $titulo;
    }
    catch(PDOException $e){

    }

}

?>