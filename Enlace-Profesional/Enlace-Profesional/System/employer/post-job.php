<!doctype html>
<html lang="es_ES">

<?php 
require '../constants/settings.php'; 
require 'constants/check-login.php';

if ($user_online == "true") {
if ($myrole == "employer") {
}else{
header("location:../");		
}
}else{
header("location:../");	
}
$country = "Costa Rica";
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Publicar empleo</title>
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

	
</head>


<body class="not-transparent-header">

	<div class="container-wrapper">

	<?php include_once('headerEmployer.php'); ?>
		<div class="main-wrapper">
		
			
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-sm-5 col-md-4">
							
								<div class="company-detail-sidebar">
									
									<div class="image">
										<?php 
										if ($logo == null) {
										print '<center>Company Logo Here</center>';
										}else{
										echo '<center><img alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($logo).'"/></center>';	
										}
										?>
									</div>
									
									<h2 class="heading mb-15"><h4><?php echo "$compname"; ?></h4>
								
									<p class="location"><i class="fa fa-map-marker"></i> <?php echo "$city"; ?>, <?php //echo "$country"; ?> <span class="block"> <i class="fa fa-phone"></i> <?php echo "$myphone"; ?></span></p>
									
									<ul class="meta-list clearfix">
										<li>
											<h4 class="heading">Establecida en:</h4>
											<?php echo "$esta"; ?>
										</li>
										<li>
											<h4 class="heading">Rubro:</h4>
											<?php echo "$mytitle"; ?>
										</li>
										<li>
											<h4 class="heading">Personas:</h4>
											<?php echo "$mypeople"; ?>
										</li>
										<li>
											<h4 class="heading">Sitio web: </h4>
											<a target="_blank" href="https://<?php echo "$myweb"; ?>"><?php echo "$myweb"; ?></a>
										</li>
										<li>
											<h4 class="heading">Correo: </h4>
											<?php echo "$mymail"; ?>
										</li>

									</ul>
									
									
									<a href="./" class="btn btn-primary mt-5"><i class="fa fa-pencil-square-o mr-5"></i>Atrás</a>
									
								</div>
					
					
							</div>
							
							<div class="col-sm-7 col-md-8">
							
								<div class="company-detail-wrapper">

									<div class="company-detail-company-overview  mt-0 clearfix">
										
										<div class="section-title-02">
											<h3 class="text-left">Publicar Empleo</h3>
										</div>

										<form class="post-form-wrapper" action="app/post-job.php" method="POST" autocomplete="off">
								
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>
										
												<div class="col-sm-8 col-md-8">
												
													<div class="form-group">
														<label>Título del empleo<b style="color:red;">*</b></label>
														<input name="title" required type="text" class="form-control" placeholder="Ingrese título de trabajo">
													</div>
													
												</div>
												
												<div class="col-sm-8 col-md-8">
												
													<div class="form-group">
														<label>País<b style="color:red;">*</b></label>
														<select name="country" required class="form-control">
														<?php
														   require '../constants/db_config.php';
														   try {
                                                           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                                           $stmt = $conn->prepare("SELECT * FROM tbl_countries ORDER BY country_name");
                                                           $stmt->execute();
                                                           $result = $stmt->fetchAll();
  
                                                           foreach($result as $row)
                                                           {
		                                                    ?> <option <?php if ($country == $row['country_name']) { print ' selected '; } ?> value="<?php echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
														</select>
													</div>
													
												</div>

												<div class="clear"></div>
												
												<div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Provincia<b style="color:red;">*</b></label>
														<select name="province" id="province" required class="form-control" data-live-search="true" onchange="buscarCantones()">
															<option disabled value="">Seleccionar</option>
						                                   <?php
														   require '../constants/db_config.php';
														   try {
                                                           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                                           $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id is null ORDER BY id");
                                                           $stmt->execute();
                                                           $result = $stmt->fetchAll();
  
                                                           foreach($result as $row)
                                                           {
		                                                    ?> <option <?php if ($country == $row['state_name']) { print ' selected '; } ?> value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
														</select>
													</div>
													
												</div>

												<div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Cantón</label>
														<select name="city" id="canton" class="form-control" data-live-search="true">
														<?php
														   require '../constants/db_config.php';
														   try {
                                                           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                                           $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id=1 ORDER BY id");
                                                           $stmt->execute();
                                                           $result = $stmt->fetchAll();
  
                                                           foreach($result as $row)
                                                           {
		                                                    ?> <option <?php if ($country == $row['state_name']) { print ' selected '; } ?> value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
													</select>
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Categoría<b style="color:red;">*</b></label>
															<select name="category" required class="form-control" data-live-search="true">
															<option disabled value="">Seleccionar</option>
						                                   <?php
														   require '../constants/db_config.php';
														   try {
                                                           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                                           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                                           $stmt = $conn->prepare("SELECT * FROM tbl_categories ORDER BY category");
                                                           $stmt->execute();
                                                           $result = $stmt->fetchAll();
  
                                                           foreach($result as $row)
                                                           {
		                                                    ?> <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
														</select>
											
														
													</div>
													
												</div>
											    <div class="col-sm-4 col-md-4">
												
													<div class="form-group">
														<label>Fecha límite de postulación<b style="color:red;">*</b></label>
														<input name="deadline" required type="date" class="form-control" >
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												
													<div class="form-group mb-20">
														<label>Tipo<b style="color:red;">*</b></label>
														<select name="jobtype" required class="form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
															<option value="" selected>Seleccionar</option>
															<option value="Full-time">Tiempo completo</option>
															<option value="Part-time">Medio tiempo</option>
															<option value="Freelance">Práctica / Pasantía</option>
															<option value="Servicios Profesionales">Servicios Profesionales</option>
														</select>
													</div>
													
												</div>
												
												<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">
												
													<div class="form-group mb-20">
														<label>Experiencia<b style="color:red;">*</b></label>
														<select name="experience" required class="form-control" data-live-search="false" data-selected-text-format="count > 3" data-done-button="true" data-done-button-text="OK" data-none-selected-text="All">
															<option value="" selected> Seleccionar</option>
															<option value=""> Sin experiencia</option>
															<option value=""> 1 Año</option>
															<option value="2 años"> 2 Años</option>
															<option value="3 años"> 3 Años</option>
															<option value="4 años"> 4 Años</option>
															<option value="5 años"> 5 Años</option>
															<option value="Experto"> +5 Años</option>
														</select>
													</div>
													
													
												</div>

												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group">
														<label>Descripción<b style="color:red;">*</b></label>
														<textarea class="form-control" name="description" required placeholder="Ingrese descripción ..." style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group">
														<label>Funciones</label>
														<textarea name="responsiblities" required class="form-control" placeholder="Ingrese  responsabilidades..." style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group">
														<label>Requerimientos</label>
														<textarea name="requirements" required class="form-control" placeholder="Ingrese requerimientos..." style="height: 200px;"></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>
												

												
												<div class="clear"></div>
												

												
												<div class="clear mb-10"></div>

												
												<div class="clear mb-15"></div>

												
												<div class="clear"></div>
												
												<div class="col-sm-6 mt-30">
													<button type="submit"  onclick = "validate(this)" class="btn btn-primary btn-lg">Publicar empleo</button>
												</div>

											</div>
											
										</form>
										
									</div>
									
							


								</div>

							</div>
						
						</div>
						
					</div>
				
				</div>
			
			</div>

			
			<?php include_once('../footer.php'); ?>
		
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
<!-- <script type="text/javascript" src="../js/customs.js"></script> -->


<!-- <script type="text/javascript" src="../js/fileinput.min.js"></script> -->
<!-- <script type="text/javascript" src="../js/customs-fileinput.js"></script> -->




<!-- <script type="text/javascript" src="../js/jquery.sheepItPlugin.js"></script> -->
<!-- <script type="text/javascript" src="../js/customs-sheepItPlugin.js"></script> -->
<script type="text/javascript">
function buscarCantones(){
		var provi = document.getElementById("province");
		var valor = provi.options[provi.selectedIndex].value;
		$.post("app/response.php", { elegido: valor }, function(data){
		$("#canton").html(data);
		});

	} 
</script>
</body>

</html>