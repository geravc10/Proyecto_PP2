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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenidos</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!--FORMULARIO-->
    <h1 class="my-5 text-center fw-bold">Crear Dueño de Animal</h1>
    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal">
        <div class="col-md-4">
          <label for="validationServer01" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nom_for" placeholder="Nombre" required >
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationServer02" class="form-label">Apellido</label>
          <input type="text" class="form-control" id="validationServer02" placeholder="Apellido" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4">
            <label for="validationServer03" class="form-label">DNI</label>
            <input type="text" class="form-control" aria-describedby="validationServer03Feedback" placeholder="DNI">
            <div id="validationServer03Feedback" class="invalid-feedback">
              Please provide a valid city.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationServer01" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="nom_for" placeholder="Nombre" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        <div class="col-md-4">
          <label for="validationServerUsername" class="form-label">Usuario</label>
          <div class="input-group has-validation">
            <span class="input-group-text required" id="inputGroupPrepend3">@</span>
            <input type="text" class="form-control required" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" placeholder="Usuario" required>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <label for="validationServer05" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" placeholder="Contraseña">
            <div id="validationServer05Feedback" class="invalid-feedback">
              Please provide a valid zip.
            </div>
        </div>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
            <label class="form-check-label" for="invalidCheck3">
              Acepto los Terminos y Condiciones
            </label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
              Enviar.
            </div>
          </div>
        </div>
        <div class="col-12">
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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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
 