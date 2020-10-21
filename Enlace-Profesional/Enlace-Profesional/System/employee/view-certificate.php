<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ver Certificaciones</title>
<link rel="shortcut icon" href="../images/ico/favicon.png">
<link href="../css/main.css" rel="stylesheet">
</head>

<body>
<?php
require '../constants/db_config.php';
require 'constants/check-login.php';
$file_id = $_GET['id'];

if ($user_online == "true") {
if ($myrole == "employee") {
}else{
header("location:../");		
}
}else{
header("location:../");	
}

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification WHERE id = :fileid AND member_no = '$myid'");
$stmt->bindParam(':fileid', $file_id);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
	

    

     
$archivo = $row['certificate'];
	
header("Content-Length: " . filesize ($archivo) ); 
header("Content-type: application/pdf"); 
header("Content-disposition: attachment; filename=".basename($archivo));
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$filepath = readfile($archivo);
	?>
	


    <?php   
    /*
    		header("Content-Length: " . filesize ($certificate) ); 
			header("Content-type: application/pdf"); 
			header("Content-disposition: inline;     
			filename=".basename($certificate));
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			$filepath = readfile($certificate); 
	*/
	?>



    </div>

<?php
}

					  
}catch(PDOException $e)
{

}

?>
</body>

</html>