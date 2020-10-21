<!doctype html>
<html lang="es_ES">
<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
$fromsearch = false;

// if (isset($_GET['search']) && $_GET['search'] == "✓") {

// }else{

// }

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
date_default_timezone_set('America/Costa_Rica');
$date = date('Y/m/d');

if (isset($_POST['country']) && ($_POST['category']) ){
	$cate = $_POST['category'];
	$country = $_POST['country'];	
	if(strcmp($cate,"-")==0){
		$query1 = "SELECT * FROM tbl_jobs WHERE province = :country and  closing_date > $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
		$query2 = "SELECT * FROM tbl_jobs WHERE province = :country and  closing_date > $date and status='S' ORDER BY enc_id DESC";
		$slc_country = "$country";
		$slc_category = null;
		$title = "Empleos en $country";
	}else if(strcmp($country,"-")==0){
		$query1 = "SELECT * FROM tbl_jobs WHERE category = :cate and  closing_date > $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
		$query2 = "SELECT * FROM tbl_jobs WHERE category = :cate and  closing_date > $date and status='S' ORDER BY enc_id DESC";
		$slc_country = null;
		$slc_category = "$cate";
		$title = "Empleos de $cate";
	}else{
		$query1 = "SELECT * FROM tbl_jobs WHERE (category = :cate and province = :country) and  closing_date > $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
		$query2 = "SELECT * FROM tbl_jobs WHERE (category = :cate and province = :country) and  closing_date > $date and status='S' ORDER BY enc_id DESC";
		$slc_country = "$country";
		$slc_category = "$cate";
		$title = "Empleos de $slc_category en $slc_country";
	}
	
	$fromsearch = true;
	
}else if(isset($_POST['canton']) && isset($_POST['province']) && isset($_POST['empresa'])){
	$cate = $_POST['empresa'];
	$country = $_POST['canton'];
	if(strcmp($cate,"-")==0){
		$query1 = "SELECT * FROM tbl_jobs WHERE city = :country and  closing_date > $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
		$query2 = "SELECT * FROM tbl_jobs WHERE city = :country and  closing_date > $date and status='S' ORDER BY enc_id DESC";
		$slc_country = "$country";
		$slc_category = null;
		$title = "Empleos en $country";
	}else if(strcmp($country,"-")==0){
		$query1 = "SELECT * FROM tbl_jobs WHERE company = :cate and  closing_date > $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
		$query2 = "SELECT * FROM tbl_jobs WHERE company = :cate and  closing_date > $date and status='S' ORDER BY enc_id DESC";
		$slc_country = null;
		$slc_category = "$cate";
		$title = "Empleos por empresa";
	}else{
	$title = "Empleos por empresa y en ".$country;
	$slc_country = "$country";
	$slc_category = "$cate";
	$query1 = "SELECT * FROM tbl_jobs WHERE (company = :cate and city = :country) and  closing_date > $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
	$query2 = "SELECT * FROM tbl_jobs WHERE (company = :cate and city = :country) and  closing_date > $date and status='S' ORDER BY enc_id DESC";
	}
	$fromsearch = true;
}
else{
$query1 = "SELECT * FROM tbl_jobs where closing_date >  $date and status='S' ORDER BY enc_id DESC LIMIT $page1,12";
$query2 = "SELECT * FROM tbl_jobs where closing_date > $date and status='S' ORDER BY enc_id DESC";	
$slc_country = "NULL";
$slc_category = "NULL";	
// $title = "Lista de Empleos";
$title = "Empleos";
}
?>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo "$title"; ?></title>
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

	<link rel="shortcut icon" href="images/ico/una.png">

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/component.css" rel="stylesheet">
	
	<link rel="stylesheet" href="icons/linearicons/style.css">
	<link rel="stylesheet" href="icons/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="icons/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="icons/ionicons/css/ionicons.css">
	<link rel="stylesheet" href="icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="icons/rivolicons/style.css">
	<link rel="stylesheet" href="icons/flaticon-line-icon-set/flaticon-line-icon-set.css">
	<link rel="stylesheet" href="icons/flaticon-streamline-outline/flaticon-streamline-outline.css">
	<link rel="stylesheet" href="icons/flaticon-thick-icons/flaticon-thick.css">
	<link rel="stylesheet" href="icons/flaticon-ventures/flaticon-ventures.css">

	
</head>

<body class="not-transparent-header">

	<div class="container-wrapper">

	<?php include_once('header.php'); ?>


		<div class="main-wrapper">
		
			<div class="second-search-result-wrapper">
			
				<div class="container">
				
					<form action="job-list.php" method="POST" autocomplete="off">
					
						<div class="second-search-result-inner">
							<span class="labeling">Buscar </span>
							
							<div class="row">
							
								<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
									<div class="form-group form-lg">
										<select class="form-control" name="category" required>
										<option value="-">-Seleccionar Categoria-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_categories ORDER BY category");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										 
                                         {
										 $cat = $row['category'];
                                        ?>
										<option  <?php if ($slc_category == "$cat") { print ' selected '; } ?> value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
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
								
								<div class="col-xss-12 col-xs-6 col-sm-6 col-md-5">
									<div class="form-group form-lg">
										<select class="form-control" name="country" required>
										<option value="-">-Selecciona Provincia-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id is null ORDER BY id");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										
                                         {
											  $cnt = $row['state_name'];
                                        ?>
										
										<option <?php if ($slc_country == "$cnt") { print ' selected '; } ?> value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option>
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
								
								<div class="col-xss-12 col-xs-6 col-sm-4 col-md-2">
									<button name="search" value="✓" type="submit" class="btn btn-light">Buscar</button>
								</div>
								
							</div>
							<a href="#" data-toggle="modal" data-target="#exampleModal">+Búsqueda Avanzada</a>
						</div>
					
					</form>
					

				</div>
			
			</div>
		

			
			<div class="section sm">
			
				<div class="container">
				
					<div class="sorting-wrappper">
			
						<div class="sorting-header">
							<h3 class="sorting-title"><?php echo "$title"; ?></h3>
						</div>
						
		
					</div>
					
					<div class="result-wrapper">
					
						<div class="row">
						
							<div class="col-sm-12 col-md-12 mt-25">
							
								<div class="result-list-wrapper">
								<?php
								require 'constants/db_config.php';
								
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare($query1);
								if ($fromsearch == true) {
									if(empty($slc_category)){
										$stmt->bindParam(':country', $slc_country);	
									}else if(empty($slc_country)){
										$stmt->bindParam(':cate', $slc_category);
									}else{
										$stmt->bindParam(':cate', $slc_category);
										$stmt->bindParam(':country', $slc_country);
									}	
								}
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                foreach($result as $row)
                                {
                                $closingDate = $row['closing_date'];
								$post_date = date_format(date_create_from_format('Y/m/d', $row['closing_date']), 'd');
                                $post_month = date_format(date_create_from_format('Y/m/d', $row['closing_date']), 'F');
                                $post_year = date_format(date_create_from_format('Y/m/d', $row['closing_date']), 'Y');
								$type = $row['type'];
								$compid = $row['company'];
								
								$stmtb = $conn->prepare("SELECT * FROM tbl_companies WHERE id = '$compid'");
                                $stmtb->execute();
                                $resultb = $stmtb->fetchAll();
                                foreach($resultb as $rowb) {
								$complogo = $rowb['avatar'];
								$thecompname = $rowb['first_name'];	
									
								}
								if ($type == "Freelance") {
								$sta = '<span class="job-label label label-success">Pasantía / Práctica</span>';
											  
								}
								if ($type == "Part-time") {
								$sta = '<span class="job-label label label-danger">Medio tiempo</span>';
											  
								}
								if ($type == "Full-time") {
								$sta = '<span class="job-label label label-warning">Tiempo Completo</span>';
											  
								}
		                        
								?>
										<div class="job-item-list">
									
										<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center><img class="autofit3" alt="image"  src="images/blank.png"/></center>';
										}else{
										echo '<center><img class="autofit3" alt="image" title="'.$thecompname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										 ?>
										</div>
										
										<div class="content">
											<div class="job-item-list-info">
											
												<div class="row">
												
													<div class="col-sm-7 col-md-8">
													
														<h4 class="heading"><?php echo $row['title']; ?></h4>
														<div class="meta-div clearfix mb-25">
															<span>en <a href="company.php?ref=<?php echo "$compid"; ?>"><?php echo "$thecompname"; ?></a></span>
															<?php echo "$sta"; ?>
														</div>
														
														<p class="texing character_limit"><?php echo $row['description']; ?></p>
													</div>
													
													<div class="col-sm-5 col-md-4">
														<ul class="meta-list">
															<li>
																<span>País:</span>
																<?php echo $row['country']; ?>
															</li>
															<li>
																<span>Ciudad:</span>
																<?php echo $row['province']; ?>
															</li>
															<li>
																<span>Cantón:</span>
																<?php echo $row['city']; ?>
															</li>
															<li>
																<span>Experiencia:</span>
																<?php echo $row['experience']; ?>
															</li>
															<li>
																<span>Vencimiento: </span>
																<?php echo "$closingDate"; ?>
															</li>
														</ul>
													</div>
													
												</div>
											
											</div>
										
											<div class="job-item-list-bottom">
											
												<div class="row">
												
													<div class="col-sm-7 col-md-8">
														<div class="sub-category">
															<a><?php echo $row['category']; ?></a>

														</div>
													</div>
													
													<div class="col-sm-5 col-md-4">
														<a href="explore-job.php?jobid=<?php echo $row['job_id']; ?>" class="btn btn-dark">Ver este empleo</a>
													</div>
													
												</div>
											
											</div>
										
										
										</div>
									
									</div>
									<?php
	 
	                            }

					  
	                            }catch(PDOException $e)
                                {

                                } ?>
                                </div>
								
					
								<div class="pager-wrapper">
								
						        <ul class="pager-list">
								<?php
								$total_records = 0;
								require 'constants/db_config.php';
								
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare($query2);
								if ($fromsearch == true) {
									if(empty($slc_category)){
										$stmt->bindParam(':country', $slc_country);	
									}else if(empty($slc_country)){
										$stmt->bindParam(':cate', $slc_category);
									}else{
										$stmt->bindParam(':cate', $slc_category);
										$stmt->bindParam(':country', $slc_country);
									}
								}
                                $stmt->execute();
								$result = $stmt->fetchAll();
								$cont = count($result);
								if($cont > 0){
									foreach($result as $row){
										$total_records++;
									}
								}else{
									echo "<h3>Resultados: 0</h3>";
								}

					  
	                            }catch(PDOException $e)
                                {
									echo $e;
                                }
	
                                $records = $total_records/12;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="job-list.php?page='.$prevpage.''; ?> <?php if ($fromsearch == true) { print '&category='.$cate.'&country='.$country.'&search=✓'; }'';} print '"><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?>  href="job-list.php?page=<?php echo "$b"; ?><?php if ($fromsearch == true) { print '&category='.$cate.'&country='.$country.'&search=✓'; }?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="job-list.php?page='.$nextpage.''; ?> <?php if ($fromsearch == true) { print '&category='.$cate.'&country='.$country.'&search=✓'; }'';} print '"><i class="fa fa-chevron-right"></i></a></li>';
								 }

								
								?>

						            </ul>	
					
					                </div>
								
							</div>
							
						
						</div>
						
					</div>

				</div>
			
			</div>

			<?php include_once('footer.php'); ?>
			
		</div>
		<!--MODAL-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="Busqueda Avanzada" aria-hidden="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Búsqueda Avanzada</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h4>Búsqueda por empresa y cantón</h4><br>
						<form action="job-list.php" method="POST" autocomplete="off">
						<!--empresa-->
									<div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
									<div class="form-group form-lg">
									<label for="empresa">Empresa</label>
										<select class="form-control" name="empresa">
										<option value="-">-Empresa-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_companies where estado='S' ORDER BY first_name");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										
                                         {
                                        ?>
										
										<option value="<?php echo $row['id']; ?>"><?php echo $row['first_name']; ?></option>
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
						<!--empresa-->

						<!--provincia-->
									<div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
									<div class="form-group form-lg">
									<label for="province">Provincia</label>
										<select class="form-control" name="province" id="provinciaa1" onchange="buscarCanton()">
										<option value="-">-Provincia-</option>
										 <?php
										 require 'constants/db_config.php';
										 try {
                                         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                         $stmt = $conn->prepare("SELECT * FROM tbl_states where parent_id is null ORDER BY id");
                                         $stmt->execute();
                                         $result = $stmt->fetchAll();

                                         foreach($result as $row)
										
                                         {
											  $cnt = $row['state_name'];
                                        ?>
										
										<option value="<?php echo $row['state_name']; ?>"><?php echo $row['state_name']; ?></option>
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
						<!--provincia-->
						<!--canton-->
						<div class="col-xss-12 col-xs-6 col-sm-6 col-md-12">
							<div class="form-group form-lg">
								<label for="canton">Cantón<small> (Seleccione primero una provincia)</small></label>
									<select class="form-control" name="canton" id="cantoon">
										<option value="-">-Cantón-</option>
									</select>
							</div>
						</div>
						<!--canton-->
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Buscar</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!--MODAL-->
		
	</div> <!--cierra el container-->
<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<!-- <script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/customs.js"></script> -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script>
function buscarCanton(){
    var province = $('#provinciaa1').val();
    $.post("app/response-city.php", { provincia: province}, function(data){
    $("#cantoon").html(data);
    //alert("data:"+data);
    });

} 

</script>



</body>


</html>