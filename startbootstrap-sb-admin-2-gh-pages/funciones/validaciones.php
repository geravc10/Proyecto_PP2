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
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= '-Nacionalidad: La nacionalidad debe ser solo letras y espacios. <br />';
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
        $vMensaje .= '-Nacionalidad: Debes ingresar la nacionalidad. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= '-Nacionalidad: La nacionalidad debe ser solo letras y espacios. <br />';
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
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= '-Nacionalidad: La nacionalidad debe ser solo letras y espacios. <br />';
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
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= '-Nacionalidad: La nacionalidad debe ser solo letras y espacios. <br />';
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
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= '-Nacionalidad: La nacionalidad debe ser solo letras y espacios. <br />';
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
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= '-Nacionalidad: La nacionalidad debe ser solo letras y espacios. <br />';
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
    $vMensaje="Hola";



    return $vMensaje;
}


?>