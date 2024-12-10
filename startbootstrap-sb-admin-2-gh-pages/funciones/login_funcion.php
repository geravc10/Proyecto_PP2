<?php
function DatosLogin($vUsuario, $vClave, $vConexion)
{
    $Usuario = array();
    $SQL = "SELECT p.*, d.*, n.*
FROM
persona as p,
DATOS_DE_CONTACTO as d,
niveles as n

WHERE
P.ID_DATOS_DE_CONTACTO = d.ID_DATOS_DE_CONTACTO
AND
p.ID_NIVEL=n.ID_NIVEL
AND
d.CORREO_ELECTRONICO='$vUsuario'
AND
p.CONTRASENA= '$vClave'

";
    $rs = mysqli_query($vConexion, $SQL);
    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $Usuario['Nombre'] = $data['NOMBRE'];
        $Usuario['Apellido'] = $data['APELLIDO'];
        $Usuario['Dni'] = $data['DNI'];
        $Usuario['Estado'] = $data['ESTADO_PERSONA'];
        $Usuario['Nivel'] = $data['ID_NIVEL'];
        $Usuario['Descripcion_nivel'] = $data['DESCRIPCION_NIVEL'];
        $Usuario['contrasena'] = $data['CONTRASENA'];
    }



    return $Usuario;
}
?>