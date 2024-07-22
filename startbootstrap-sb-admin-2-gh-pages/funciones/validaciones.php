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


?>