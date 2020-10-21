<?php
if(isset($_POST['registrarEmpresa'])){
    try {
        require '../constants/db_config.php';
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $email = $_POST['email'];
        $account_type = $_POST['acctype'];
        
        $stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $records = count($result);

        
        if ($records > 0) {
        header("location:../register.php?p=Employer&r=0927");	
            
        }else{

            $password   = $_POST['password'];
            $confPwd = $_POST['confirmpassword'];
            if (!preg_match("#.*^(?=.{8,})(?=.*[a-z])(?=.*[0-9]).*$#", $password) || $password!=$confPwd){
                header("location:../register.php?p=Employer&r=1022");
            }else{
                try {
                    require '../constants/db_config.php';
                    require '../constants/uniques.php';
                    $account_type = $_POST['acctype'];
                    $last_login = date('d-m-Y h:m A [T P]');
                    $comp_no = 'CM'.get_rand_numbers(9).'';
                    $cname = ucwords($_POST['company']);
                    $ctype = ucwords($_POST['type']);
                    $encargado = ucwords($_POST['encargado']);
                    $email = $_POST['email'];
                    $login = md5($confPwd);
                    
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("INSERT INTO tbl_companies (id,first_name,in_charge, title, email, last_login, login) 
                    VALUES (:id,:fname, :incharge, :title, :email, :lastlogin, :login)");
                    $stmt->bindParam(':id', $comp_no);
                    $stmt->bindParam(':fname', $cname);
                    $stmt->bindParam(':incharge', $encargado);
                    $stmt->bindParam(':title', $ctype);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':lastlogin', $last_login);
                    $stmt->bindParam(':login', $login);
                    $stmt->execute();
                    header("location:../register.php?p=Employer&r=0085");	
                   
                    // $para ="";
                    // date_default_timezone_set('America/Costa_Rica');
	                // $date = date('d/m/Y h:i:s a', time());	
                    // $asunto = "Empresa nueva ha solicitado registrarse -".$date;
                    // $mensaje = "<h4>Intermediacion Laboral</h4><br>"."<p>Estimado Administrador, la siguiente empresa ha solicitado unirse a la plataforma:<br> Nombre:".$company;	  
                    // $mensaje = $mensaje."Actividad economica: ".$ctype."<br>Correo Electronico: ".$email."</p><br>";   
                    // $mensaje = $mensaje."<p>Se le recuerda ingresar a su perfil dentro de la plataforma para poder aceptar dicha empresa.</p>"; 
                    // mail($para, $asunto, $mensaje);
                }catch(PDOException $e)
                    {
                        //echo "Segundo catch: ".$e;
                    header("location:../register.php?p=Employer&r=4568");
                    }	
            }
        }
                          
        }catch(PDOException $e)
        {
            //echo "Primer catch: ".$e;
        header("location:../register.php?p=Employer&r=4568");
        }
}else{
    header("location:../register.php?p=Employer&r=4568");
}


?>