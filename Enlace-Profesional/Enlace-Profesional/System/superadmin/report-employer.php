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
    <title>Reporte empleadores</title>
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
            <h1>Reporte de empleadores</h1>
        </div>
        </div><!--cierra el row--> 
      
        <hr>
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Sector del Mercado</th>
            <th>Encargado</th>
            <th >Provincia</th>
            <th>Cantón</th>
            <th>Contacto</th>
            <th >Teléfono</th>
            <th >Correo</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require 'constants/db_config.php';
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT c.in_charge,c.email, c.title, c.province, c.city, c.first_name, c.phone FROM empleo.tbl_companies c where estado='S'");
        $stmt->execute();
        $result = $stmt->fetchAll();

            foreach($result as $row) {
                echo "<tr><td>";
                echo $row['title']."</td><td>";
                echo $row['in_charge']."</td><td>";
                echo $row['province']."</td><td>";
                echo $row['city']."</td><td>";
                echo $row['first_name']."</td><td>";
                echo $row['phone']."</td><td>";
                echo $row['email']."</td></tr>";
                                
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