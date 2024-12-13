<?php
function CrearCampana($vConexion){

$usuario=$_SESSION['usuario_dni'];
$municipales =array();
$SQL = "SELECT * 
        FROM            
            trabajador_municipal             
        WHERE
            DNI = '$usuario'
        ";
$rs = mysqli_query($vConexion, $SQL);


$data = mysqli_fetch_array($rs);


if (!empty($data)) {
    $municipales['id'] = $data['ID_TRABAJADOR_MUNICIPAL'];
}


$idTipoCampana= $_POST['tipo_campana'];
$idTrabajadorMuni= $municipales['id']; 
$nombreCampana= $_POST['nombre_campana'];
$fechaInicio=$_POST['fecha_inicio'];
$fechaFin=$_POST['fecha_fin'];
$estado="1";
$idEspecie=$_POST['especie'];
$idVeterinario= $_POST['veterinario'];

$PrimerTurno=$_POST['horario'];
$Canturnos=$_POST['cantidad'];
$DuraTurno=$_POST['duracion'];
$InterTurno=$_POST['intervalo'];

//inserto en la tabla campana
$SQL_Insert_historial_medico="INSERT INTO 
                campana (ID_TIPO_DE_CAMPANA, ID_TRABAJADOR_MUNICIPAL, DESCRIPCION_CAMPANA, FECHA_DE_CREACION, FECHA_DE_INICIO, FECHA_DE_FIN, ESTADO_CAMPANA, ID_ESPECIE, ID_VETERINARIO, HORA_PRIMER_TURNO,CANTIDAD_TURNOS_DIAS, DURACION_TURNO, INTERVALO_ENTRE_TURNOS ) 
            VALUES
                ('$idTipoCampana',$idTrabajadorMuni, '$nombreCampana', CURDATE(), '$fechaInicio', '$fechaFin', '$estado', '$idEspecie', '$idVeterinario','$PrimerTurno','$Canturnos','$DuraTurno','$InterTurno' )                
            ;";

if (!mysqli_query($vConexion, $SQL_Insert_historial_medico)) {
//si surge un error, finalizo la ejecucion del script con un mensaje
     die('<h4>Error al intentar insertar el historial medico: ' . mysqli_error($vConexion) . '</h4>');

     
}

//A PARTIR DE ACA VAMOS A CARGAR LA TABLA TURNOS

$fechaTurno="";
$fechaInicio2 = new DateTime($_POST['fecha_inicio']);
$fechaFin2=new DateTime($_POST['fecha_fin']);
$horaInicio=$_POST['horario'];
$horaFin="";// hacer funcion para que calcule la hora del fin del turno. QUIZAS NO SE USA
$Duracion= $_POST['duracion'];
$intervalo= $_POST['intervalo'];
$cantidad= $_POST['cantidad'];
$estadoTurno="libre";
$idCampana = mysqli_insert_id($vConexion);

// Convertimos la hora de inicio a un objeto DateTime
$horaInicio = DateTime::createFromFormat('H:i', $horaInicio);

// Ciclo para generar los turnos por cada día entre $fechaInicio y $fechaFin
while ($fechaInicio2 <= $fechaFin2) {
    $horaActual = clone $horaInicio; // Copia para no sobrescribir

    // Generar los turnos para cada día
    for ($i = 0; $i < $cantidad; $i++) {
        // Calcular la hora de fin del turno sumando la duración
        $horaFin = clone $horaActual;
        $horaFin->modify("+$Duracion minutes");

        // Insertar el turno en la base de datos
        $SQL_Insert_turno = "INSERT INTO 
        turnos (ID_CAMPANA_TURNO, FECHA_TURNO, HORA_INICIO_TURNO, HORA_FIN_TURNO, ESTADO_TURNO) 
    VALUES ($idCampana, '" . $fechaInicio2->format('Y-m-d') . "', '" . $horaActual->format('H:i') . "', '" . $horaFin->format('H:i') . "', '$estadoTurno');";
        if (!mysqli_query($vConexion, $SQL_Insert_turno)) {
            die('<h4>Error al intentar insertar el turno: ' . mysqli_error($vConexion) . '</h4>');
        }

        // Incrementar la hora del turno según el intervalo
        $horaActual = clone $horaFin; 
        $horaActual->modify("+$intervalo minutes");
    }

    // Avanzar al siguiente día
    $fechaInicio2->modify('+1 day');
}

return true;
}