<?php 
    require '../../constants/db_config.php';
//Se recibe el id de la experiencia y se extrae su informacion para mostrarla en el modal.
if(isset($_POST['id'])){

    $id = $_POST['id']; 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        $stmt = $conn->prepare("SELECT * FROM tbl_experience where id=".$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $titulo = $result['title'];
        $inst = $result['institution'];
        $supervisor = $result['supervisor'];
        $superp = $result['supervisor_phone'];
        $start = $result['start_date'];
        $end = $result['end_date'];
        $actualidad = $result['actualidad'];
        $duty = $result['duties'];

    echo json_encode(array("start"=>$start,"end"=>$end,"actual"=>$actualidad,"duties"=>$duty,"institution"=>$inst,"supervisor"=>$supervisor,"titulo"=>$titulo,"supervisorPhone"=>$superp));
    //echo $titulo;
    }
    catch(PDOException $e){
        echo json_encode($e);
    }

}

?>