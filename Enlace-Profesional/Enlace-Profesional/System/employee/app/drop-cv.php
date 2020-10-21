<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
	
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $stmt = $conn->prepare("UPDATE tbl_users SET cv=null WHERE id='$myid'");
    $stmt->execute();
	
	$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE id='$myid'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $row)
    {
     $_SESSION['cv'] = $row['cv'];
	 header("location:../");
	} 
	
					  
	}catch(PDOException $e)
    {
    }
?> 