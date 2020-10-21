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

	<title>Experiencia Laboral</title>
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

	<!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="../js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="../js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	 -->
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	


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
				
					<h2>Experiencia Laboral o Profesional</h2>
					
				</div>
				
				<div class="resume-list-wrapper">
				<?php require 'constants/check_reply.php'; ?>
				<?php
				require '../constants/db_config.php';
				try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM tbl_experience WHERE user_id = '$myid' ORDER BY id LIMIT $page1,5");
				$stmt->execute();
				$result = $stmt->fetchAll();

				foreach($result as $row)
				{
				 $title = $row['title'];
				 $institution = $row['institution'];
				 $supervisor = $row['supervisor'];
				 $phone = $row['supervisor_phone'];
				 $start_date = $row['start_date'];
				 $end_date = $row['end_date'];
				 $duties = $row['duties'];
				 $expid = $row['id'];
				 $actualidad = $row['actualidad'];
				 if($end_date !=null && $actualidad == 'N'){
					$end = $end_date;
				 }else{
					 $end = "Actualidad";
				 }
				 
				 ?>
					<div class="resume-list-item">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-10">
							
								<div class="content">
								
									<a>

										
										
										<h4><?php echo "$title"; ?></h4>
										
										<div class="row">
											<div class="col-sm-12 col-md-7">
												<i class="fa fa-building text-primary mr-5"></i><strong class="mr-10"><?php echo $row['institution']; ?></strong>
											</div>
											<div class="col-sm-12 col-md-5 mt-10-sm">
												<i class="fa fa-calendar  text-primary mr-5"></i> <b> De </b> <?php echo "$start_date"; ?> <b> a </b> <?php echo " $end"; ?>
											</div>
										</div>

									</a>
								
								</div>
							
							</div>
							
							<div class="col-sm-12 col-md-2">
								
								<div class="resume-list-btn">
								
				<a data-toggle="modal" href="#editModal" onclick="agregarInfo(<?php echo $row['id']; ?>)" class="btn btn-primary btn-sm mb-5 mb-0-sm">Editar / Ver</a>
				<a href="app/drop-experience.php?id=<?php echo $row['id']; ?>" onclick = "return confirm('¿Está seguro que desea eliminar esta experiencia laboral?')" class="btn btn-primary btn-sm btn-inverse">Eliminar</a>
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
			$stmt = $conn->prepare("SELECT * FROM tbl_experience WHERE member_no = '$myid' ORDER BY id");
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
			
			print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="experience.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
			for ($b=1;$b<=$records;$b++)
			 {
			 
			?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?> href="experience.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
			 }	
			 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="experience.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
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
				 <h4 class="modal-title text-center">Experiencia Laboral</h4>
				</div>

				<div class="modal-body">

				<form action="app/add-experience.php" method="POST" autocomplete="off" enctype="multipart/form-data">
				<div class="row gap-20">
				

				<div class="col-sm-6 col-md-6">

				<div class="form-group"> 
				<label>Nombre de la Institución <b style="color:#990000">*</b></label>
				<input class="form-control" placeholder="Ingresa Nombre de la Institución" type="text" name="institution" required> 
				</div>
	
				 </div>
				 
				 <div class="col-sm-6 col-md-6">

				<div class="form-group"> 
				<label>Nombre Supervisor</label>
				<input class="form-control" placeholder="Ingresa nombre del supervisor" type="text" name="supervisor"> 
				</div>
	
				 </div>
				<div class="col-sm-6 col-md-6">

				<div class="form-group"> 
				<label>Teléfono Supervisor</label>
				<input class="form-control" placeholder="Ingresa teléfono del supervisor" type="text" name="telphone"> 
				</div>
	
				 </div>
				 
				<div class="col-sm-6 col-md-6">

				<div class="form-group"> 
				<label>Título del Empleo <b style="color:#990000">*</b></label>
				<input class="form-control" placeholder="Ingresa Título del Empleo" type="text" name="jobtitle" required> 
				</div>
	
				 </div>
	
			   
				<div class="col-sm-6 col-md-6">
	
				<div class="form-group"> 
				<label>Fecha de Inicio <b style="color:#990000">*</b></label>
				<input class="form-control" placeholder="Ejp: 13-01-2017" type="date" name="startdate" required> 
				</div>
	
			   </div>
			   
				<div class="col-sm-6 col-md-6">
	
				<div class="form-group" id="finalizacion1"> 
				<label>Fecha de Finalización</label>
				<input class="form-control" placeholder="Ejp: 13-01-2017" type="date" name="enddate"> 
				</div>
	
			   </div>

			   <div class="col-sm-7 col-md-7">
	
				<div class="form-check"> 
				<input type="checkbox" class="form-check-input" name="actual" value="S" id="exampleCheck2" checked onchange="invisibilizar()">
				<label class="form-check-label" for="exampleCheck2">Actualmente tengo este cargo</label> 
				</div> 
	
			   </div>
				<div class="col-sm-12 col-md-12">
	
				<div class="form-group"> 
				<label>Cargos y responsabilidades</label>
				<textarea class="form-control"  name="duties"> </textarea>
				</div>
	
			   </div>

			   </div>
				<b style="color:#990000">Todos los campos con * son obligatorios</b>
			   </div>

			   <div class="modal-footer text-center">
			   <button type="submit" class="btn btn-primary">Enviar</button>
			   <button type="button" data-dismiss="modal" class="btn btn-primary btn-inverse">Cerrar</button>
			   </div>
			   </form>
			   </div>
			   </div>
			   </div><!--agregar modal-->
			   
			   <!--modal editar-->
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="EditarExperienciaLaboral" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Editar Experiencia</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="app/update-experience.php" method="POST" autocomplete="off" enctype="multipart/form-data">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="institucion">Nombre Institución<b style="color: red;">*</b></label>
											<input type="text" class="form-control" name="institucion" id="institucion1" aria-describedby="nombreInstitucion" placeholder="Ingrese nombre institucion">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="supervisor">Nombre Supervisor</label>
											<input type="text" class="form-control" id="supervisor" name="supervisor" placeholder="Nombre Supervisor">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="telefono">Teléfono Supervisor</label>
											<input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="telefono" placeholder="Ingrese numero telefono">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="titulo">Título del empleo<b style="color: red;">*</b></label>
											<input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="tituloEmpleo" placeholder="Titulo del empleo">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="fechaInicio">Fecha Inicio<b style="color: red;">*</b></label>
											<input type="date" class="form-control" name="fechaInicio"id="fechaInicio" aria-describedby="fechaInicio" required>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group" id="finalizaredit">
											<label for="fechaFin">Fecha Finalización</label>
											<input type="date" class="form-control" id="fechaFin" name="fechaFin" aria-describedby="fechaFinalizacion">
										</div>
									</div>
								</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="S" aria-describedby="tengoEsteCargo" name="actualidad" id="defaultCheck1" onchange="invisibilizaredit()">
								<label class="form-check-label" for="defaultCheck1">Actualmente tengo este cargo</label>
							</div>
							<div class="form-group"><br>
							<input type="hidden" name="idExperiencia" id="idExperiencia" aria-hidden="true">
								<label for="cargos">Cargos y Responsabilidades</label>
								<textarea class="form-control" id="cargos" rows="3" name="cargos" aria-describedby="cargosYResponsabilidades"></textarea>
							</div>
							<b style="color:#990000">Todos los campos con * son obligatorios</b>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Editar</button>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			   <!-- //////////// ///////////////// //////-->
			</div>

		</div>

							</div>

				</div>
			
			</div>

		<br>

		<?php include_once('../footer.php'); ?>
		
 </div><!--cierra el container-->
 

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/experience.js"></script>
<script>
function invisibilizaredit(){
	console.log("entro1");
	if ($('#defaultCheck1').is(':checked')) {
			
		$('#finalizaredit').hide();
	}else{
		$('#finalizaredit').show();
	}
}
$( document ).ready(function() {
	if ($('#exampleCheck2').is(':checked')) {
		$('#finalizacion1').hide();
	}

});
function invisibilizar(){
	if ($('#exampleCheck2').is(':checked')) {

		$('#finalizacion1').hide();
		}
		else{
			$('#finalizacion1').show();
		}
}

</script>

</body>


</html>