<?php

function ModificarMunicipal($vConexion){

//datos personales
$fecha_nacimiento = $_POST['fecha'];
$nacionalidad = $_POST['nacionalidad'];
$informacion_personal = $_POST['informacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
/*
$sexo = "";
if($_POST['sexo']="Masculino"){
    $sexo=1;
}else{
    $sexo=0;
}*/

$dni = $_POST['dni'];
$estado_persona = $_POST['estado'];
$contrasena = $_POST['contrasena'];

//direccion
$calle = $_POST['nombre_calle'] ;
$numero = $_POST['numero'];
$ciudad = $_POST['nombre_ciudad'];
$provincia = $_POST['provincia'];

//datos de contacto

$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$red = $_POST['red'];

//area y rol

$area = $_POST['area'];
$rol = $_POST['rol'];


    $SQL_Update="UPDATE 
                    persona p, direccion d, ciudad c, provincia pr, datos_de_contacto dc,
                    area_municipal am, rol_municipal rm, trabajador_municipal tm

                SET p.FECHA_DE_NACIMIENTO = '$fecha_nacimiento', p.NACIONALIDAD = '$nacionalidad', 
                    p.INFORMACION_PERSONAL = '$informacion_personal', p.NOMBRE = '$nombre', 
                    p.APELLIDO = '$apellido', p.CONTRASENA = '$contrasena', d.NOMBRE_CALLE ='$calle', 
                    d.NUMERO = $numero, c.NOMBRE_CIUDAD = '$ciudad', pr.NOMBRE_PROVINCIA = '$provincia',
                    dc.TELEFONO = '$telefono', dc.CORREO_ELECTRONICO = '$mail', dc.RED_SOCIAL = '$red',
                    am.DESCRIPCION_AREA_MUNICIPAL = '$area'
                WHERE 
                    p.DNI = $dni
                AND
                    P.ID_DIRECCION = d.ID_DIRECCION
                AND
                    d.ID_CIUDAD = c.ID_CIUDAD
                AND
                    c.ID_PROVINCIA = pr.ID_PROVINCIA
                AND
                    p.ID_DATOS_DE_CONTACTO = dc.ID_DATOS_DE_CONTACTO
                AND
                    p.DNI = tm.DNI
                AND
                    tm.ID_AREA_MUNICIPAL = am.ID_AREA_MUNICIPAL
                ;";

    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
         die('<h4>Error al intentar modificar el usuario municipal.</h4>');
    }

return true;
}




?>