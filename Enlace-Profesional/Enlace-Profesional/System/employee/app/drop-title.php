<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$id = $_GET['id'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("DELETE FROM tbl_titles WHERE id=:id AND user_id = '$myid'");
$stmt->bindParam(':id', $id);
$stmt->execute();
header("location:../titles.php?r=1968");				  
}catch(PDOException $e)
{

}
?>