<?php
date_default_timezone_set('America/Panama');
$last_login = date('d-m-Y h:m A [T P]');
require '../constants/db_config.php';
$myced = $_POST['cedula'];
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
	
    $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE id = :myced AND login = :mypassword and role = 'superadmin'");
	$stmt->bindParam(':myced', $myced);
	$stmt->bindParam(':mypassword', $mypass);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	
	if ($rec == "0") {
	 header("location:../sadmin-login.php?r=0347");
	}else{
    foreach($result as $row)
    {
	session_start();
    $_SESSION['logged'] = true;
    $_SESSION['myid'] = $row['id'];
    $_SESSION['myfname'] = $row['first_name'];
	$_SESSION['mylname'] = $row['last_name'];
	$_SESSION['myavatar'] = $row['avatar'];
    $_SESSION['lastlogin'] = $row['last_login'];
    $_SESSION['myemail'] = $row['email'];
	$_SESSION['myphone'] = $row['phone'];
    $_SESSION['role'] = $row['role'];
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $stmt = $conn->prepare("UPDATE tbl_admin SET last_login = :lastlogin WHERE id= :cedula");
	$stmt->bindParam(':lastlogin', $last_login);
    $stmt->bindParam(':cedula', $myced);
    $stmt->execute();
	header("location:../");
					  
	}catch(PDOException $e)
    {
    }
	
	}
	
	}
					  
	}catch(PDOException $e)
    {
    }
?>