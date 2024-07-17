<?php
function DatosMunicipal($vDNI, $vConexion)
{
    $Usuario = array();
    $SQL = "SELECT p.*, tm.*, rm.*, am.*, d.*, c.*, pr.*, dc.*, n.*
FROM
persona as p,
trabajador_municipal as tm,
rol_municipal as rm,
area_municipal as am,
direccion as d,
ciudad as c,
provincia as pr,
DATOS_DE_CONTACTO as dc,
niveles as n
WHERE
p.DNI = '$vDNI'
AND
p.DNI = tm.DNI
AND
tm.ID_ROL_MUNICIPAL = rm.ID_ROL_MUNICIPAL
AND
tm.ID_AREA_MUNICIPAL = am.ID_AREA_MUNICIPAL
AND
p.ID_DIRECCION = d.ID_DIRECCION
AND
d.ID_CIUDAD = c.ID_CIUDAD
AND
c.ID_PROVINCIA = pr.ID_PROVINCIA
AND
P.ID_DATOS_DE_CONTACTO = dc.ID_DATOS_DE_CONTACTO
AND
p.ID_NIVEL=n.ID_NIVEL
";
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['Nombre'] = $data['NOMBRE'];
        $Usuario['Apellido'] = $data['APELLIDO'];
        $Usuario['dni'] = $data['DNI'];
        $Usuario['FechaNacimiento'] = $data['FECHA_DE_NACIMIENTO'];
        $Usuario['Direccion'] = $data['NOMBRE_CALLE'];
        $Usuario['Ciudad'] = $data['NOMBRE_CIUDAD'];
        $Usuario['Provincia'] = $data['NOMBRE_PROVINCIA'];
        $Usuario['Telefono'] = $data['TELEFONO'];
        $Usuario['Area'] = $data['DESCRIPCION_AREA_MUNICIPAL'];
        $Usuario['Rol'] = $data['DESCRIPCION_ROL_MUNICIPAL'];
    }
    return $Usuario;
}
?>