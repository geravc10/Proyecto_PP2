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
        $Usuario['Red'] = $data['RED_SOCIAL'];         
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

function DatosAnimal_2($vConexion)
{

    $Usuario = array();
    $SQL = "SELECT 
    -- Cantidad total de animales activos
    COUNT(a.ID_ANIMAL) AS total_animales_activos,
    
    -- Cantidad de animales castrados (activos)
    SUM(CASE WHEN a.ESTADO_CASTRACION = 1 THEN 1 ELSE 0 END) AS cantidad_castrados, 
    
    -- Cantidad de animales no castrados (activos)
    SUM(CASE WHEN a.ESTADO_CASTRACION = 0 THEN 1 ELSE 0 END) AS cantidad_no_castrados,

    -- Cantidad de animales activos de cada especie
    SUM(CASE WHEN ea.DESCRIPCION_TIPO_ANIMAL = 'Caballo' THEN 1 ELSE 0 END) AS cantidad_caballos,
    SUM(CASE WHEN ea.DESCRIPCION_TIPO_ANIMAL = 'Gato' THEN 1 ELSE 0 END) AS cantidad_gatos,
    SUM(CASE WHEN ea.DESCRIPCION_TIPO_ANIMAL = 'Perro' THEN 1 ELSE 0 END) AS cantidad_perros,

    -- Cantidad de animales activos por rol
    SUM(CASE WHEN ra.DESCRIPCION_ROL_ANIMAL = 'Carreras' THEN 1 ELSE 0 END) AS cantidad_carreras,
    SUM(CASE WHEN ra.DESCRIPCION_ROL_ANIMAL = 'Mascota' THEN 1 ELSE 0 END) AS cantidad_mascota,
    SUM(CASE WHEN ra.DESCRIPCION_ROL_ANIMAL = 'Terapia' THEN 1 ELSE 0 END) AS cantidad_terapia,
    SUM(CASE WHEN ra.DESCRIPCION_ROL_ANIMAL = 'Lazarillo' THEN 1 ELSE 0 END) AS cantidad_lazarillo

FROM 
    animal a
LEFT JOIN especie_animal ea ON a.ID_TIPO_ANIMAL = ea.ID_TIPO_ANIMAL
LEFT JOIN rol_animal ra ON a.ID_ROL_ANIMAL = ra.ID_ROL_ANIMAL

WHERE 
    a.ESTADO_ANIMAL = 1 -- Solo animales activos

GROUP BY
    a.ESTADO_ANIMAL;

            
        
    ";


    $rs = mysqli_query($vConexion, $SQL);


    $data = mysqli_fetch_array($rs);


    if (!empty($data)) {
        $Usuario['total_animales_activos'] = $data['total_animales_activos'];
        $Usuario['cantidad_castrados'] = $data['cantidad_castrados'];
        $Usuario['cantidad_caballos'] = $data['cantidad_caballos'];
        $Usuario['cantidad_gatos'] = $data['cantidad_gatos'];
        $Usuario['cantidad_perros'] = $data['cantidad_perros'];        
        $Usuario['cantidad_carreras'] = $data['cantidad_carreras'];
        $Usuario['cantidad_mascota'] = $data['cantidad_mascota'];
        $Usuario['cantidad_terapia'] = $data['cantidad_terapia'];
        $Usuario['cantidad_lazarillo'] = $data['cantidad_lazarillo'];
        

        
    }
    return $Usuario;
}

?>