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
        $vMensaje .= 'Debes ingresar el nombre. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre'])) {
        $vMensaje .= 'El nombre debe ser solo letras y espacios. <br />';
    }    

    if(empty($_POST['apellido'])){
        $vMensaje .= 'Debes ingresar el apellido. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['apellido'])) {
        $vMensaje .= 'El nombre debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['fecha'])){
        $vMensaje .= 'Debes ingresar la fecha de nacimiento. <br />';
    }

    if(empty($_POST['nacionalidad'])){
        $vMensaje .= 'Debes ingresar la nacionalidad. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nacionalidad'])) {
        $vMensaje .= 'El nombre debe ser solo letras y espacios. <br />';
    } 

    if(empty($_POST['sexo'])){
        $vMensaje .= 'Debes ingresar el sexo. <br />';
    }    

    if (is_numeric($_POST['contrasena']) < 11) {
        $vMensaje .= 'Debes ingresar el Password. <br />';
    }

    if (strlen($_POST['contrasena']) < 6 || strlen($_POST['contrasena']) > 10) {
        $vMensaje .= 'El Password debe tener entre 6 y 10 numeros. <br/>';
    }

    if(empty($_POST['nombre_calle'])){
        $vMensaje .= 'Debes ingresar el nombre de la calle. <br />';
    }elseif (preg_match('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/', $_POST['nombre_calle'])) {
        $vMensaje .= 'El nombre de la calle debe ser solo letras y espacios. <br />';
    } 

    if (is_numeric($_POST['numero']) < 11) {
        $vMensaje .= 'Debes ingresar el numero de la calle. <br />';
    }




    /*
    if (strpos($_POST['email'], "@gmail.com") != true) {
        $vMensaje .= 'Debe ser un MAIL del tipo "@gmail.com" <br/>';
    }*/
    foreach ($_POST as $Id => $Valor) {
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }
    return $vMensaje;

}


?>