<div class="main-wrapper">

<div class="admin-container-wrapper">

  <div class="container">
  
    <div class="GridLex-gap-15-wrappper">
    
      <div class="GridLex-grid-noGutter-equalHeight">
      
        <div class="GridLex-col-3_sm-4_xs-12">
        
          <div class="admin-sidebar">
              
            <div class="admin-user-item">
            <div class="image">	
            
              <?php 
              if ($myavatar == null) {
              print '<center><img class="rounded-circle autofit2" src="../images/default.jpg" title="'.$myfname.'" alt="image"  /></center>';
              }else{
              echo '<center><img class="rounded-circle autofit2" alt="image" title="'.$myfname.'"  src="data:image/jpeg;base64,'.base64_encode($myavatar).'"/></center>';	
              }
              ?>
              </div>
              <br>
              
              
              <h4><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></h4>
              <p class="user-role" id="titulo-perfil">Administrador</p>
              
            </div>
            
            <!-- <div class="admin-user-action text-center">
              
            </div> -->
            
            <ul class="admin-user-menu clearfix">
              <li  class="active">
                <a href="index.php"><i class="fa fa-user"></i> Perfil</a>
              </li>
              <li class="">
              <a href="users.php"><i class="fa fa-book"></i> Usuarios</a>
              </li>
              <li>
                <a href="reports.php"><i class="fa fa-trophy"></i>Reportes</a>
              </li>
              <li>
                <a href="../logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
              </li>
            </ul>
            
          </div>

        </div>
