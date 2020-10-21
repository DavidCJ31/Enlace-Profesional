<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
// if (($_FILES['my_file']['name']!="")){
//     // Where the file is going to be stored
//         $target_dir = "upload/";
//         $file = $_FILES['my_file']['name'];
//         $path = pathinfo($file);
//         $filename = $path['filename'];
//         $ext = $path['extension'];
//         $temp_name = $_FILES['my_file']['tmp_name'];
//         $path_filename_ext = $target_dir.$filename.".".$ext;
     
//     // Check if file already exists
//     if (file_exists($path_filename_ext)) {
//      echo "Sorry, file already exists.";
//      }else{
//      move_uploaded_file($temp_name,$path_filename_ext);
//      echo "Congratulations! File Uploaded Successfully.";
//      }
//     }
$cv = addslashes(file_get_contents($_FILES['cv']['tmp_name']));
if ($_FILES["cv"]["size"] > 1000000) {
header("location:../?r=9874");
}else{
	
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE tbl_users SET cv='$cv' WHERE id='$myid'");
    $stmt->execute();
	
	$stmt = $conn->prepare("SELECT * FROM tbl_users WHERE id='$myid'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    foreach($result as $row)
    {
     $_SESSION['cv'] = $row['cv'];
	 header("location:../?r=6587");
	} 
	
					  
	}catch(PDOException $e)
    {
    }
	
}
?>