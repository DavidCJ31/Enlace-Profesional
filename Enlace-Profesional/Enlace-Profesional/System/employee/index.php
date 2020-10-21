<!doctype html>
<html lang="es_ES">
<?php 
require '../constants/settings.php'; 
require 'constants/check-login.php';

if ($user_online == "true") {
	if ($myrole == "employee") {
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

	<title>Perfil</title>
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
	<script type="text/javascript" src="../js/employee-index.js"></script>
	<script type="text/javascript" src="../js/employee.js"></script>
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
<?php 
try {
	require '../constants/db_config.php';
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmt = $conn->prepare("SELECT * FROM tbl_users where id='".$myid. "'");
	$stmt->execute();
	$result = $stmt->fetchAll();
	foreach( $result as $row ) {
}
	
}catch(PDOException $e)	{
echo $e;
}

?>  
	
<style>
  
    .autofit2 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
  
  </style>

<body class="not-transparent-header">

	<div class="container-wrapper">

	<?php include_once('headerEmployee.php'); ?>
	<?php include_once('secondary-header.php'); ?>
							
							<div class="GridLex-col-9_sm-8_xs-12">
							
								<div class="admin-content-wrapper">
								<input type="hidden" id="provinciadb" value=<?php echo "$myprovince"; ?>>
								<input type="hidden" id="cantondb" value=<?php echo "$mycity"; ?>>
									<div class="admin-section-title">
										<h2>Perfil</h2><?php //echo $mytipoDisc;?>
										<p>Último inicio de sesión: <span class="text-primary"><?php echo "$mylogin"; ?></span></p>
										
									</div>
									
									<form class="post-form-wrapper" action="app/profile-update.php" method="POST" autocomplete="off">
								
											<div class="row gap-20">
											<?php require 'constants/check_reply.php'; ?>

												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Nombre</label>
														<input name="fname" disabled required type="text" class="form-control" value="<?php echo "$myfname"; ?>" placeholder="Ingresa tu Nombres">
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Apellidos</label>
														<input name="lname" disabled required type="text" class="form-control" value="<?php echo "$mylname"; ?>" placeholder="Ingresa tu Apellidos">
													</div>
													
												</div>
												
												<div class="clear"></div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Fecha de nacimiento</label>
														<div class="row gap-5">
															<div class="col-xs-4 col-sm-4">
																<select name="date" required class=" form-control" data-live-search="false">
																	<option disabled value="">day</option>
                                                                     <?php 
                                                                      $x = 1; 

                                                                      while($x <= 31) {
                                         
												                      if ($x < 10) {
														              $x = "0$x";
													                  print '<option '; if ($mydate == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }else{
													                  print '<option '; if ($mydate == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }
                                                                      $x++;
                                                                       } 
                                                                     ?>
																</select>
															</div>
															<div class="col-xs-4 col-sm-4">
																<select name="month" required class="form-control" data-live-search="false">
                                                                     <?php 
                                                                      $x = 1; 

                                                                      while($x <= 12) {
                                         
												                      if ($x < 10) {
														              $x = "0$x";
													                  print '<option '; if ($mymonth == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }else{
													                  print '<option '; if ($mymonth == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
													                  }
                                                                      $x++;
                                                                       } 
                                                                     ?>
																</select>
															</div>
															<div class="col-xs-4 col-sm-4">
																<select name="year" class="form-control" data-live-search="false">
													            <?php 
                                                                 $x = date('Y'); 
                                                                 $yr = 60;
													             $y2 = $x - $yr;
                                                                 while($x > $y2) {
                                         
													             print '<option '; if ($myyear == $x ) { print ' selected '; } print ' value="'.$x.'">'.$x.'</option>';
                                                                 $x = $x - 1;
                                                                  } 
                                                                  ?>
																</select>
															</div>
														</div>
													</div>
													
												</div>
												
												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Correo</label>
														<input type="email" name="email" required class="form-control" value="<?php echo "$myemail"; ?>" placeholder="Ingresa tu Correo Electrónico">
													</div>
													
												</div>
												
												<div class="clear"></div>
												<div class="col-sm-9 col-md-9">
													<small><strong>Nota: La información sobre discapacidad no será vista por el empleador</strong></small><br>
														<!-- <div class="form-group"> -->
														<div class="form-check form-check-inline">
														
															<input  <?php if ($mydisc == 'S') { print ' checked '; } ?> class="form-check-input" type="checkbox" id="disc" value="S" name="disc" onchange="agregarDiscapacidad()">
															<label class="form-check-label" for="disc">Discapacidad</label>
														</div>
														<!-- </div> -->
														
												</div>
												<?php if(!empty($mytipoDisc)){ ?>
												<div class="col-sm-9 col-md-9" id="tipo_Disc">
												<br>
												<div class="form-group"><label>Tipo de Discapacidad</label>
												<select id="tipoDiscapacidad" name="tipoDiscapacidad" class="form-control">
												<option  <?php if ($mytipoDisc == 'Sensorial') { print ' selected '; } ?> value="Sensorial">Sensorial</option>
												<option <?php if ($mytipoDisc == 'Motriz') { print ' selected '; } ?> value="Motriz">Motriz</option>
												<option  <?php if ($mytipoDisc == 'Intelectual') { print ' selected '; } ?>  value=" Intelectual">Intelectual</option>
												<option  <?php if ($mytipoDisc == 'Conductual y Mental') { print ' selected '; } ?>  value="Conductual y Mental">Conductual y Mental</option>
												<option <?php if ($mytipoDisc == 'Múltiple') { print ' selected '; } ?>  value="Múltiple">Múltiple</option>
												</select>
											</div>
											</div>
												<?php } else { ?>
													<div class="col-sm-9 col-md-9" id="tipo_Disc" style="display: none;">
												<!-- <br> -->
												<div class="form-group"><label>Tipo de Discapacidad</label>
												<select id="tipoDiscapacidad" name="tipoDiscapacidad" class="form-control">
												<option value="Sensorial">Sensorial</option>
												<option value="Motriz">Motriz</option>
												<option value=" Intelectual">Intelectual</option>
												<option value="Conductual y Mental">Conductual y Mental</option>
												<option value="Múltiple">Múltiple</option>
												</select>
											</div>
										
											</div>
												<?php } ?>
												
												
												<div class="clear"></div>
	
												

												<div class="col-sm-6 col-md-4">
												<br>
													<div class="form-group">
														<label>Teléfono</label>
														<input type="text" name="phone" required class="form-control" value="<?php echo "$myphone"; ?>">
													</div>
													
												</div>

												<div class="clear"></div>


												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Provincia</label>
														<select id="provincia" name="province" required class="show-tick form-control" data-live-search="true" onchange="buscarCantones()">
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
		                                                    ?> <option <?php if ($myprovince == $row['state_name']) { print ' selected '; } ?> value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option> <?php
	 
	                                                        }

					  
	                                                       }catch(PDOException $e)
                                                           {

                                                           }
	
														   ?>
														</select>
													</div>
													
												</div>


												<div class="col-sm-6 col-md-4">
												
													<div class="form-group">
														<label>Cantón</label>
														<select id="canton" name="canton" class="show-tick form-control" data-live-search="true">
														<?php 
														require '../constants/db_config.php';
														try {
															$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
															$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


															$stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id =".$myprovince);
															$stmt->execute();
															$result = $stmt->fetchAll();

															foreach($result as $row)
															{
														?> <option <?php if ($mycity == $row['state_name']) { print ' selected '; } ?> value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option> <?php

															}
															

														}catch(PDOException $e)
															{

															}
														?>
														</select>
														
													</div>
													
												</div>
												
												<div class="clear"></div>

												<div class="clear"></div>
												
												<div class="col-sm-12 col-md-12">
												
													<div class="form-group ">
														<label>Sobre mi</label>
														<textarea name="about" class=" form-control" placeholder="Ingresa tu descripción ..." style="height: 200px;"><?php echo "$mydesc"; ?></textarea>
													</div>
													
												</div>
												
												<div class="clear"></div>

												<div class="col-sm-12 mt-10">
													<button type="submit" class="btn btn-primary">Actualizar</button>
													<button type="reset" class="btn btn-primary btn-inverse">Cancelar</button>
												</div>

											</div>
											
										</form><br>
										
										<form action="app/new-dp.php" method="POST" enctype="multipart/form-data">
										<div class="row gap-20">
										<div class="col-sm-12 col-md-12">
												
										<div class="form-group bootstrap3-wysihtml5-wrapper">
										<label>Mostrar Imagen</label>
										<input accept="image/*" type="file" name="image"  required >
										</div>
													
										</div>
												
										<div class="clear"></div>

										<div class="col-sm-12 mt-10">
										<button type="submit" class="btn btn-primary">Actualizar</button>
										<?php 
										if ($myavatar == null) {

										}else{
										?><a onclick = "return confirm('¿Está seguro que desea eliminar la imagen?')" class="btn btn-primary btn-inverse" href="app/drop-dp.php">Eliminar</a> <?php
										}
										?>
										</div>
										</div>
										</form>
										<br>
										<hr>
										<!--AQUI CV -->
										<form action="app/new-cv.php" method="POST" enctype="multipart/form-data">
										<div class="row gap-20">
										<div class="col-sm-12 col-md-12">

										<div class="form-group bootstrap3-wysihtml5-wrapper">
										<label>Subir CV  <small>formato PDF</small></label>
										<input accept="application/pdf" type="file" name="cv"  required >
										</div>

										</div>

										<div class="clear"></div>

										<div class="col-sm-12 mt-10">
										<button type="submit" class="btn btn-primary">Actualizar</button>
										<?php 
										if ($cv == null) {
										}else{
										?><a onclick = "return confirm('¿Está seguro que desea eliminar el cv?')" class="btn btn-primary btn-inverse" href="app/drop-cv.php">Eliminar</a> <?php
										}
										?>
										</div>
										</div>
										</form>
									
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
<!-- <script type="text/javascript" src="../js/customs.js"></script> -->


</body>



</html>