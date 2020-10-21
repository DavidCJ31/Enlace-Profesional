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
										
									</div>
									
									<div class="admin-user-action text-center">
									
									<?php
										if($cv == null ){
											echo "Adjunte un CV";
										}
										else{
											$src = 'data:application/pdf;base64,'.base64_encode($cv);
											echo '<a href='.$src.' class="btn btn-primary btn-sm btn-inverse" download>VER MI CV</a>';
										}
										
										?>
										
									</div>
									
									<ul class="admin-user-menu clearfix">
										<li  class="active">
											<a href="./"><i class="fa fa-user"></i> Perfil</a>
										</li>
										<!-- <li class="">
										<a href="app/cv-maker.php" target="_blank"><i class="fa fa-file-pdf-o"></i> Generar Curriculum</a>
										</li> -->
										<li class="">
										<a href="titles.php"><i class="fa fa-book"></i> Títulos Académicos</a>
										</li>
										<li>
											<a href="academic-certifications.php"><i class="fa fa-trophy"></i>Certificaciones académicas</a>
										</li>
										<!-- <li>
											<a href="training.php"><i class="fa fa-gears"></i> Capacitaciones</a>
										</li> -->
										<li>
											<a href="experience.php"><i class="fa fa-briefcase"></i> Experiencia Laboral</a>
										</li>
										<li>
											<a href="language.php"><i class="fa fa-language"></i> Dominio del Idioma</a>
										</li>
										<li>
											<a href="referees.php"><i class="fa fa-users"></i> Referencias</a>
										</li>
										<li>
											<a href="attachments.php"><i class="fa fa-folder-open"></i> Otros Documentos Adjuntos</a>
										</li>
										<li>
											<a href="applied-jobs.php"><i class="fa fa-bookmark"></i> Empleos Presentados</a>
										</li>
										<li>
											<a href="configuration.php"><i class="fa fa-cogs"></i>Configuración de la cuenta</a>
										</li>
										<li>
											<a href="vistaPerfil.php?empid=<?php echo $myid; ?>"><i class="fa fa-users"></i> Vista de la empresa del perfil</a>
										</li>
										<li>
											<a href="../logout.php"><i class="fa fa-sign-out"></i> Cerrar Sesión</a>
										</li>
									</ul>
									
								</div>

							</div>