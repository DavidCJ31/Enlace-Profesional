<?php
date_default_timezone_set('Africa/Dar_es_salaam');

if (isset($_POST['reg_mode'])) {
checkemail();	
}else{
header("location:../");		
}


function checkemail() {
	
try {
	require '../constants/db_config.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$email = $_POST['email'];
	$ced = $_POST['cedula'];
	$account_type = $_POST['acctype'];
	
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE email = :email and id != :cedula");
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':cedula', $ced);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$records = count($result);
	$role = "Employee";	

	
	if ($records > 0) {
	header("location:../register.php?p=$role&r=0927");	
		
	}else{
	
        register_as_employee();
	
		
	}
					  
	}catch(PDOException $e)
    {
        //echo $e;
    header("location:../register.php?p=$role&r=4568");
    }
}

function register_as_employee() {

try {
	require '../constants/db_config.php';
    require '../constants/uniques.php';
    require_once '../../ldap/class.AuthLdap.php';
    $clave = $_POST['password'];
    $ced = $_POST['cedula'];
    $ldap = new AuthLdap();
	$server[0] = "10.0.2.53";
	$ldap->server = $server;
	$ldap->dn = "dc=una,dc=ac,dc=cr";
	if ( $ldap->connect()) { // nos conectamos a LDAP
		echo "ME CONECTE<br>";
		if ($ldap->checkPass($ced,$clave)) { //verificamos la clave y usuario
			$ldap->connect(); //me vuelvo a conectar para obtener datos
			$role = 'employee';
            $last_login = date('d-m-Y h:m A [T P]');
            $fname = ucwords($_POST['fname']);
            $lname = ucwords($_POST['lname']);
            $email = $_POST['email'];
            $ced = $_POST['cedula'];
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("INSERT INTO tbl_users (id,first_name, last_name, email, last_login) 
            VALUES (:ced,:fname, :lname, :email, :lastlogin)");
            $stmt->bindParam(':ced', $ced);
            $stmt->bindParam(':fname', $fname);
            $stmt->bindParam(':lname', $lname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':lastlogin', $last_login);
            $stmt->execute();
            header("location:../register.php?p=Employee&r=1123");			
		}else{
			header("location:../register.php?p=Employee&r=0347");
		}
	}else{
		header("location:../register.php?p=Employee&r=4568");
	}			  
}catch(PDOException $e){
    header("location:../register.php?p=Employee&r=4568");
}	
	
}

?>