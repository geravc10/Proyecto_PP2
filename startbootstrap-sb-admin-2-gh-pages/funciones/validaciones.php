<?php
function ValidarUsuarioPass(){
$vMensaje='';
if (is_numeric($_POST['pass']) <11) {
$vMensaje.='Debes ingresar el Password. <br />';
}
if(strlen($_POST['pass']) < 6 || strlen($_POST['pass']) > 10 ){
$vMensaje.='El Password debe tener entre 6 y 10 numeros. <br
/>';
}
if(strpos($_POST['email'], "@gmail.com") !=true){
$vMensaje.='Debe ser un MAIL del tipo "@gmail.com" <br />';
}
foreach($_POST as $Id=>$Valor){
$_POST[$Id] = trim($_POST[$Id]);
$_POST[$Id] = strip_tags($_POST[$Id]);
}
return $vMensaje;
}
function ValidarDniConsulta(){
$vMensaje="";
if (is_numeric($_POST['dni']) <11) {
$vMensaje.='Debes ingresar el DNI. <br />';
}
if(strlen($_POST['dni']) !=8){
$vMensaje.='El DNI debe tener 8 numeros. <br />';
}
foreach($_POST as $Id=>$Valor){
$_POST[$Id] = trim($_POST[$Id]);
$_POST[$Id] = strip_tags($_POST[$Id]);
}
return $vMensaje;
}
?>