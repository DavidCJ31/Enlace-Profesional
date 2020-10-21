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

	<title>Títulos Académicos</title>
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
									
										<h2>Títulos Académicos</h2>
										<h6>Registre su título según su prioridad para la búsqueda de empleo.</h6>
									</div>
									
									<div class="resume-list-wrapper">
									<?php require 'constants/check_reply.php'; ?>
									<?php
									require '../constants/db_config.php';
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_titles WHERE user_id = '$myid' ORDER BY id LIMIT $page1,5");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
									 $title = $row['title'];
									 $education = $row['education'];
									 $date1 = $row['date'];
									 $u = $row['university'];
									 $utype = $row['una_type'];
									 
									 ?>
									 	<div class="resume-list-item">
										
											<div class="row">
											
												<div class="col-sm-12 col-md-10">
												
													<div class="content">
													
															<?php if($u == 'UNA') {?>												
															<h4><?php echo "$education"." en "." $title"; ?></h4>
															
															<div class="row">
																<div class="col-sm-12 col-md-5 mt-10-sm">
																	<i class="fa fa-calendar  text-primary mr-5"></i><?php echo "$date1"; ?>
																</div>
															</div>
															<?php }else { ?>
																
																<h4><?php echo " $title"; ?></h4>
															
																<div class="row">
																<div class="col-sm-12 col-md-5 mt-10-sm">
																	<i class="fa fa-calendar  text-primary mr-5"></i><?php echo "$date1"; ?>
																</div>
																</div>
															<?php } ?>
													</div>
												
												</div>
												
												<div class="col-sm-12 col-md-2">
													
													<div class="resume-list-btn">
														<?php if(strcmp($row['una_type'],'N')==0){ ?>
														<a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-5 mb-0-sm">Ver/Editar</a>
														<?php } else{ ?>
														<a data-toggle="modal" href="#edit-UNA" onclick="ajustar(<?php echo  $row['id']; ?>)" class="btn btn-primary btn-sm mb-5 mb-0-sm">Ver/Editar</a>
														<?php } ?>
														<a href="app/drop-title.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('¿Está seguro que desea eliminar este título académico?')" class="btn btn-primary btn-sm btn-inverse">Eliminar</a>
														
														<div id="edit<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																   
																	 <h4 class="modal-title text-center">Título de otra Universidad</h4>
																	</div>
											
																	<div class="modal-body">
																	<b></b>
																		<form action="app/update-title.php"  method="post">
																			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
																			<div class="row">
																				<div class="col-sm-12 col-md-12 col-lg-12">
																					<div class="form-group"> 
																						<label style="text-align: left">Universidad</label>
																						<input class="form-control" placeholder="Universidad" name="universidad" value="<?php echo "$u"; ?>"> 
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																		
																			
																			<div class="row">
																				<div class="col-sm-6 col-md-6 col-lg-6">
																					<input type="hidden" name="tipo" value="N">
																					<div class="form-group"> 
																						<label style="text-align: left">Grado Académico</label>
																						<select name="gradoAcademico" id="gradoAcademico" required class="form-control">
																							<option value="Diplomado" <?php if(strcmp($education,"Diplomado")==0){ echo "selected";}?>>Diplomado</option>
																							<option value="Profesorado" <?php if(strcmp($education,"Profesorado")==0){ echo "selected";}?>>Profesorado</option>
																							<option value="Bachillerato" <?php if(strcmp($education,"Profesorado")==0){ echo "selected";}?>>Bachillerato</option>
																							<option value="Licenciatura" <?php if(strcmp($education,"Licenciatura")==0){ echo "selected";}?>> Licenciatura </option>
																							<option value="Especialidad" <?php if(strcmp($education,"Especialidad")==0){ echo "selected";}?>> Especialidad </option>
																							<option value="Maestría" <?php if(strcmp($education,"Maestría")==0){ echo "selected";}?>> Maestría </option>
																							<option value="Doctorado" <?php if(strcmp($education,"Doctorado")==0){ echo "selected";}?>> Doctorado </option>
																							<option value="Postdoctorado" <?php if(strcmp($education,"Postdoctorado")==0){ echo "selected";}?>> Postdoctorado</option>
																						</select> 
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																			 
																			<div class="row">
																				<div class="col-sm-12 col-md-12 col-lg-12">
																					<div class="form-group"> 
																						<label style="text-align: left">Título</label>
																						<input class="form-control" name="title" value=<?php echo "$title"; ?> >
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																			
																			<div class="row">
																				<div class="col-sm-6 col-md-6 col-lg-6">
																					<div class="form-group"> 
																						<label style="text-align: left">Fecha</label>
																						<input value="<?php echo "$date1"; ?>" class="form-control" name="date" type="date"> 
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																		   <!--</div>-->
																	</div>
												
																	   <div class="modal-footer text-center">
																		   <button type="submit" class="btn btn-primary">Editar</button>
																		   <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
																	   </div>
																   </form>
															   </div>

															</div>
																		
														</div><!--cierra el modal de editar titulo otra U-->
														
														<div id="edit-UNA" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																   
																	 <h4 class="modal-title text-center">Título de la Universidad Nacional</h4>
																	</div>
											
																	<div class="modal-body">
																	<b></b>
																		<form action="app/update-titleUNA.php"  method="post">
																			<input type="hidden" name="id" id="idUNA">
																			<div class="row">
																				<div class="col-sm-12 col-md-12 col-lg-12">
																					<div class="form-group"> 
																						<label style="text-align: left">Área</label>
																						<select name="areaAcad" id="areaAcad" required class="form-control" onchange="buscarTit()">
																							 <?php
																							   require '../constants/db_config.php';
																							   try {
																							   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
																							   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
																							   $stmt = $conn->prepare("SELECT * FROM tbl_area ORDER BY area");
																							   $stmt->execute();
																							   $result1 = $stmt->fetchAll();
									  
																							   foreach($result1 as $fila)
																							   {
																								?> <option value="<?php echo $fila['area']; ?>"><?php echo $fila['area']; ?></option> <?php
										 
																								}

														  
																							   }catch(PDOException $e)
																							   {

																							   }
										
																							   ?>
																						</select> 
																						</div>
																				</div>
																			</div><!-- cierra el row-->
																		
																			
																			<div class="row">
																				<div class="col-sm-6 col-md-6 col-lg-6">
																					<input type="hidden" name="tipo" value="S">
																					<div class="form-group"> 
																						<label style="text-align: left">Grado Académico</label>
																						<select name="gradoA" id="gradoA" required class="form-control" onchange="buscarTit()">
																							<option value="Diplomado" >Diplomado</option>
																							<option value="Profesorado" >Profesorado</option>
																							<option value="Bachillerato" >Bachillerato</option>
																							<option value="Licenciatura" > Licenciatura </option>
																							<option value="Especialidad"> Especialidad </option>
																							<option value="Maestría" > Maestría </option>
																							<option value="Doctorado" > Doctorado </option>
																							<option value="Postdoctorado"> Postdoctorado</option>
																						</select> 
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																			 
																			<div class="row">
																				<div class="col-sm-12 col-md-12 col-lg-12">
																					<div class="form-group"> 
																						<label style="text-align: left">Título</label>
																						<!--<input class="form-control" name="title" value="<?php echo "$title"; ?>" >-->
																						<select name="title" id="title" required class="form-control">
																							 
																						</select> 
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																			
																			<div class="row">
																				<div class="col-sm-6 col-md-6 col-lg-6">
																					<div class="form-group"> 
																						<label style="text-align: left">Fecha</label>
																						<input value="<?php echo "$date1"; ?>" class="form-control" name="dateU" type="date"> 
																					</div>
																				</div>
																			</div><!-- cierra el row-->
																		   <!--</div>-->
																	</div>
												
																	   <div class="modal-footer text-center">
																		   <button type="submit" class="btn btn-primary" name="UNA-edit">Editar</button>
																		   <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
																	   </div>
																   </form>
															   </div>

															</div>
																		
														</div><!--cierra el modal de editar titulo UNA-->
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
                                $stmt = $conn->prepare("SELECT * FROM tbl_titles WHERE user_id = '$myid' ORDER BY id");
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
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="titles.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?> href="titles.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="titles.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
					                </div>

										
		
										
									</div>
									
									<div class="mt-30">
									
										<a data-toggle="modal" href="#chooseModal" class="btn btn-primary btn-lg">Agregar Nuevo</a>
										
									</div>


									<!-- hasta aqui-->
									<div class="modal" tabindex="-1" role="dialog" id="chooseModal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Agregar Nuevo Título</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<p>Escoja dependiendo del origen del título</p>
										<a data-toggle="modal" href="#QualifModal" data-dismiss="modal" class="btn btn-primary">UNA</a>
										<a data-toggle="modal" href="#OtherModal" class="btn btn-secondary" data-dismiss="modal">Otra Universidad</a>
										</div>
										
										</div>
									</div>
									</div>
									<!-- hasta aqui-->
									<div id="QualifModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">					               
					                 <h4 class="modal-title text-center">Título Académico Adicional UNA</h4>
				                    </div>
				
				                    <div class="modal-body">

									<form action="app/add-title.php" method="POST" autocomplete="off">
					                <div class="container">
									

						            <div class="row">
								 	<div class="col-6">
							        <div class="form-group"> 
								    <label>Área de conocimiento <b style="color:#990000">*</b></label>
									<input type="hidden" value="S" name="typeU">
									<input type="hidden" value="UNA" name="university">
									<select name="area" id="areaA" required class="form-control" onchange="buscarTitulo()">
									<option>Seleccionar</option>	
										<?php
											require '../constants/db_config.php';
											try {
												$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
												$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
												$stmt = $conn->prepare("SELECT * FROM tbl_area");
												$stmt->execute();
												$result = $stmt->fetchAll();

												foreach($result as $row){
										?> 		<option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option> <?php }
											}catch(PDOException $e){}
										?>
									</select> 
							        </div>
									</div><!--cierra el col 6-->
									 <div class="col-6">
				
							        <div class="form-group"> 
								    <label>Grado Académico<b style="color:#990000">*</b></label>
								    <select name="education" id="gradoAcademicoUNA" required class="form-control" onchange="buscarTitulo()">
										<option>Seleccionar</option>
										<option value="Diplomado">Diplomado</option>
										<option value="Profesorado">Profesorado</option>
										<option value="Bachillerato">Bachillerato</option>
										<option value="Licenciatura"> Licenciatura </option>
										<option value="Especialidad"> Especialidad </option>
										<option value="Maestría"> Maestría </option>
										<option value="Doctorado"> Doctorado </option>
										<option value="Postdoctorado"> Postdoctorado</option>
									</select> 
							        </div>
							        </div><!--cierra el col 6-->
						             </div><!--cierra el row-->
									<div class="row">
									<div class="col-12">
							        <div class="form-group"> 
								    <label>Título<b style="color:#990000">*</b></label>
								    <select id="titulo" name="titulo" class="show-tick form-control" data-live-search="true" required>
	
									</select>
							        </div>
									</div>
						             </div>
									 
									<div class="row">
									<div class="col-12">
							        <div class="form-group"> 
								    <label>Fecha del título <b style="color:#990000">*</b></label>
								    <input class="form-control" type="date" name="fecha" required> 
							        </div>
							        </div>
						
						            </div>
					               </div>
					               	<b style="color:#990000">Todos los campos con * son obligatorios</b>
				                   </div>
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>
								   </div>
								   </div><!--cierra el modal de titulo UNA-->
								   
									<div id="OtherModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">					               
					                 <h4 class="modal-title text-center">Título Académico Adicional de otra universidad</h4>
				                    </div>
				
				                    <div class="modal-body">

									<form action="app/add-title.php" method="POST" autocomplete="off">
					                <div class="container">
									 <div class="row">
									<div class="col-12">
							        <div class="form-group"> 
								    <label>Universidad<b style="color:#990000">*</b></label>
								    <input id="university" name="university" class="form-control" required>
							        </div>
									</div>
						             </div>

						            <div class="row">
									 <div class="col-9">
									<input type="hidden" value="N" name="typeU">
									
							        <div class="form-group"> 
								    <label>Grado Académico<b style="color:#990000">*</b></label>
								    <select name="education" id="gradoAcademico" required class="form-control">
										<option>Seleccionar</option>
										<option value="Diplomado">Diplomado</option>
										<option value="Profesorado">Profesorado</option>
										<option value="Bachillerato">Bachillerato</option>
										<option value="Licenciatura"> Licenciatura </option>
										<option value="Especialidad"> Especialidad </option>
										<option value="Maestría"> Maestría </option>
										<option value="Doctorado"> Doctorado </option>
										
									</select> 
							        </div>
							        </div><!--cierra el col 6-->
						             </div><!--cierra el row-->
									<div class="row">
									<div class="col-12">
							        <div class="form-group"> 
								    <label>Título (coloque el nombre como aparece en el certificado)<b style="color:#990000">*</b></label>
								    <input id="titulo" name="titulo" class="form-control" required>
							        </div>
									</div>
						             </div>
									 
									<div class="row">
									<div class="col-12">
							        <div class="form-group"> 
								    <label>Fecha del título <b style="color:#990000">*</b></label>
								    <input class="form-control" type="date" name="fecha" required> 
							        </div>
							        </div>
						
						            </div>
					               </div>
					               	<b style="color:#990000">Todos los campos con * son obligatorios</b>
				                   </div>
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>
								   </div>
								   </div><!--cierra el modal de otro titulo-->
								</div>

							</div>
							
						</div>

					</div>

				</div>
			
			</div>

		<br>

		<?php include_once('../footer.php'); ?>
			

 
 

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<!--<script type="text/javascript" src="../js/customs.js"></script>-->

<script type="text/javascript" src="../js/fileinput.min.js"></script><!--
<script type="text/javascript" src="../js/customs-fileinput.js"></script>-->
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/title.js"></script>
<script type="text/javascript" src="../js/title-update.js"></script>
<script>
$( document ).ready(function() {
	$( "#edit-" ).on('shown', function(){
    alert("I want this to appear after the modal has opened!");
});
// onclick="buscarTitulo()"
});
</script>


</body>


</html>