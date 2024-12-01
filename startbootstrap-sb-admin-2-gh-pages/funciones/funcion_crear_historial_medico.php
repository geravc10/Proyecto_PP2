<?php
function CrearHistorial($vConexion){

$usuario=$_SESSION['usuario_dni'];
$veterinario =array();
$SQL = "SELECT * 
        FROM            
            veterinario             
        WHERE
            DNI = '$usuario'
        ";
$rs = mysqli_query($vConexion, $SQL);


$data = mysqli_fetch_array($rs);


if (!empty($data)) {
    $veterinario['id'] = $data['ID_VETERINARIO'];
}

$animal = $_SESSION['animal_Id'];
$veterinarioId = (string) $veterinario['id'];
$enfermedad = $_POST['enfermedadSeleccionada'];
$descripcion = $_POST['descripcion'];



//inserto en la tabla historial_medico
$SQL_Insert_historial_medico="INSERT INTO 
                historial_medico (ID_ANIMAL, FECHA_HISTORIAL, DESCRIPCION_HISTORIAL, ID_VETERINARIO, ID_ENFERMEDAD) 
            VALUES
                ('$animal',CURDATE(), '$descripcion', '$veterinarioId', '$enfermedad')                
            ;";

if (!mysqli_query($vConexion, $SQL_Insert_historial_medico)) {
//si surge un error, finalizo la ejecucion del script con un mensaje
     die('<h4>Error al intentar insertar el historial medico: ' . mysqli_error($vConexion) . '</h4>');

     
}


return true;
}





?>