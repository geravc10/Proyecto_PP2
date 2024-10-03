<?php
function TraerSexo($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM sexo ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_sexo'] = $data['ID_SEXO'];
               $Usuario[$i]['descripcion_sexo'] = $data['DESCRIPCION_SEXO'];
               $i++;
       }

    return $Usuario;
}


function TraerProvincia($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM provincia";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_provincia'] = $data['ID_PROVINCIA'];
               $Usuario[$i]['nombre_provincia'] = $data['NOMBRE_PROVINCIA'];
               $i++;
       }

    return $Usuario;
}


function TraerArea($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM area_municipal ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_area_municipal'] = $data['ID_AREA_MUNICIPAL'];
               $Usuario[$i]['descripcion_area_municipal'] = $data['DESCRIPCION_AREA_MUNICIPAL'];
               $i++;
       }

    return $Usuario;
}

function TraerRol($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM rol_municipal ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_rol_municipal'] = $data['ID_ROL_MUNICIPAL'];
               $Usuario[$i]['descripcion_rol_municipal'] = $data['DESCRIPCION_ROL_MUNICIPAL'];
               $i++;
       }

    return $Usuario;
}

function TraerEspecialidad($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM especialidad ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_especialidad'] = $data['ID_ESPECIALIDAD'];
               $Usuario[$i]['descripcion_especialidad'] = $data['DESCRIPCION_ESPECIALIDAD'];
               $i++;
       }

    return $Usuario;
}

function TraerEspecieAnimal($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM especie_animal ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_especie'] = $data['ID_TIPO_ANIMAL'];
               $Usuario[$i]['descripcion_especie'] = $data['DESCRIPCION_TIPO_ANIMAL'];
               $i++;
       }

    return $Usuario;
}

function TraerRazaAnimal($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM raza_animal ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_raza'] = $data['ID_RAZA_ANIMAL'];
               $Usuario[$i]['descripcion_raza'] = $data['DESCRIPCION_RAZA_ANIMAL'];
               $i++;
       }

    return $Usuario;
}

function TraerRolAnimal($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM rol_animal ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_rol'] = $data['ID_ROL_ANIMAL'];
               $Usuario[$i]['descripcion_rol'] = $data['DESCRIPCION_ROL_ANIMAL'];
               $i++;
       }

    return $Usuario;
}

function TraerIdDuenoAnimal($vConexion,$dni)
{
    // Consulta para obtener el ID_DUENO_ANIMAL a partir del DNI
    $SQL_Verificar_Dueno = "SELECT ID_DUENO_ANIMAL FROM dueno_animal WHERE DNI = '$dni';";
    $result = mysqli_query($vConexion, $SQL_Verificar_Dueno);

    // Si se encuentra el dueño, se devuelve su ID como string
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['ID_DUENO_ANIMAL'];
    } else {
        // Si no se encuentra, devolver un valor nulo o un mensaje de error
        return null;
    }
}

function TraerAnimal($vConexion,$codigo)
{
    // Consulta para obtener el ID_ANIMAL a partir del CODIGO_ANIMAL
    $SQL_Verificar_Animal = "SELECT ID_ANIMAL FROM animal WHERE CODIGO_ANIMAL = '$codigo';";
    $result = mysqli_query($vConexion, $SQL_Verificar_Animal);

    // Si se encuentra el dueño, se devuelve su ID como string
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['ID_ANIMAL'];
    } else {
        // Si no se encuentra, devolver un valor nulo o un mensaje de error
        return null;
    }
}




?>