<?php

function DatosCampanias($vConexion)
{
    $Usuario = array();
    $SQL = "SELECT *
        FROM
            campana 
        WHERE
            ESTADO_CAMPANA=1                      
    ";
    // Ejecutar la consulta
    $rs = mysqli_query($vConexion, $SQL);

    // Validar que la consulta se ejecute correctamente
    if ($rs) {
        $i = 0;
        // Iterar sobre los resultados y almacenarlos en el array
        while ($data = mysqli_fetch_array($rs)) {
            $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];
            $Usuario[$i]['id_tipo_campana'] = $data['ID_TIPO_DE_CAMPANA'];
            $Usuario[$i]['id_municipal_campana'] = $data['ID_TRABAJADOR_MUNICIPAL'];
            $Usuario[$i]['descripcion_campana'] = $data['DESCRIPCION_CAMPANA'];
            $Usuario[$i]['fecha_creacion_campana'] = $data['FECHA_DE_CREACION'];
            $Usuario[$i]['fecha_inicio_campana'] = $data['FECHA_DE_INICIO'];
            $Usuario[$i]['fecha_fin_campana'] = $data['FECHA_DE_FIN'];
            $Usuario[$i]['estado_campana'] = $data['ESTADO_CAMPANA'];
            $Usuario[$i]['id_especie_campana'] = $data['ID_ESPECIE'];
            $Usuario[$i]['id_veterinario_campana'] = $data['ID_VETERINARIO'];
            $Usuario[$i]['primer_turno_campana'] = $data['HORA_PRIMER_TURNO'];
            $Usuario[$i]['canitdad_turno_campana'] = $data['CANTIDAD_TURNOS_DIAS'];
            $Usuario[$i]['duracion_turno_campana'] = $data['DURACION_TURNO'];
            $Usuario[$i]['intervalo_turno_campana'] = $data['INTERVALO_ENTRE_TURNOS'];

            $i++;
        }
    } else {
        // Manejar errores en caso de que la consulta falle
        echo "Error en la consulta: " . mysqli_error($vConexion);
    }

    return $Usuario;
}


function DatosCampanias_2($vConexion, $vId)
{
    $Usuario = array();
    $SQL = "SELECT *
        FROM
            campana 
        WHERE
            ID_CAMPANA='$vId'
        
                           
    ";
    // Ejecutar la consulta
    $rs = mysqli_query($vConexion, $SQL);

    // Validar que la consulta se ejecute correctamente
    if ($rs) {
        $i = 0;
        // Iterar sobre los resultados y almacenarlos en el array
        while ($data = mysqli_fetch_array($rs)) {
            $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];
            $Usuario[$i]['id_tipo_campana'] = $data['ID_TIPO_DE_CAMPANA'];
            $Usuario[$i]['id_municipal_campana'] = $data['ID_TRABAJADOR_MUNICIPAL'];
            $Usuario[$i]['descripcion_campana'] = $data['DESCRIPCION_CAMPANA'];
            $Usuario[$i]['fecha_creacion_campana'] = $data['FECHA_DE_CREACION'];
            $Usuario[$i]['fecha_inicio_campana'] = $data['FECHA_DE_INICIO'];
            $Usuario[$i]['fecha_fin_campana'] = $data['FECHA_DE_FIN'];
            $Usuario[$i]['estado_campana'] = $data['ESTADO_CAMPANA'];
            $Usuario[$i]['id_especie_campana'] = $data['ID_ESPECIE'];
            $Usuario[$i]['id_veterinario_campana'] = $data['ID_VETERINARIO'];
            $Usuario[$i]['primer_turno_campana'] = $data['HORA_PRIMER_TURNO'];
            $Usuario[$i]['canitdad_turno_campana'] = $data['CANTIDAD_TURNOS_DIAS'];
            $Usuario[$i]['duracion_turno_campana'] = $data['DURACION_TURNO'];
            $Usuario[$i]['intervalo_turno_campana'] = $data['INTERVALO_ENTRE_TURNOS'];

            $i++;
        }
    } else {
        // Manejar errores en caso de que la consulta falle
        echo "Error en la consulta: " . mysqli_error($vConexion);
    }

    return $Usuario;
}


function DatosCampanias_3($vConexion, $vId)
{
    $Usuario = array();
    $SQL = "SELECT *
        FROM
            campana 
        WHERE
            ID_CAMPANA='$vId'
        AND
            ESTADO_CAMPANA=1
                           
    ";
    // Ejecutar la consulta
    $rs = mysqli_query($vConexion, $SQL);

    
    // Validar que la consulta se ejecute correctamente
    if ($rs) {
        $i = 0;
        // Iterar sobre los resultados y almacenarlos en el array
        while ($data = mysqli_fetch_array($rs)) {
            $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];
            $Usuario[$i]['id_tipo_campana'] = $data['ID_TIPO_DE_CAMPANA'];
            $Usuario[$i]['id_municipal_campana'] = $data['ID_TRABAJADOR_MUNICIPAL'];
            $Usuario[$i]['descripcion_campana'] = $data['DESCRIPCION_CAMPANA'];
            $Usuario[$i]['fecha_creacion_campana'] = $data['FECHA_DE_CREACION'];
            $Usuario[$i]['fecha_inicio_campana'] = $data['FECHA_DE_INICIO'];
            $Usuario[$i]['fecha_fin_campana'] = $data['FECHA_DE_FIN'];
            $Usuario[$i]['estado_campana'] = $data['ESTADO_CAMPANA'];
            $Usuario[$i]['id_especie_campana'] = $data['ID_ESPECIE'];
            $Usuario[$i]['id_veterinario_campana'] = $data['ID_VETERINARIO'];
            $Usuario[$i]['primer_turno_campana'] = $data['HORA_PRIMER_TURNO'];
            $Usuario[$i]['canitdad_turno_campana'] = $data['CANTIDAD_TURNOS_DIAS'];
            $Usuario[$i]['duracion_turno_campana'] = $data['DURACION_TURNO'];
            $Usuario[$i]['intervalo_turno_campana'] = $data['INTERVALO_ENTRE_TURNOS'];

            $i++;
        }
        
    } else {
        // Manejar errores en caso de que la consulta falle
        echo "Error en la consulta: " . mysqli_error($vConexion);
    }

    return $Usuario;
}


?>