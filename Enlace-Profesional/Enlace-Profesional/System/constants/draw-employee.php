<form name="frm" action="app/create-account.php" method="POST" autocomplete="off">
<div class="login-box-wrapper">
							
<div class="modal-header">
<h4 class="modal-title text-center">Crea tu cuenta personal gratis</h4>
</div>

<div class="modal-body">
																
<div class="row gap-20">
											

												

												
<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Nombre</label>
<input class="form-control" placeholder="Ingrese su Nombre" name="fname" required type="text"> 
</div>
												
</div>

<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Apellidos</label>
<input class="form-control" placeholder="Ingrese sus Apellidos" name="lname" required type="text"> 
</div>
												
</div>
												
<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Cédula<small> (Debe colocar todos los números, incluyendo los ceros)</small></label>
<input class="form-control" placeholder="Ingrese su cédula" name="cedula" required type="text"> 
</div>
												
</div>

<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Email</label>
<input class="form-control" placeholder="Ingrese su email" name="email" required type="text"> 
</div>
												
</div>
												
<div class="col-sm-12 col-md-12">
												
<div class="form-group"> 
<label>Contraseña<small> (Debe utilizar la misma contraseña de la UNA)</small></label>
<input class="form-control" placeholder="Usar contraseña de matrícula UNA" name="password" required type="password"> 
<!-- <span id="strength"></span> -->
</div>
												
</div>
<div class="custom-control custom-checkbox mb-3">
    <a href="https://www.claves.una.ac.cr/" target="_blank">¿Olvidó la contraseña?</a> 
</div>	
												
<!-- <div class="col-sm-12 col-md-12">
												
<div class="form-group"> 
<label>Confirmar contraseña</label>
<input class="form-control" placeholder="Vuelve a escribir" name="confirmpassword" required type="password"> 
 <span id="passwordMsg"></span> 
</div>
												
</div> -->
<div class="form-check form-check-inline"> 
<input class="form-check-input" type="checkbox" id="terminos" value="S" name="terminos" required>
		<label class="form-check-label" for="terminos">Acepto los <a href="terms-conditions.php" target="_blank">términos de uso de la plataforma.</a></label>
		</div>						
												
<input type="hidden" name="acctype" value="101">
												
												
</div>

</div>

<div class="modal-footer text-center">
<button  id="registrar" type="submit" name="reg_mode" class="btn btn-primary" onclick="revisar();">Registrar</button>
</div>
										
</div>
</form>
<script>
function revisar(){

    if($('#terminos').is(":checked") === false){
        alert("Debe aceptar los Términos de uso de la plataforma para continuar")
    }
}
</script>