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

if (!empty($_POST['BotonConsultar'])) {    
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
            $_SESSION['animal_Estado_Castracion'] = $AnimalEncontrado['Estado_Castracion'];
            $_SESSION['animal_Id_Raza'] = $AnimalEncontrado['Id_Raza_Animal'];
            $_SESSION['animal_Descripcion_Raza'] = $AnimalEncontrado['Descripcion_Raza_Animal'];
            $_SESSION['animal_Id_Especie'] = $AnimalEncontrado['Id_Especie_Animal'];
            $_SESSION['animal_Descripcion_Especie'] = $AnimalEncontrado['Descripcion_Especie_Animal'];
            $_SESSION['animal_Id_Rol'] = $AnimalEncontrado['Id_Rol_Animal'];
            $_SESSION['animal_Descripcion_Rol'] = $AnimalEncontrado['Descripcion_Rol_Animal'];
            $_SESSION['animal_Descripcion_Familia'] = $AnimalEncontrado['Descripcion_Familia'];
            $_SESSION['animal_Id'] = $AnimalEncontrado['Id_Animal'];

            
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

            //traer todas las enfermeddes de la especie del animal
            require_once 'funciones/funcion_consultas_generales.php';
            $ListaEnfermedades = TraerEnfermedades($MiConexion);
            $CantidadEnfermedades= count($ListaEnfermedades);

            header('Location: consultar_historial_medico_2.php');
            exit;
        }
    }
}



?>
<!DOCTYPE html>
<html lang="ES">
<?php
require_once 'partes_Pagina/head.php';
?>

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
                    <h1 class="my-5 text-center fw-bold">Consultar Historial Medico</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>

                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method="post">
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">Ingrese el Codigo de Verificacion Animal</label>
                            <input type="number" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Codigo de Verificacion" name="codigo">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit" value="registrar" 
                            name="BotonConsultar">Consultar</button>
                        </div>
                    </form>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
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

