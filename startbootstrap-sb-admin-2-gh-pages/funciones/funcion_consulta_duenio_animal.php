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
        $Usuario['Id_Nacionalidad'] = $data['ID_NACIONALIDAD'];
        $Usuario['Informacion'] = $data['INFORMACION_PERSONAL'];
        $Usuario['Direccion'] = $data['NOMBRE_CALLE'];
        $Usuario['Numero'] = $data['NUMERO'];        
        $Usuario['Ciudad'] = $data['NOMBRE_CIUDAD'];
        $Usuario['Provincia'] = $data['NOMBRE_PROVINCIA'];
        $Usuario['Telefono'] = $data['TELEFONO'];
        $Usuario['Mail'] = $data['CORREO_ELECTRONICO'];         
        $Usuario['Estado'] = $data['ESTADO_DUENO_ANIMAL'];         

        if($data['BIS']==0){
            $Usuario['Bis'] = " ";
        }else{
            $Usuario['Bis'] = "bis";
        }
        
       /* if($data['ESTADO_DUENO_ANIMAL']==0){
            $Usuario['Estado'] = "Inactivo";
        }else{
            $Usuario['Estado'] = "Activo";
        }*/
        
    }
    return $Usuario;
}

function DatosDuenioAnimal_2($vConexion){   

    $Usuario = array();
    $SQL = "SELECT
    -- Contar los dueños activos (directamente desde la tabla dueno_animal)
    (SELECT COUNT(DISTINCT da.ID_DUENO_ANIMAL)
     FROM dueno_animal da
     WHERE da.ESTADO_DUENO_ANIMAL = 1) AS cantidad_duenos_animales,

    -- Contar las familias con más de un animal activo
    COUNT(DISTINCT CASE WHEN family_animal_count.cantidad > 1 THEN f1.ID_FAMILIA END) AS cantidad_familias_con_mas_de_un_animal,

    -- Contar las familias con perros activos
    COUNT(DISTINCT CASE WHEN ea.DESCRIPCION_TIPO_ANIMAL = 'Perro' AND a.ESTADO_ANIMAL = 1 THEN f1.ID_FAMILIA END) AS cantidad_familias_con_perros,

    -- Contar las familias con gatos activos
    COUNT(DISTINCT CASE WHEN ea.DESCRIPCION_TIPO_ANIMAL = 'Gato' AND a.ESTADO_ANIMAL = 1 THEN f1.ID_FAMILIA END) AS cantidad_familias_con_gatos,

    -- Contar las familias con caballos activos
    COUNT(DISTINCT CASE WHEN ea.DESCRIPCION_TIPO_ANIMAL = 'Caballo' AND a.ESTADO_ANIMAL = 1 THEN f1.ID_FAMILIA END) AS cantidad_familias_con_caballos,

    -- Contar los dueños con más de un animal activo
    (SELECT COUNT(*) 
     FROM (
         SELECT f.ID_DUENO_ANIMAL
         FROM familia f
         JOIN animal a ON f.ID_ANIMAL = a.ID_ANIMAL
         WHERE a.ESTADO_ANIMAL = 1
         GROUP BY f.ID_DUENO_ANIMAL
         HAVING COUNT(a.ID_ANIMAL) > 1
     ) AS duenios_con_multiples_animales) AS cantidad_duenos_mas_de_un_animal

FROM 
    familia f1
LEFT JOIN animal a ON f1.ID_ANIMAL = a.ID_ANIMAL
LEFT JOIN especie_animal ea ON a.ID_TIPO_ANIMAL = ea.ID_TIPO_ANIMAL
LEFT JOIN dueno_animal da ON f1.ID_DUENO_ANIMAL = da.ID_DUENO_ANIMAL

-- Subconsulta para contar los animales activos por familia
LEFT JOIN (
    SELECT f.ID_FAMILIA, COUNT(f.ID_ANIMAL) AS cantidad
    FROM familia f
    JOIN animal a ON f.ID_ANIMAL = a.ID_ANIMAL
    WHERE a.ESTADO_ANIMAL = 1 -- Solo contar animales activos
    GROUP BY f.ID_FAMILIA
) AS family_animal_count ON family_animal_count.ID_FAMILIA = f1.ID_FAMILIA

WHERE 
    a.ESTADO_ANIMAL = 1 -- Solo animales activos
    AND da.ESTADO_DUENO_ANIMAL = 1 -- Solo dueños activos
      
    ";

    // Ejecutar la consulta
    $rs = mysqli_query($vConexion, $SQL);

    // Verificar si la consulta se ejecutó correctamente
    if (!$rs) {
        die('Error en la consulta: ' . mysqli_error($vConexion)); // Mostrar error si la consulta falla
    }

    // Obtener los resultados
    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {
        $Usuario['cantidad_duenos_animales'] = $data['cantidad_duenos_animales'];
        $Usuario['cantidad_familias_con_perros'] = $data['cantidad_familias_con_perros'];
        $Usuario['cantidad_familias_con_gatos'] = $data['cantidad_familias_con_gatos'];
        $Usuario['cantidad_familias_con_caballos'] = $data['cantidad_familias_con_caballos'];
        $Usuario['cantidad_duenos_mas_de_un_animal'] = $data['cantidad_duenos_mas_de_un_animal'];            
    }

    return $Usuario;
}


?>

