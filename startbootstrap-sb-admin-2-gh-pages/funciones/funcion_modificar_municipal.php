<?php

function ModificarMunicipal($vConexion){

//datos personales
$fecha_nacimiento = $_POST['fecha'];
$nacionalidad = $_POST['nacionalidad'];
$informacion_personal = $_POST['informacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$dni = $_SESSION['municipal_dni'];
$contrasena = $_POST['contrasena'];

//direccion
$calle = $_POST['nombre_calle'] ;
$numero = $_POST['numero'];
$ciudad = $_POST['nombre_ciudad'];
$provincia = $_POST['provincia'];
$bis = $_POST['bis'];

//datos de contacto

$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$red = $_POST['red'];

//area, rol y estado

$area = $_POST['area'];
$rol = $_POST['rol'];
$estado = $_POST['estado'];


    $SQL_Update="UPDATE 
                    persona p, direccion d, ciudad c, provincia pr, datos_de_contacto dc,
                    area_municipal am, rol_municipal rm, trabajador_municipal tm

                SET p.FECHA_DE_NACIMIENTO = '$fecha_nacimiento', p.ID_NACIONALIDAD = '$nacionalidad', 
                    p.INFORMACION_PERSONAL = '$informacion_personal', p.NOMBRE = '$nombre', 
                    p.APELLIDO = '$apellido',p.SEXO= '$sexo', p.CONTRASENA = '$contrasena', d.NOMBRE_CALLE ='$calle', 
                    d.NUMERO = $numero, d.BIS = $bis, c.NOMBRE_CIUDAD = '$ciudad', c.ID_PROVINCIA = '$provincia',
                    dc.TELEFONO = '$telefono', dc.CORREO_ELECTRONICO = '$mail', dc.RED_SOCIAL = '$red',
                    tm.ID_AREA_MUNICIPAL = $area, tm.ID_ROL_MUNICIPAL=$rol, tm.ESTADO_TRABAJADOR_MUNICIPAL = $estado
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
                AND
                    tm.ID_ROL_MUNICIPAL = rm.ID_ROL_MUNICIPAL
                ;";

    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
         die('<h4>Error al intentar modificar el usuario municipal.</h4>');
    }

return true;
}




?>