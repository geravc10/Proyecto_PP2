<?php

function ConsultaTurno($vConexion, $vId)
{
    $Usuario = array();
    $SQL = "SELECT *
        FROM
            turnos_reservados as tr,
            turnos as t,
            campana as c
        WHERE
            tr.ID_ANIMAL='$vId'
        AND
            tr.ID_TURNO=t.ID_TURNO
        AND
            t.ID_CAMPANA_TURNO=c.ID_CAMPANA
        AND 
            c.ESTADO_CAMPANA=1
        
                           
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
            
            $Usuario[$i]['fecha_turno_campana'] = $data['FECHA_TURNO'];
            $Usuario[$i]['hora_turno_campana'] = $data['HORA_INICIO_TURNO'];
            $Usuario[$i]['id_turno_campana'] = $data['ID_TURNO_RESERVADO'];

            $i++;
        }
        
    } else {
        // Manejar errores en caso de que la consulta falle
        echo "Error en la consulta: " . mysqli_error($vConexion);
    }

    return $Usuario;
}

function ConsultaTurnoVete($vConexion, $vId)
{
    $Usuario = array();
    $SQL = "SELECT tc.DESCRIPCION_TIPO_CAMPANA, t.FECHA_TURNO, t.HORA_INICIO_TURNO,tr.ID_ANIMAL,
                     a.NOMBRE_ANIMAL, p.NOMBRE, p.APELLIDO, dc.TELEFONO, ea.DESCRIPCION_TIPO_ANIMAL,tr.ID_TURNO_RESERVADO
        FROM
            turnos_reservados as tr,
            turnos as t,
            campana as c,
            tipo_de_campana as tc,
			animal as a,
            persona as p,  
            dueno_animal as da,
            datos_de_contacto as dc,
            especie_animal as ea
            
        WHERE
            c.ID_VETERINARIO='$vId'
        AND
            c.ESTADO_CAMPANA=1
        AND
            t.ID_CAMPANA_TURNO=c.ID_CAMPANA
        AND
            t.ESTADO_TURNO=1
        AND
            tr.ID_TURNO=t.ID_TURNO
        AND
            tr.ESTADO_TURNO_RESERVADO=1
        AND
            tc.ID_TIPO_DE_CAMPANA = c.ID_TIPO_DE_CAMPANA
		AND 
			a.CODIGO_ANIMAL=tr.ID_ANIMAL
        AND
            tr.ID_DUENO_ANIMAL = da.ID_DUENO_ANIMAL
        AND
            da.DNI = p.DNI
        AND
            p.ID_DATOS_DE_CONTACTO= dc.ID_DATOS_DE_CONTACTO
        AND
            ea.ID_TIPO_ANIMAL= a.ID_TIPO_ANIMAL      
        
                           
    ";
    // Ejecutar la consulta
    $rs = mysqli_query($vConexion, $SQL);

    
    // Validar que la consulta se ejecute correctamente
    if ($rs) {
        $i = 0;
        // Iterar sobre los resultados y almacenarlos en el array
        while ($data = mysqli_fetch_array($rs)) {
            $Usuario[$i]['tipo_atencion_turno_dado'] = $data['DESCRIPCION_TIPO_CAMPANA'];
            $Usuario[$i]['fecha_turno_dado'] = $data['FECHA_TURNO'];
            $Usuario[$i]['hora_turno_dado'] = $data['HORA_INICIO_TURNO'];
            $Usuario[$i]['id_animal_turno_dado'] = $data['ID_ANIMAL'];
            $Usuario[$i]['nombre_animal_turno_dado'] = $data['NOMBRE_ANIMAL'];
            $Usuario[$i]['nombre_dueno_turno_dado'] = $data['NOMBRE'];
            $Usuario[$i]['apellido_dueno_turno_dado'] = $data['APELLIDO'];
            $Usuario[$i]['telefono_dueno_turno_dado'] = $data['TELEFONO']; 
            $Usuario[$i]['especie_animal_turno_dado'] = $data['DESCRIPCION_TIPO_ANIMAL'];
            $Usuario[$i]['id_turno_dado'] = $data['ID_TURNO_RESERVADO'];           
         

            $i++;
        }
        
    } else {
        // Manejar errores en caso de que la consulta falle
        echo "Error en la consulta: " . mysqli_error($vConexion);
    }

    return $Usuario;
}

?>