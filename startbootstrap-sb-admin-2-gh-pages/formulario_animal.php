<?php
session_start();
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
                    <h1 class="my-5 text-center fw-bold">Crear Animal</h1>
                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal">
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Nombre
                                del Animal</label>
                            <input type="password" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="Nombre del Animal">
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">DNI del Dueño</label>
                            <input type="number" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="DNI del Dueño">
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label">Especie de Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required>
                                <option selected disabled value="">Especie de Animal...</option>
                                <option value="perro">Perro</option>
                                <option value="gato">Gato</option>
                                <option value="ave">Ave</option>
                                <option value="reptil">Reptil</option>
                                <option value="roedor">Roedor</option>
                                <option value="pez">Pez</option>
                                <option value="otro">Otro</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid species.
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="validationServer04" class="form-label">Raza</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required>
                                <option selected disabled value="">Raza...</option>
                                <option>Raza 1</option>
                                <option>Raza 2</option>
                                <option>Raza 3</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label">Rol del Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required>
                                <option selected disabled value="">Rol del Animal...</option>
                                <option value="mascota">Mascota</option>
                                <option value="trabajo">Animal de Trabajo</option>
                                <option value="granja">Animal de Granja</option>
                                <option value="salvaje">Animal Salvaje</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid role.
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <label for="validationServer04" class="form-label">Estado
                                del Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required>
                                <option selected disabled value="">Estado del
                                    Animal...</option>
                                <option>ACTIVO</option>
                                <option>INACTIVO</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripcion de la Familia del animal</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck3"
                                    aria-describedby="invalidCheck3Feedback" required>
                                <label class="form-check-label" for="invalidCheck3">
                                    Acepto los Terminos y Condiciones
                                </label>
                                <div id="invalidCheck3Feedback" class="invalid-feedback">
                                    Enviar.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button class="btn btn-primary" type="submit">Enviar</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you
                        are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once 'partes_Pagina/script.php';
        ?>
</body>

</html>