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
                        <div class="col-md-12 mt-4 text-center">
                            <label for="validationServer04" class="form-label">Sexo</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="sexo" required>
                                <option selected disabled value="">Sexo...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
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
                        <div class="col-md-6 mt-5">
                            <label for="validationServer04" class="form-label">Provincia</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="provincia" required>
                                <option selected disabled value="">Selecciona una provincia...</option>
                                <option value="Buenos Aires">Buenos Aires</option>
                                <option value="Catamarca">Catamarca</option>
                                <option value="Chaco">Chaco</option>
                                <option value="Chubut">Chubut</option>
                                <option value="Cordoba">Córdoba</option>
                                <option value="Corrientes">Corrientes</option>
                                <option value="Entre Ríos">Entre Ríos</option>
                                <option value="Formosa">Formosa</option>
                                <option value="Jujuy">Jujuy</option>
                                <option value="La Pampa">La Pampa</option>
                                <option value="La Rioja">La Rioja</option>
                                <option value="Mendoza">Mendoza</option>
                                <option value="Misiones">Misiones</option>
                                <option value="Neuquén">Neuquén</option>
                                <option value="Río Negro">Río Negro</option>
                                <option value="Salta">Salta</option>
                                <option value="San Juan">San Juan</option>
                                <option value="San Luis">San Luis</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Santa Fe">Santa Fe</option>
                                <option value="Santiago del Estero">Santiago del Estero</option>
                                <option value="Tierra del Fuego">Tierra del Fuego</option>
                                <option value="Tucumán">Tucumán</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona una provincia válida.
                            </div>
                        </div>
                        <div class="col-md-6 mt-10">
                            <label for="validationServer03" class="form-label">Nombre de
                                Ciudad</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Nombre de
Ciudad" name="nombre_ciudad">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 pt-5 text-center">
                            <label for="validationServer04" class="form-label">Bis</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="bis" required>
                                <option selected disabled value="">BIS...</option>
                                <option value="0">SI</option>
                                <option value="1">NO</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
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
                        <div class="col-md-6 mt-3">
                            <label for="validationServer04" class="form-label">Área de Trabajo Interna</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="area_trabajo" required>
                                <option selected disabled value="">Selecciona un Área...</option>
                                <option value="Area 1 - Contaduría">Contaduría</option>
                                <option value="Area 2 - Administración">Administración</option>
                                <option value="Area 3 - Atención al Cliente">Atención al Cliente</option>
                                <option value="Area 4 - Sistemas">Sistemas</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona un Área de Trabajo Interna válida.
                            </div>
                        </div>
                        <div class="col-md-6 pt-3 text-center">
                            <label for="validationServer04" class="form-label">Rol</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="rol" required>
                                <option selected disabled value="">Selecciona un Rol...</option>
                                <option value="Rol 1 - Administrador/a">Administrador/a</option>
                                <option value="Rol 2 - Supervisor/a">Supervisor/a</option>
                                <option value="Rol 3 - Operador/a">Operador/a</option>
                                <option value="Rol 4 - Auxiliar">Auxiliar</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona un Rol válido.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-2 text-center">
                            <label for="validationServer04" class="form-label">Estado</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="estado_persona" required>
                                <option selected disabled value="">Estado...</option>
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
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