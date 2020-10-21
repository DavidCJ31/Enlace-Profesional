<!doctype html>
<html lang="es_ES">
<?php 
require 'constants/settings.php'; 
require 'constants/check-login.php';
require 'constants/db_config.php';

if (isset($_GET['ref'])) {

$company_id = $_GET['ref'];



    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
    $stmt = $conn->prepare("SELECT * FROM tbl_companies WHERE id = :memberno and estado='S'");
	$stmt->bindParam(':memberno', $company_id);
    $stmt->execute();
    $result = $stmt->fetchAll();
	$rec = count($result);
	
	if ($rec == "0") {
	header("location:./");	
	}else{

    foreach($result as $row)
    {
		
    $compname = $row['first_name'];
	$compesta = $row['byear'];
    $compmail  = $row['email'];
	$comptype = $row['title'];
    $compphone = $row['phone'];
	$compcity = $row['city'];
	$compprovince = $row['province'];
	// $compstreet = $row['street'];
	// $compzip = $row['zip'];
    $compcountry = $row['country'];
    $compbout = $row['about'];
	$complogo = $row['avatar'];
	$compserv = $row['services'];
	$compexp = $row['expertise'];
	$compweb = $row['website'];
	$comppeopl = $row['people'];
	
	}
	
	}

					  
	}catch(PDOException $e)
    {
 
    }
	
}else{
header("location:./");
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

	<title> <?php echo "$compname"; ?></title>
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
	
			<div class="section sm">
			
				<div class="container">
				
					<div class="row">
						
							<div class="col-md-10 col-md-offset-1">
							
								<div class="company-detail-wrapper">
								
									<div class="company-detail-header text-center">
										
										<div class="image">
										<?php 
										if ($complogo == null) {
										print '<center>Company Logo Here</center>';
										}else{
										echo '<center><img alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										?>
										</div>
										
										<h2 class="heading mb-15"><?php echo "$compname"; ?></h2>
									
										<p class="location"><i class="fa fa-map-marker"></i> <?php echo "$compcity"; ?> <?php echo "$compprovince"; ?>, <?php echo "$compcountry"; ?>  </p>
										
										<ul class="meta-list clearfix">
											<li>
												<h4 class="heading">Establecida en:</h4>
												<?php echo "$compesta"; ?>
											</li>
											<li>
												<h4 class="heading">Sector del mercado:</h4>
												<?php echo "$comptype"; ?>
											</li>
											<li>
												<h4 class="heading">Cantidad de colaboradores:</h4>
												<?php echo "$comppeopl"; ?>
											</li>
											<li>
												<h4 class="heading">Sitio Web: </h4>
												<a href="https://<?php echo "$compweb"; ?>"><?php echo "$compweb"; ?></a>
											</li>
										</ul>
										
									</div>
						
									<div class="company-detail-company-overview clearfix">
									
										<h3>Descripción de la Empresa</h3>
										
										<p><?php echo "$compbout"; ?></p>

										
										<h3>Servicios</h3>
										
										<p><?php echo "$compserv"; ?></p>
										
										<h3>Experiencia</h3>
										
										<p><?php echo "$compexp"; ?></p>
										
									</div><br><br>

									
									<div class="section-title mb-40">
						
										<h4 class="text-left">Trabajos ofrecidos en <?php echo "$compname"; ?></h4>
										
									</div>

									<div class="result-list-wrapper">
									<?php
									require 'constants/db_config.php';
									
									try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                    $stmt = $conn->prepare("SELECT * FROM tbl_jobs WHERE company = :compid and status='S' ORDER BY enc_id DESC LIMIT 5");
                                    $stmt->bindParam(':compid', $company_id);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll();

                                    foreach($result as $row)
                                    {
                                    $closingDate = $row['closing_date'];
									$post_date = date_format(date_create_from_format('Y/m/d', $row['closing_date']), 'd');
                                    $post_month = date_format(date_create_from_format('Y/m/d', $row['closing_date']), 'F');
                                    $post_year = date_format(date_create_from_format('Y/m/d', $row['closing_date']), 'Y');
									$type = $row['type'];
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
										echo '<center><img class="autofit3" alt="image" title="'.$compname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
										}
										 ?>
											</div>
											
											<div class="content">
												<div class="job-item-list-info">
												
													<div class="row">
													
														<div class="col-sm-7 col-md-8">
														
															<h4 class="heading"><?php echo $row['title']; ?></h4>
															<div class="meta-div clearfix mb-25">
															<span>a <a href="company.php?ref=<?php echo "$company_id"; ?>"><?php echo "$compname"; ?></a></span>
															<?php echo "$sta"; ?>
															</div>
															
															<p class="texing"><?php echo $row['description']; ?></p>
														</div>
														
														<div class="col-sm-5 col-md-4">
														<ul class="meta-list">
															<li>
																<span>País:</span>
																<?php echo $row['country']; ?>
															</li>
															<li>
																<span>Ciudad:</span>
																<?php echo $row['city']; ?>
															</li>
															<li>
																<span>Experiencia:</span>
																<?php echo $row['experience']; ?>
															</li>
															<li>
																<span>Fecha Limite: </span>
																<?php echo "$closingDate"?>
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
														<a href="explore-job.php?jobid=<?php echo $row['job_id']; ?>" class="btn btn-primary">Ver empleo</a>
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

									</div>
								<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
								$total_records = 0;
								require'constants/db_config.php';
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
                                $stmt = $conn->prepare("SELECT * FROM tbl_jobs WHERE company = :compid and status='S' ORDER BY enc_id DESC");
                                $stmt->bindParam(':compid', $company_id);
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
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="company.php?ref='.$company_id.'&page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?>  href="company.php?ref=<?php echo "$company_id"; ?>&page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="company.php?ref='.$company_id.'&page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
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
		

	</div>
 

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
<script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="js/handlebars.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/easy-ticker.js"></script>
<script type="text/javascript" src="js/customs.js"></script>


</body>


</html>