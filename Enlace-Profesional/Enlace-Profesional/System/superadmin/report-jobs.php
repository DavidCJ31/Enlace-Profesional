<!doctype html>
<html lang="en">
  <?php
require '../constants/settings.php'; 
require 'constants/check-login.php';

if ($user_online == "true") {
if ($myrole == "superadmin") {
	}else{
		header("location:../");		
}
	}else{
	header("location:../");	
	}
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../images/ico/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <style>
        .autofit2 {
	height:80px;
	width:100px;
    object-fit:cover; 
  }
    </style>
    <title>Reporte empleos</title>
  </head>
  <?php include_once('sadminheader.php'); ?><br><br>
  <body>
    <div class="container"><br>
        <div style="height: 20px;">
            
        </div><!--cierra el row--> 
        <div class="row">
        <div class="col-4">
        <a href="reports.php" class="btn btn-primary mt-5">Atrás</a>						
        </div>
        <div class="col-8">
            <h1>Reporte de empleos</h1>
        </div>
        </div><!--cierra el row--> 
      
        <hr>
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
				<th scope="col">Título</th>
				<th scope="col">Empresa</th>
				<th scope="col">Fecha de publicación</th>
				<th scope="col">Categoría</th>
				<th scope="col">Tipo</th>
				<th scope="col">Provincia</th>
				<th scope="col">Cantón</th>
			</tr>
        </thead>
        <tbody>
			<?php
			require 'constants/db_config.php';
			try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT j.title, c.first_name, j.date_posted, j.category, j.type, s.state_name,j.city FROM tbl_jobs j inner join tbl_companies c on j.company=c.id inner join tbl_states s on j.province=s.state_name where j.status='S' group by j.title");
			$stmt->execute();
			$result = $stmt->fetchAll();

				foreach($result as $row) {
					echo "<tr><td>";
					echo $row['title']."</td><td>";
					echo $row['first_name']."</td><td>";
					echo $row['date_posted']."</td><td>";
					echo $row['category']."</td><td>";
					echo $row['type']."</td><td>";
					echo $row['state_name']."</td><td>";
					echo $row['city']."</td></tr>";
									
				}
			}catch(PDOException $e){ 
				echo "<h1>".$e."</h1>";
				}
			
			?>
		</tbody>

</table><br><br>
</div>
</div><!-- cierra el container-->


<script  src="https://code.jquery.com/jquery-3.3.0.js"
		  integrity="sha256-TFWSuDJt6kS+huV+vVlyV1jM3dwGdeNWqezhTxXB/X8="
		  crossorigin="anonymous" ></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>  <!--siempre necesario-->
<script type="text/javascript" src='../js/jquery.dataTables.min.js'></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> siempre necesario -->
<script type="text/javascript" src='../js/dataTables.bootstrap4.min.js'></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript" src='https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js'></script>
<script type="text/javascript" src='https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js'></script>
<script type="text/javascript" src='https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js'></script>
<script type="text/javascript" src='https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js'></script>
<script type="text/javascript" src='https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js'></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css"/>
<script>

$(document).ready(function() {
var table = $('#example').DataTable( {
	lengthChange: false,
	buttons: [ 'copy','pdf' , 'excel']
} );

table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

</script>  

<div style="height: 100px;"></div>
<?php include_once('../footer.php'); ?>

</body>
</html>
