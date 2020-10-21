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
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Certificaciones Académicas</title>
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
	<script src="../js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
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

									<div class="admin-section-title">
									
										<h2>Certificaciones Académicas o Capacitaciones</h2>
					
										
									</div>
									
									<div class="resume-list-wrapper">
									<?php require 'constants/check_reply.php'; ?>
									<?php
									require '../constants/db_config.php';
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification WHERE member_no = '$myid' ORDER BY id LIMIT $page1,5");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
		                             $ccountry = $row['country'];
									 $institution = $row['institution'];
									 $course = $row['title'];
									 $timeframe = $row['timeframe'];
									 $course_id = $row['id'];
									 $certificate = $row['certificate'];
									 ?>
									 									<div class="resume-list-item">
										
											<div class="row">
											
												<div class="col-sm-12 col-md-10">
												
													<div class="content">
													
														<?php 
														$sourcee = 'data:application/pdf;base64,'.base64_encode($certificate);												
														?>
														<a  target="_blank" href="<?php echo $sourcee;?>" download>															
															<h4><?php echo $row['title']; ?></h4>
															
															<div class="row">
																<div class="col-sm-12 col-md-9">
																	<i class="fa fa-graduation-cap text-primary mr-5"></i><strong class="mr-10"><?php echo $row['institution']; ?></strong> <i class="fa fa-map-marker text-primary mr-5"></i> <?php echo $row['country']; ?>.
																</div>
																<div class="col-sm-12 col-md-3 mt-10-sm">
																	<i class="fa fa-calendar  text-primary mr-5"></i> <?php echo $row['timeframe']; ?>
																</div>
															</div>

														</a>
													
													</div>
												
												</div>
												
												<div class="col-sm-12 col-md-2">
													
													<div class="resume-list-btn">
													
														<a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-5 mb-0-sm">Editar</a>
									<a href="app/drop-qualification.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('¿Está seguro que desea eliminar esta certificación?')" class="btn btn-primary btn-sm btn-inverse">Eliminar</a>
									
									<div id="edit<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">
					            
					                 <h4 class="modal-title text-center"><?php echo "$course"; ?></h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/update-professional-qualification.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">
									<div class="col-sm-12 col-md-12">
												
									<div class="form-group">
									<label style="text-align: left">País<b style="color: red;">*</b></label>
									<select name="country" required class="form-control" data-live-search="true">
									<option disabled value="">Seleccionar</option>
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
                                        ?>
										
										<option name="country" <?php if ($ccountry == $row['country_name'] ) { print ' selected '; } ?> value="<?php echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option>
										<?php
	                                     }
                                         $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
               
                                         }
	
										?>
	
									</select>
									</div>
													
									</div>

						
						            <div class="col-sm-12 col-md-12">
				
							        <div class="form-group"> 
								    <label style="text-align: left">Nombre de la Institución<b style="color: red;">*</b></label>
								    <input class="form-control" value="<?php echo "$institution"; ?>" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
							        </div>
						
						             </div>
						
						             <div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label style="text-align: left">Nombre del certificado o capacitación<b style="color: red;">*</b></label>
								    <input class="form-control" value="<?php echo "$course"; ?>" placeholder="Ingresa nombre del certificado" type="text" name="course" required> 
							        </div>
						
						           </div>
								   
								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label style="text-align: left">Periodo de Tiempo<b style="color: red;">*</b></label>
								    <input class="form-control" value="<?php echo "$timeframe"; ?>" placeholder="Ejp: 2015 a 2016" type="text" name="timeframe" required> 
							        </div>
						
						           </div>
								   <?php if(!empty($certificate)){?>
								   <div class="col-sm-12 col-md-12" style='text-align: left;'>
								   <?php echo "<a  target='_blank' href='downloadFile.php?file=".$course_id."'>Ver Certificado guardado</a>" ?>
								   </div>
								   <?php }?>
									<div class="col-sm-12 col-md-12">
							        <div class="form-group"> <br>
								    <label style="text-align: left">Adjuntar su Certificado <b>*(Dejar en blanco si no se desea actualizar)*</b></label>
								    <input class="form-control" accept="application/pdf" type="file" name="certificate"> 
							        </div>
						
						           </div>
						
					               </div>
				                   </div>
				                   <input type="hidden" name="courseid" value="<?php echo "$course_id"; ?>">
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary" name="editar">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>

													</div>
													</div>
													</div>
													
	
													
												</div>
												
											</div>
										
										</div>
										<?php
	                                }

					  
	                                }catch(PDOException $e)
                                    {
                  
                                    } 
									
									?>

									<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
								$total_records = 0;
								require '../constants/db_config.php';
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification WHERE member_no = '$myid' ORDER BY id");
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach($result as $row)
                                {
		                         $total_records++;
	                            }

					  
	                            }catch(PDOException $e)
                                {
                      
                                 } 
								$records = $total_records/5;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="qualifications.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?> href="qualifications.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="qualifications.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
					                </div>

										
		
										
									</div>
									
									<div class="mt-30">
									
										<a data-toggle="modal" href="#QualifModal" class="btn btn-primary btn-lg">Agregar Nuevo</a>
										
									</div>
									<div id="QualifModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">
					                 <h4 class="modal-title text-center">Añadir certificación o capacitación</h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/add-professional-qualification.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">
									<div class="col-sm-12 col-md-12">
												
									<div class="form-group">
									<label>País<b style="color: red;">*</b></label>
									<select name="country" required class="form-control" data-live-search="true">
									<option disabled value="">Seleccionar</option>
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
                                        ?>
										
										<option <?php if ($row['country_name'] == 'Costa Rica') { print ' selected '; } ?> value="<?php echo $row['country_name']; ?>"><?php echo $row['country_name']; ?></option>
										<?php
	                                     }
                                         $stmt->execute();
					  
	                                     }catch(PDOException $e)
                                         {
               
                                         }
	
										?>
						  

									</select>
									</div>
													
									</div>

						
						            <div class="col-sm-12 col-md-12">
				
							        <div class="form-group"> 
								    <label>Nombre de la Institución<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
							        </div>
						
						             </div>
						
						             <div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Nombre del certificado o capacitación<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ingresa Nombre del certificado" type="text" name="course" required> 
							        </div>
						
						           </div>
								   
								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Periodo de Tiempo<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ejp: 2015 a 2016" type="text" name="timeframe" required> 
							        </div>
						
						           </div>

								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Adjunta tu Certificado</label>
								    <input class="form-control" accept="application/pdf" type="file" name="certificate" > 
							        </div>
						
						           </div>
						
	
						           </div>
								   
					               </div>
				         
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Enviar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
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




<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<script type="text/javascript" src="../js/customs.js"></script>
<script type="text/javascript" src="../js/fileinput.min.js"></script>
<script type="text/javascript" src="../js/customs-fileinput.js"></script>


</body>


</html>