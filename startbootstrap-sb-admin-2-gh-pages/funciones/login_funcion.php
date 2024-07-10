<?php
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();

    $SQL="SELECT * 
    FROM persona p, datos_de_contacto d 
    WHERE d.correo_electronico= '$vUsuario' AND p.contraseña='$vClave'";

    $rs=mysqli_query($vConexion, $SQL);

    $data= mysqli_fetch_array($rs);

    if(!empty($data)){
        
        $Usuario['NOMBRE']=$data['Nombre'];
        $Usuario['APELLIDO']=$data['Apellido'];
        
        
        /*if(empty($data['Imagen'])){
            $data['Imagen']='test.jpg';        
        }*/
        //$Usuario['IMG']="test.jpg";
        
        
    }
    return $Usuario;
}


?>