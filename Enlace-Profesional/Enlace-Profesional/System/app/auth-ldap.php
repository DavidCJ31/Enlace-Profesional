<?php
date_default_timezone_set('America/Costa_Rica');
$last_login = date('d-m-Y h:m A [T P]');
require '../constants/db_config.php';
require_once '../../ldap/class.AuthLdap.php';
$myced = $_POST['cedula'];
$mypass = $_POST['password'];
// try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Revisar que exista en la tabla local
    $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE id = :myced and estado in ('A','D')");
	$stmt->bindParam(':myced', $myced);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
// 	//si no existe le dice que se registre
// 	if ($rec == "0") {
// 	    header("location:../login-employee.php?r=0808");
// 	}else{
//         $ldap = new AuthLdap();
//         $server[0] = "10.0.2.53";
//         $ldap->server = $server;
//         $ldap->dn = "dc=una,dc=ac,dc=cr";
//         if ( $ldap->connect()) { // nos conectamos a LDAP
//             if ($ldap->checkPass($myced,$mypass)) { //verificamos la clave y usuario
//                 $ldap->connect(); //me vuelvo a conectar para obtener datos
                foreach($result as $row){
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['role'] = "employee";
                    $_SESSION['myid'] = $row['id'];
                    $_SESSION['myfname'] = $row['first_name'];
                    $_SESSION['mylname'] = $row['last_name'];
                    $_SESSION['myemail'] = $row['email'];
                    $_SESSION['mydate'] = $row['bdate'];
                    $_SESSION['mymonth'] = $row['bmonth'];
                    $_SESSION['myyear'] = $row['byear'];
                    $_SESSION['myphone'] = $row['phone'];
                    $_SESSION['mycity'] = $row['city'];
                    $_SESSION['myprovince'] = $row['province'];
                    $_SESSION['mydesc'] = $row['about'];
                    $_SESSION['avatar'] = $row['avatar'];
                    $_SESSION['lastlogin'] = $row['last_login'];
                    $_SESSION['role'] = 'employee';
                    $_SESSION['mydisc'] = $row['discapacidad'];
                    $_SESSION['mytipoDisc'] = $row['tipo_discapacidad'];
                    $_SESSION['cv']=$row['cv'];
                    $estado = $row['estado'];
                }
                
//                     try {
//                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
//                         if(strcmp($estado,'D')==0){
//                             $estado='A';
//                         }
                        
//                         $stmt = $conn->prepare("UPDATE tbl_users SET last_login = :lastlogin, estado=:estado WHERE id= :cedula");
//                         $stmt->bindParam(':lastlogin', $last_login);
//                         $stmt->bindParam(':estado', $estado);
//                         $stmt->bindParam(':cedula', $myced);
//                         $stmt->execute();
                         header("location:../employee");
                                    
//                     }catch(PDOException $e){
//                         //echo "error del try de adentro de modificar usuario. ".$e."<br>";
//                         header("location:../login-employee.php?r=4568");
//                     }
//                 }//foreach

//             }else{
//                 //echo "contrase;a incorrecta.<br>";
//                 header("location:../login-employee.php?r=0347");
//             }
//         }else{
//             //echo "error de conexion<br>";
//             header("location:../login-employee.php?r=0909");
//         }
//     }
// }catch(Exception $e){
//     header("location:../login-employee.php?r=4568");
//     //echo "error del primer try. ".$e."<br>";
// }

?>