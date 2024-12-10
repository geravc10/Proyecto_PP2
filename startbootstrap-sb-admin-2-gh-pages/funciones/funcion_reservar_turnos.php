<?php
function ReservarTurno($vConexion){

     //datos personales
     $idTurno =$_POST['turno'] ;
     $idAnimal = $_SESSION['apto_vacuna_codigo'];
     $idDuenoAnimal=$_POST['id_dueno_animal'];  
     $idCampana =$_POST['id_campana'] ;
     $estadoTurnoReserva = 1;
     

     

    //inserto en la tabla turnos_reservados
    $SQL_Insert_turnos_reservados="INSERT INTO 
                                    turnos_reservados(ID_TURNO, ID_ANIMAL, ID_DUENO_ANIMAL, ID_CAMPANA, ESTADO_TURNO_RESERVADO) 
                                VALUES
                                    ('$idTurno','$idAnimal', '$idDuenoAnimal','$idCampana','$estadoTurnoReserva')                
                        ;";

    if (!mysqli_query($vConexion, $SQL_Insert_turnos_reservados)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar el turno reservado'. mysqli_error($vConexion) .'</h4>');
    }

    
    //cambio el estado del turno en la tabla turnos.
    $SQL_Update="UPDATE 
                    turnos
                SET 
                    ESTADO_TURNO = '1'                    
                WHERE 
                    ID_TURNO = '$idTurno'                                    
                ;";

    if (!mysqli_query($vConexion, $SQL_Update)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar modificar el Turno.</h4>');
    }
    
    return true;

}


function ReservarTurnoCast($vConexion){

    //datos personales
    $idTurno =$_POST['turno'] ;
    $idAnimal = $_SESSION['apto_castracion_codigo'];
    $idDuenoAnimal=$_POST['id_dueno_animal'];  
    $idCampana =$_POST['id_campana'] ;
    $estadoTurnoReserva = 1;
    

    

   //inserto en la tabla turnos_reservados
   $SQL_Insert_turnos_reservados="INSERT INTO 
                                   turnos_reservados(ID_TURNO, ID_ANIMAL, ID_DUENO_ANIMAL, ID_CAMPANA, ESTADO_TURNO_RESERVADO) 
                               VALUES
                                   ('$idTurno','$idAnimal', '$idDuenoAnimal','$idCampana','$estadoTurnoReserva')                
                       ;";

   if (!mysqli_query($vConexion, $SQL_Insert_turnos_reservados)) {
   //si surge un error, finalizo la ejecucion del script con un mensaje
   die('<h4>Error al intentar insertar el turno reservado'. mysqli_error($vConexion) .'</h4>');
   }

   
   //cambio el estado del turno en la tabla turnos.
   $SQL_Update="UPDATE 
                   turnos
               SET 
                   ESTADO_TURNO = '1'                    
               WHERE 
                   ID_TURNO = '$idTurno'                                    
               ;";

   if (!mysqli_query($vConexion, $SQL_Update)) {
   //si surge un error, finalizo la ejecucion del script con un mensaje
   die('<h4>Error al intentar modificar el Turno.</h4>');
   }
   
   return true;

}
?>