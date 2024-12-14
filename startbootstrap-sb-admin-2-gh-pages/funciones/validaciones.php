<?php
function ValidarUsuarioPass()
{
    $vMensaje = '';
    if (is_numeric($_POST['pass']) < 11) {
        $vMensaje .= 'Debes ingresar el Password. <br />';
    }
    if (strlen($_POST['pass']) < 6 || strlen($_POST['pass']) > 10) {
        $vMensaje .= 'El Password debe tener entre 6 y 10 numeros. <br
/>';
    }
    if (strpos($_POST['email'], "@gmail.com") != true) {
        $vMensaje .= 'Debe ser un MAIL del tipo "@gmail.com" <br />';
    }
    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}
function ValidarDniConsulta()
{
    $vMensaje = "";
    if (is_numeric($_POST['dni']) < 11) {
        $vMensaje .= 'Debes ingresar el DNI. <br />';
    }
    if (strlen($_POST['dni']) != 8) {
        $vMensaje .= 'El DNI debe tener 8 numeros. <br />';
    }
    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;
}

function ValidarModificacionMuni(){

    $vMensaje = '';

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= '-Apellido: Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= '-Apellido: El apellido debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha de nacimiento: Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= '-Nacionalidad: Debes ingresar la nacionalidad. <br />';
    }

    if(empty($_POST['sexo'])){
        $vMensaje .= '-Sexo: Debes ingresar el sexo. <br />';
    }    
    
    if(empty($_POST['nombre_calle'])){
        $vMensaje .= '-Nombre de calle: Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['nombre_calle'])) {
        $vMensaje .= '-Nombre de calle: El nombre de la calle debe ser solo letras y espacios. <br />';
    } 
    
    if (empty($_POST['numero'])) {
        $vMensaje .= '-Numero de calle: Debes ingresar el numero de la calle. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['numero'])){
        $vMensaje .= '-Numero de calle: Deben ser solo numeros. <br />';
    }

    if (empty($_POST['contrasena'])) {
        $vMensaje .= '-Contraseña: Debes ingresar una contraseña. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['contrasena'])){
        $vMensaje .= '-Contraseña: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= '-Contraseña: El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if (strpos($_POST['mail'], "@gmail.com") != true) {
        $vMensaje .= 'Debe ser un MAIL del tipo "@gmail.com" <br/>';
    }

    if (empty($_POST['telefono'])) {
        $vMensaje .= '-Telefono: Debes ingresar el numero de telefono. <br />';
    }elseif (preg_match('/[^1234567890]/', $_POST['telefono'])){
        $vMensaje .= '-Telefono: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['telefono']) < 10 || strlen($_POST['telefono']) > 11) {
        $vMensaje .= '-Telefono: El Telefono debe tener entre 10 y 11 numeros. <br/>';
    }


    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarCreacionMuni(){

    $vMensaje = '';

    $hoy = new DateTime();            
    $nacimiento = new DateTime($_POST['fecha']);            
    $diferencia = $nacimiento->diff($hoy);            
    $edad = $diferencia->y;

    if($edad < 18){
        $vMensaje .= '-Para crear un usuario, el mismo debe ser mayor a 18 años. <br />';
    }

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= '-Apellido: Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= '-Apellido: El apellido debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha de nacimiento: Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= '-Nacionalidad: Debes seleccionar una nacionalidad. <br />';
    } 

    if(empty($_POST['sexo'])){
        $vMensaje .= '-Sexo: Debes ingresar el sexo. <br />';
    }
    
    
    if (is_numeric($_POST['dni']) < 11) {
        $vMensaje .= '-DNI: Debes ingresar el numero de documento. <br />';
    }
    if (strlen($_POST['dni']) != 8) {
        $vMensaje .= '-DNI: El numero de documento debe tener 8 numeros. <br />';
    }

    if(empty($_POST['nombre_calle'])){
        $vMensaje .= '-Nombre de calle: Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['nombre_calle'])) {
        $vMensaje .= '-Nombre de calle: El nombre de la calle debe ser solo letras, numeros y espacios. <br />';
    } 
    
    if (empty($_POST['numero'])) {
        $vMensaje .= '-Numero de calle: Debes ingresar el numero de la calle. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['numero'])){
        $vMensaje .= '-Numero de calle: Deben ser solo numeros. <br />';
    }

    if(empty($_POST['provincia'])){
        $vMensaje .= '-Provincia: Debes seleccionar una provincia. <br />';
    }

    if(empty($_POST['nombre_ciudad'])){
        $vMensaje .= '-Ciudad: Debes ingresar el nombre de una ciudad<br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['nombre_calle'])) {
        $vMensaje .= '-Ciudad: El nombre de la ciudad debe ser solo letras, numeros y espacios. <br />';
    } 

    if (empty($_POST['contrasena'])) {
        $vMensaje .= '-Contraseña: Debes ingresar una contraseña. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['contrasena'])){
        $vMensaje .= '-Contraseña: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= '-Contraseña: El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if (strpos($_POST['mail'], "@gmail.com") != true) {
        $vMensaje .= '-Email: Debe ser un correo del tipo "@gmail.com" <br/>';
    }

    if (empty($_POST['telefono'])) {
        $vMensaje .= '-Telefono: Debes ingresar el numero de telefono. <br />';
    }elseif (preg_match('/[^1234567890]/', $_POST['telefono'])){
        $vMensaje .= '-Telefono: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['telefono']) < 10 || strlen($_POST['telefono']) > 11) {
        $vMensaje .= '-Telefono: El Telefono debe tener entre 10 y 11 numeros. <br/>';
    }


    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarCreacionVeterinario(){

    $vMensaje = '';

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= '-Apellido: Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= '-Apellido: El apellido debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha de nacimiento: Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= '-Nacionalidad: Debes ingresar la nacionalidad. <br />';
    }

    if(empty($_POST['sexo'])){
        $vMensaje .= '-Sexo: Debes ingresar el sexo. <br />';
    }    
    
    if(empty($_POST['calle'])){
        $vMensaje .= '-Nombre de calle: Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['calle'])) {
        $vMensaje .= '-Nombre de calle: El nombre de la calle debe ser solo letras, numeros y espacios. <br />';
    } 
    
    if (empty($_POST['numero'])) {
        $vMensaje .= '-Numero de calle: Debes ingresar el numero de la calle. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['numero'])){
        $vMensaje .= '-Numero de calle: Deben ser solo numeros. <br />';
    }

    if (empty($_POST['contrasena'])) {
        $vMensaje .= '-Contraseña: Debes ingresar una contraseña. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['contrasena'])){
        $vMensaje .= '-Contraseña: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= '-Contraseña: El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if (strpos($_POST['mail'], "@gmail.com") != true) {
        $vMensaje .= 'Debe ser un MAIL del tipo "@gmail.com" <br/>';
    }

    if (empty($_POST['telefono'])) {
        $vMensaje .= '-Telefono: Debes ingresar el numero de telefono. <br />';
    }elseif (preg_match('/[^1234567890]/', $_POST['telefono'])){
        $vMensaje .= '-Telefono: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['telefono']) < 10 || strlen($_POST['telefono']) > 11) {
        $vMensaje .= '-Telefono: El Telefono debe tener entre 10 y 11 numeros. <br/>';
    }

    if(empty($_POST['especialidad'])){
        $vMensaje .= '-Especialidad: Debes ingresar la especialidad del veterinario. <br />';
    } 

    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el estado del veterinario. <br />';
    } 



    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarModificacionVeterinario(){

    $vMensaje = '';

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= '-Apellido: Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= '-Apellido: El apellido debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha de nacimiento: Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= '-Nacionalidad: Debes ingresar la nacionalidad. <br />';
    }

    if(empty($_POST['sexo'])){
        $vMensaje .= '-Sexo: Debes ingresar el sexo. <br />';
    }    
    
    if(empty($_POST['calle'])){
        $vMensaje .= '-Nombre de calle: Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['calle'])) {
        $vMensaje .= '-Nombre de calle: El nombre de la calle debe ser solo letras, numeros y espacios. <br />';
    } 
    
    if (empty($_POST['numero'])) {
        $vMensaje .= '-Numero de calle: Debes ingresar el numero de la calle. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['numero'])){
        $vMensaje .= '-Numero de calle: Deben ser solo numeros. <br />';
    }

    if (empty($_POST['contrasena'])) {
        $vMensaje .= '-Contraseña: Debes ingresar una contraseña. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['contrasena'])){
        $vMensaje .= '-Contraseña: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= '-Contraseña: El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if (strpos($_POST['mail'], "@gmail.com") != true) {
        $vMensaje .= 'Debe ser un MAIL del tipo "@gmail.com" <br/>';
    }

    if (empty($_POST['telefono'])) {
        $vMensaje .= '-Telefono: Debes ingresar el numero de telefono. <br />';
    }elseif (preg_match('/[^1234567890]/', $_POST['telefono'])){
        $vMensaje .= '-Telefono: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['telefono']) < 10 || strlen($_POST['telefono']) > 11) {
        $vMensaje .= '-Telefono: El Telefono debe tener entre 10 y 11 numeros. <br/>';
    }

    if(empty($_POST['especialidad'])){
        $vMensaje .= '-Especialidad: Debes ingresar la especialidad del veterinario. <br />';
    } 

    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el estado del veterinario. <br />';
    } 



    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarCreacionDuenioAnimal(){

    $vMensaje = '';

    $hoy = new DateTime();            
    $nacimiento = new DateTime($_POST['fecha']);            
    $diferencia = $nacimiento->diff($hoy);            
    $edad = $diferencia->y;

    if($edad < 18){
        $vMensaje .= '-Para crear un usuario, el mismo debe ser mayor a 18 años. <br />';
    }

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= '-Apellido: Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= '-Apellido: El apellido debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha de nacimiento: Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= '-Nacionalidad: Debes ingresar la nacionalidad. <br />';
    } 

    if(empty($_POST['sexo'])){
        $vMensaje .= '-Sexo: Debes ingresar el sexo. <br />';
    }    

    if (is_numeric($_POST['dni']) < 11) {
        $vMensaje .= '-DNI: Debes ingresar el numero de documento. <br />';
    }
    if (strlen($_POST['dni']) != 8) {
        $vMensaje .= '-DNI: El numero de documento debe tener 8 numeros. <br />';
    }
    
    if(empty($_POST['calle'])){
        $vMensaje .= '-Nombre de calle: Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['calle'])) {
        $vMensaje .= '-Nombre de calle: El nombre de la calle debe ser solo letras, numeros y espacios. <br />';
    } 
    
    if (empty($_POST['numero'])) {
        $vMensaje .= '-Numero de calle: Debes ingresar el numero de la calle. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['numero'])){
        $vMensaje .= '-Numero de calle: Deben ser solo numeros. <br />';
    }

    if (empty($_POST['contrasena'])) {
        $vMensaje .= '-Contraseña: Debes ingresar una contraseña. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['contrasena'])){
        $vMensaje .= '-Contraseña: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= '-Contraseña: El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if (strpos($_POST['mail'], "@gmail.com") != true) {
        $vMensaje .= '-Email: Debe ser un correo del tipo "@gmail.com" <br/>';
    }

    if (empty($_POST['telefono'])) {
        $vMensaje .= '-Telefono: Debes ingresar el numero de telefono. <br />';
    }elseif (preg_match('/[^1234567890]/', $_POST['telefono'])){
        $vMensaje .= '-Telefono: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['telefono']) < 10 || strlen($_POST['telefono']) > 11) {
        $vMensaje .= '-Telefono: El Telefono debe tener entre 10 y 11 numeros. <br/>';
    }

    

    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el estado del veterinario. <br />';
    } 



    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarModificacionDuenioAnimal(){
    
    $vMensaje = '';

    $hoy = new DateTime();            
    $nacimiento = new DateTime($_POST['fecha']);            
    $diferencia = $nacimiento->diff($hoy);            
    $edad = $diferencia->y;

    if($edad < 18){
        $vMensaje .= '-Para crear un usuario, el mismo debe ser mayor a 18 años. <br />';
    }

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= '-Apellido: Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= '-Apellido: El apellido debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha de nacimiento: Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= '-Nacionalidad: Debes ingresar la nacionalidad. <br />';
    }

    if(empty($_POST['sexo'])){
        $vMensaje .= '-Sexo: Debes ingresar el sexo. <br />';
    }    
    
    if(empty($_POST['calle'])){
        $vMensaje .= '-Nombre de calle: Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0123456789\s]/', $_POST['calle'])) {
        $vMensaje .= '-Nombre de calle: El nombre de la calle debe ser solo letras, numeros y espacios. <br />';
    } 
    
    if (empty($_POST['numero'])) {
        $vMensaje .= '-Numero de calle: Debes ingresar el numero de la calle. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['numero'])){
        $vMensaje .= '-Numero de calle: Deben ser solo numeros. <br />';
    }

    if (empty($_POST['contrasena'])) {
        $vMensaje .= '-Contraseña: Debes ingresar una contraseña. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['contrasena'])){
        $vMensaje .= '-Contraseña: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= '-Contraseña: El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if (strpos($_POST['mail'], "@gmail.com") != true) {
        $vMensaje .= '-Debe ser un MAIL del tipo "@gmail.com" <br/>';
    }

    if (empty($_POST['telefono'])) {
        $vMensaje .= '-Telefono: Debes ingresar el numero de telefono. <br />';
    }elseif (preg_match('/[^1234567890]/', $_POST['telefono'])){
        $vMensaje .= '-Telefono: Deben ser solo numeros. <br />';
    }

    if (strlen($_POST['telefono']) < 10 || strlen($_POST['telefono']) > 11) {
        $vMensaje .= '-Telefono: El Telefono debe tener entre 10 y 11 numeros. <br/>';
    }   

    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el estado del Dueño del animal. <br />';
    } 



    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarCreacionAnimal(){

    $vMensaje = '';   

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if (empty($_POST['dni'])) {
        $vMensaje .= '-Numero de Documento del dueño: Debes ingresar el numero de Documento del dueño. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['dni'])){
        $vMensaje .= '-Numero de Documento del dueño: Deben ser solo numeros. <br />';
    }
    if (strlen($_POST['dni']) < 8 || strlen($_POST['dni']) > 8) {
        $vMensaje .= '-Numero de Documento del dueño: Deben ser 8 numeros. <br/>';
    }

    if (empty($_POST['codigo'])) {
        $vMensaje .= '-Código del Animal: Debes ingresar el Código del Animal. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['codigo'])){
        $vMensaje .= '-Código del Animal: Deben ser solo numeros. <br />';
    }
    if (strlen($_POST['codigo']) < 5 || strlen($_POST['codigo']) > 5) {
        $vMensaje .= '-Código del Animal: Deben ser 5 numeros. <br/>';
    }

      


    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarCreacionAnimal_2(){

    $vMensaje = '';   

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras y espacios. <br />';
    }    

    if (empty($_POST['dni'])) {
        $vMensaje .= '-Numero de Documento del dueño: Debes ingresar el numero de Documento del dueño. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['dni'])){
        $vMensaje .= '-Numero de Documento del dueño: Deben ser solo numeros. <br />';
    }
    if (strlen($_POST['dni']) < 8 || strlen($_POST['dni']) > 8) {
        $vMensaje .= '-Numero de Documento del dueño: Deben ser 8 numeros. <br/>';
    }

    if (empty($_POST['codigo'])) {
        $vMensaje .= '-Código del Animal: Debes ingresar el Código del Animal. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['codigo'])){
        $vMensaje .= '-Código del Animal: Deben ser solo numeros. <br />';
    }
    if (strlen($_POST['codigo']) < 5 || strlen($_POST['codigo']) > 5) {
        $vMensaje .= '-Código del Animal: Deben ser 5 numeros. <br/>';
    }
    
    /*if($_POST['vac1'] == $_POST['vac2']){
        $vMensaje .= '-Vacunas: Seleccione dos vacunas diferentes. <br />';
    }*/

   


    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarIdAnimal(){

    $vMensaje = '';   
    
    if (empty($_POST['codigo'])) {
        $vMensaje .= '-Codigo de Identificacion del animal: Debes ingresar el numero de Identificacion del animal. <br />';
    }elseif (preg_match('/[^1234567890\s]/', $_POST['codigo'])){
        $vMensaje .= '-Codigo de Identificacion del animal: Deben ser solo numeros. <br />';
    }
    if (strlen($_POST['codigo']) != 5) {
        $vMensaje .= ' -Codigo de Identificacion del animal: El codigo de identificacion del animal debe tener 5 numeros. <br />';
    }
    
    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarModificacionAnimal(){
    
    $vMensaje = '';    

    if(empty($_POST['nombre'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre del Animal. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= '-Nombre del animal: El nombre debe ser solo letras y espacios. <br />';
    }     
    
    if(empty($_POST['rol'])){
        $vMensaje .= '-Rol: Debes ingresar el Rol del Animal. <br />';
    } 

    if(empty($_POST['raza'])){
        $vMensaje .= '-Raza: Debes ingresar la Raza del Animal. <br />';
    } 

    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el Estado del Animal. <br />';
    }    


    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarCargaHistorial(){
    $vMensaje="";
    
    if(isset($_POST['castracion'])){
        $vMensaje="";
    }else{
        if (isset($_POST['enfermedadSeleccionada'])) {
            $enfermedadSeleccionada = $_POST['enfermedadSeleccionada'];
            $vMensaje.= "";
        } else {
            $vMensaje.= "No se seleccionó ninguna enfermedad.";
        }
    }
    

   
    return $vMensaje;
}

function ValidarFechaHistorial(){
    
    $vMensaje = '';    
    
    if(empty($_POST['fecha'])){
        $vMensaje .= '-Fecha: Debes seleccionar la fecha del historial medico que deseas revisar. <br />';
    }     


    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarCreacionCampana(){

    $vMensaje = '';

    $hoy = new DateTime();            
    $inicio = new DateTime($_POST['fecha_inicio']);
    $fin = new DateTime($_POST['fecha_fin']);
    $maxInicio = new DateTime($hoy->format('Y-m-d H:i:s'));
    $maxInicio->modify('+6 months');
    $maxFin = new DateTime($inicio->format('Y-m-d H:i:s'));
    $maxFin->modify('+1 week');


    if(empty($_POST['nombre_campana'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre de la campaña. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]/', $_POST['nombre_campana'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras, espacios y numeros. <br />';
    }    
    

   if(empty($_POST['fecha_inicio'])){
        $vMensaje .= '-Fecha de Inicio de campaña: Debes ingresar la fecha de Inicio de campaña. <br />';
    }else{
        if($inicio<$hoy){
            $vMensaje .= '-Fecha de Inicio de campaña: La fecha de Inicio de campaña no puede ser anterior al dia de hoy. <br />';
        }elseif ($inicio > $maxInicio) {
            $vMensaje .= '-Fecha de Inicio de campaña: La fecha de Inicio de campaña no puede ser a mas de 6 meses desde hoy. <br />';  
        }
    }

    if(empty($_POST['fecha_fin'])){
        $vMensaje .= '-Fecha de Final de campaña: Debes ingresar la fecha de Final de campaña. <br />';
    }else{
        if($fin<$inicio){
            $vMensaje .= '-Fecha de Final de campaña: La fecha de Final de campaña no puede ser anterior a la fecha de Inicio de campaña. <br />';
        }elseif($fin > $maxFin){
            $vMensaje .= '-Fecha de Final de campaña: La fecha de Final de campaña no puede ser mayor a una semana. <br />';
        }
    }

    if(empty($_POST['tipo_campana'])){
        $vMensaje .= '-Tipo de Campaña: Debes ingresar un tipo de Campaña. <br />';
    }

    if(empty($_POST['especie'])){
        $vMensaje .= '-Especie: Debes ingresar una Especie de animal. <br />';
    }

    if(empty($_POST['veterinario'])){
        $vMensaje .= '-Veterinario: Debes ingresar un Veterinario. <br />';
    }

    if(empty($_POST['horario'])){
        $vMensaje .= '-Horario del primer turno: Debes ingresar un Horario entre las 07:00 hs. y las 19:00 hs. <br />';
    }

    if(empty($_POST['cantidad'])){
        $vMensaje .= '-Cantidad de turnos por dia: Debes ingresar la cantidad de turnos por dia. <br />';
    }

    if(empty($_POST['intervalo'])){
        $vMensaje .= '-Intervalo: Debes ingresar un Intervalo entre turnos. entre 0 y 60 minutos. <br />';
    }

    if(empty($_POST['duracion'])){
        $vMensaje .= '-Duracion: Debes ingresar la Duracin de cada turno. entre 0 y 180 minutos. <br />';
    }
    /*
    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el estado de la campaña. <br />';
    } 
    */

    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

function ValidarAnimalApto(){
    
    $vMensaje = '';    
    
    if(empty($_POST['codigo'])){
        $vMensaje .= '-Codigo: Debes ingresar el codigo de tu animal. <br />';
    }
    if (strlen($_POST['codigo']) < 5 || strlen($_POST['codigo']) > 5) {
        $vMensaje .= '-Código: Deben ser 5 numeros. <br/>';
    }



    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarTurno(){
    
    $vMensaje = '';    
    
    if(empty($_POST['turno'])){
        $vMensaje .= '-Turno: Debes seleccionar un Turno. <br />';
    }

    if(empty($_POST['pass'])){
        $vMensaje .= '-Constraseña: Debes ingresar tu contraseña para confirmar el turno. <br />';
    }
    



    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarBuscarCampana(){
    
    $vMensaje = '';    
    
    if(empty($_POST['id'])){
        $vMensaje .= '-Id: Debes ingresar un Id de Campaña. <br />';
    }

    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarBuscarCampana_2(){
    
    $vMensaje = '';    
    
    if(empty($_POST['id_turno'])){
        $vMensaje .= '-Id Turno: Debes ingresar un Id de Turno. <br />';
    }

    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;


}

function ValidarmodificacionCampana(){

    $vMensaje = '';

    $hoy = new DateTime();            
    $inicio = new DateTime($_POST['fecha_inicio']);
    $fin = new DateTime($_POST['fecha_fin']);
    $maxInicio = new DateTime($hoy->format('Y-m-d H:i:s'));
    $maxInicio->modify('+6 months');
    $maxFin = new DateTime($inicio->format('Y-m-d H:i:s'));
    $maxFin->modify('+1 week');


    if(empty($_POST['nombre_campana'])){
        $vMensaje .= '-Nombre: Debes ingresar el nombre de la campaña. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]/', $_POST['nombre_campana'])) {
        $vMensaje .= '-Nombre: El nombre debe ser solo letras, espacios y numeros. <br />';
    }    
    

   if(empty($_POST['fecha_inicio'])){
        $vMensaje .= '-Fecha de Inicio de campaña: Debes ingresar la fecha de Inicio de campaña. <br />';
    }else{
        if($inicio<$hoy && empty($_POST['soloLectura'])){
            $vMensaje .= '-Fecha de Inicio de campaña: La fecha de Inicio de campaña no puede ser anterior al dia de hoy. <br />';
        }elseif ($inicio > $maxInicio) {
            $vMensaje .= '-Fecha de Inicio de campaña: La fecha de Inicio de campaña no puede ser a mas de 6 meses desde hoy. <br />';  
        }
    }

    if(empty($_POST['fecha_fin'])){
        $vMensaje .= '-Fecha de Final de campaña: Debes ingresar la fecha de Final de campaña. <br />';
    }else{
        if($fin<$inicio){
            $vMensaje .= '-Fecha de Final de campaña: La fecha de Final de campaña no puede ser anterior a la fecha de Inicio de campaña. <br />';
        }elseif($fin > $maxFin){
            $vMensaje .= '-Fecha de Final de campaña: La fecha de Final de campaña no puede ser mayor a una semana. <br />';
        }
    }

    if(empty($_POST['tipo_campana'])){
        $vMensaje .= '-Tipo de Campaña: Debes ingresar un tipo de Campaña. <br />';
    }

    if(empty($_POST['especie'])){
        $vMensaje .= '-Especie: Debes ingresar una Especie de animal. <br />';
    }

    if(empty($_POST['veterinario'])){
        $vMensaje .= '-Veterinario: Debes ingresar un Veterinario. <br />';
    }

    if(empty($_POST['horario'])){
        $vMensaje .= '-Horario del primer turno: Debes ingresar un Horario entre las 07:00 hs. y las 19:00 hs. <br />';
    }

    if(empty($_POST['cantidad'])){
        $vMensaje .= '-Cantidad de turnos por dia: Debes ingresar la cantidad de turnos por dia. <br />';
    }

    if(empty($_POST['intervalo'])){
        $vMensaje .= '-Intervalo: Debes ingresar un Intervalo entre turnos. entre 0 y 60 minutos. <br />';
    }

    if(empty($_POST['duracion'])){
        $vMensaje .= '-Duracion: Debes ingresar la Duracin de cada turno. entre 0 y 180 minutos. <br />';
    }
    /*
    if(empty($_POST['estado'])){
        $vMensaje .= '-Estado: Debes ingresar el estado de la campaña. <br />';
    } 
    */

    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}

?>