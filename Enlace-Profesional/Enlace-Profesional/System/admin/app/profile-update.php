<?php
require '../constants/db_config.php';
require '../constants/check-login.php';
$myemail = $_POST['email'];
$phone = $_POST['phone'];
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE email = :email AND id != '$myid'");
	$stmt->bindParam(':email', $myemail);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $rec = count($result);
    if ($rec == 0) {
    $stmt = $conn->prepare("UPDATE tbl_admin SET  email = :email,  phone = :phone WHERE id='$myid'");
	$stmt->bindParam(':email', $myemail);
	$stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $_SESSION['myemail'] = $myemail;
    $_SESSION['myphone'] = $phone;
	header("location:../?r=9837");
    } else{
        echo "no sirvo";
        header("location:../?r=0927");
                  
    }
}catch(PDOException $e){
    echo $e;
}
?> 