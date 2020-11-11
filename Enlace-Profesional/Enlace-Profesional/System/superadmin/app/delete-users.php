<?php 
require '../constants/db_config.php';
require '../../constants/settings.php';
require '../constants/check-login.php';
if(isset($_POST['Uid'])){
    $id = $_POST['Uid'];
    $Ulastname = $_POST['fname'];
    $Uname = $_POST['nombre'];
    $Uemail = $_POST['Ucorreo'];
    $Dmotivo = $_POST['Ddenegacion'];
    $Uphone = $_POST['Uphone']; //== "No tiene un número registrado"){
        
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            if($Uphone == "No tiene un número registrado"){
                $stmt0 = $conn->prepare("INSERT INTO tbl_deleted_users(deleted_motivo,delete_user_id,
                deleted_user_fname,deleted_user_lname,user_email,deleted_by) VALUES(:motivo,:userID,:userfname,:userlname,:useremail,:deletedby)");
                $stmt0->bindParam(':motivo',$Dmotivo);
                $stmt0->bindParam(':userID',$id);
                $stmt0->bindParam(':userfname',$Uname);
                $stmt0->bindParam(':userlname',$Ulastname);
                $stmt0->bindParam(':deletedby',$myid);
                $stmt0->bindParam(':useremail',$Uemail);
            }else{
                $stmt0 = $conn->prepare("INSERT INTO tbl_deleted_users(deleted_motivo,delete_user_id,
                deleted_user_fname,deleted_user_lname,user_email,user_phone,deleted_by) VALUES(:motivo,:userID,:userfname,
                :userlname,:useremail,:userphone,:deletedby)");
                $stmt0->bindParam(':motivo',$Dmotivo);
                $stmt0->bindParam(':userID',$id);
                $stmt0->bindParam(':userfname',$Uname);
                $stmt0->bindParam(':userlname',$Ulastname);
                $stmt0->bindParam(':deletedby',$myid);
                $stmt0->bindParam(':useremail',$Uemail);
                $stmt0->bindParam(':userphone',$Uphone);
            }
            $stmt0->execute();

            $stmt = $conn->prepare("DELETE from tbl_users WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $stmt1 = $conn->prepare("DELETE from tbl_experience WHERE user_id = :id");
            $stmt1->bindParam(':id', $id);
            $stmt1->execute();

            $stmt2 = $conn->prepare("DELETE from tbl_job_applications WHERE user_id = :id");
            $stmt2->bindParam(':id', $id);
            $stmt2->execute();

            $stmt3 = $conn->prepare("DELETE from tbl_language WHERE member_no = :id");
            $stmt3->bindParam(':id', $id);
            $stmt3->execute();

            $stmt4 = $conn->prepare("DELETE from tbl_other_attachments WHERE member_no = :id");
            $stmt4->bindParam(':id', $id);
            $stmt4->execute();

            $stmt5 = $conn->prepare("DELETE from tbl_professional_qualification WHERE member_no = :id");
            $stmt5->bindParam(':id', $id);
            $stmt5->execute();

            $stmt6 = $conn->prepare("DELETE from tbl_referees WHERE member_no = :id");
            $stmt6->bindParam(':id', $id);
            $stmt6->execute();

            $stmt7 = $conn->prepare("DELETE from tbl_titles WHERE user_id = :id");
            $stmt7->bindParam(':id', $id);
            $stmt7->execute();
                header("location:../users.php?r=5682");
        
    }catch(PDOException $e){
        echo $e;
    }
}
?>