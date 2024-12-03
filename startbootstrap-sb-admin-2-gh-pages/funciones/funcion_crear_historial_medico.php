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

function CrearHistorial_vac($vConexion){

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
    
    $CodigoAnimal= $_SESSION['animal_Codigo_Animal'];
    $animal = $_SESSION['animal_Id'];
    $veterinarioId = (string) $veterinario['id'];
    $vacuna = "";
    $descripcion = $_POST['descripcion'];
    $especie_id= $_SESSION['animal_Id_Especie'];
    $enfermedad="";
    $castracion="";

    if(isset($_POST['castracion'])){
        switch ($especie_id) {
            case 1: // Por ejemplo, especie 1
                $enfermedad = "19";
                break;
            case 2: // Por ejemplo, especie 2
                $enfermedad = "20";
                break;
            case 3: // Por ejemplo, especie 3
                $enfermedad = "21";
                break;
            default:
                $enfermedad = "19"; // Valor por defecto
                break;
        }
    }else{
        switch ($especie_id) {
            case 1: // Por ejemplo, especie 1
                $enfermedad = "16";
                break;
            case 2: // Por ejemplo, especie 2
                $enfermedad = "17";
                break;
            case 3: // Por ejemplo, especie 3
                $enfermedad = "18";
                break;
            default:
                $enfermedad = "16"; // Valor por defecto
                break;
        }
    }
    

    if(isset($_POST['castracion'])){
        switch ($especie_id) {
            case 1: // Por ejemplo, especie 1
                $vacuna = "7";
                break;
            case 2: // Por ejemplo, especie 2
                $vacuna = "8";
                break;
            case 3: // Por ejemplo, especie 3
                $vacuna = "9";
                break;
            default:
                $vacuna = "7"; // Valor por defecto
                break;
        }
    }else{
        $vacuna = $_POST['enfermedadSeleccionada'];
    }

    if(isset($_POST['castracion'])){
        $castracion="1";
    }else{
        $castracion="0";
    }
    
    
    //inserto en la tabla historial_medico
    $SQL_Insert_historial_medico="INSERT INTO 
                    historial_medico (ID_ANIMAL, FECHA_HISTORIAL, DESCRIPCION_HISTORIAL, ID_VETERINARIO, ID_ENFERMEDAD, ID_VACUNA) 
                VALUES
                    ('$animal',CURDATE(), '$descripcion', '$veterinarioId', '$enfermedad', '$vacuna')                
                ;";
    
    if (!mysqli_query($vConexion, $SQL_Insert_historial_medico)) {
    //si surge un error, finalizo la ejecucion del script con un mensaje
         die('<h4>Error al intentar insertar el historial medico: ' . mysqli_error($vConexion) . '</h4>');
    
         
    }

    $SQL_Update="UPDATE 
                    animal
                SET 
                    ESTADO_CASTRACION = '$castracion'
                WHERE 
                    CODIGO_ANIMAL = '$CodigoAnimal'
                                   
                ;";

                if (!mysqli_query($vConexion, $SQL_Update)) {
                //si surge un error, finalizo la ejecucion del script con un mensaje
                die('<h4>Error al intentar modificar el Animal.</h4>');
                }
    
    
    return true;
    }








?>