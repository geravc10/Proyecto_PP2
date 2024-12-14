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

function TraerNaciones($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM nacionalidad ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_nacion'] = $data['ID_NACIONALIDAD'];
               $Usuario[$i]['nombre_nacion'] = $data['PAIS'];
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

function TraerRazaAnimal($vEspecie, $vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * 
            FROM raza_animal 
            WHERE $vEspecie = ID_TIPO_ANIMAL";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_raza'] = $data['ID_RAZA_ANIMAL'];
               $Usuario[$i]['descripcion_raza'] = $data['DESCRIPCION_RAZA_ANIMAL'];
               $i++;
       }

    return $Usuario;
}

function TraerRazaAnimal_2($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * 
            FROM raza_animal 
           ";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_raza'] = $data['ID_RAZA_ANIMAL'];
               $Usuario[$i]['descripcion_raza'] = $data['DESCRIPCION_RAZA_ANIMAL'];
               $i++;
       }

    return $Usuario;
}

function TraerRolAnimal($vEspecie, $vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * 
            FROM rol_animal 
            WHERE $vEspecie = ID_TIPO_ANIMAL";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_rol'] = $data['ID_ROL_ANIMAL'];
               $Usuario[$i]['descripcion_rol'] = $data['DESCRIPCION_ROL_ANIMAL'];
               $i++;
       }

    return $Usuario;
}

function TraerRolAnimal_2($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * 
            FROM rol_animal 
            ";

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

function TraerFamilia($vConexion,$codAnimal, $idDueno)
{
        // Consulta para obtener el ID_ANIMAL a partir del CODIGO_ANIMAL
        $SQL_Verificar_Dueno = "SELECT ID_ANIMAL FROM animal WHERE CODIGO_ANIMAL = '$codAnimal';";
        $result = mysqli_query($vConexion, $SQL_Verificar_Dueno);

        // Si se encuentra el dueño, se devuelve su ID como string
        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $idAnimal = $row['ID_ANIMAL'];


                // Consulta para obtener ID_FAMILIA a partir del id_dueño animal
                $SQL_Verificar_familia = "SELECT 
                                                        ID_FAMILIA 
                                                FROM 
                                                        familia
                                                WHERE 
                                                        ID_ANIMAL = '$idAnimal'
                                                AND
                                                        ID_DUENO_ANIMAL='$idDueno'
                                                ;";
                $result = mysqli_query($vConexion, $SQL_Verificar_familia);

                // Si se encuentra el dueño, se devuelve su ID como string
                if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        return $row['ID_FAMILIA'];
                } else {
                        // Si no se encuentra, devolver un valor nulo o un mensaje de error
                        return null;
                }
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

function TraerAnimalCompleto($vConexion,$codigo)
{
        // Consulta para obtener el ID_ANIMAL a partir del CODIGO_ANIMAL
    $SQL_Verificar_Animal = "SELECT * 
    FROM animal 
    WHERE CODIGO_ANIMAL = '$codigo';";

$rs = mysqli_query($vConexion, $SQL_Verificar_Animal);

// Retornar el primer resultado directamente
if ($data = mysqli_fetch_array($rs)) {
return [
        'codigo_animal' => $data['CODIGO_ANIMAL'],
        'id_especie_animal' => $data['ID_TIPO_ANIMAL'],
        'id_raza_animal' => $data['ID_RAZA_ANIMAL'],
        'id_rol_animal' => $data['ID_ROL_ANIMAL'],
        'nombre_animal' => $data['NOMBRE_ANIMAL'],
        'estado_animal' => $data['ESTADO_ANIMAL'], 
        'estado_castracion_animal' => $data['ESTADO_CASTRACION']
        ];
}

// Si no se encuentra el animal, retornar null
return null;
}

function TraerEnfermedades($vConexion)
{

    $id_especie=$_SESSION['animal_Id_Especie'];

    $Usuario = array();
    $SQL = "SELECT * 
            FROM enfermedades
            WHERE ID_ESPECIE = $id_especie";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_enfermedad'] = $data['ID_ENFERMEDAD'];
               $Usuario[$i]['nombre_enfermedad'] = $data['NOMBRE_ENFERMEDAD'];
               $i++;
       }

    return $Usuario;
}

function TraerVeterinarios($vidVeterinario, $vConexion)
{
    $idVeterinario= $vidVeterinario;
    $Usuario = array();
    $SQL = "SELECT *   
            FROM veterinario as v, persona as p
            WHERE 
            v.ID_VETERINARIO= $idVeterinario
            AND
            v.DNI=p.DNI
            ";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario['id_veterinario'] = $data['ID_VETERINARIO'];
               $Usuario['nombre_veterinario'] = $data['NOMBRE'];
               $Usuario['apellido_veterinario'] = $data['APELLIDO'];
               $i++;
       }

    return $Usuario;
}

function TraerVeterinarios_2($vConexion)
{
    $Usuario = array();
    $SQL = "SELECT *   
            FROM veterinario as v, persona as p
            WHERE             
            v.DNI=p.DNI
            ";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_veterinario'] = $data['ID_VETERINARIO'];
               $Usuario[$i]['nombre_veterinario'] = $data['NOMBRE'];
               $Usuario[$i]['apellido_veterinario'] = $data['APELLIDO'];
               $i++;
       }

    return $Usuario;
}

function TraerIdVeterinarios($vConexion,$vDni)
{
    $Usuario = array();
    $SQL = "SELECT *   
            FROM veterinario as v, persona as p
            WHERE             
            v.DNI=p.DNI
            AND
            p.DNI=$vDni
            ";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_veterinario'] = $data['ID_VETERINARIO'];
               $Usuario[$i]['nombre_veterinario'] = $data['NOMBRE'];
               $Usuario[$i]['apellido_veterinario'] = $data['APELLIDO'];
               $i++;
       }

    return $Usuario;
}

function TraerHistorialMedico($vCodigo, $vConexion)
{
    
    $Usuario = array();
    $SQL = "SELECT * 
            FROM historial_medico
            WHERE ID_ANIMAL = $vCodigo";

    $rs = mysqli_query($vConexion, $SQL);
    
    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_historial_medico'] = $data['ID_HISTORIAL_MEDICO'];
               $Usuario[$i]['fecha_historial_medico'] = $data['FECHA_HISTORIAL'];
               $Usuario[$i]['descripcion_historial_medico'] = $data['DESCRIPCION_HISTORIAL'];
               $Usuario[$i]['vetrinario_historial_medico'] = $data['ID_VETERINARIO'];
               $Usuario[$i]['enfermedad_historial_medico'] = $data['ID_ENFERMEDAD'];
               $Usuario[$i]['vacuna_historial_medico'] = $data['ID_VACUNA'];
               $Usuario[$i]['animal_historial_medico'] = $data['ID_ANIMAL'];
               

               $i++;
       }

    return $Usuario;
}

function TraerVacunas($vEspecie, $vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * 
            FROM vacunas 
            WHERE $vEspecie = ID_ESPECIE";

    $rs = mysqli_query($vConexion, $SQL);
   

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_vacuna'] = $data['ID_VACUNA'];
               $Usuario[$i]['nombre_vacuna'] = $data['NOMBRE_VACUNA'];
               $i++;
       }

    return $Usuario;
}

function TraerCampanias($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * FROM tipo_de_campana ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
               $Usuario[$i]['id_campana'] = $data['ID_TIPO_DE_CAMPANA'];
               $Usuario[$i]['descripcion_campana'] = $data['DESCRIPCION_TIPO_CAMPANA'];
               $i++;
       }

    return $Usuario;
}

function TraerTurnosVacunacion($vConexion,$vEspecie)
{


    $Usuario = array();
    $SQL = "SELECT * 
                FROM turnos as t, campana as c
                WHERE t.ID_CAMPANA_TURNO = c.ID_CAMPANA
                AND
                c.ID_TIPO_DE_CAMPANA=1
                AND
                c.ESTADO_CAMPANA=1
                AND
                t.ESTADO_TURNO=0
                AND
                c.ID_ESPECIE='$vEspecie'
                ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
                $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];
                $Usuario[$i]['tipo_campana'] = $data['ID_TIPO_DE_CAMPANA'];
                $Usuario[$i]['descripcion_tipo_campana'] = $data['DESCRIPCION_CAMPANA'];
                $Usuario[$i]['estado_campana'] = $data['ESTADO_CAMPANA'];
                $Usuario[$i]['especie_campana'] = $data['ID_ESPECIE'];


                $Usuario[$i]['id_turno'] = $data['ID_TURNO'];
                $Usuario[$i]['id_campana_turno'] = $data['ID_CAMPANA_TURNO'];
                $Usuario[$i]['fecha_turno'] = $data['FECHA_TURNO'];
                $Usuario[$i]['hora_inicio_turno'] = $data['HORA_INICIO_TURNO'];
                $Usuario[$i]['hora_fin_turno'] = $data['HORA_FIN_TURNO'];
                $Usuario[$i]['estado_turno'] = $data['ESTADO_TURNO'];

               $i++;
       }

    return $Usuario;
}

function TraerTurnosReservadosVacu($vConexion, $vCodigo)
{

    $Usuario = array();
    $SQL = "SELECT * 
                FROM 
                        turnos_reservados as tr, campana as c, turnos as t
                WHERE 
                        c.ESTADO_CAMPANA=1
                AND
                        c.ID_TIPO_DE_CAMPANA= 1
                AND
                        tr.ID_CAMPANA= c.ID_CAMPANA
                AND
                        tr.ID_ANIMAL='$vCodigo'
                AND
                        tr.ESTADO_TURNO_RESERVADO=1
                AND
                        t.ESTADO_TURNO=1
                ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
                $Usuario[$i]['id_turno_reservado'] = $data['ID_TURNO_RESERVADO'];
               $Usuario[$i]['id_turno'] = $data['ID_TURNO'];
               $Usuario[$i]['id_animal'] = $data['ID_ANIMAL'];
               $Usuario[$i]['id_dueno_animal'] = $data['ID_DUENO_ANIMAL'];
               $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];           
               $Usuario[$i]['estado_turno_reservado'] = $data['ESTADO_TURNO_RESERVADO'];    

               $i++;
       }

    return $Usuario;
}

function TraerTurnosReservadosVacuEsteAnimal($vConexion, $vCodigo)
{

    $Usuario = array();
    $SQL = "SELECT * 
                FROM 
                        turnos_reservados as tr, campana as c, turnos as t
                WHERE 
                        c.ESTADO_CAMPANA=1
                AND
                        c.ID_TIPO_DE_CAMPANA= 1
                AND
                        tr.ID_CAMPANA= c.ID_CAMPANA
                AND
                        tr.ID_TURNO= t.ID_TURNO
                AND
                        tr.ID_ANIMAL='$vCodigo'
                AND
                        tr.ESTADO_TURNO_RESERVADO=1
                AND
                        t.ESTADO_TURNO=1
                
                ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
                $Usuario[$i]['id_turno_reservado'] = $data['ID_TURNO_RESERVADO'];
               $Usuario[$i]['id_turno'] = $data['ID_TURNO'];
               $Usuario[$i]['id_animal'] = $data['ID_ANIMAL'];
               $Usuario[$i]['id_dueno_animal'] = $data['ID_DUENO_ANIMAL'];
               $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];           
               $Usuario[$i]['estado_turno_reservado'] = $data['ESTADO_TURNO_RESERVADO'];
               
               $Usuario[$i]['fecha_turno'] = $data['FECHA_TURNO'];
               $Usuario[$i]['hora_turno'] = $data['HORA_INICIO_TURNO'];

               $i++;
       }

    return $Usuario;
}

function TraerTurnosCastracion($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT * 
                FROM turnos as t, campana as c
                WHERE t.ID_CAMPANA_TURNO = c.ID_CAMPANA
                AND
                c.ID_TIPO_DE_CAMPANA=2
                AND
                c.ESTADO_CAMPANA=1
                AND
                t.ESTADO_TURNO=0
                
                ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
                $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];
                $Usuario[$i]['tipo_campana'] = $data['ID_TIPO_DE_CAMPANA'];
                $Usuario[$i]['descripcion_tipo_campana'] = $data['DESCRIPCION_CAMPANA'];
                $Usuario[$i]['estado_campana'] = $data['ESTADO_CAMPANA'];
                $Usuario[$i]['especie_campana'] = $data['ID_ESPECIE'];


                $Usuario[$i]['id_turno'] = $data['ID_TURNO'];
                $Usuario[$i]['id_campana_turno'] = $data['ID_CAMPANA_TURNO'];
                $Usuario[$i]['fecha_turno'] = $data['FECHA_TURNO'];
                $Usuario[$i]['hora_inicio_turno'] = $data['HORA_INICIO_TURNO'];
                $Usuario[$i]['hora_fin_turno'] = $data['HORA_FIN_TURNO'];
                $Usuario[$i]['estado_turno'] = $data['ESTADO_TURNO'];

               $i++;
       }

    return $Usuario;
}

function TraerTurnosReservadosCast($vConexion, $vCodigo)
{

    $Usuario = array();
    $SQL = "SELECT * 
                FROM 
                        turnos_reservados as tr, campana as c, turnos as t
                WHERE 
                        c.ESTADO_CAMPANA=1
                AND
                        c.ID_TIPO_DE_CAMPANA=2
                AND
                        tr.ID_CAMPANA= c.ID_CAMPANA
                AND
                        tr.ID_ANIMAL='$vCodigo'
                AND
                        tr.ESTADO_TURNO_RESERVADO=1
                AND
                        t.ESTADO_TURNO=1
                ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
                $Usuario[$i]['id_turno_reservado'] = $data['ID_TURNO_RESERVADO'];
               $Usuario[$i]['id_turno'] = $data['ID_TURNO'];
               $Usuario[$i]['id_animal'] = $data['ID_ANIMAL'];
               $Usuario[$i]['id_dueno_animal'] = $data['ID_DUENO_ANIMAL'];
               $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];           
               $Usuario[$i]['estado_turno_reservado'] = $data['ESTADO_TURNO_RESERVADO'];    

               $i++;
       }

    return $Usuario;
}

function TraerTurnosReservadosCastEsteAnimal($vConexion, $vCodigo)
{

    $Usuario = array();
    $SQL = "SELECT * 
                FROM 
                        turnos_reservados as tr, campana as c, turnos as t
                WHERE 
                        c.ESTADO_CAMPANA=1
                AND
                        c.ID_TIPO_DE_CAMPANA= 2
                AND
                        tr.ID_CAMPANA= c.ID_CAMPANA
                AND
                        tr.ID_TURNO= t.ID_TURNO
                AND
                        tr.ID_ANIMAL='$vCodigo'
                AND
                        tr.ESTADO_TURNO_RESERVADO=1
                AND
                        t.ESTADO_TURNO=1
                
                ";

    $rs = mysqli_query($vConexion, $SQL);
    
    //$data = mysqli_fetch_array($rs);

    $i=0;
       while ($data = mysqli_fetch_array($rs)) {
                $Usuario[$i]['id_turno_reservado'] = $data['ID_TURNO_RESERVADO'];
               $Usuario[$i]['id_turno'] = $data['ID_TURNO'];
               $Usuario[$i]['id_animal'] = $data['ID_ANIMAL'];
               $Usuario[$i]['id_dueno_animal'] = $data['ID_DUENO_ANIMAL'];
               $Usuario[$i]['id_campana'] = $data['ID_CAMPANA'];           
               $Usuario[$i]['estado_turno_reservado'] = $data['ESTADO_TURNO_RESERVADO'];
               
               $Usuario[$i]['fecha_turno'] = $data['FECHA_TURNO'];
               $Usuario[$i]['hora_turno'] = $data['HORA_INICIO_TURNO'];

               $i++;
       }

    return $Usuario;
}



?>