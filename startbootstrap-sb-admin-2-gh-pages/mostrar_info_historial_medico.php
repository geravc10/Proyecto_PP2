<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenidos</h1>
                    </div>
                    <!-- FORMULARIO -->
                    <h1 class="my-5 text-center fw-bold">Información de Historial Médico</h1>
                    <div class="container vh-90 d-flex justify-content-center align-items-center">
                        <div class="row w-100 text-center">
                            <div class="col-md-12 mb-4 text-center">
                                <h4>Información del Animal y Dueño</h4>
                                <hr>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="dniDueño" class="form-label">DNI Dueño</label>
                                <input type="number" class="form-control" id="dniDueño" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="idAnimal" class="form-label">ID Animal</label>
                                <input type="number" class="form-control" id="idAnimal" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="nombreAnimal" class="form-label">Nombre Animal</label>
                                <input type="text" class="form-control" id="nombreAnimal" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="especie" class="form-label">Especie</label>
                                <input type="text" class="form-control" id="especie" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="raza" class="form-label">Raza</label>
                                <input type="text" class="form-control" id="raza" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="rol" class="form-label">Rol</label>
                                <input type="text" class="form-control" id="rol" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="castrado" class="form-label">¿Está castrado?</label>
                                <input type="text" class="form-control" id="castrado" placeholder="" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="vacunado" class="form-label">¿Está vacunado?</label>
                                <input type="text" class="form-control" id="vacunado" placeholder="" readonly>
                            </div>
                            <div class="col-md-12 mb-4 text-center">
                                <hr>
                                <h4>Enfermedad que presenta</h4>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="descripcionEnfermedades" class="form-label">Descripción de Enfermedades</label>
                                <textarea class="form-control" id="descripcionEnfermedades" rows="4" disabled></textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="descripcionHistorial" class="form-label">Descripción del Historial</label>
                                <textarea class="form-control" id="descripcionHistorial" rows="4" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
                <?php
                require_once 'partes_Pagina/footer.php';
                ?>
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <?php
        require_once 'partes_Pagina/script.php';
        require_once 'partes_Pagina/footer.php';
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
