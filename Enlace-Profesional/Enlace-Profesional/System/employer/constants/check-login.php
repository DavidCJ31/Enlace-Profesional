<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['myid'];
$compname = $_SESSION['compname'];
$esta = $_SESSION['established'];
$mymail = $_SESSION['myemail'];
$encargado = $_SESSION['encargado'];
$myphone = $_SESSION['myphone'];
$comptype = $_SESSION['comptype'];
$city = $_SESSION['mycity'];
$province = $_SESSION['myprovince'];
$desc = $_SESSION['mydesc'];
$logo = $_SESSION['avatar'];
$mylogin = $_SESSION['lastlogin'];
$myrole = $_SESSION['role'];
$myserv = $_SESSION['myserv'];
$myex = $_SESSION['myexp'];	
$mytitle = $_SESSION['comptype'];
$myweb = $_SESSION['website'];
$mypeople = $_SESSION['people'];
$user_online = true;	
}else{
$user_online = false;
}
?>