<!DOCTYPE html>
<html lang="es_ES">
<?php 
include 'constants/settings.php'; 
include 'constants/check-login.php';
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">
  
  <meta name="author" content="Themefisher.com">

  <title>Intermediacion Laboral</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
  <!-- bootstrap.min css -->
  <!--<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">-->
  <!-- Ionic Icon Css -->
  <link href="https://unpkg.com/ionicons@4.4.7/dist/css/ionicons.min.css" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@4.4.7/dist/ionicons.js"></script>
  <!-- animate.css -->
  <!--<link rel="stylesheet" href="plugins/animate-css/animate.css"-->
  <!-- Magnify Popup -->
  <!--<link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css">-->
  <!-- Owl Carousel CSS -->
  
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js " integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/component.css" rel="stylesheet">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/styleCurriculum.css">


</head>

<body class="home">

<?php include_once('header.php'); ?>

<!-- Slider Start -->
<section class="curriculum">
  <img class="adjust-img"src="./images/curriculum.jpg">

</section>

<!-- Wrapper Start -->
<section class="about section bg-3" >
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-12">
				<div class="block">
					<div class="section-title">
						<h2>¿Qué es y para qué sirve un Curriculum? </h2>
            </div>
            <div class="text-Justify">
						<p>Resumidamente el curriculum es una fuente donde se encuentra la información personal y académica de la persona que opta por un puesto de trabajo. <br><br> 
            Este sirve como referencia al reclutador para evaluar si cuenta con los requerimientos necesarios para la empresa o lugar de trabajo, además es el primer contacto para una futura entrevista. 
            </p>
          <p> Entre otras de las razones de la funcionalidad de un curriculum vitae están:</p>
          <ul>
            <li> <p> • Prácticamente corresponde a la primera impresión que se dará para un proceso de selección. </p> </li>
            <li> <p> • En este se encuentra la información más resumida de las habilidades personales y profesionales. </p> </li>
            <li> <p> • Es un apoyo para la persona reclutadora a la hora de la entrevista y para poder hacer comparaciones a las posibles vacantes. </p> </li>
          </ul>
        </div>
        </div>
			</div><!-- .col-md-7 close -->
			<div class="col-md-5 col-sm-12">
				<div class="block">
					<img src="images/cvdesign1.jpg" alt="Img">
				</div>
			</div><!-- .col-md-5 close -->
		</div>
	</div>
</section>

<section>
<h2 class="section-subtitle" style="text-align: center"> Tipos de Currículum Vitae</h2>
<div class="container">
  <h3>1. El Curriculum Vitae cronológico</h3>
  <div class="row">
  <div class="text-Justify">
  <p>Este tipo es el tradicional, donde para los reclutadores una herramienta fácil de leer, permite presentar la información partiendo de lo más antiguo a lo más reciente.<br>
  Este tipo de curriculum vitae es más utilizado para las personas con poca experiencia laboral o para buscar un primer empleo.<br>
  Se caracteriza por destacar la estabilidad y el logro ascendente de la carrera laboral, se recomienda su uso cuando se ha tenido un seguimiento en los años con respecto a la profesión y al trabajo.<br>
  Por lo contrario no se recomienda cuando la persona ha cambiado varias veces de trabajo en corto tiempo ni cuando ha tenido largos periodos sin laborar, ya que puede presentar vacíos o inestabilidad.</p>
  </div>
    <!--<div class="col-md-3">
      <div class="card" style="width: 18rem;">
      <!--   <img class="card-img-top" src="..." alt="Card image cap"> 
       <ion-icon style="font-size: 75px; text-align: center" name="time"></ion-icon>
        <div class="card-body">
          <p class="card-text">Este tipo es el tradicional, para las personas reclutadoras es de fácil de lectura debido a que, permite presentar la información empezando de lo más reciente a lo más antiguo. </p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="arrow-round-up"></ion-icon>
        <div class="card-body">
          <p class="card-text">Se caracteriza por destacar la estabilidad y el logro ascendente de la carrera laboral, se recomienda su uso cuando se ha tenido un seguimiento en los años con respecto a la profesión y al trabajo. </p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="close"></ion-icon>
        <div class="card-body">
          <p class="card-text">Por lo contrario no se recomienda cuando la persona ha cambiado varias veces de trabajo en corto tiempo ni cuando ha tenido largos periodos sin laborar, ya que se puede visibilizar vacíos o inestabilidad laboral.</p>
        </div>
      </div>
    </div>-->
  </div>

    <h3>2. El Curriculum Vitae cronológico inverso</h3>
  <div class="row">
  <div class="text-Justify">
  <p>Corresponde a un nuevo tipo de curriculum vitae que está ganando cada día más terreno y además es una presentación más práctica.<br>
  Este tipo consiste por empezar los datos por los más recientes, teniendo la ventaja de resaltar los estudios y experiencias actuales ya que son las que principalmente le interesan al reclutador.
  Además, es mucho más visible la evolución de la carrera y el puesto de trabajo anterior. 
  </p>
  </div>
   <!-- <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="create"></ion-icon>
        <div class="card-body">
          <p class="card-text">Corresponde a un nuevo tipo de curriculum que está ganando cada día más terreno y además es una presentación más práctica. </p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
      <ion-icon style="font-size: 75px; text-align: center" name="skip-backward"></ion-icon>
        <div class="card-body">
          <p class="card-text">Consiste en empezar los datos por los más recientes, teniendo la ventaja de resaltar los estudios y experiencias actuales ya que son las que principalmente le interesan al reclutador.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="bookmark"></ion-icon>
        <div class="card-body">
          <p class="card-text">Además es mucho más visible la evolución de la carrera y el puesto de trabajo anterior. </p>
        </div>
      </div>
    </div>-->
  </div>

    <h3>3. El Curriculum Vitae funcional o temático</h3>
  <div class="row">
  <div class="text-Justify">
  <p>
  Este tipo trata de distribuir la información por temas, dando la libertad de poder estructurar como la persona crea conveniente.<br>
  Este destaca las habilidades y los puntos fuertes, favoreciendo a las personas con estudios limitados, ya que sobrepone sus cualidades antes que su formación educativa, pero aun así se utiliza y recomienda para las personas con amplios perfiles de experiencia profesional. <br>
  Este tipo además es un perfecto instrumento de marketing; como no sigue una progresión cronológica, permite seleccionar los puntos positivos y omitir los eventuales errores de recorrido, los periodos de paro, los frecuentes cambios de trabajo, entre otras eventualidades. 
  </p></div>
    <!--<div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="list"></ion-icon>
        <div class="card-body">
          <p class="card-text">Trata de distribuir la información por temas, dando la libertad de poder estructurar como la persona crea conveniente. </p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="trending-up"></ion-icon>
        <div class="card-body">
          <p class="card-text">Destaca las habilidades y los puntos fuertes, sobreponiendo las cualidades antes que la formación educativa, se puede utilizar desde las personas con pocos estudios hasta para las personas con amplios perfiles de experiencia profesional. </p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card" style="width: 18rem;">
        <ion-icon style="font-size: 75px; text-align: center" name="code-working"></ion-icon>
        <div class="card-body">
          <p class="card-text">Es un perfecto instrumento de marketing; ya que no sigue una progresión cronológica, permitiendo seleccionar los puntos positivos y omitir los eventuales errores de recorrido, los años sabáticos o sin ninguna actividad laboral y los frecuentes cambios de trabajo entre otras circunstancias.</p>
        </div>
      </div>
    </div>-->
  </div>
  
	<h3>4. El Curriculum Vitae combinado o mixto</h3> 
	<div class="row">
	<div class="text-Justify">
	<p>Este último tipo organiza la información por áreas y después incorpora las fechas, se caracteriza por destacar las capacidades, logros, experiencia y formación con flexibilidad. <br>
	La mayoría de plataformas en las empresas no aceptan este tipo de curriculum vitae o no es compatible con ellos, además, debe rehacer para cada puesto de trabajo.
	</p></div>
	</div>
	
  <br><br>
  <div class="text-Justify">
  <p style="font-weight:bold; font-size: 18px">La persona quien va a ser la encargada de contratarlo(a) está acostumbrado a estas cuatro formas de presentación, por ello es importante escoger la que mayor se adecue a su perfil académico y laboral. </p>
</div>
</div>

</section> <!-- termina area de tipos de curriculum-->

<section class="bg-3">
  <iframe width="560" height="500" src="https://www.youtube.com/embed/Xu2Wlga0_2g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section> 


<!-- Service Start -->
<section class="service">
<h2 class="section-subtitle" style="text-align: center">Partes de un currículum</h2>
  <div class="container">
    <div class="row">
		<div class="text-Justify">
        <p>
          Cuando ya sabemos las funciones del curriculum y el tipo más apropiado para cada uno, debemos de saber cuáles son las partes que lo componen. 
        </p>
        <p>
          La mayoría de los casos estos llevan la misma información solo que acomodados de diferente manera.
          A continuación se presentan las partes de este: 
        </p><br>
      </div>
      <div class="col-md-12">
      <ol class="list-group">
        <li class="list-group-item">1.  Datos personales </li>
        <li class="list-group-item list-group-item-primary">2.  Formación Académica </li>
        <li class="list-group-item list-group-item-secondary">3.  Formación complementaria </li>
        <li class="list-group-item list-group-item">4.  Experiencia Profesional </li>
        <li class="list-group-item list-group-item-primary">5. Otros Conocimientos </li>
        <li class="list-group-item list-group-item-secondary">6.  Otros datos de interés </li>
      </ol>
      </div>
    </div>
	
    </div>
</section>
<!-- Call to action Start -->

<section class="bg-3">
  <div class="container">
    <h2 class="section-subtitle"> Tips y recomendaciones para elaborar un curriculum</h2>
    <div class="row">
        <div class="col-md-12 col-md-offset-12">
        <p>A continuación se presenta una infografía el cual contiene 6 tips a tomar en cuenta a la hora de realizar el curriculum vitae. </p>
      </div><br>
      <div class="col-md-12"><br>
        <img class="rounded mx-auto d-block" src="./images/8.png">
      </div>
  <div class="col-md-12 col-md-offset-12"><br>
        <p>Esperamos que la información le haya sido de mucha ayuda y lo invitamos a nuestro siguiente post “La entrevista”, cuando ya pasamos la fase del curriculum vitae ¿Qué sigue?. </p>
      </div>
    </div>
  </div>
</section>

<!--
<section class="call-to-action bg-1 section-sm overly">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2>We design delightful digital experiences.</h2>
					<p>Read more about what we do and our philosophy of design. Judge for yourself The work and results <br> we’ve achieved for other clients, and meet our highly experienced Team who just love to design.</p>
					<a class="btn btn-main btn-solid-border" href="#" >Tell Us Your Story</a>
				</div>
			</div>
		</div>
	</div>
</section> -->

<!-- Content Start -->
<!--
<section class="testimonial">
  <div class="container">
    <div class="row">
      <div class="section-title text-center">
        <h2>Fun Facts About Us</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,  <br> there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="block">
          <ul class="counter-box clearfix">
            <li>
              <div class="counter-item">
                <i class="ion-ios-chatboxes-outline"></i>
                <h4 class="counter">99</h4>
                <span>Cups Of Coffee</span>
              </div>
            </li>
            <li>
              <div class="counter-item">
                <i class="ion-ios-glasses-outline"></i>
                <h4 class="counter">45</h4>
                <span>Article Written</span>
              </div>
            </li>
            <li>
              <div class="counter-item">
                <i class="ion-ios-compose-outline"></i>
                <h4 class="counter">125</h4>
                <span>Projects Completed</span>
              </div>
            </li>
            <li>
              <div class="counter-item">
                <i class="ion-ios-timer-outline"></i>
                <h4 class="counter">200</h4>
                <span>Combined Projects</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <div class="testimonial-carousel text-center">
          <div  class="testimonial-slider owl-carousel">
            <div>
              <i class="ion-quote"></i>
              <p>"This Company created an e-commerce site with the tools to make our business a success, with innovative ideas we feel that our site has unique elements that make us stand out from the crowd."</p>
              <div class="user">
                <img src="images/item-img1.jpg" alt="Pepole">
                <p><span>Rose Ray</span> CEO-Themefisher</p>
              </div>
            </div>
            <div>
              <i class="ion-quote"></i>
              <p>"This Company created an e-commerce site with the tools to make our business a success, with innovative ideas we feel that our site has unique elements that make us stand out from the crowd."</p>
              <div class="user">
                <img src="images/item-img1.jpg" alt="Pepole">
                <p><span>Rose Ray</span> CEO-Themefisher</p>
              </div>
            </div>
            <div>
              <i class="ion-quote"></i>
              <p>"This Company created an e-commerce site with the tools to make our business a success, with innovative ideas we feel that our site has unique elements that make us stand out from the crowd."</p>
              <div class="user">
                <img src="images/item-img1.jpg" alt="Pepole">
                <p><span>Rose Ray</span> CEO-Themefisher</p>
              </div>
            </div>
            <div>
              <i class="ion-quote"></i>
              <p>"This Company created an e-commerce site with the tools to make our business a success, with innovative ideas we feel that our site has unique elements that make us stand out from the crowd."</p>
              <div class="user">
                <img src="images/item-img1.jpg" alt="Pepole">
                <p><span>Rose Ray</span> CEO-Themefisher</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
-->



<!-- footer Start -->
<?php include_once('footer.php'); ?>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!--<script src="js/jquery.counterup.js"></script>-->
    
    <!-- Main jQuery -->
   
    <!--<script src="https://code.jquery.com/jquery-git.min.js"></script>--> 
    <!-- Bootstrap 3.1 -->
    <!--<script src="plugins/bootstrap/js/bootstrap.min.js"></script>-->
    <!-- Owl Carousel -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!--  -->
    <!--<script src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>-->
    <!-- Mixit Up JS -->
    <!--<script src="plugins/mixitup/dist/mixitup.min.js"></script> -->
    <!-- <script src="plugins/count-down/jquery.lwtCountdown-1.0.js"></script> -->
    <!--<script src="plugins/SyoTimer/build/jquery.syotimer.min.js"></script> -->


    <!-- Form Validator -->
    
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>


    
    <!-- Google Map -->
   <!-- <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    -->

    <script src="js/script.js"></script> 
    



  </body>
  </html>
   