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

	<title>Otra Documentación</title>
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
									
										<h2>Otra Documentación</h2>
					
										
									</div>
									
									<div class="resume-list-wrapper">
									<?php require 'constants/check_reply.php'; ?>
									<?php
									require '../constants/db_config.php';
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT * FROM tbl_other_attachments WHERE member_no = '$myid' ORDER BY id LIMIT $page1,5");
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();
                                    foreach($result as $row)
                                    {
									 $att_title = $row['title'];
									 //$att_issuer = $row['issuer'];
									 $att_id = $row['id'];
									 $attachment = $row['attachment'];
									 ?>
									 									<div class="resume-list-item">
										
											<div class="row">
											
												<div class="col-sm-12 col-md-10">
												
													<div class="content">
													<?php 
														$sourcee = 'data:application/pdf;base64,'.base64_encode($attachment);												
														?>
														<a  target="_blank" href="<?php echo $sourcee; ?>" download>

															
															
															<h4><?php echo $row['title']; ?></h4>


														</a>
													
													</div>
												
												</div>
												
												<div class="col-sm-12 col-md-2">
													
													<div class="resume-list-btn">
													
									<a data-toggle="modal" href="#edit<?php echo $row['id']; ?>" class="btn btn-primary btn-sm mb-5 mb-0-sm">Editar</a>
									<a href="app/drop-attachment.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('¿Está seguro que desea eliminar esta documentación?')" class="btn btn-primary btn-sm btn-inverse">Eliminar</a>
									<div id="edit<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog" role="document">
    								<div class="modal-content">
				                    <div class="modal-header">
					                 <h4 class="modal-title text-center"><?php echo "$att_title"; ?></h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/update-attachment.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">

						
						            <div class="col-sm-12 col-md-12">
				
							        <div class="form-group"> 
								    <label style="text-align: left">Tipo de Documentación<b style="color: red;">*</b></label>
								    <input class="form-control" value="<?php echo "$att_title"; ?>" placeholder="Ejp: Licencia de conducir, etc." type="text" name="title" required> 
							        </div>
						
						             </div>
						
						             <!-- <div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label style="text-align: left">Editor<b style="color: red;">*</b></label>
								    <input class="form-control" value="<?php //echo "$att_issuer"; ?>" placeholder="Ingrese editor" type="text" name="issuer" required> 
							        </div>
						
						           </div> -->
								  

								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label style="text-align: left">Seleccionar Adjunto <i>(Dejar en blanco si no desea actualizar)</i></label>
								    <input class="form-control" accept="application/pdf" type="file" name="certificate"> 
							        </div>
						
						           </div>
						
	
						           </div>
				                   </div>
				                   <input type="hidden" name="attid" value="<?php echo "$att_id"; ?>">
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
                                    $stmt = $conn->prepare("SELECT * FROM tbl_other_attachments WHERE member_no = '$myid' ORDER BY id");
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
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="attachments.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?> href="attachments.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="attachments.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
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
					                 <h4 class="modal-title text-center">Agregar Adjuntos</h4>
				                    </div>
				
				                    <div class="modal-body">
									<form action="app/add-attachment.php" method="POST" autocomplete="off" enctype="multipart/form-data">
					                <div class="row gap-20">

						
						            <div class="col-sm-12 col-md-12">
				
							        <div class="form-group"> 
								    <label>Tipo de Documentación<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ejp: Licencia de conducir, etc." type="text" name="title" required> 
							        </div>
						
						             </div>
						
						             <!-- <div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Editor<b style="color: red;">*</b></label>
								    <input class="form-control" placeholder="Ingresa editor" type="text" name="issuer" required> 
							        </div>
						
						           </div> -->
								  

								   	<div class="col-sm-12 col-md-12">
						
							        <div class="form-group"> 
								    <label>Seleccionar adjunto<b style="color: red;">*</b></label>
								    <input class="form-control" accept="application/pdf" type="file" name="certificate" required> 
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

<script type="text/javascript" src="../js/fileinput.min.js"></script>
<script type="text/javascript" src="../js/customs-fileinput.js"></script>


</body>


</html>