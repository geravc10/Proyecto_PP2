<?php

function ModificarDuenioAnimal($vConexion){

//datos personales
$fecha_nacimiento = $_POST['fecha'];
$nacionalidad = $_POST['nacionalidad'];
$informacion_personal = $_POST['informacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$dni = $_SESSION['duenio_dni'];
$contrasena = $_POST['contrasena'];

//direccion
$calle = $_POST['calle'] ;
$numero = $_POST['numero'];
$ciudad = $_POST['ciudad'];
$provincia = $_POST['provincia'];
$bis = $_POST['bis'];

//datos de contacto

$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$red = $_POST['red'];

if($_POST['estado']=="2"){
    $estado="0";
}else{
    $estado = $_POST['estado'];
}



    $SQL_Update="UPDATE 
                    persona p, direccion d, ciudad c, provincia pr, datos_de_contacto dc,
                    dueno_animal da
                    

                SET p.FECHA_DE_NACIMIENTO = '$fecha_nacimiento', p.ID_NACIONALIDAD = '$nacionalidad', 
                    p.INFORMACION_PERSONAL = '$informacion_personal', p.NOMBRE = '$nombre', 
                    p.APELLIDO = '$apellido',p.SEXO= '$sexo', p.CONTRASENA = '$contrasena', d.NOMBRE_CALLE ='$calle', 
                    d.NUMERO = $numero, d.BIS = $bis, c.NOMBRE_CIUDAD = '$ciudad', c.ID_PROVINCIA = '$provincia',
                    dc.TELEFONO = '$telefono', dc.CORREO_ELECTRONICO = '$mail', dc.RED_SOCIAL = '$red',
                    da.ESTADO_DUENO_ANIMAL = $estado  
                    
                    
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
                    p.DNI = da.DNI
                    
                ;";

    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
         die('<h4>Error al intentar modificar el usuario municipal.</h4>');
    }

return true;
}




?>