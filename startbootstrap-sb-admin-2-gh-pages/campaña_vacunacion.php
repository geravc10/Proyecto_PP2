<!DOCTYPE html>
<html lang="ES">
<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}
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
                        <!--
                        <h1 class="h3 mb-0 text-gray-800">Bienvenido
                            <?php echo $_SESSION['usuario_nombre'] . ' ' .
                                $_SESSION['usuario_apellido']; ?>
                        </h1>
-->
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!-- nav index -->

                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand mr-5">Necesitas Informacion?</a>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="campaña_vacunacion.php">Campaña de Vacunacion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="campaña_castracion.php">Campaña Castracion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="campaña_informacion.php">Informacion Municipal</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!-- CAMPAÑA DE VACUNACION -->
                    <div class="container-fluid text-center">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="text-center">Campaña de Vacunación</h1>
                                    <div class="container mt-5">
                                        <form>
                                            <h4 class="text-center mb-4">Consulta si tu animal es apto para esta
                                                vacunacion:</h4>

                                            <div class="row d-flex justify-content-center">
                                                <div class="col-6">
                                                    <label for="nombre" class="form-label">ID Animal</label>
                                                    <input type="text" class="form-control" id="nombre"
                                                        placeholder="ID Animal" required>
                                                </div>
                                                <div class="text-center mt-4">
                                                    <button class="btn btn-primary" type="submit">Consultar</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <label for="validationServer05" class="form-label">Tu animal esta
                                                    apto?</label>
                                                <input type="text" class="form-control" id="validationServer05"
                                                    aria-describedby="validationServer05Feedback" placeholder=""
                                                    readonly>
                                                <div id="validationServer05Feedback" class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-5 mb-1 text-center">
                                                <hr>
                                            </div>
                                            <h4 class="text-center mt-5">Selecciona el dia y hora del turno que necesitas:
                                            </h4>

                                            <div class="mb-3 mt-5">
                                                <label for="fecha" class="form-label">Selecciona una fecha
                                                    disponible</label>
                                                <select class="form-select" id="fecha" required>
                                                    <option selected disabled>Selecciona un turno</option>
                                                    <!-- Turnos para el día Lunes -->
                                                    <optgroup label="Lunes">
                                                        <option value="lunes1">Turno 1: 2024-10-07 - 09:00 AM</option>
                                                        <option value="lunes2">Turno 2: 2024-10-07 - 10:00 AM</option>
                                                        <option value="lunes3">Turno 3: 2024-10-07 - 11:00 AM</option>
                                                        <option value="lunes4">Turno 4: 2024-10-07 - 12:00 PM</option>
                                                        <option value="lunes5">Turno 5: 2024-10-07 - 01:00 PM</option>
                                                        <option value="lunes6">Turno 6: 2024-10-07 - 02:00 PM</option>
                                                        <option value="lunes7">Turno 7: 2024-10-07 - 03:00 PM</option>
                                                        <option value="lunes8">Turno 8: 2024-10-07 - 04:00 PM</option>
                                                        <option value="lunes9">Turno 9: 2024-10-07 - 05:00 PM</option>
                                                        <option value="lunes10">Turno 10: 2024-10-07 - 06:00 PM</option>
                                                    </optgroup>

                                                    <!-- Turnos para el día Miércoles -->
                                                    <optgroup label="Miércoles">
                                                        <option value="miercoles1">Turno 1: 2024-10-09 - 09:00 AM
                                                        </option>
                                                        <option value="miercoles2">Turno 2: 2024-10-09 - 10:00 AM
                                                        </option>
                                                        <option value="miercoles3">Turno 3: 2024-10-09 - 11:00 AM
                                                        </option>
                                                        <option value="miercoles4">Turno 4: 2024-10-09 - 12:00 PM
                                                        </option>
                                                        <option value="miercoles5">Turno 5: 2024-10-09 - 01:00 PM
                                                        </option>
                                                        <option value="miercoles6">Turno 6: 2024-10-09 - 02:00 PM
                                                        </option>
                                                        <option value="miercoles7">Turno 7: 2024-10-09 - 03:00 PM
                                                        </option>
                                                        <option value="miercoles8">Turno 8: 2024-10-09 - 04:00 PM
                                                        </option>
                                                        <option value="miercoles9">Turno 9: 2024-10-09 - 05:00 PM
                                                        </option>
                                                        <option value="miercoles10">Turno 10: 2024-10-09 - 06:00 PM
                                                        </option>
                                                    </optgroup>

                                                    <!-- Turnos para el día Viernes -->
                                                    <optgroup label="Viernes">
                                                        <option value="viernes1">Turno 1: 2024-10-11 - 09:00 AM</option>
                                                        <option value="viernes2">Turno 2: 2024-10-11 - 10:00 AM</option>
                                                        <option value="viernes3">Turno 3: 2024-10-11 - 11:00 AM</option>
                                                        <option value="viernes4">Turno 4: 2024-10-11 - 12:00 PM</option>
                                                        <option value="viernes5">Turno 5: 2024-10-11 - 01:00 PM</option>
                                                        <option value="viernes6">Turno 6: 2024-10-11 - 02:00 PM</option>
                                                        <option value="viernes7">Turno 7: 2024-10-11 - 03:00 PM</option>
                                                        <option value="viernes8">Turno 8: 2024-10-11 - 04:00 PM</option>
                                                        <option value="viernes9">Turno 9: 2024-10-11 - 05:00 PM</option>
                                                        <option value="viernes10">Turno 10: 2024-10-11 - 06:00 PM
                                                        </option>
                                                    </optgroup>
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="mail" class="form-label text-start">Ingrese el Email para
                                                    confirmar turno:</label>
                                                <input type="email" class="form-control mt-2" id="mail"
                                                    placeholder="Email" required>
                                            </div>
                                            <div class="col-md-12 mt-5 mb-1 text-center">
                                                <hr>
                                            </div>
                                            <div class="col-12 mt-4 text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="invalidCheck3" aria-describedby="invalidCheck3Feedback"
                                                        required>
                                                    <label class="form-check-label" for="invalidCheck3">
                                                        Acepto los Terminos y Condiciones
                                                    </label>
                                                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                                                        Enviar.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 mt-5">
                                                <button type="submit" class="btn btn-primary">Reservar Turno</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">¿Ya
                            te vas <?php echo $_SESSION['usuario_nombre']; ?>?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "Cerrar Sesion" si
                        queres cerrar esta sesion. </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="cerrar_sesion.php">Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once 'partes_Pagina/script.php';
        ?>
</body>

</html>