<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$language = ucwords($_POST['language']);
if(isset($_POST['nativo'])){
    $nativo = $_POST['nativo'];
    $lev = ucfirst($_POST['level']);
}else{
$nativo = 'N';
$lev = ucwords($_POST['levelN']);}
$lang = $_POST['langid'];

//echo "idioma: ".$language."<br>nativo: ".$nativo."<br>Nivel: ".$lev."<br> id: ".$lang;

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("UPDATE tbl_language SET language = :language, level = :lev, nativo = :nativo WHERE id= :langid AND member_no = '$myid'");
$stmt->bindParam(':language', $language);
$stmt->bindParam(':lev', $lev);
$stmt->bindParam(':nativo', $nativo);
$stmt->bindParam(':langid', $lang);
$stmt->execute();
					
header("location:../language.php?r=8763");
					
}catch(PDOException $e)
{
    echo $e;

}
	
?>