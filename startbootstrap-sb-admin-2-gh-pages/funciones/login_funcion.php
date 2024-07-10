<?php
function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();

    $SQL="SELECT * 
    FROM persona p 
    ";

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