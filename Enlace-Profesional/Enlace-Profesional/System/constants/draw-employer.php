<style>
textarea {
    overflow-y: scroll;
    /*height: 100px;*/
    /* resize: none;  */
}
</style>
<form name="frm" id="reg" action="app/create-account-employer.php" method="POST" autocomplete="off">
<div class="login-box-wrapper">
							
<div class="modal-header">
<h4 class="modal-title text-center">Cree su cuenta de empresa gratis</h4>
</div>

<div class="modal-body">
																
<div class="row gap-20">
											

												

												
<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Nombre de Empresa</label>
<input class="form-control" placeholder="Ingrese el nombre de empresa" name="company" required type="text"> 
</div>
												
</div>

<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Actividad Económica</label>
<input class="form-control" placeholder="Ejm: Ventas/Viajes, Software de PC's etc" name="type" required type="text"> 
</div>
												
</div>

<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Nombre persona encargada</label>
<input class="form-control" placeholder="Ingrese el nombre de la persona encargada" name="encargado" required type="text"> 
</div>
												
</div>
												
<div class="col-sm-12 col-md-12">

<div class="form-group"> 
<label>Correo Electrónico</label>
<input class="form-control" placeholder="Ingrese su Correo Electrónico" name="email" required type="text"> 
</div>
												
</div>
												
<div class="col-sm-12 col-md-12">
												
<div class="form-group"> 
<label>Contraseña</label>
<input class="form-control" placeholder="Min 8 y Max 20 caracteres" name="password" id="password" required type="password" onkeyup="javaScript:verifyPasswordStrength();"> 
</div>
<span id="strength"></span>
												
</div>
												
<div class="col-sm-12 col-md-12">
												
<div class="form-group"> 
<label>Confirmar contraseña</label>
<input class="form-control" placeholder="Repita su contraseña" name="confirmpassword" id="confirmpassword" required type="password" onkeyup="javascript:conPassword();"> 
</div>
<span id="passwordMsg"></span>
												
</div>
<div class="form-check form-check-inline"> 
<input class="form-check-input" type="checkbox" id="terminos" value="S" name="terminos" required>
		<label class="form-check-label" for="terminos">Acepto los <a href="terms-conditions.php" target="_blank">términos de uso de la plataforma</a></label>
												
<input type="hidden" name="acctype" value="102">
		</div>										
												
</div>

</div>

<div class="modal-footer text-center">
<button  name="registrarEmpresa" id="registrar" type="submit" class="btn btn-primary" onclick="revisar();">Registrar</button>
</div>
										
</div>
</form>

<script>
function revisar(){

    if($('#terminos').is(":checked") === false){
        console.log("ayuda");
        alert("Debe aceptar los Términos de uso de la plataforma para continuar")
    }

}
</script>