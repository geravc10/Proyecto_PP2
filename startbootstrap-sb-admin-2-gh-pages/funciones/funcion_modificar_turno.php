<?php

function ModificarTurnoVacu($vConexion,$vTurnoViejo,$vturnoNuevo){

    
   //cambio el estado del turno en la tabla turnos.
   $SQL_Update="UPDATE 
                   turnos_reservados as tr, turnos as t
               SET 
                   tr.ESTADO_TURNO_RESERVADO = '0', t.ESTADO_TURNO='0'                      
               WHERE 
                   tr.ID_TURNO = '$vTurnoViejo' 
                AND
                    t.ID_TURNO = '$vTurnoViejo'                                    
               ;";

   if (!mysqli_query($vConexion, $SQL_Update)) {
   //si surge un error, finalizo la ejecucion del script con un mensaje
   die('<h4>Error al intentar modificar el Turno. dar de baja</h4>');
   }

   
 
   
   return true;

}

function ModificarTurnoCast($vConexion,$vTurnoViejo,$vturnoNuevo){

    
    //cambio el estado del turno en la tabla turnos.
    $SQL_Update="UPDATE 
                    turnos_reservados as tr, turnos as t
                SET 
                    tr.ESTADO_TURNO_RESERVADO = '0', t.ESTADO_TURNO='0'                      
                WHERE 
                    tr.ID_TURNO = '$vTurnoViejo' 
                 AND
                     t.ID_TURNO = '$vTurnoViejo'                                    
                ;";
 
    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar modificar el Turno. dar de baja</h4>');
    }
 
    
  
    
    return true;
 
}

function BajaTurnoCast($vConexion,$vTurnoViejo){

    
    //cambio el estado del turno en la tabla turnos.
    $SQL_Update="UPDATE 
                    turnos_reservados as tr, turnos as t
                SET 
                    tr.ESTADO_TURNO_RESERVADO = '0', t.ESTADO_TURNO='0'                      
                WHERE 
                    tr.ID_TURNO = '$vTurnoViejo' 
                 AND
                     t.ID_TURNO = '$vTurnoViejo'                                    
                ;";
 
    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar modificar el Turno. dar de baja</h4>');
    }
 
    
  
    
    return true;
 
}

function BajaTurnoVacu($vConexion,$vTurnoViejo){

    
    //cambio el estado del turno en la tabla turnos.
    $SQL_Update="UPDATE 
                    turnos_reservados as tr, turnos as t
                SET 
                    tr.ESTADO_TURNO_RESERVADO = '0', t.ESTADO_TURNO='0'                      
                WHERE 
                    tr.ID_TURNO = '$vTurnoViejo' 
                 AND
                     t.ID_TURNO = '$vTurnoViejo'                                    
                ;";
 
    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar modificar el Turno. dar de baja</h4>');
    }
 
    
  
    
    return true;
 
}

function TurnoAtendido($vConexion,$vTurnoViejo){

    
    //cambio el estado del turno en la tabla turnos.
    $SQL_Update="UPDATE 
                    turnos_reservados as tr
                SET 
                    tr.ESTADO_TURNO_RESERVADO = 2                     
                WHERE 
                    tr.ID_TURNO_RESERVADO = '$vTurnoViejo' 
                                                    
                ;";
 
    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar modificar el Turno. dar de baja</h4>');
    }
 
    
  
    
    return true;
 
}

?>

