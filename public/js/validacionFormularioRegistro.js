window.onload = iniciar;

function iniciar() {
  document.getElementById("boton").addEventListener('click', validarGeneral, false);
  
}
const expresionNick=/^[\w]+$/;
const expresionPass = /^\W[a-zA-Z]+[0-9]+$/;
const expresionCorreo=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


function validarGeneral(e) {
  borrarError();
  if (validaNick() && validaPassword() && validaCorreo()) {
      return true
      
  } else {
      e.preventDefault();
      return false;
  }
}
function validaNick() {
  let nick = document.getElementById("nick");
  
  if(nick.value==="" || !expresionNick.test(nick.value)){
      error(nick, "El nick introducido no es válido, le recordamos que no puede haber ni caracteres especiales ni espacios en blanco");
      return false;
  }
  nick.className="";
  return true;

}
function validaPassword(){
  let password = document.getElementById("password");
  let Rpassword = document.getElementById("Rpassword");
  if(password.length<8 || password.length>16 || password.value==="" || Rpassword.value==="" || password.value!=Rpassword.value || !expresionPass.test(password.value)){
    error(password, "Debe introducir una Password válida, le recordamos que la contraseña debe contener un mínimo de 8 caracteres y un máximo de 16; la estructura debe ser caracteres especiales, seguido de letras y seguido de numeros. Todo ello sin espacios en blanco y sin la letra ñ");
    return false;
  }
  
  return true;
}
function validaEdad(){
  let fechaNacimientoAux=document.getElementById("fechaNacimiento");   
  let fechaNacimiento = new Date(fechaNacimientoAux.value);
  let anno;
  let aviso=18;
  let hoy = new Date();
  anno = (hoy - fechaNacimiento)/((1000*60*60*24*30*12));//Para calcular el número de años
  if(fechaNacimientoAux.value===""  || anno<aviso){
      error(elemento, "Debes ser mayor de "+aviso+" años");
      return false;
  }
  
  return true;
}
function validaCorreo(){
  let correo = document.getElementById("correo");
  
  if(correo.value==="" || !expresionCorreo.test(correo.value)){
      error(correo, "El correo electrónico introducido no es correcto, revísalo.");
      return false;
  }
  correo.className="";
  return true;

}
function error(elemento, mensaje) {
  let cajaError=document.getElementById("mensajeError")
  cajaError.innerHTML ="<p class='alert alert-danger'>" + mensaje + "</p>";
  elemento.focus();
}

function borrarError() {
  let formulario = document.forms[0];
  for (let i = 0; i < formulario.elements.length; i++) {
      formulario.elements[i].className = "";
  }
}