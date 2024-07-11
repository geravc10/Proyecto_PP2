<?php
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();

    $SQL=
        "SELECT 
            p.CONTRASENA,
            dc.CORREO_ELECTRONICO
        FROM 
            persona AS p
        JOIN 
            datos_de_contacto AS dc 
        ON 
            p.ID_DATOS_DE_CONTACTO = dc.ID_DATOS_DE_CONTACTO
        WHERE 
            dc.CORREO_ELECTRONICO = '$vUsuario' 
        AND 
            p.CONTRASENA = '$vClave'";

    $rs=mysqli_query($vConexion, $SQL);

    $data= mysqli_fetch_array($rs);

    if(!empty($data)){
        
        $Usuario['Nombre']=$data['NOMBRE'];
        $Usuario['Apellido']=$data['APELLIDO'];
        
        
        /*if(empty($data['Imagen'])){
            $data['Imagen']='test.jpg';        
        }*/
        //$Usuario['IMG']="test.jpg";
        
        
    }
    return $Usuario;
}


?>