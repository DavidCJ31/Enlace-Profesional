//This function verifies if the password is strong enough to accept it.
//It must be minimum 8 characters, 1 uppercase letter and 1 number.
//Got it from https://martech.zone/javascript-password-strength/
function verifyPasswordStrength() {
  var boton = document.getElementById("registrar");
  var strength = document.getElementById("strength");
  var confirm = document.getElementById("confirmpassword");
  var passwordMsg = document.getElementById("passwordMsg");
  //var strong = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
  var strong = new RegExp("^(?=.*[a-z])(?=.*[0-9])(?=.{8,})");
  var enough = new RegExp("(?=.{6,}).*", "g");
  var pwd = document.getElementById("password");
  if (password.value.length === 0) {
    strength.innerHTML = "";
    passwordMsg.innerHTML = "";
    confirm.style.backgroundColor = "white";
  } else if (strong.test(pwd.value)) {
    strength.innerHTML = '<span style="color:green">Contraseña segura</span>';
    boton.disabled = false;
  } else {
    strength.innerHTML =
      '<span style="color:red">Contraseña insegura, debe contener mínimo 8 caracteres,letras y números.</span>';
    boton.disabled = true;
  }
}
//This function verifies if the password and the confirm password are equals
//https://keithscode.com/tutorials/javascript/3-a-simple-javascript-password-validator.html
function conPassword() {
  // var green = "#66cc66";
  //var red = "#ff6666";
  var password = document.getElementById("password");
  var passwordMsg = document.getElementById("passwordMsg");
  var confirm = document.getElementById("confirmpassword");
  var boton = document.getElementById("registrar");
  if (confirm.value.length === 0 || password.value.length === 0) {
    passwordMsg.innerHTML = "";
    //confirm.style.backgroundColor = 'transparent';
  } else if (password.value === confirm.value) {
    //  confirm.style.backgroundColor = green;
    passwordMsg.innerHTML =
      '<span style="color:green">Contraseñas son iguales.</span>';
    boton.disabled = false;
  } else {
    // confirm.style.backgroundColor = red;
    passwordMsg.innerHTML =
      '<span style="color:red">Contraseñas no son iguales.</span>';
    boton.disabled = true;
  }
}
