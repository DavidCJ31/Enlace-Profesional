<?php
session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
$myid = $_SESSION['myid'];
$myfname = $_SESSION['myfname'];
$mylname = $_SESSION['mylname'];
// $mygender = $_SESSION['gender'];
$mylogin = $_SESSION['lastlogin'];
$myrole = $_SESSION['role'];
$myemail = $_SESSION['myemail'];
$myphone = $_SESSION['myphone'];
$user_online = true;	
$myavatar = $_SESSION['myavatar'];
}else{
$user_online = false;
}
?> 