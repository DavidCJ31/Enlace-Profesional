<?php
//Ejecuta el pedido AJAX de filtrar cantones por provincia, recibe el id de la provincia
    require '../../constants/db_config.php';
    if(isset($_POST['elegido'])){
        $idProvincia = $_POST['elegido']; 
        $canton = $_POST['db']; 

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id=".$idProvincia);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $options="<option disabled value=''>Seleccionar</option>";
            foreach($result as $row)
            {
                if($row['state_name']==$canton){
                    $options= $options.'<option value="'.$row['state_name'].'" selected>'.$row['state_name'].'</option>';
                }else{
                $options= $options.'<option value="'.$row['state_name'].'">'.$row['state_name'].'</option>';
                }

            }
        echo $options;
        }
        catch(PDOException $e){
    echo $e;
        }
    }
    
    if(isset($_POST['provincia'])){
        $idProvincia = $_POST['provincia'];  
    
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id=".$idProvincia);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $options="<option disabled value=''>Seleccionar</option>";
            foreach($result as $row)
            {
                $options= $options.'<option value="'.$row['state_name'].'">'.$row['state_name'].'</option>';
    
            }
        echo $options;
        }
        catch(PDOException $e){
    echo $e;
        }
    }
?>