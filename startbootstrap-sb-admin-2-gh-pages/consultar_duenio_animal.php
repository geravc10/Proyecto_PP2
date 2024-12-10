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

        require_once 'funciones/funcion_consulta_duenio_animal.php';
        $DuenioEncontrado = DatosDuenioAnimal($_POST['dni'], $MiConexion);

        if (empty($DuenioEncontrado)) {
            $Mensaje = "No se encontraron conincidencias. Verifique el número de DNI ingresado";
        } else {
            $_SESSION['duenio_nombre'] = $DuenioEncontrado['Nombre'];
            $_SESSION['duenio_apellido'] = $DuenioEncontrado['Apellido'];
            $_SESSION['duenio_sexo'] = $DuenioEncontrado['Sexo'];
            $_SESSION['duenio_sexo_id'] = $DuenioEncontrado['SexoId'];
            $_SESSION['duenio_dni'] = $DuenioEncontrado['dni'];
            $_SESSION['duenio_fecha'] = $DuenioEncontrado['FechaNacimiento'];
            $_SESSION['duenio_nacionalidad'] = $DuenioEncontrado['Nacionalidad'];
            $_SESSION['duenio_id_nacionalidad'] = $DuenioEncontrado['Id_Nacionalidad'];
            $_SESSION['duenio_informacion'] = $DuenioEncontrado['Informacion'];
            $_SESSION['duenio_direccion'] = $DuenioEncontrado['Direccion'];
            $_SESSION['duenio_numero'] = $DuenioEncontrado['Numero'];
            $_SESSION['duenio_bis'] = $DuenioEncontrado['Bis'];
            $_SESSION['duenio_ciudad'] = $DuenioEncontrado['Ciudad'];
            $_SESSION['duenio_provincia'] = $DuenioEncontrado['Provincia'];
            $_SESSION['duenio_telefono'] = $DuenioEncontrado['Telefono'];
            $_SESSION['duenio_mail'] = $DuenioEncontrado['Mail'];
            $_SESSION['duenio_pass'] = $DuenioEncontrado['Pass'];
            $_SESSION['duenio_red'] = $DuenioEncontrado['Red'];
            $_SESSION['duenio_estado'] = $DuenioEncontrado['Estado'];
                       
            // Calcular la edad del dueño de animal
            $hoy = new DateTime();            
            $nacimiento = new DateTime($DuenioEncontrado['FechaNacimiento']);            
            $diferencia = $nacimiento->diff($hoy);            
            $edad = $diferencia->y;
            $_SESSION['duenio_edad'] = $edad;

            header('Location: mostrar_info_duenio_animal.php');
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
                    <h1 class="my-5 text-center fw-bold">Consultar Dueño de Animal</h1>

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
                                placeholder="DNI" name= "dni">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit"
                            value="Login" name="BotonConsultar">Consultar</button>
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