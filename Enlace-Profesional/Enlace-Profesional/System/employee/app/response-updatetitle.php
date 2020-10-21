<?php 
    require '../../constants/db_config.php';
//Se recibe el id del titulo agregado y se extrae su informacion para mostrarla en el modal.
if(isset($_POST['id'])){

    $id = $_POST['id']; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        $stmt = $conn->prepare("SELECT education, education_area,title FROM tbl_titles where id=".$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $area = $result['education_area'];
        $grado = $result['education'];
        $titulo = $result['title'];

        $stmt1 = $conn->prepare("SELECT d.name FROM tbl_degree d inner join tbl_area a on d.area_id=a.id where d.academic_degree like '". $grado."%' and a.area='".$area."'");
        $stmt1->execute();
        $result1 = $stmt1->fetchAll();
        $options="";
        foreach($result1 as $row)
        {
            $aux=$row['name'];
            if(strcmp($aux,$titulo)==0){
                $options= $options.'<option value="'.$aux.'" selected>'.$aux.'</option>';
            }
            else{
                $options= $options.'<option value="'.$aux.'">'.$aux.'</option>';
            }
            
        }
    echo json_encode(array("grado"=>$grado,"area"=>$area,"titulo"=>$titulo,"opTitulo"=>$options));
    //echo $titulo;
    }
    catch(PDOException $e){
        echo json_encode($e);
    }

}

?>