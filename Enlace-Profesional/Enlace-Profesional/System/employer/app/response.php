<?php
//Ejecuta el pedido AJAX de filtrar cantones por provincia, recibe el id de la provincia
    require '../../constants/db_config.php';
    $idProvincia = $_POST['elegido']; 

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt1 = $conn->prepare("SELECT id FROM tbl_states where parent_id is null and state_name='".$idProvincia."'");
        $stmt1->execute();
        $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
        $id = $result1['id'];

    
        $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id=".$id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $options="<option disabled value=''>Seleccionar</option>";
        foreach($result as $row)
        {
            if($original == $row['state_name']){
                $options= $options.'<option value="'.$row['state_name'].'" selected>'.$row['state_name'].'</option>';
            } else{
                $options= $options.'<option value="'.$row['state_name'].'">'.$row['state_name'].'</option>';
            }
           

        }
    echo $options;
    // echo $id;
    }
    catch(PDOException $e){
echo $e;
    }

?>