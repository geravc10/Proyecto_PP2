<?php

function ModificarCampana($vConexion, $vId){

//datos campaña

$nombre = $_POST['nombre_campana'];
$tipo = $_POST['tipo_campana'];
$especie = $_POST['especie'];
$veterinario = $_POST['veterinario'];
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'] ;
$horario = $_POST['horario'];
$cantidad = $_POST['cantidad'];
$duracion = $_POST['duracion'];
$intervalo = $_POST['intervalo'];




    $SQL_Update="UPDATE 
                    campana
                SET ID_TIPO_DE_CAMPANA = '$tipo', 
                    DESCRIPCION_CAMPANA = '$nombre', 
                    FECHA_DE_INICIO = '$fechaInicio', FECHA_DE_FIN= '$fechaFin', ID_ESPECIE = '$especie',
                    ID_VETERINARIO = '$veterinario', HORA_PRIMER_TURNO = '$horario', CANTIDAD_TURNOS_DIAS = '$cantidad',
                    DURACION_TURNO = '$duracion', INTERVALO_ENTRE_TURNOS = '$intervalo'
                WHERE 
                    ID_CAMPANA = '$vId'
                
                ;";

    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
         die('<h4>Error al intentar modificar el usuario municipal.</h4>');
    }

return true;
}




?>