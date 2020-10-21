<!doctype html>
<html lang="es_ES">
<?php 
require '../constants/settings.php'; 
require 'constants/check-login.php';

if ($user_online == "true") {
if ($myrole == "superadmin") {
	}else{
		header("location:../");		
}
	}else{
	header("location:../");	
    }
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page=="" || $page=="1")
        {
        $page1 = 0;
        $page = 1;
        }else{
        $page1 = ($page*16)-16;
        }         
        }else{
        $page1 = 0;
        $page = 1;  
        }
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Usuarios</title>
	<meta name="description" content="Intermediacion Laboral UNA" />
	<meta name="keywords" content="job, work, resume, applicants, application, employee, employer, hire, hiring, human resource management, hr, online job management, company, worker, career, recruiting, recruitment" />
	<meta name="author" content="BwireSoft">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="og:image" content="http://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:secure_url" content="https://<?php echo "$actual_link"; ?>/images/banner.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="og:image:alt" content="Bwire Jobs" />
    <meta property="og:description" content="Intermediacion Laboral UNA" />

	<link rel="shortcut icon" href="../images/ico/favicon.png">

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script type="text/javascript" scr="../js/jquery-1.11.3.min"></script>
	<script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<link href="../css/animate.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	<link href="../css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="../icons/linearicons/style.css">
	<link rel="stylesheet" href="../icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="../icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="../icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="../icons/rivolicons/style.css">
	<link rel="stylesheet" href="../icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="../icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="../icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="../icons/flaticon-ventures/flaticon-ventures.css">

	<link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="..//css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>

	
</head>
	
<style>
  
    .autofit2 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  
  </style>

<body class="not-transparent-header">

	<div class="container-wrapper">

	<?php include_once('sadminheader.php'); ?>
	<?php include_once('secondary-header.php'); ?>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">
									<div class="admin-section-title">
										<h2>Usuarios</h2>
										<p>Administración de usuarios activos y nuevas solicitudes</p>
										<a type="button" href="create-admin.php" class="btn btn-info">Crear nuevo usuario administrador</a> <br>
                                           <br> <a type="button" href="create-superadmin.php" class="btn btn-success">Crear nuevo usuario súper-administrador</a> <br>
									</div>
									
									<!-- <form class="post-form-wrapper" action="app/profile-update.php" method="POST" autocomplete="off"> -->
								
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>

												<div class="clear"></div>
												
												<!-- tabla candidatos -->
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="title">
                                                <h2> Candidatos </h2>
                                                <table id="candidatos" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Identificación</th>
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>Discapacidad</th>
                                                        <th>Último inicio</th>
                                                        <th>Ver Perfil</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require 'constants/db_config.php';
                                                    
                                                    try {
                                                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                    $stmt = $conn->prepare("SELECT * FROM tbl_users ORDER BY first_name LIMIT $page1,16");
                                                                    $stmt->execute();
                                                                    $result = $stmt->fetchAll();
                                                                    foreach($result as $row)
                                                                    {
                                                                    $empavatar = $row['avatar'];
                                                        ?>

                                                                    <tr>
                                                                        <td><?php echo $row['id']; ?></td>
                                                                        <td><?php echo $row['first_name']; ?></td>
                                                                        <td><?php echo $row['last_name']; ?></td>
                                                                        <td><?php if($row['discapacidad']=='S') {echo $row['tipo_discapacidad'];} else{ echo 'No';} ?></td>
                                                                        <td><?php echo $row['last_login']; ?></td>
                                                                        
                                                                        <td> <a class="fa fa-eye" href="../employee-detail.php?empid=<?php echo $row['id']; ?>"></a></td>

                                                                        <td><form action="delete-employee.php" method="post">
                                                                        <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                                        </form></td>
                                                                    </tr>

                                                        

                                                        <?php
                                        
                                                                }

                                                    
                                                                }catch(PDOException $e)
                                                                    {
                                        
                                                                    }
                                                    
                                                        ?>
                                                        
                                                    
                                                            </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <th>Identificación</th>
                                                        <th>Nombre</th>
                                                        <th>Apellidos</th>
                                                        <th>Discapacidad</th>
                                                        <th>Último inicio</th>
                                                        <th>Ver Perfil</th>
                                                        <th>Eliminar</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            </div>
                                            </div>
												<!-- tabla candidatos -->
												
												<hr><hr>
                                                <!-- tabla empleadores-->
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="tile">
                                                <h2> Empleadores </h2>
                                                <table id="empleadores" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Correo</th>
                                                        <th>Nombre</th>
                                                        <th>Teléfono</th>
                                                        <th>Fecha de registro</th>
                                                        <th>Último Inicio de sesión</th>
                                                        <th>Ver Perfil</th>
                                                        <th>Denegar acceso</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require 'constants/db_config.php';
                                                    
                                                    try {
                                                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                    $stmt = $conn->prepare("SELECT * FROM tbl_companies where estado='S' ORDER BY first_name LIMIT $page1,16");
                                                                    $stmt->execute();
                                                                    $result = $stmt->fetchAll();
                                                                    foreach($result as $row)
                                                                    {
                                                                    $empavatar = $row['avatar'];
                                                        ?>

                                                                    <tr>
                                                                        <td><?php echo $row['email']; ?></td>
                                                                        <td><?php echo $row['first_name']; ?></td>
                                                                        <td><?php echo $row['phone']; ?></td>
                                                                        <td><?php echo $row['registerDate']; ?></td>
                                                                        <td><?php echo $row['last_login']; ?></td>
                                                                        <td> <a class="fa fa-eye" href="../company.php?ref=<?php echo $row['id']; ?>"></a></td>
                                                                        <td><form action="denegarAcceso.php" method="post">
                                                                        <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i></button>
                                                                        </form>
                                                                        </td>
                                                                        
                                                                    </tr>

                                                        

                                                        <?php
                                        
                                                                }

                                                    
                                                                }catch(PDOException $e)
                                                                    {
                                        
                                                                    }
                                                    
                                                        ?>
                                                        
                                                    
                                                            </tbody>
                                                    <tfoot>
                                                        <tr>
                                                        <th>Correo</th>
                                                        <th>Nombre</th>
                                                        <th>Teléfono</th>
                                                        <th>Fecha de registro</th>
                                                        <th>Último Inicio de sesión</th>
                                                        <th>Ver Perfil</th>
                                                        <th>Denegar acceso</th>
                                                        
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            </div>
                                            </div>                                                
                                            <!-- tabla empleadores-->
<hr><hr>
                                            <!-- tabla administradores-->
                                            <div class="row">
                                            <div class="col-md-12">
                                            
                                            <div class="tile">
                                            <h2> Administradores </h2>
                                            <table id="administradores" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Identificación</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require 'constants/db_config.php';
                                                
                                                try {
                                                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE role = 'admin' ORDER BY first_name LIMIT $page1,16");
                                                                $stmt->execute();
                                                                $result = $stmt->fetchAll();
                                                                foreach($result as $row)
                                                                {
                                                                $empavatar = $row['avatar'];
                                                    ?>

                                                                <tr>
                                                                    <td><?php echo $row['id']; ?></td>
                                                                    <td><?php echo $row['first_name']; ?></td>
                                                                    <td><?php echo $row['last_name']; ?></td>
                                                                    <td><?php echo $row['email']; ?></td>
                                                                    <td><?php echo $row['phone']; ?></td>
                                                                    <td><form action="app/delete-admin.php" method="post">
                                                                            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                    <?php
                                    
                                                            }

                                                
                                                            }catch(PDOException $e)
                                                                {
                                    
                                                                }
                                                
                                                    ?>
                                                    
                                                
                                                        </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Identificación</th>
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Eliminar</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        </div>
                                        </div>
                                    			<!-- tabla administradores-->
                                                <hr><hr>
                                            <!-- tabla super-administradores-->
                                        <div class="row">
                                        <div class="col-md-12">
                                        
                                        <div class="tile">
                                        <h2>Súper-Administradores </h2>
                                        <table id="administradores" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Identificación</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require 'constants/db_config.php';
                                            
                                            try {
                                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                            $stmt = $conn->prepare("SELECT * FROM tbl_admin WHERE role = 'superadmin' ORDER BY first_name LIMIT $page1,16");
                                                            $stmt->execute();
                                                            $result = $stmt->fetchAll();
                                                            foreach($result as $row)
                                                            {
                                                            $empavatar = $row['avatar'];
                                                ?>

                                                            <tr>
                                                                <td><?php echo $row['id']; ?></td>
                                                                <td><?php echo $row['first_name']; ?></td>
                                                                <td><?php echo $row['last_name']; ?></td>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['phone']; ?></td>
                                                                <td><form action="app/delete-admin.php" method="post">
                                                                            <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                                                        </form>
                                                                </td>
                                                            </tr>
                                                <?php
                                
                                                        }

                                            
                                                        }catch(PDOException $e)
                                                            {
                                
                                                            }
                                            
                                                ?>
                                                
                                            
                                                    </tbody>
                                            <tfoot>
                                                <tr>
                                                <th>Identificación</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Teléfono</th>
                                                <th>Eliminar</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    </div>
                                            <!-- tabla super-administradores-->
												
												
										<hr><hr>
										
										<!--tabla solicitudes-->
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="tile">
                                        <h2> Solicitudes de empresas</h2>
                                        <table id="solicitudesEmpresas" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Sector del Mercado</th>
                                                <th>Fecha de registro</th>
                                                <th>Aprobar</th>
                                                <th>Denegar</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require '../constants/db_config.php';
                                            
                                            try {
                                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                            $stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE estado='N' ORDER BY first_name LIMIT $page1,16");
                                                            $stmt->execute();
                                                            $result = $stmt->fetchAll();
                                                            foreach($result as $row)
                                                            {
                                                            $empavatar = $row['avatar'];
                                                            
                                                ?>

                                                            <tr>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['first_name']; ?></td>
                                                        
                                                                <td><?php echo $row['title']; ?></td>
                                                                <td><?php echo $row['registerDate']; ?></td>
                                                                <td><form action="app/enable-companies.php" method="post">
                                                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                <input type="hidden" value="<?php echo $row['email'];?>" name="email">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                                                </form>
                                                                </td>
                                                                <td>
                                                                <form action="denegarAcceso.php" method="post">
                                                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i></button>
                                                                </form>
                                                                </td>
                                                               
                                                            </tr>

                                                

                                                <?php
                                
                                                        }

                                            
                                                        }catch(PDOException $e)
                                                            {
                                
                                                            }
                                            
                                                ?>
                                                
                                            
                                                    </tbody>
                                            <tfoot>
                                                <tr>
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Sector del Mercado</th>
                                                <th>Fecha de registro</th>
                                                <th>Aprobar</th>
                                                <th>Denegar</th>
                                                
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    </div>
										<!--tabla empresas con acceso denegado-->
									<!--tabla solicitudes-->
                                    <hr><hr>
										<!--tabla empresas con acceso denegado-->
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="tile">
                                        <h2> Empresas con Acceso Denegado</h2>
                                        <table id="solicitudesEmpresas" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Sector del Mercado</th>
                                                <th>Fecha de registro</th>
                                                <th>Motivo</th>
                                                <th>Devolver Acceso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require '../constants/db_config.php';
                                            
                                            try {
                                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                            $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                            $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                            $stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE estado='E' ORDER BY first_name LIMIT $page1,16");
                                                            $stmt->execute();
                                                            $result = $stmt->fetchAll();
                                                            $stmt2 = $conn->prepare("SELECT * FROM tbl_denied_acces_companies WHERE company_id = :id AND access_denied = 'Si'");
                                                            foreach($result as $row)
                                                            {
                                                            $empavatar = $row['avatar'];
                                                            $company_id = $row['id'];
                                                            $stmt2->bindParam(':id',$company_id);
                                                            $stmt2->execute();
                                                            $result2 = $stmt2->fetchAll();
                                                            
                                                ?>

                                                            <tr>
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['first_name']; ?></td>
                                                                <td><?php echo $row['title']; ?></td>
                                                                <td><?php echo $row['registerDate']; ?></td>
                                                                <?php foreach($result2 as $row2){?>
                                                                <td> <?php echo $row2['motivo'];?> 
                                                                <a class="fa fa-link" href="verMotivos.php?mref=<?php echo $row2['id']; ?>">Ver detalles</a>
                                                                </td>
                                                                <?php }?>
                                                                <td><form action="app/enable-companies.php" method="post">
                                                                <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                <input type="hidden" value="<?php echo $row['email'];?>" name="email">
                                                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i></button>
                                                                </form>
                                                                </td>
                                                            </tr>

                                                

                                                <?php
                                
                                                        }

                                            
                                                        }catch(PDOException $e)
                                                            {
                                
                                                            }
                                            
                                                ?>
                                                
                                            
                                                    </tbody>
                                            <tfoot>
                                                <tr>
                                                <th>Correo</th>
                                                <th>Nombre</th>
                                                <th>Sector del Mercado</th>
                                                <th>Fecha de registro</th>
                                                <th>Motivo</th>
                                                <th>Devolver Acceso</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    </div>
										<!--tabla empresas con acceso denegado-->
									<!--tabla usuarios eliminados-->
                                    <hr><hr>
										<!--tabla de usuarios que fueron eliminados-->
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="tile">
                                        <h2> Usuarios eliminados</h2>
                                        <table id="usuarioEliminados" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Correo</th>
                                                <th>Motivo</th>
                                                <th>Eliminado por </th>
                                                <th>Eliminado el día</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require '../constants/db_config.php';
                                            
                                            try {
                                                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                            $stmt = $conn->prepare("SELECT * FROM tbl_deleted_users ORDER BY first_name LIMIT $page1,16");
                                                            $stmt->execute();
                                                            $result = $stmt->fetchAll();
                                                            $stmt2 = $conn->prepare("SELECT first_name, last_name FROM tbl_admin WHERE id = :id");
                                                    
                                                            foreach($result as $row)
                                                            {
                                                                $id = $row['deleted_by'];
                                                                $stmt2->bindParam(':id',$id);
                                                                $stmt2->execute();
                                                                $result2 = $stmt2->fetchAll();

                                                ?>

                                                            <tr>
                                                                <td><?php echo $row['delete_user_id']; ?></td>
                                                                <td><?php echo $row['deleted_user_fname'] . " " . $row['deleted_user_lname']; ?></td>
                                                                <td><?php echo $row['user_phone']; ?></td>
                                                                <td><?php echo $row['user_email']; ?></td>
                                                                
                                                                <?php foreach($result2 as $row2){?>
                                                                    <td><?php echo $row2['first_name'] ." ".$row2['last_name']; ?></td>
                                                                <?php }?>
                                                                <td><?php echo $row['deleted_date']?></td>
                                                            </tr>

                                                

                                                <?php
                                
                                                        }

                                            
                                                        }catch(PDOException $e)
                                                            {
                                
                                                            }
                                            
                                                ?>
                                                
                                            
                                                    </tbody>
                                            <tfoot>
                                                <tr>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Correo</th>
                                                <th>Motivo</th>
                                                <th>Eliminado por </th>
                                                <th>Eliminado el día</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    </div>
                                    </div>
								</div>

							</div>
							
						</div>
      </div>

</div>

</div>
			<br>

			<?php include_once('../footer.php'); ?>
			
		</div>

	</div>

 
 
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="../js/bootstrap-modal.js"></script>
<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="../js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-tokenfield.js"></script>
<script type="text/javascript" src="../js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap3-wysihtml5.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="../js/jquery-filestyle.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.js"></script>
<script type="text/javascript" src="../js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="../js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>


</body>



</html>