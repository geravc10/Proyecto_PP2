<?php
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();

    $SQL="SELECT p.*
    FROM persona as p, DATOS_DE_CONTACTO as d
    WHERE P.ID_DATOS_DE_CONTACTO = d.ID_DATOS_DE_CONTACTO and d.CORREO_ELECTRONICO='$vUsuario' and p.CONTRASENA= '$vClave'
    ";

    $rs=mysqli_query($vConexion, $SQL);

    $data= mysqli_fetch_array($rs);

    if(!empty($data)){
            $Usuario['Nombre']=$data['NOMBRE'];
            $Usuario['Apellido']=$data['APELLIDO'];
            $Usuario['Estado']=$data['ESTADO_PERSONA'];
        
    }
    return $Usuario;
}


?>