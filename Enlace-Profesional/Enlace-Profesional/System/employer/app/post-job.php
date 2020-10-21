<?php
date_default_timezone_set('Africa/Dar_es_salaam');
require '../../constants/db_config.php';
require '../constants/check-login.php';
require '../../constants/uniques.php';

$job_id = ''.get_rand_numbers(10).'';
$title  = ucwords($_POST['title']);
$city  = ucwords($_POST['city']);
$province = $_POST['province'];
$country = $_POST['country'];
$category = $_POST['category'];
$type = $_POST['jobtype'];
$exp = $_POST['experience'];
$desc = ucfirst($_POST['description']);
$rec = ucfirst($_POST['requirements']);
$res = ucfirst($_POST['responsiblities']);
$deadline = $_POST['deadline'];
$date = str_replace('-', '/', $deadline );
$newDate = date("Y/m/d", strtotime($date));
date_default_timezone_set('America/Costa_Rica');
$postdate = date('Y/m/d');

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("INSERT INTO tbl_jobs (job_id, title,province, city, country, category, type, experience, description, responsibility, requirements, company, date_posted, closing_date)
 VALUES (:jobid, :title, :province, :city, :country, :category, :type, :experience, :description, :responsibility, :requirements, :company, :dateposted, :closingdate)");
$stmt->bindParam(':jobid', $job_id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':province', $province);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':country', $country);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':type', $type);
$stmt->bindParam(':experience', $exp);
$stmt->bindParam(':description', $desc);
$stmt->bindParam(':responsibility', $res);
$stmt->bindParam(':requirements', $rec);
$stmt->bindParam(':company', $myid);
$stmt->bindParam(':dateposted', $postdate);
$stmt->bindParam(':closingdate', $newDate);
$stmt->execute();
header("location:../post-job.php?r=9843");		  
}catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}

?>