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
										<h2>Video-tutoriales</h2>
										<p>Administración de video-tutoriales</p>
										<a type="button" href="registrarVideo.php" class="btn btn-info">Registrar un nuevo video-tutorial</a> <br>
                                           
									</div>
									
									<!-- <form class="post-form-wrapper" action="app/profile-update.php" method="POST" autocomplete="off"> -->
								
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>

												<div class="clear"></div>
												
												<!-- tabla candidatos -->
                                                <div class="row">
                                                <div class="col-md-12">
                                                <div class="title">
                                                <h2> Videos </h2>
                                                <table id="candidatos" class="table table-striped" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Enlace</th>
                                                        <th>Descripción</th>
                                                        <th>Fecha de Registro</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require 'constants/db_config.php';
                                                    
                                                    try {
                                                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                                    $stmt = $conn->prepare("SELECT * FROM tbl_tutorials ORDER BY video_name LIMIT $page1,16");
                                                                    $stmt->execute();
                                                                    $result = $stmt->fetchAll();
                                                                    foreach($result as $row)
                                                                    {
                                                                    
                                                        ?>

                                                                    <tr>
                                                                        <td><?php echo $row['video_name']; ?></td>
                                                                        <td style="width: auto;"><?php echo $row['video_link']; ?></td>
                                                                        <td style="width: auto;" ><?php echo $row['video_description']; ?></td>
                                                                        <td><?php echo $row['created_at']; ?></td>
                                                                        <td><form action="editarVideo.php" method="post">
                                                                        <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                                                        </form></td>
                                                                        <td><form action="app/eliminarVideo.php" method="post">
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
                                                        <th>Nombre</th>
                                                        <th>Enlace</th>
                                                        <th>Descripción</th>
                                                        <th>Fecha de Registro</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            </div>
                                            </div>
												<!-- tabla candidatos -->
									
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