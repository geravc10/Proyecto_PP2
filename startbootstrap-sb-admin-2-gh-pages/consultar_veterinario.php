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

    $Mensaje = ValidarDniConsulta();

    if (empty($Mensaje)) {

        require_once 'funciones/funcion_consulta_veterinario.php';
        $VeterinarioEncontrado = DatosVeterinario($_POST['dni'], $MiConexion);

        if (empty($VeterinarioEncontrado)) {
            $Mensaje = "No se encontraron conincidencias. Verifique el número de DNI ingresado";
        } else {
            $_SESSION['veterinario_nombre'] = $VeterinarioEncontrado['Nombre'];
            $_SESSION['veterinario_apellido'] = $VeterinarioEncontrado['Apellido'];
            $_SESSION['veterinario_sexo'] = $VeterinarioEncontrado['Sexo'];
            $_SESSION['veterinario_sexo_id'] = $VeterinarioEncontrado['SexoId'];
            $_SESSION['veterinario_dni'] = $VeterinarioEncontrado['dni'];
            $_SESSION['veterinario_fecha'] = $VeterinarioEncontrado['FechaNacimiento'];
            $_SESSION['veterinario_nacionalidad'] = $VeterinarioEncontrado['Nacionalidad'];
            $_SESSION['veterinario_id_nacionalidad'] = $VeterinarioEncontrado['Id_Nacionalidad'];
            $_SESSION['veterinario_informacion'] = $VeterinarioEncontrado['Informacion'];
            $_SESSION['veterinario_direccion'] = $VeterinarioEncontrado['Direccion'];
            $_SESSION['veterinario_numero'] = $VeterinarioEncontrado['Numero'];
            $_SESSION['veterinario_bis'] = $VeterinarioEncontrado['Bis'];
            $_SESSION['veterinario_ciudad'] = $VeterinarioEncontrado['Ciudad'];
            $_SESSION['veterinario_provincia'] = $VeterinarioEncontrado['Provincia'];
            $_SESSION['veterinario_telefono'] = $VeterinarioEncontrado['Telefono'];
            $_SESSION['veterinario_mail'] = $VeterinarioEncontrado['Mail'];
            $_SESSION['veterinario_pass'] = $VeterinarioEncontrado['Pass'];
            $_SESSION['veterinario_red'] = $VeterinarioEncontrado['Red'];
            $_SESSION['veterinario_estado'] = $VeterinarioEncontrado['Estado'];
            $_SESSION['veterinario_matricula'] = $VeterinarioEncontrado['Matricula'];
            $_SESSION['veterinario_especialidad'] = $VeterinarioEncontrado['Espcialidad'];
            
            // Calcular la edad del municipal
            $hoy = new DateTime();            
            $nacimiento = new DateTime($VeterinarioEncontrado['FechaNacimiento']);            
            $diferencia = $nacimiento->diff($hoy);            
            $edad = $diferencia->y;
            $_SESSION['veterinario_edad'] = $edad;
            header('Location: mostrar_info_veterinario.php');
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
                    <h1 class="my-5 text-center fw-bold">Consultar Veterinario</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>

                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method='post'>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">DNI</label>
                            <input type="number" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="DNI" name="dni">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit" value="Login"
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