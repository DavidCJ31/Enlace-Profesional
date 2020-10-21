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
    <title>Reporte candidatos</title>
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
            <h1>Reporte de candidatos</h1>
        </div>
        </div><!--cierra el row--> 
      
        <hr>
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th >Cedula</th>
            <th >Nombre</th>
            <th >Telefono</th>
            <th >Correo</th>
            <th >Año de Nac</th> 
            <th >Discapacidad</th>
            <th >Tipo de discapacidad</th>
            <th >Área de Conocimiento</th>
            <th >Grado Académico</th>
            <th >Titulación</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        require 'constants/db_config.php';
        try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT u.id,u.first_name,u.last_name,u.email,u.phone, u.byear,t.education,t.title,t.education_area, u.discapacidad, u.tipo_discapacidad FROM tbl_users u inner join tbl_titles t on t.user_id=u.id where t.university='UNA' group by u.id");
        $stmt->execute();
        $result = $stmt->fetchAll();
            foreach($result as $row) {
                echo "<tr><td>";
                echo $row['id']."</td><td>";
                echo $row['first_name']. " ".$row['last_name']."</td><td>";
                echo $row['phone']. "</td><td>";
                echo $row['email'] . "</td><td>";
                echo $row['byear']."</td><td>";
                if($row['discapacidad'] == 'N') {
                echo "No</td><td>";
                echo "-</td><td>";}
                else{
                    echo "Sí</td><td>";
                    echo $row['tipo_discapacidad']."</td><td>";
                }
                echo $row['education_area']."</td><td>";
                echo $row['education']."</td><td>";
                echo $row['title']."</td></tr>";
                                
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