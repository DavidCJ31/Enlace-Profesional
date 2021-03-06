<!doctype html>
<html lang="es_ES">
<?php 
require '../constants/settings.php';
require '../constants/db_config.php'; 
require 'constants/check-login.php';


if ($user_online == "true") {
	if ($myrole == "superadmin") {
	
		if (isset($_GET['mref'])) {
	
			$motivo_id = $_GET['mref'];
			
			
			
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				
				$stmt = $conn->prepare("SELECT * FROM tbl_denied_acces_companies WHERE id = :memberno AND access_denied = 'Si'");
				$stmt->bindParam(':memberno', $motivo_id);
				$stmt->execute();
				$result = $stmt->fetchAll();
				$rec = count($result);
				
				$stmt2 = $conn->prepare("SELECT * FROM tbl_companies WHERE id = :idM");
				
				if ($rec == "0") {
				 header("location:./");	
				}else{
			
				foreach($result as $row)
				{
					$idMot = $motivo_id;
					$motivoMot = $row['motivo'];
					$explicacionMot = $row['motivo_explicacion'];
					$idCompMot = $row['company_id'];
					$fechaDenegacion = $row['created_at'];
					$denegado_por = $row['denied_by'];
			
			
					$stmt2->bindParam(':idM', $idCompMot);
					$stmt2->execute();
					$result2 = $stmt2->fetchAll();
					
					foreach($result2 as $row2){
						$nombreEmpresa = $row2['first_name'];
						$personInCarge = $row2['in_charge'];
						$emailComp = $row2['email'];
						$phoneComp = $row2['phone'];
						$provinceComp = $row2['province'];
						$countryComp = $row2['country'];
					}
					
					$stmt3 = $conn->prepare("SELECT * FROM tbl_admin WHERE id = :idAd");
					$stmt3->bindParam(':idAd',$denegado_por);
					$stmt3->execute();
					$result3 = $stmt3->fetchAll();
	
					foreach($result3 as $row3){
						$nombre = $row3['first_name'];
						$apellido = $row3['last_name'];
						$rol = $row3['role'];
					}
				
				}
				
				}
			
								  
				}catch(PDOException $e)
				{
			 
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
			$page1 = ($page*5)-5;
			}					
			}else{
			$page1 = 0;
			$page = 1;	
			}
	
		}else{
			header("location:../");		
	}
		}else{
		header("location:../");	
		}
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Crear Admin</title>
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
    <script type="text/javascript" src="../js/security.js " ></script>
	
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
								<div class="company-detail-header text-center">
										
										<div class = "heading mb-15">
										<?php 
										if($nombreEmpresa !== NULL){
										    print '<h2> INFORMACION MOTIVO DE DENEGACIÓN DE ACCESO A '.$nombreEmpresa.'</h2>';
                                        }else{
                                            print '<center> INFORMACION MOTIVO DE DENEGACIÓN DE ACCESO</center>';
                                        }
										?>
										</div>
									
										<ul class="meta-list clearfix">
                                            <li>
												<h4 class="heading">Persona a Cargo:</h4>
												<?php echo "$personInCarge"; ?>
											</li>
											<li>
												<h4 class="heading">Correo Electronico:</h4>
												<?php echo "$emailComp"; ?>
											</li>
											<li>
												<h4 class="heading">Telefono: </h4>
												<?php echo "$phoneComp"; ?>
											</li>
											<li>
												<h4 class="heading">País: </h4>
												<?php echo "$countryComp"; ?>
											</li>
											<li>
												<h4 class="heading">Provincia : </h4>
												<?php echo "$provinceComp"; ?>
											</li>
										</ul>
										</div>
										<div class="company-detail-company-overview clearfix">
									
										<h3>Fue denegado por:</h3>
										<p><?php echo "$rol"; ?></p>
										<p><?php echo "$nombre" . " $apellido"; ?></p>
										
										

										<h3>Motivo de Denegación de la Empresa</h3>
										
										<p><?php echo "$motivoMot"; ?></p>

										
										<h3>Detalle</h3>
										
										<p><?php echo "$explicacionMot"; ?></p>
										
										<h3>Fecha de Denegación</h3>
										
										<p><?php echo "$fechaDenegacion" ; ?></p>
										
									</div><br><br>
									
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