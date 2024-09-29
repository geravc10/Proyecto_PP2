<?php

function DatosDuenioAnimal($vDNI, $vConexion)
{

    $Usuario = array();
    $SQL = "SELECT p.*, d.*, c.*, pr.*, dc.*, n.*, se.*, da.*
        FROM
            persona as p,            
            direccion as d,
            ciudad as c,
            provincia as pr,
            DATOS_DE_CONTACTO as dc,
            niveles as n,
            sexo as se,
            dueno_animal as da
        WHERE
            p.DNI = '$vDNI'
        AND
            p.DNI = da.DNI            
        AND    
            p.ID_DIRECCION = d.ID_DIRECCION
        AND
            d.ID_CIUDAD = c.ID_CIUDAD
        AND
            c.ID_PROVINCIA = pr.ID_PROVINCIA
        AND
            p.ID_DATOS_DE_CONTACTO = dc.ID_DATOS_DE_CONTACTO
        AND
            p.ID_NIVEL=n.ID_NIVEL
        AND 
            p.SEXO =  se.ID_SEXO
        
            
        
    ";


    $rs = mysqli_query($vConexion, $SQL);


    $data = mysqli_fetch_array($rs);


    if (!empty($data)) {
        $Usuario['Nombre'] = $data['NOMBRE'];
        $Usuario['Apellido'] = $data['APELLIDO'];
        $Usuario['dni'] = $data['DNI'];
        $Usuario['Sexo'] = $data['DESCRIPCION_SEXO'];
        $Usuario['SexoID'] = $data['ID_SEXO'];
        $Usuario['Pass'] = $data['CONTRASENA'];
        $Usuario['FechaNacimiento'] = $data['FECHA_DE_NACIMIENTO'];
        $Usuario['Nacionalidad'] = $data['NACIONALIDAD'];
        $Usuario['Informacion'] = $data['INFORMACION_PERSONAL'];
        $Usuario['Direccion'] = $data['NOMBRE_CALLE'];
        $Usuario['Numero'] = $data['NUMERO'];        
        $Usuario['Ciudad'] = $data['NOMBRE_CIUDAD'];
        $Usuario['Provincia'] = $data['NOMBRE_PROVINCIA'];
        $Usuario['Telefono'] = $data['TELEFONO'];
        $Usuario['Mail'] = $data['CORREO_ELECTRONICO'];         
        $Usuario['Estado'] = $data['ESTADO_PERSONA'];         

        if($data['BIS']==0){
            $Usuario['Bis'] = " ";
        }else{
            $Usuario['Bis'] = "bis";
        }
        
        if($data['ESTADO_VETERINARIO']==0){
            $Usuario['Estado'] = "Inactivo";
        }else{
            $Usuario['Estado'] = "Activo";
        }
        
    }
    return $Usuario;
}

?>

?>