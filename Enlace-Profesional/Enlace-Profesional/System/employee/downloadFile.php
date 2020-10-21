<?php
// PHP SECURE FILE DOWNLOAD
// Put the Files in a directory that is not publically accessible.. maybe outside document root or set correct permissions
try{
       
    include('ChromePhp.php');
    include '../constants/db_config.php';
    include 'constants/check-login.php';
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET["file"];
    $stmt = $conn->prepare("SELECT certificate FROM tbl_professional_qualification WHERE id=:id AND member_no = '$myid'");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $server = $_SERVER['DOCUMENT_ROOT']."/Enlace-Profesional/System/";
    $file = $server.$row["certificate"];
//echo basename($file);
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename=' . basename($file));
        //header("Content-type: application/pdf");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
    else {
    echo "no se encontro archivo<br>";
    //echo $file;
    }
}catch ( Exception $e) {
     ECHO 'ERROR';
  }
?>
