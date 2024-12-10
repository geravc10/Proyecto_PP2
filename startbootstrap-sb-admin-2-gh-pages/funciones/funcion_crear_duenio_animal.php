<?php
function CrearDuenioAnimal($vConexion){

     //datos personales
     $fecha_nacimiento = $_POST['fecha'];
     $nacionalidad = $_POST['nacionalidad'];
     $informacion_personal = $_POST['informacion'];
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $sexo = $_POST['sexo'];
     $dni = $_POST['dni'];
     $contrasena = $_POST['contrasena'];
     
     //direccion
     $calle = $_POST['calle'] ;
     $numero = $_POST['numero'];
     $ciudad = $_POST['ciudad'];
     $provincia = $_POST['provincia'];
     $bis="";
    if($_POST['bis']=="si"){
        $bis="1";
    }else{
        $bis="0";
    }
    
     
     //datos de contacto
     $telefono = $_POST['telefono'];
     $mail = $_POST['mail'];
     $red = $_POST['red'];

     //datos finales
     $estado = "";
     if($_POST['estado']=="si"){
        $estado="1";
    }else{
        $estado="0";
    }


     
/*
seccion direccion
*/
    //inserto en la tabla ciudad
    $SQL_Insert_Ciudad="INSERT INTO 
        ciudad (ID_PROVINCIA, NOMBRE_CIUDAD) 
        VALUES
        ('$provincia','$ciudad')                
    ;";

    if (!mysqli_query($vConexion, $SQL_Insert_Ciudad)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar la ciudad.</h4>');
    }

    $id_ciudad = mysqli_insert_id($vConexion);

    //inserto en la tabla direccion
    $SQL_Insert_Direccion="INSERT INTO 
        direccion (ID_CIUDAD, NOMBRE_CALLE, NUMERO, BIS) 
        VALUES
        ('$id_ciudad','$calle',$numero,$bis)                
    ;";

    if (!mysqli_query($vConexion, $SQL_Insert_Direccion)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar la direccion.</h4>');
    }

    $id_direccion = mysqli_insert_id($vConexion); //usar esta para la tabla persona

 /*
 seccion datos de contacto
 */

    //inserto en la tabla datos_de_contacto
    $SQL_Insert_Contacto="INSERT INTO 
        datos_de_contacto (TELEFONO, CORREO_ELECTRONICO, RED_SOCIAL) 
        VALUES
        ('$telefono','$mail','$red')                
    ;";

    if (!mysqli_query($vConexion, $SQL_Insert_Contacto)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar los datos de contacto.</h4>');
    }

    $id_datos_de_contacto = mysqli_insert_id($vConexion); //usar esta para la tabla persona

/*
 seccion datos personales
 */

    //inserto en la tabla persona
    $SQL_Insert_Persona="INSERT INTO 
        persona (FECHA_DE_NACIMIENTO, ID_NACIONALIDAD, INFORMACION_PERSONAL, NOMBRE, APELLIDO,
        SEXO, DNI, ID_DIRECCION, ESTADO_PERSONA, ID_DATOS_DE_CONTACTO, CONTRASENA, ID_NIVEL) 
        VALUES
        ('$fecha_nacimiento','$nacionalidad','$informacion_personal', '$nombre', '$apellido', 
        '$sexo', '$dni', '$id_direccion', '1', '$id_datos_de_contacto', '$contrasena', '4')                
    ;";

    if (!mysqli_query($vConexion, $SQL_Insert_Persona)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar los datos personales: ' . mysqli_error($vConexion) . '</h4>');
    }

/*
seccion datos finales    
*/
    //inserto en la tabla  dueno_animal
    $SQL_Insert_Dueno="INSERT INTO 
         dueno_animal (ESTADO_DUENO_ANIMAL, DNI) 
        VALUES
        ('$estado','$dni')                
    ;";

    if (!mysqli_query($vConexion, $SQL_Insert_Dueno)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar los datos del dueño de animal.</h4>');
    }
    
    return true;

}
?>