<?php
require '../constants/db_config.php';
require '../constants/check-login.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['id'])){
    checkemail();
}

}catch(PDOException $e){
    echo $e;
}


function checkemail() {
    $id = $_POST['id'];
	
    try {
        require '../constants/db_config.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE id = :cedula");
        $stmt->bindParam(':cedula', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $records = count($result);
        $role = "admin";	
    
        
        if ($records > 0) {
        header("location:../create-admin.php?&r=0928");	
            
        }else{
            $password   = $_POST['password'];
            $confPwd = $_POST['confirmpassword'];
            if (!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[0-9]).*$#", $password) || $password!=$confPwd){
                header("location:../create-admin.php?r=1022");
            }else{
        
            register_as_admin();}
        
            
        }
                          
        }catch(PDOException $e)
        {
            //echo $e;
        header("location:../create-admin.php?r=4568");
        }
    }

    function register_as_admin() {

        try {
            require '../constants/db_config.php';
            //require '../constants/uniques.php';
            $role = 'admin';
            $last_login = date('d-m-Y h:m A [T P]');
            $login = md5($_POST['password']);
            $id = $_POST['id'];
            $nombre = ucwords($_POST['fname']);
            $apellidos = ucwords($_POST['lname']);
            
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO tbl_admin (id,first_name, last_name,role, login, last_login) 
            VALUES (:ced,:fname, :lname,:rol, :login,:lastlogin)");
            $stmt->bindParam(':ced', $id);
            $stmt->bindParam(':fname', $nombre);
            $stmt->bindParam(':lname', $apellidos);
            $stmt->bindParam(':rol', $role);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':lastlogin', $last_login);
            
            $stmt->execute();
            header("location:../create-admin.php?r=1123");				  
            }catch(PDOException $e)
            {
                echo $e;
            //header("location:../create-admin.php?r=4568");
            }	
            
        }
?> 