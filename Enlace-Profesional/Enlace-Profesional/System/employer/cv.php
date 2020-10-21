<?php 
if(isset($_GET['id'])){
require '../constants/db_config.php';
require 'constants/check-login.php';
require('../fpdf/fpdf.php');
$myidU = $_GET['id'];
    try {
        //áéíó ÁÉÍÓ
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt1 = $conn->prepare("SELECT first_name,last_name,phone,city,province,email,about FROM tbl_users where id='".$myidU."'");
        $stmt1->execute();
        $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);

        $nom = $result1['first_name']." ".$result1['last_name'];
        $tel = "Teléfono: ".$result1['phone'];
        $ced = "Cédula: "."$myidU";
        $dir = "Dirección: ".$result1['city'].", ".$result1['province'];
        $em = "Correo Electrónico: ".$result1['email'];
        $mydesc = $result1['about'];
        //empieza a crearse el pdf
        $f = new FPDF();
        $f->AddPage('portrait','letter');
        $f->SetFont('Arial','',16);
        $f->Cell(0,5,utf8_decode($nom),0,0,'C');
        $f->Ln();
        $f->SetFont('Arial','',12);
        if(!empty($mydesc)){
            $f->SetTextColor(32,123,225);
            $f->Cell(0,12,utf8_decode("Sobre mí:"));
            $f->SetTextColor(0,0,0);
            $f->SetFont('Arial','',10);
            $f->Write(7,utf8_decode($mydesc));
            $f->Ln();
            $f->SetFont('Arial','',12);
        }
        
        $f->SetTextColor(32,123,225);
        $f->Cell(0,12,utf8_decode("Información Personal:"));
        $f->Ln();
        $f->SetTextColor(0,0,0);
        $f->SetFont('Arial','',10);
        $f->Write(5,utf8_decode($ced));
        $f->Ln();
        $f->Write(5,utf8_decode($dir));
        $f->Ln();
        $f->Write(5,utf8_decode($em));
        $f->Ln();
        $f->Write(5,utf8_decode($tel));
        $f->Ln();
       

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $stmt = $conn->prepare("SELECT * from tbl_titles where user_id='$myidU' order by una_type desc limit 3");
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(count($result)>0){
            $f->Ln();
            $f->SetFont('Arial','',12);
            $f->SetTextColor(32,123,225);
            $f->Write(5,utf8_decode("Formación Académica:"));
            $f->Ln();
            $f->SetTextColor(0,0,0);
            $f->SetFont('Arial','',10);
        }

        foreach($result as $row){
            $linea = $row['education']." en ".$row['title'].".";
            if($row['una_type']=='S'){
            $linea2="Universidad Nacional de Costa Rica, ".$row['date'].".";}
            else{
            $linea2=$row['university'].", ".$row['date'].".";  
            }
            $f->Write(5,utf8_decode($linea));
            $f->Ln();
            $f->Write(3,$linea2);
            $f->Ln();
            $f->Ln();
        }

        //Certificaciones
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $stmt = $conn->prepare("SELECT * from tbl_professional_qualification where member_no='$myidU' limit 2");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result) > 0){
            $f->SetFont('Arial','',12);
            $f->SetTextColor(32,123,225);
            $f->Ln();
            $f->Write(5,utf8_decode("Certificaciones Académicas:"));
            $f->Ln();
            $f->SetTextColor(0,0,0);
            $f->SetFont('Arial','',10);
        }

        foreach($result as $row){
            $linea = $row['institution'].", ".$row['country'].", ".$row['timeframe'].".";
            $f->Write(5,utf8_decode($row['title']));
            $f->Ln();
            $f->Write(3,utf8_decode($linea));
            $f->Ln();
        }

        //Experiencia
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $stmt = $conn->prepare("SELECT * from tbl_experience where user_id='$myidU' order by end_date asc limit 4");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result) > 0){
            $f->SetFont('Arial','',12);
            $f->SetTextColor(32,123,225);
            $f->Ln();
            $f->Write(5,utf8_decode("Experiencia:"));
            $f->Ln();
            $f->SetTextColor(0,0,0);
            $f->SetFont('Arial','',10);
        }

        foreach($result as $row){
            $linea = $row['title']." en ".$row['institution'];
            if($row['actualidad'] === 'S'){
                $linea2 =$row['start_date']." - actualidad";
            }
            else{
                $linea2 =$row['start_date']." hasta ".$row['end_date'];
            }
            $f->Write(5,utf8_decode($linea));
            $f->Ln();
            $f->Write(3,utf8_decode($linea2));
            $f->Ln();
            $f->Ln();
        }

        //Idiomas
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $stmt = $conn->prepare("SELECT * from tbl_language where member_no='$myidU' limit 4");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result) > 0){
            $f->SetFont('Arial','',12);
            $f->SetTextColor(32,123,225);
            // $f->Ln();
            $f->Write(5,utf8_decode("Idiomas:"));
            $f->Ln();
            $f->SetTextColor(0,0,0);
            $f->SetFont('Arial','',10);
        }

        foreach($result as $row){
            $level = "nivel: ".$row['level'];
            $idioma = $row['language'].", ".$level;
            $f->Write(5,utf8_decode($idioma));
            //$f->Write(4,utf8_decode($level));
            $f->Ln();
        }

        //Referencias
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
        $stmt = $conn->prepare("SELECT * from tbl_referees where member_no='$myidU' limit 2");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if(count($result) > 0){
            $f->SetFont('Arial','',12);
            $f->SetTextColor(32,123,225);
             $f->Ln();
            $f->Write(5,utf8_decode("Referencias:"));
            $f->Ln();
            $f->SetTextColor(0,0,0);
            $f->SetFont('Arial','',10);
        }

        foreach($result as $row){
            $linea = $row['ref_title'].", ".$row['institution'].".";
            $tel = "Teléfono: ".$row['ref_phone'].". Correo Electrónico: ".$row['ref_mail'];
            //$level = "Nivel: ".$row['level'];
            $f->Write(5,utf8_decode($row['ref_name']));
            $f->Ln();
            $f->Write(4,utf8_decode($linea));
            $f->Ln();

            $f->Write(4,utf8_decode($tel));
            $f->Ln();
        }
        
					  
        }catch(PDOException $e)
        {
            echo $e;
            //header("location:../index.php?r=4568");
        }
    
    $n = $nom.".pdf";
    $f->OutPut($n,'I');


}
?>
