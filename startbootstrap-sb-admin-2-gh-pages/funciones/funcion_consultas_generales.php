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



?>