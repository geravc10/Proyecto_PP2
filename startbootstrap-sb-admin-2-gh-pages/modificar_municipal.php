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
                    <h1 class="my-5 text-center fw-bold">Modificar Empleado Municipal</h1>
                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method="post">
                        <div class="col-md-12">
                            <label for="validationServer01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="validationServer01" placeholder="Nombre"
                                name="nombre" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <input type="image" src="" alt="">
                        <div class="col-md-12">
                            <label for="validationServer02" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="Apellido"
                                name="apellido" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Fecha de
                                Nacimiento</label>
                            <input type="date" class="form-control" id="validationServer02"
                                placeholder="Fecha de Nacimiento" name="fecha_nacimiento" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="Nacionalidad"
                                name="nacionalidad" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Sexo</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="sexo"
                                name="nacionalidad" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">DNI</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="DNI" name="dni">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer02" class="form-label">Informacion
                                Personal</label>
                            <input type="text" class="form-control" id="validationServer02"
                                placeholder="Informacion Personal" name="informacion_personal" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Nombre de
                                Calle</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Nombre de
Calle" name="numero">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Numero</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Numero " name="nombre_calle">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">Provincia</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Provincia" name="provincia">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-10 mt-10">
                            <label for="validationServer03" class="form-label">Nombre de
                                Ciudad</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Nombre de
Ciudad" name="nombre_ciudad">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="validationServer03" class="form-label">BIS</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="BIS" name="bis">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Email</label>
                            <input type="email" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Email" name="correo_electronico">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Contraseña" name="contrasena">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Red
                                Social</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Red Social" name="red_social">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Telefono</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Telefono" name="telefono">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">Area de Trabajo Interna</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Area Interna" name="area_interna">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">Estado</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Estado" name="Estado">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">Rol</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Rol" name="rol">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit">Acepta la
                                modificacion</button>
                            <button class="btn btn-primary" type="submit">Cancelo la
                                modificacion</button>
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