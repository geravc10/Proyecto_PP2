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
        require_once 'funciones/consulta_munnicipal.php';
        $MunicipalEncontrado = DatosMunicipal(
            $_POST['dni'],
            $MiConexion
        );
        if (empty($MunicipalEncontrado)) {
            $Mensaje = "No se encontraron conincidencias. Verifique el
número de DNI ingresado";
        } else {
            $_SESSION['municipal_nombre'] = $MunicipalEncontrado['Nombre'];
            $_SESSION['municipal_apellido'] = $MunicipalEncontrado['Apellido'];
            $_SESSION['municipal_sexo'] = $MunicipalEncontrado['Sexo'];
            $_SESSION['municipal_sexo_id'] = $MunicipalEncontrado['SexoId'];
            $_SESSION['municipal_dni'] = $MunicipalEncontrado['dni'];
            $_SESSION['municipal_fecha'] = $MunicipalEncontrado['FechaNacimiento'];
            $_SESSION['municipal_nacionalidad'] = $MunicipalEncontrado['Nacionalidad'];
            $_SESSION['municipal_id_nacionalidad'] = $MunicipalEncontrado['Id_Nacionalidad'];
            $_SESSION['municipal_informacion'] = $MunicipalEncontrado['Informacion'];
            $_SESSION['municipal_direccion'] = $MunicipalEncontrado['Direccion'];
            $_SESSION['municipal_numero'] = $MunicipalEncontrado['Numero'];
            $_SESSION['municipal_bis'] = $MunicipalEncontrado['Bis'];
            $_SESSION['municipal_ciudad'] = $MunicipalEncontrado['Ciudad'];
            $_SESSION['municipal_provincia'] = $MunicipalEncontrado['Provincia'];
            $_SESSION['municipal_telefono'] = $MunicipalEncontrado['Telefono'];
            $_SESSION['municipal_mail'] = $MunicipalEncontrado['Mail'];
            $_SESSION['municipal_pass'] = $MunicipalEncontrado['Pass'];
            $_SESSION['municipal_red'] = $MunicipalEncontrado['Red'];            
            $_SESSION['municipal_area'] = $MunicipalEncontrado['Area'];
            $_SESSION['municipal_rol'] = $MunicipalEncontrado['Rol'];
            $_SESSION['municipal_estado'] = $MunicipalEncontrado['Estado'];
            
            // Calcular la edad del municipal
            $hoy = new DateTime();            
            $nacimiento = new DateTime($MunicipalEncontrado['FechaNacimiento']);            
            $diferencia = $nacimiento->diff($hoy);            
            $edad = $diferencia->y;
            $_SESSION['municipal_edad'] = $edad;
            header('Location: mostrar_info_municipal.php');
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
<style>
    /* Oculta las flechas en Chrome, Safari, Edge, Opera */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Oculta las flechas en Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

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
                    <h1 class="my-5 text-center fw-bold">Consultar Empleado Municipal</h1>
                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning
alert-dismissible fade show" role="alert">
                            <i class="bi
bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>
                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method='post'>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">DNI</label>
                            <input type="number" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="DNI" id="dni" onkeydown="preventDecimal(event)" name="dni">
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
                    <div class="modal-body">Selecciona "Cerrar Sesion" si
                        queres cerrar esta sesion.</div>
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
        <script>
            function preventDecimal(event) {
                if (event.key === '.') {
                    event.preventDefault(); // Previene la entrada del
                    punto
                }
            }
        </script>
</body>

</html>