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
$page1 = ($page*10)-10;
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

	<title>Empleos Presentados</title>
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
									
										<h2>Empleos Presentados</h2>
					
										
									</div>
									
									<div class="resume-list-wrapper">
									
									<?php require 'constants/check_reply.php'; ?>
									<div class="recent-job-wrapper">
								  <?php
                                  require '../constants/db_config.php';
								  
								  try {
                                  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                  $stmt = $conn->prepare("SELECT * FROM tbl_job_applications WHERE user_id = '$myid' ORDER BY id DESC LIMIT $page1,10");
                                  $stmt->execute();
                                  $result = $stmt->fetchAll();
                                  foreach($result as $row)
                                  {
                                  	$applicationDate =  $row['application_date'];
									$post_date = date_format(date_create_from_format('m/d/Y', $row['application_date']), 'd');
                                    $post_month = date_format(date_create_from_format('m/d/Y', $row['application_date']), 'F');
                                    $post_year = date_format(date_create_from_format('m/d/Y', $row['application_date']), 'Y');
								    $job_id = $row['job_id'];
								
								    $stmtb = $conn->prepare("SELECT * FROM tbl_jobs WHERE status='S' and job_id = '$job_id'");
                                    $stmtb->execute();
									$resultb = $stmtb->fetchAll();
									foreach($resultb as $rowb)
									{
									$job_title = $rowb['title'];
									$jobcountry = $rowb['country'];
									$jobtype = $rowb['type'];
                                    $compid = $rowb['company'];
									if ($jobtype == "Freelance") {
	                                $sta = '<div class="job-label label label-success">
											Práctica / Pasantía
											</div>';
											  
	                                }
	                                if ($jobtype == "Part-time") {
	                                 $sta = '<div class="job-label label label-danger">
											Medio Tiempo
											</div>';
											  
	                                }
	                                if ($jobtype == "Full-time") {
	                                $sta = '<div class="job-label label label-warning">
											Tiempo Completo
											</div>';
											  
	                                }	
									
									$stmtc = $conn->prepare("SELECT * FROM tbl_companies WHERE id = '$compid'");
                                    $stmtc->execute();
                                    $resultc = $stmtc->fetchAll();
									
									foreach ($resultc as $rowc) {
									$compname = $rowc['first_name'];
									$complogo = $rowc['avatar'];	
										
									}
									
									?>
																	   <a target="_blank" href="../explore-job.php?jobid=<?php echo "$job_id"; ?>" class="recent-job-item clearfix">
								<div class="GridLex-grid-middle">
									<div class="GridLex-col-6_xs-12">
										<div class="job-position">
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
												<h4><?php echo "$job_title"; ?></h4>
												<p><?php echo "$compname"; ?></p>
											</div>
										</div>
									</div>
									<div class="GridLex-col-3_xs-8_xss-12 mt-10-xss">
										<div class="job-location">
											<i class="fa fa-map-marker text-primary"></i> <?php echo "$jobcountry"; ?>
										</div>
									</div>
									<div class="GridLex-col-3_xs-4_xss-12">
                                     <?php echo "$sta"; ?>
										<span class="font12 block spacing1 font400 text-center"><?php echo "$applicationDate"; ?> <span>
									</div>
								</div>
							</a>
							
							<?php
									}
								  
								 
		
 
	                              }
                                  }catch(PDOException $e)
                                  {

                                  } ?>
	
								  </div>

									<div class="pager-wrapper">
								
						            <ul class="pager-list">
								<?php
								$total_records = 0;
								require '../constants/db_config.php';
								try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("SELECT * FROM tbl_job_applications WHERE user_id = '$myid' ORDER BY id");
                                $stmt->execute();
								$result = $stmt->fetchAll();
                                foreach($result as $row)
                                {

	                              $total_records++;
	                            }

					  
	                            }catch(PDOException $e)
                                {
                 
                                }
	
								$records = $total_records/10;
                                $records = ceil($records);
				                if ($records > 1 ) {
								$prevpage = $page - 1;
								$nextpage = $page + 1;
								
								print '<li class="paging-nav" '; if ($page == "1") { print 'class="disabled"'; } print '><a '; if ($page == "1") { print ''; } else { print 'href="applied-jobs.php?page='.$prevpage.'"';} print '><i class="fa fa-chevron-left"></i></a></li>';
					            for ($b=1;$b<=$records;$b++)
                                 {
                                 
		                        ?><li  class="paging-nav" ><a <?php if ($b == $page) { print ' style="background-color:#33B6CB; color:white" '; } ?> href="applied-jobs.php?page=<?php echo "$b"; ?>"><?php echo $b." "; ?></a></li><?php
                                 }	
								 print '<li class="paging-nav"'; if ($page == $records) { print 'class="disabled"'; } print '><a '; if ($page == $records) { print ''; } else { print 'href="applied-jobs.php?page='.$nextpage.'"';} print '><i class="fa fa-chevron-right"></i></a></li>';
					             }

								
								?>

						            </ul>	
					
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

<script type="text/javascript" src="../js/fileinput.min.js"></script>
<script type="text/javascript" src="../js/customs-fileinput.js"></script>


</body>


</html>