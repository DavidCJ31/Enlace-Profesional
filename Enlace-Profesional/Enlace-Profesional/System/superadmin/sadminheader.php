<?php
require '../constants/settings.php'; 
require '../constants/db_config.php';

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM tbl_tutorials ORDER BY video_name");
    $stmt->execute();
    $result = $stmt->fetchAll();
	

	
}catch(PDOException $e)
{

}

?>
<header id="header">

<nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-red">
<img style="margin:10px 10px" class="img-responsive" alt="Menu principal" src="../images/LOGO-UNAHorizontal-BLANCO.png" width="200px" height="100px" />
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <!-- <li class="nav-item nav-logo">
            <a href="../"><img src="../images/horiz.png" alt="logo" /></a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link" href="../">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item"> 
            <a class="nav-link">Recursos de Apoyo</a>
            <ul class="dropdown">
                <!-- Graduados-->
                <li class ="nav-item">
                <a class="nav-link" href = "../graduados.php">Para graduados</a>
                    
                </li>
                <!-- Empleadores-->
                <li class ="nav-item">
                <a class="nav-link" href = "../empleadores.php">Para empleadores</a>
                    
                </li>

                <!-- Docentes-->
                <li class ="nav-item">
                <a class="nav-link"  href = "../docentes.php">Para docentes</a>
                    
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../job-list.php">Lista de empleos</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" href="../employers.php">Empresas</a>  
        </li> -->

        <!-- <li class="nav-item"> 
            <a class="nav-link">Formación laboral</a>
          <ul class="dropdown">
            <li><a class="nav-link" href="../interview.php">La Entrevista</a></li>
            <li><a class="nav-link" href="../curriculumTips.php">Curriculum Vitae</a></li>
          </ul>
        </li> -->
        <li class="nav-item"> 
            <a class="nav-link">Nosotros</a>
          <ul class="dropdown">
            <li><a class="nav-link" href="../mision-vision.php">Misión y visión</a></li>
            <!-- <li><a class="nav-link" href="../careers.php">Nuestras carreras</a></li> -->
            <li><a class="nav-link" href="../terms-conditions.php">Términos de Uso</a></li>

          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contacto</a>
        </li>

        <!--Redes Sociales-->
        <li class="nav-item"> 
            <a class="nav-link">Redes Sociales</a>
        <ul class="dropdown">
            <li>
                <a class="nav-link" href="https://www.youtube.com/channel/UCUs96CKvsIuVdsdxGhWKfjA"><i class="fa fa-youtube-play" aria-hidden="true"></i> YouTube</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/graduadosUNA/"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a>
            </li>

        </ul>
        </li>
        




        <!-- <div class="nav-item">
            <ul class="navbar-nav"> -->
                <?php
                if ($user_online == true) {
                print '
                    <li class="nav-item"><ion-icon name="notifications" style="font-size: 35px; text-align: center" class="nav-link"></ion-icon></li>
                    <li class="nav-item active"><a class="nav-link" href="index.php">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">Cerrar Sesión</a></li>';
                }else{
                print '
                    <li class="nav-item"><a class="nav-link active" href="../login.php">Ingresar</a></li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="modal" href="#registerModal">Registrarse</a></li>';						
                }
                
                ?>
            </ul>
        <!-- </div> -->
     </div>
</nav>

</header>