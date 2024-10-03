<?php

function ModificarAnimal($vConexion, $vId){

//datos personales
$nombre = $_POST['nombre'];
$raza = $_POST['raza'];
$rol = $_POST['rol'];
$descripcion = $_POST['descripcion'];

if($_POST['estado']=="no"){
    $estado="0";
}else{
    $estado = "1";
}



    $SQL_Update="UPDATE 
                    animal a, familia f

                SET a.NOMBRE_ANIMAL = '$nombre', a.ID_RAZA_ANIMAL='$raza', a.ID_ROL_ANIMAL='$rol', 
                a.ESTADO_ANIMAL='$estado', f.DESCRPCION_FAMILIA='$descripcion'
                      
                WHERE 
                    a.ID_ANIMAL = '$vId'
                AND
                    f.ID_ANIMAL = a.ID_ANIMAL                    
                ;";

    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
         die('<h4>Error al intentar modificar el Animal.</h4>');
    }

return true;
}
?>