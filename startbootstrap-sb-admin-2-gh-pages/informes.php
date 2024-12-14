<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}



require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/validaciones.php';
$Mensaje = "";



/*
if (!empty($_POST['BotonTraer']) || !empty($_POST['BotonTraer_vac'])) {    
    $Mensaje = ValidarIdAnimal();

    if (empty($Mensaje)) {
        require_once 'funciones/funcion_consulta_animal.php';
        $AnimalEncontrado = DatosAnimal($MiConexion, $_POST['codigo']);

        if (empty($AnimalEncontrado)) {
            $Mensaje = "No se encontraron conincidencias. Verifique el número de Identificacion ingresado.";
        } else{
            $_SESSION['animal_apellido'] = $AnimalEncontrado['Apellido'];
            $_SESSION['animal_dni'] = $AnimalEncontrado['dni'];
            $_SESSION['animal_sexo'] = $AnimalEncontrado['Sexo'];
            $_SESSION['animal_Id_Sexo'] = $AnimalEncontrado['SexoID'];
            $_SESSION['animal_FechaNacimiento'] = $AnimalEncontrado['FechaNacimiento'];
            $_SESSION['animal_Nacionalidad'] = $AnimalEncontrado['Nacionalidad'];
            $_SESSION['animal_Informacion'] = $AnimalEncontrado['Informacion'];
            $_SESSION['animal_Direccion'] = $AnimalEncontrado['Direccion'];
            $_SESSION['animal_Bis'] = $AnimalEncontrado['Bis'];
            $_SESSION['animal_Numero'] = $AnimalEncontrado['Numero'];
            $_SESSION['animal_Id_Ciudad'] = $AnimalEncontrado['Id_Ciudad'];
            $_SESSION['animal_Ciudad'] = $AnimalEncontrado['Ciudad'];
            $_SESSION['animal_Id_Provincia'] = $AnimalEncontrado['Id_Provincia'];
            $_SESSION['animal_Provincia'] = $AnimalEncontrado['Provincia'];
            $_SESSION['animal_Telefono'] = $AnimalEncontrado['Telefono'];
            $_SESSION['animal_Mail'] = $AnimalEncontrado['Mail'];
            $_SESSION['animal_Estado_Dueno'] = $AnimalEncontrado['Estado_Dueno'];
            $_SESSION['animal_Nombre_Animal'] = $AnimalEncontrado['Nombre_Animal'];
            $_SESSION['animal_Codigo_Animal'] = $AnimalEncontrado['Codigo_animal'];
            $_SESSION['animal_Id_Raza'] = $AnimalEncontrado['Id_Raza_Animal'];
            $_SESSION['animal_Descripcion_Raza'] = $AnimalEncontrado['Descripcion_Raza_Animal'];
            $_SESSION['animal_Id_Especie'] = $AnimalEncontrado['Id_Especie_Animal'];
            $_SESSION['animal_Descripcion_Especie'] = $AnimalEncontrado['Descripcion_Especie_Animal'];
            $_SESSION['animal_Id_Rol'] = $AnimalEncontrado['Id_Rol_Animal'];
            $_SESSION['animal_Descripcion_Rol'] = $AnimalEncontrado['Descripcion_Rol_Animal'];
            $_SESSION['animal_Descripcion_Familia'] = $AnimalEncontrado['Descripcion_Familia'];
            $_SESSION['animal_Id'] = $AnimalEncontrado['Id_Animal'];
            $_SESSION['animal_estado_castracion'] = $AnimalEncontrado['Estado_Castracion'];

            
            //estado animal
            if($AnimalEncontrado['Estado_Animal']==0){
                $_SESSION['animal_Estado_Animal'] = "no";
            }else{
                $_SESSION['animal_Estado_Animal'] = "si";
            }
            
            // Calcular la edad del dueño de animal
            $hoy = new DateTime();            
            $nacimiento = new DateTime($AnimalEncontrado['FechaNacimiento']);            
            $diferencia = $nacimiento->diff($hoy);            
            $edad = $diferencia->y;
            $_SESSION['animal_duenio_edad'] = $edad;

            if(!empty($_POST['BotonTraer'])){
                //traer todas las enfermeddes de la especie del animal
                require_once 'funciones/funcion_consultas_generales.php';
                $ListaEnfermedades = TraerEnfermedades($MiConexion);
                $CantidadEnfermedades= count($ListaEnfermedades);

                header('Location: formulario_historial_medico_2.php');
                exit;
            }else if(!empty($_POST['BotonTraer_vac'])){                

                header('Location: formulario_historial_medico_3.php');
                exit;
            }
            


        }
    }
}*/

?>
<!DOCTYPE html>
<html lang="ES">
<?php
require_once 'partes_Pagina/head.php';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .table-vertical {
      width: 100%;
      border-collapse: collapse;
    }

    .table-vertical .thead {
      font-weight: bold;
      background-color: #f8f9fa;
    }

    .table-vertical .tbody .td-header {
      font-weight: bold;
      color: #343a40; /* Texto más oscuro */
      text-align: left;
    }

    .table-vertical .tbody .td-value {
      text-align: center;
    }

    .table-vertical td {
      border: 1px solid #dee2e6;
      padding: 8px;
    }

    .table-vertical th {
      text-align: left;
      padding: 8px;
      background-color: #f1f1f1;
    }
  </style>
</head>


<body id="page-top">
    <?php
    require_once 'partes_Pagina/header.php';
    ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        require_once 'partes_Pagina/sidebar_Izquierdo.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                require_once 'partes_Pagina/topbar_Superior.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center
justify-content-between mb-4">
                        <h1 class="h3 mb-0
text-gray-800">Bienvenidos</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!--FORMULARIO-->
                    <h1 class="my-5 text-center fw-bold">Informe Completo</h1>

                    <div class="container mt-5 mb-5">
                    <h4 class="mb-4">Si necesitas saber alguna fecha en particular selecciona:</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" 
                                value="<?php echo (!empty($_POST['fecha_inicio']) ? $_POST['fecha_inicio']:''); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" 
                                value="<?php echo (!empty($_POST['fecha_fin']) ? $_POST['fecha_fin']:''); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <table class="table-vertical mt-4">
                    <tbody>
                        <tr>
                        <td class="td-header">Cantidad de Historiales Médicos</td>
                        <td class="td-value">123</td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de Perros</td>
                        <td class="td-value">56</td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de Gatos</td>
                        <td class="td-value">47</td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de Vacunas Colocadas</td>
                        <td class="td-value">200</td>
                        </tr>
                        <tr>
                        <td class="td-header">Total Animales Castrados</td>
                        <td class="td-value">150</td>
                        </tr>
                        <tr>
                        <td class="td-header">Perros Castrados</td>
                        <td class="td-value">90</td>
                        </tr>
                        <tr>
                        <td class="td-header">Gatos Castrados</td>
                        <td class="td-value">60</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <!-- End of Main Content -->
                <?php
                require_once 'partes_Pagina/footer.php';
                ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Ya te vas <?php echo $_SESSION['usuario_nombre']; ?>?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "Cerrar Sesion" si queres cerrar esta sesion.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="cerrar_sesion.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once 'partes_Pagina/script.php';
        require_once 'partes_Pagina/footer.php';
        ?>
</body>

</html>