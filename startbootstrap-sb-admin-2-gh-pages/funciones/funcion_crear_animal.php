<?php
function CrearAnimal($vConexion,$id_dueno_animal){

     //datos personales
     $IdEspecie = $_SESSION['especie_creacion_animal'];
     $Codigo = $_POST['codigo'];
     $IdRaza = $_POST['raza'];
     $IdRol = $_POST['rol'];
     $nombre_animal = $_POST['nombre'];    
     $dni_dueño = $_POST['dni'];
     $descripcion_familia = $_POST['descripcion'];
     $idVac1 = $_SESSION['vac1'];
     $idVac2 = $_SESSION['vac2'];
    
     
    
    $veterinarioId = "1";
    $enfermedad = "1";
    $descripcion = NULL;
  
     $estado_animal = "";
     if($_POST['estado']=="si"){
        $estado_animal="1";
    }else{
        $estado_animal="0";
    }

    $castracion = "";
     if($_POST['castracion']=="si"){
        $castracion="1";
    }else{
        $castracion="0";
    }


/*
busco el id del dueño del animal
*/    


     
/*
seccion animal
*/
    //inserto en la tabla animal
    $SQL_Insert_Animal="INSERT INTO 
        animal (ID_TIPO_ANIMAL, CODIGO_ANIMAL, ID_RAZA_ANIMAL, ID_ROL_ANIMAL, NOMBRE_ANIMAL, ESTADO_ANIMAL, ESTADO_CASTRACION) 
        VALUES
        ('$IdEspecie', '$Codigo','$IdRaza', '$IdRol', '$nombre_animal', '$estado_animal', '$castracion')                
    ;";

    if (!mysqli_query($vConexion, $SQL_Insert_Animal)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar el animal.</h4>');
    }

    $id_animal = mysqli_insert_id($vConexion);

    //inserto en la tabla familia
    $SQL_Insert_Familia="INSERT INTO 
         familia (ID_ANIMAL, ID_DUENO_ANIMAL, DESCRPCION_FAMILIA) 
        VALUES
        ('$id_animal','$id_dueno_animal','$descripcion_familia')                
    ;";

    /*if (!mysqli_query($vConexion, $SQL_Insert_Familia)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
    die('<h4>Error al intentar insertar la familia.</h4>');
    }*/

    if (!mysqli_query($vConexion, $SQL_Insert_Familia)) {
        die('<h4>Error al intentar insertar la familia.</h4>' . mysqli_error($vConexion));
    }

    //inserto en la tabla historial_medico
        $SQL_Insert_historial_medico="INSERT INTO 
                                        historial_medico (ID_ANIMAL, FECHA_HISTORIAL, DESCRIPCION_HISTORIAL, ID_VETERINARIO, ID_ENFERMEDAD, ID_VACUNA, ID_VACUNA_2) 
                                    VALUES
                                        ('$id_animal',CURDATE(), '$descripcion', '$veterinarioId', '$enfermedad', '$idVac1', '$idVac2')                
                                        ;";

        if (!mysqli_query($vConexion, $SQL_Insert_historial_medico)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el historial medico: ' . mysqli_error($vConexion) . '</h4>');


}
    
    
    return true;

}
?>