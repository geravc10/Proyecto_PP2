<?php

function DatosCampana($vConexion)
{
    $Usuario = array();

    // Consulta 1: Cantidad histórica de campañas realizadas
    $SQL = "SELECT COUNT(ID_CAMPANA) AS cantidad_historica_de_campanas
            FROM campana;";
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_historica_de_campanas'] = $data['cantidad_historica_de_campanas'];
    }

    // Consulta 2: Cantidad histórica de campañas de vacunación
    $SQL = "SELECT COUNT(ID_CAMPANA) AS cantidad_historica_de_campanas_vacunacion
            FROM campana
            WHERE ID_TIPO_DE_CAMPANA = 1;"; // Solo las campañas de vacunación
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_historica_de_campanas_vacunacion'] = $data['cantidad_historica_de_campanas_vacunacion'];
    }

    // Consulta 3: Cantidad histórica de campañas de castración
    $SQL = "SELECT COUNT(ID_CAMPANA) AS cantidad_historica_de_campanas_castracion
            FROM campana
            WHERE ID_TIPO_DE_CAMPANA = 2;"; // Solo las campañas de castración
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_historica_de_campanas_castracion'] = $data['cantidad_historica_de_campanas_castracion'];
    }

    // Consulta 4: Cantidad de campañas activas de vacunación
    $SQL = "SELECT COUNT(ID_CAMPANA) AS cantidad_campanas_activas_vacunacion
            FROM campana
            WHERE ID_TIPO_DE_CAMPANA = 1 AND ESTADO_CAMPANA = 1;"; // Solo campañas activas de vacunación
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_campanas_activas_vacunacion'] = $data['cantidad_campanas_activas_vacunacion'];
    }

    // Consulta 5: Cantidad de campañas activas de castración
    $SQL = "SELECT COUNT(ID_CAMPANA) AS cantidad_campanas_activas_castracion
            FROM campana
            WHERE ID_TIPO_DE_CAMPANA = 2 AND ESTADO_CAMPANA = 1;"; // Solo campañas activas de castración
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_campanas_activas_castracion'] = $data['cantidad_campanas_activas_castracion'];
    }

    // Consulta 6: Veterinario con más participaciones en campañas de vacunación
    $SQL = "SELECT CONCAT(p.NOMBRE, ' ', p.APELLIDO) AS veterinario_vacunacion
            FROM campana c
            JOIN veterinario v ON c.ID_VETERINARIO = v.ID_VETERINARIO
            JOIN persona p ON v.DNI = p.DNI
            WHERE c.ID_TIPO_DE_CAMPANA = 1
            GROUP BY v.ID_VETERINARIO
            ORDER BY COUNT(c.ID_CAMPANA) DESC
            LIMIT 1;";
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['veterinario_vacunacion'] = $data['veterinario_vacunacion'];
    }

    // Consulta 7: Veterinario con más participaciones en campañas de castración
    $SQL = "SELECT CONCAT(p.NOMBRE, ' ', p.APELLIDO) AS veterinario_mas_participaciones_castracion
            FROM campana c
            JOIN veterinario v ON c.ID_VETERINARIO = v.ID_VETERINARIO
            JOIN persona p ON v.DNI = p.DNI
            WHERE c.ID_TIPO_DE_CAMPANA = 2
            GROUP BY v.ID_VETERINARIO
            ORDER BY COUNT(c.ID_CAMPANA) DESC
            LIMIT 1;";
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['veterinario_mas_participaciones_castracion'] = $data['veterinario_mas_participaciones_castracion'];
    }

    // Consulta 8: Cantidad histórica de turnos otorgados para vacunación
    $SQL = "SELECT COUNT(t.ID_TURNO) AS cantidad_historica_turnos_vacunacion
            FROM turnos t
            JOIN campana c ON t.ID_CAMPANA_TURNO = c.ID_CAMPANA
            WHERE c.ID_TIPO_DE_CAMPANA = 1;"; // Solo turnos de vacunación
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_historica_turnos_vacunacion'] = $data['cantidad_historica_turnos_vacunacion'];
    }

    // Consulta 9: Cantidad histórica de turnos otorgados para castración
    $SQL = "SELECT COUNT(t.ID_TURNO) AS cantidad_historica_turnos_castracion
            FROM turnos t
            JOIN campana c ON t.ID_CAMPANA_TURNO = c.ID_CAMPANA
            WHERE c.ID_TIPO_DE_CAMPANA = 2;"; // Solo turnos de castración
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['cantidad_historica_turnos_castracion'] = $data['cantidad_historica_turnos_castracion'];
    }

    return $Usuario;
}



?>