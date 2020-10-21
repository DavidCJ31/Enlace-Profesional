<?php

date_default_timezone_set('America/Costa_Rica');
$last_login = date('d-m-Y h:m A [T P]');
require '../constants/db_config.php';
$myemail = $_POST['email'];
$mypass = md5($_POST['password']);
// $mypass = $_POST['password'];
// include "../../ldap/host.php";
// require_once '../../ldap/class.AuthLdap.php';
// $ldap = new AuthLdap();
// //$server[0] = $servidor;
// $server[0] = "10.0.2.53";
// $ldap->server = $server;
// $ldap->dn = "dc=una,dc=ac,dc=cr";
// // echo $mypass."<br>";
// // echo $myemail."<br>";
// if ( $ldap->connect()) { 
// 	echo "se conectó<br>";
// 	if ($ldap->checkPass($myemail,$mypass)) {
// 		echo "se conectó 2.0<br>";
// 		$ldap->connect();
// 		$nombre=$ldap->getAttribute($myemail,'cn');
// 		$correo=$ldap->getAttribute($myemail,'mail');
// 		echo $nombre[0]."<br>";
// 		echo $correo[0]."<br";
// 	} else{
// 		 echo "usuario/contrasena incorrecta";
// 	}
// }else{
// 	echo "no hay conexion con ldap, intente de nuevo";
// }

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE email = :myemail AND login = :mypassword");
	$stmt->bindParam(':myemail', $myemail);
	$stmt->bindParam(':mypassword', $mypass);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	if ($rec == "0") {
	 header("location:../login.php?r=0346");
	}
	
	else{

    foreach($result as $row)
    {
		if($row['estado']=="N"){
			header("location:../login.php?r=0085");
		}
		else if($row['estado']=="E"){
			header("location:../login.php?r=3701");
		}
		else {
			$role = 'employer';

			if($role == "employer"){
			session_start();
			$_SESSION['logged'] = true;	
			$myid = $row['id'];
			$_SESSION['myid'] = $myid;
			$_SESSION['compname'] = $row['first_name'];
			$_SESSION['encargado'] = $row['in_charge'];
			$_SESSION['established'] = $row['byear'];
			$_SESSION['myemail'] = $row['email'];
			$_SESSION['myphone'] = $row['phone'];
			$_SESSION['comptype'] = $row['title'];
			$_SESSION['mycity'] = $row['city'];
			// $_SESSION['mystreet'] = $row['street'];
			 $_SESSION['country'] = $row['country'];
			$_SESSION['myprovince'] = $row['province'];
			$_SESSION['mydesc'] = $row['about'];
			$_SESSION['avatar'] = $row['avatar'];
			$_SESSION['myserv'] = $row['services'];
			$_SESSION['myexp'] = $row['expertise'];
			$_SESSION['lastlogin'] = $row['last_login'];
			$_SESSION['website'] = $row['website'];
			$_SESSION['people'] = $row['people'];
			$_SESSION['role'] = $role;

			}
			try {
			$est = $row['estado'];
			$estado = 'S';
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("UPDATE tbl_companies SET last_login = :lastlogin, estado= :est WHERE id= :id");
			$stmt->bindParam(':lastlogin', $last_login);
			$stmt->bindParam(':est', $estado);
			$stmt->bindParam(':id', $myid);
			$stmt->execute();
			if(strcmp($est,'D')==0){
			$stmt1 = $conn->prepare("SELECT job_id FROM tbl_jobs WHERE company= :id and status='D'");
			$stmt1->bindParam(':id', $myid);			
			$stmt1->execute();
			$result = $stmt1->fetchAll();
			foreach($result as $row){
				$idd=$row['job_id'];
				$stmt2 = $conn->prepare("UPDATE tbl_jobs set status=:estado WHERE job_id = :id");
				
				$stmt2->bindParam(':estado', $estado);
				$stmt2->bindParam(':id', $idd);
				$stmt2->execute();
			}
			}
			header("location:../$role");			  
			}catch(PDOException $e)
			{
				echo $e;
		
			}

		}

	

	}
	
	}

					  
	}catch(PDOException $e)
    {

    }

?>