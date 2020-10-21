<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$grado = ucwords($_POST['education']);
$titulo = ucwords($_POST['titulo']);
$date = $_POST['fecha'];
$tipo = $_POST['typeU'];
$area = $_POST['area'];
$u = ucwords($_POST['university']);

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("INSERT INTO tbl_titles (user_id, education, title,education_area, date,una_type,university) VALUES (:id, :education, :title,:area, :date, :tipo, :u)");
$stmt->bindParam(':id', $myid);
$stmt->bindParam(':education', $grado);
$stmt->bindParam(':title', $titulo);
$stmt->bindParam(':area', $area);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':tipo', $tipo);
$stmt->bindParam(':u', $u);
$stmt->execute();
header("location:../titles.php?r=1967");					  
}catch(PDOException $e)
{
echo $e;
}
	
?>