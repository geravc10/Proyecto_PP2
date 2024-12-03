<?php

function DatosAnimal($vConexion,$vCodigo)
{

    $Usuario = array();
    $SQL = "SELECT p.*, d.*, c.*, pr.*,n.*, dc.*, da.*, se.*, a.*, f.*,ea.DESCRIPCION_TIPO_ANIMAL,ra.DESCRIPCION_RAZA_ANIMAL, ra.ID_RAZA_ANIMAL, r.ID_ROL_ANIMAL, r.DESCRIPCION_ROL_ANIMAL
        FROM
            persona as p,            
            direccion as d,
            ciudad as c,
            provincia as pr,
            DATOS_DE_CONTACTO as dc,           
            dueno_animal as da,
            animal as a,
            especie_animal as ea,
            raza_animal as ra,
            rol_animal as r,
            familia as f,
            niveles as n,
            sexo as se
        WHERE
            a.CODIGO_ANIMAL = '$vCodigo'
        AND
            a.ID_ANIMAL= f.ID_ANIMAL            
        AND    
            f.ID_DUENO_ANIMAL = da.ID_DUENO_ANIMAL
        AND
            da.DNI = p.DNI
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
        AND
            ra.ID_RAZA_ANIMAL = a.ID_RAZA_ANIMAL
        AND
            r.ID_ROL_ANIMAL = a.ID_ROL_ANIMAL
        AND
            ea.ID_TIPO_ANIMAL =  a.ID_TIPO_ANIMAL
        /*
        HICE LA CONSULTA HASTA ACA. FALTA TERMINAR Y PROBAR
        */
            
        
    ";


    $rs = mysqli_query($vConexion, $SQL);


    $data = mysqli_fetch_array($rs);


    if (!empty($data)) {
        $Usuario['Nombre'] = $data['NOMBRE'];
        $Usuario['Apellido'] = $data['APELLIDO'];
        $Usuario['dni'] = $data['DNI'];
        $Usuario['Sexo'] = $data['DESCRIPCION_SEXO'];
        $Usuario['SexoID'] = $data['ID_SEXO'];        
        $Usuario['FechaNacimiento'] = $data['FECHA_DE_NACIMIENTO'];
        $Usuario['Nacionalidad'] = $data['NACIONALIDAD'];
        $Usuario['Informacion'] = $data['INFORMACION_PERSONAL'];
        $Usuario['Direccion'] = $data['NOMBRE_CALLE'];
        $Usuario['Numero'] = $data['NUMERO'];       
        $Usuario['Id_Ciudad'] = $data['ID_CIUDAD']; 
        $Usuario['Ciudad'] = $data['NOMBRE_CIUDAD'];
        $Usuario['Id_Provincia'] = $data['ID_PROVINCIA']; 
        $Usuario['Provincia'] = $data['NOMBRE_PROVINCIA'];
        $Usuario['Telefono'] = $data['TELEFONO'];
        $Usuario['Mail'] = $data['CORREO_ELECTRONICO'];         
        $Usuario['Estado_Dueno'] = $data['ESTADO_DUENO_ANIMAL'];
        $Usuario['Nombre_Animal'] = $data['NOMBRE_ANIMAL'];
        $Usuario['Estado_Animal'] = $data['ESTADO_ANIMAL'];
        $Usuario['Id_Animal'] = $data['ID_ANIMAL'];
        $Usuario['Id_Raza_Animal'] = $data['ID_RAZA_ANIMAL'];
        $Usuario['Descripcion_Raza_Animal'] = $data['DESCRIPCION_RAZA_ANIMAL'];
        $Usuario['Id_Especie_Animal'] = $data['ID_TIPO_ANIMAL'];
        $Usuario['Descripcion_Especie_Animal'] = $data['DESCRIPCION_TIPO_ANIMAL'];
        $Usuario['Id_Rol_Animal'] = $data['ID_ROL_ANIMAL'];
        $Usuario['Descripcion_Rol_Animal'] = $data['DESCRIPCION_ROL_ANIMAL'];
        $Usuario['Codigo_animal'] = $data['CODIGO_ANIMAL'];
        $Usuario['Descripcion_Familia'] = $data['DESCRPCION_FAMILIA'];
        $Usuario['Estado_Castracion'] = $data['ESTADO_CASTRACION'];

        if($data['BIS']==0){
            $Usuario['Bis'] = " ";
        }else{
            $Usuario['Bis'] = "bis";
        }

        

        
    }
    return $Usuario;
}

?>