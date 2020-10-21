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

	<title>Dominio del Idioma</title>
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
	<!-- <script src="../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->
	<script src="../js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../js/language.js"></script>

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
									
										<h2>Dominio del Idioma</h2>
					
										
									</div>
									
									<div class="resume-list-wrapper">
									<?php require 'constants/check_reply.php'; ?>
									<?php
									require '../constants/db_config.php';
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_language WHERE member_no = '$myid' ORDER BY id LIMIT $page1,5");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
										?>
											<div class="resume-list-item">
										
											<div class="row">
											
												<div class="col-sm-12 col-md-10">
												
													<div class="content">
													
														<a >

															
															
															<h4><?php echo $row['language']; ?></h4>
															
															<div class="row">
																<div class="col-sm-12 col-md-12">
																	<i class="fa fa-user mr-5"></i>Nivel: <strong class="mr-10"><?php echo $row['level']; ?></strong>
																</div>

															</div>

														</a>
													
													</div>
												
												</div>
												
												<div class="col-sm-12 col-md-2">
													
													<div class="resume-list-btn">
													
														<a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-5 mb-0-sm">Editar</a>
														<a href="app/drop-language.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('¿Está seguro que desea eliminar este idioma?')" class="btn btn-primary btn-sm btn-inverse">Eliminar</a>
														
														<div id="edit<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog" role="document">
    													<div class="modal-content">
				                                        <div class="modal-header">
					                                    <h4 class="modal-title text-center">Editar - <?php echo $row['language']; ?></h4>
				                                        </div>
				
				                                        <div class="modal-body">
									                    <form action="app/update-language.php" method="POST" autocomplete="off">
					                                    <div class="row gap-20">

						                                <div class="col-sm-12 col-md-12">
				
							                            <div class="form-group"> 
								                        <label style="text-align: left">Idioma</label>
								                        <input class="form-control" value="<?php echo $row['language']; ?>" placeholder="Ingrese el nombre del idioma" type="text" name="language" required disabled> 
							                            </div><!--form group-->
						
						                                </div><!-- col sm 12-->

														<div class="col-sm-12 col-md-12" >

														
														<div class="form-group"> 
														<label style="text-align: left">Nivel</label>
														<?php if ($row['nativo'] == 'N') { ?>
														<select name="levelN" class="form-control" data-live-search="false" id="nivelConocimiento" required>
														<option value="A1" <?php if ($row['level'] == 'A1') { print ' selected '; } ?> >A1</option>
														<option value="A1" <?php if ($row['level'] == 'A1+') { print ' selected '; } ?> >A1+</option>
														<option value="A2" <?php if ($row['level'] == 'A2') { print ' selected '; } ?>>A2</option>
														<option value="A2+" <?php if ($row['level'] == 'A2+') { print ' selected '; } ?>>A2+</option>
														<option value="B1" <?php if ($row['level'] == 'B1') { print ' selected '; } ?>>B1</option>
														<option value="B1" <?php if ($row['level'] == 'B1+') { print ' selected '; } ?>>B1+</option>
														<option value="B2" <?php if ($row['level'] == 'B2') { print ' selected '; } ?>>B2</option>
														<option value="B2+" <?php if ($row['level'] == 'B2+') { print ' selected '; } ?>>B2+</option>
														<option value="C1" <?php if ($row['level'] == 'C1') { print ' selected '; } ?>>C1</option>
														<option value="C1" <?php if ($row['level'] == 'C1+') { print ' selected '; } ?>>C1+</option>
														<option value="C2" <?php if ($row['level'] == 'C2') { print ' selected '; } ?>>C2</option>
														<option value="C2+" <?php if ($row['level'] == 'C2+') { print ' selected '; } ?>>C2+</option>
														</select>											
														<?php } else { ?>
														<input class="form-control" id="nivelNativo" placeholder="Ingrese el nivel del idioma nativo o LESCO" type="text" name="level"  value="<?php echo $row['level'];?>">
														<?php }?>
														</div>
														</div>
						
						                                
					                                  </div><!-- row gap-->
				                                      </div><!-- modal body-->
				                                       <input type="hidden" name="langid" value="<?php echo $row['id']; ?>">
				                                       <div class="modal-footer text-center">
				 	                                   <button type="submit" class="btn btn-primary">Actualizar</button>
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
                                    $stmt = $conn->prepare("SELECT * FROM tbl_language WHERE member_no = '$myid' ORDER BY id");
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
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="language.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav"><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?>  href="language.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="language.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
					                </div>

										
		
										
									</div>
									
									<div class="mt-30">
									
										<a data-toggle="modal" href="#chooseModal" class="btn btn-primary btn-lg">Agregar Nuevo</a>
										
									</div>
									<div class="modal" tabindex="-1" role="dialog" id="chooseModal">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Agregar Nuevo Idioma</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<p>Escoja dependiendo del tipo de idioma</p>
										<a data-toggle="modal" href="#QualifModal" data-dismiss="modal" class="btn btn-primary">Nativo o Lesco</a>
										<a data-toggle="modal" href="#OtherModal" class="btn btn-secondary" data-dismiss="modal">Otro</a>
										</div>
										
										</div>
									</div>
									</div>

									<div id="QualifModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">
					                 <h4 class="modal-title text-center">Agregar Idioma</h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/add-language.php" method="POST" autocomplete="off">
					                <div class="row gap-20">
						            <div class="col-sm-12 col-md-12">

				
							        <div class="form-group"> 
								    <label>Idioma<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ingrese el Nombre del Idioma" type="text" name="language" required> 
							        </div>
									<input class="form-control" type="hidden" value="S" name="nativo">
						             </div>

									 <div class="col-sm-12 col-md-12" >
				
									<div class="form-group"> 
									<label>Nivel</label>
									<input class="form-control" placeholder="Ingrese el nivel del idioma nativo o LESCO" type="text" name="levelN" required>
									</div>
						
									</div>
						
					               </div>
				                   </div>
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>
									
								</div>
								</div><!--cierra el modal de lesco o nativo-->
								
									<div id="OtherModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">
					                 <h4 class="modal-title text-center">Agregar Idioma</h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/add-language.php" method="POST" autocomplete="off">
					                <div class="row gap-20">
						            <div class="col-sm-12 col-md-12">
														
									<input class="form-control" type="hidden" value="N" name="nativo">
				
							        <div class="form-group"> 
								    <label>Idioma<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ingrese el Nombre del Idioma" type="text" name="language" required> 
							        </div>
						
						             </div>

									 <div class="col-sm-12 col-md-12" >
									 <script>
														//idea para enserñarle a Estef
														function imprimeMensaje(mensaje){
															var documento = document.getElementById('explicacion');
															documento.innerHTML = mensaje;
														}

														function explicacionA1(){
															let expl = '<strong> Nivel A1 </strong> <br />' + 
																		'<p>&emsp;En este nivel puedes entender:<br/>' + 
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Frases muy básicas y cotidianas. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Discurso lento y articulado cuidadosamente con largas pausas. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Textos muy breves y simples, nombres familiares y palabras. <br/>'+
																		'&emsp;Fuente: <a href = "https://www.efset.org/es/english-score/cefr/a1/">https://www.efset.org/es/english-score/cefr/a1/ </a></p>';
															imprimeMensaje(expl);
														}
														function explicacionA2(){
															let expl = '<strong> Nivel A2 </strong> <br />' + 
																		'<p>&emsp;En este nivel puedes entender:<br/>' + 
																		'<strong>&emsp;&emsp;·</strong>         &emsp; Idioma personal, familiar y laboral muy básico. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Suficiente para satisfacer las necesidades con un discurso lento y <br/> &emsp;&emsp;&emsp;claro. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Textos breves y simples sobre asuntos familiares. <br/>'+
																		'&emsp;Fuente: <a href = "https://www.efset.org/es/english-score/cefr/a2/"> https://www.efset.org/es/english-score/cefr/a2/ </a></p>';
															imprimeMensaje(expl);
														}
														function explicacionB1(){
															let expl = '<strong> Nivel B1 </strong> <br />' + 
																		'<p>&emsp;En este nivel puedes entender:<br/>' + 
																		'<strong>&emsp;&emsp;·</strong>         &emsp; Puntos principales sobre temas comunes en el trabajo, la escuela<br/> &emsp;&emsp;&emsp;o los viajes. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Detalles generales y específicos con un discurso claro. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Textos de hecho sobre temas de interés. <br/>'+
																		'&emsp;Fuente: <a href = "https://www.efset.org/es/english-score/cefr/b1/"> https://www.efset.org/es/english-score/cefr/b1/ </a></p>';
															imprimeMensaje(expl);
														}
														function explicacionB2(){
															let expl = '<strong> Nivel B2 </strong> <br />' + 
																		'<p>&emsp;En este nivel puedes entender:<br/>' + 
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Textos más largos y su significado implícito. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Discurso prolongado sobre temas abstractos con relativa facilidad. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Detalles en textos complejos, incluso si no están relacionados con<br/> &emsp;&emsp;&emsp;su propia especialidad.<br/>'+
																		'&emsp;Fuente: <a href = "https://www.efset.org/es/english-score/cefr/b2/"> https://www.efset.org/es/english-score/cefr/b2/ </a></p>';
															imprimeMensaje(expl);
														}
														function explicacionC1(){
															let expl = '<strong> Nivel C1 </strong> <br />' + 
																		'<p>&emsp;En este nivel puedes entender:<br/>' + 
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Prácticamente todo lo escuchado o leído con facilidad. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Todo el lenguaje hablado a un ritmo nativo rápido. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Texto y textos literarios abstractos y estructuralmente complejos.<br/>'+
																		'&emsp;Fuente: <a href = "https://www.efset.org/es/english-score/cefr/c1/"> https://www.efset.org/es/english-score/cefr/c1/ </a></p>';
															imprimeMensaje(expl);
														}
														function explicacionC2(){
															let expl = '<strong> Nivel C2 </strong> <br />' + 
																		'<p>&emsp;En este nivel puedes entender:<br/>' + 
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Prácticamente todo lo escuchado o leído con facilidad. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Todo el lenguaje hablado a un ritmo nativo rápido. <br/>'+
																		'<strong>&emsp;&emsp;·</strong>         &emsp;Texto y textos literarios abstractos y estructuralmente complejos.<br/>'+
																		'&emsp;Fuente: <a href = "https://www.efset.org/es/english-score/cefr/c2/"> https://www.efset.org/es/english-score/cefr/c2/ </a></p>';
															imprimeMensaje(expl);
														}
															function nivelExplicacion(opcion){
                                                                switch(opcion.value){
																	case 'A1': explicacionA1();
																	break;
																	case 'A2': explicacionA2();
																	break;
																	case 'B1': explicacionB1();
																	break;
																	case 'B2': explicacionB2();
																	break;
																	case 'C1': explicacionC1();
																	break;
																	case 'C2': explicacionC2();
																	break;

																}
															}
														</script>
									<div class="form-group"> 
									<label>Nivel</label>
									<select id = "selectIdiomas" onchange = "nivelExplicacion(this)" name="levelN" class="form-control" data-live-search="false" id="nivelConocimiento" required>
									<option>Seleccionar</option>
									<option value="A1">A1</option>
									<option value="A2">A2</option>
									<option value="B1">B1</option>
									<option value="B2">B2</option>
									<option value="C1">C1</option>
									<option value="C2">C2</option>
									</select>
									
									</div>
						
									</div>
								 	<div id ="explicacion">
								 		
								 	</div>
					               </div>
				                   </div>
				
				                   <div class="modal-footer text-center">
				 	               <button type="submit" class="btn btn-primary">Guardar</button>
					               <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
				                   </div>
				                   </form>
			                       </div>
									
								</div>
								</div><!--cierra el modal de otro idioma-->
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

<!-- <script type="text/javascript" src="../js/smoothscroll.js"></script>
<script type="text/javascript" src="../js/wow.min.js"></script>
<script type="text/javascript" src="../js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="../js/handlebars.min.js"></script>
<script type="text/javascript" src="../js/slick.min.js"></script>
<script type="text/javascript" src="../js/easy-ticker.js"></script>
<!-- <script type="text/javascript" src="../js/customs.js"></script> -->
<!-- <script type="text/javascript" src="../js/fileinput.min.js"></script> --> 
<!-- <script type="text/javascript" src="../js/customs-fileinput.js"></script> -->


</body>


</html>