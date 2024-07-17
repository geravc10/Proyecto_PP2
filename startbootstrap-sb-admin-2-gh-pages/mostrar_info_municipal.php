<?php
session_start();
<<<<<<< HEAD

if(empty($_SESSION['usuario_nombre'])){
    header('Location: cerrar_sesion.php');
    exit;
}
?> 
=======
if(empty($_SESSION['usuario_nombre'])){
header('Location: cerrar_sesion.php');
exit;
}
?>
>>>>>>> GERA-FRONTEND
<!DOCTYPE html>
<html lang="ES">
<?php
require_once 'partes_Pagina/head.php';
?>
<body id="page-top">
<<<<<<< HEAD
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
    <h1 class="my-5 text-center fw-bold">Informacion de Municipal</h1>
    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Datos de .......</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>APELLIDO</th>
                                            <th>DNI</th>
                                            <th>AÑOS</th>
                                            <th>N° HABILITACION</th>
                                            <th>DIRECCION</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NOMBRE</th>
                                            <th>APELLIDO</th>
                                            <th>DNI</th>
                                            <th>AÑOS</th>
                                            <th>N° HABILITACION</th>
                                            <th>DIRECCION</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $_SESSION['municipal_nombre']; ?></td>
                                            <td><?php echo $_SESSION['municipal_apellido']; ?></td>
                                            <td><?php echo $_SESSION['municipal_dni']; ?></td>
                                            <td><?php echo $_SESSION['municipal_fecha']; ?></td>
                                            <td><?php echo $_SESSION['municipal_telefono'].' '.$_SESSION['municipal_area'].' '.$_SESSION['municipal_rol']; ?></td>
                                            <td><?php echo $_SESSION['municipal_direccion'].' '.$_SESSION['municipal_ciudad'].' '.$_SESSION['municipal_provincia']; ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>45789123</td>
                                            <td>63</td>
                                            <td>456789123</td>
                                            <td>Rivadavia N° 128</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal">Modificar</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
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

<!-- Modificar Modal -->
<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyModalLabel">Necesita Modificar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea modificar los datos?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Eliminar Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Necesita Eliminar?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
 
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
    ?>
 
=======
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
<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i
class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>
</div>
<!--FORMULARIO-->
<h1 class="my-5 text-center fw-bold">Informacion de Municipal</h1>
<form class="row g-3 m-4 my-5 p-3 mx-auto"
id="formulario_E_Municipal">
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
<h6 class="m-0 font-weight-bold
text-primary">Datos de .......</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered"
id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>NOMBRE</th>
<th>APELLIDO</th>
<th>DNI</th>
<th>AÑOS</th>
<th>N° HABILITACION</th>
<th>DIRECCION</th>
</tr>
</thead>
<tfoot>
<tr>
<th>NOMBRE</th>
<th>APELLIDO</th>
<th>DNI</th>
<th>AÑOS</th>
<th>N° HABILITACION</th>
<th>DIRECCION</th>
</tr>
</tfoot>
<tbody>
<tr>
<td><?php echo
$_SESSION['municipal_nombre']; ?></td>
<td><?php echo
$_SESSION['municipal_apellido']; ?></td>
<td><?php echo
$_SESSION['municipal_dni']; ?></td>
<td><?php echo
$_SESSION['municipal_fecha']; ?></td>
<td><?php echo
$_SESSION['municipal_telefono'].' '.$_SESSION['municipal_area'].'
'.$_SESSION['municipal_rol']; ?></td>
<td><?php echo
$_SESSION['municipal_direccion'].' '.$_SESSION['municipal_ciudad'].'
'.$_SESSION['municipal_provincia']; ?> </td>
</tr>
<tr>
<td>Garrett Winters</td>
<td>Accountant</td>
<td>45789123</td>
<td>63</td>
<td>456789123</td>
<td>Rivadavia N° 128</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-12 text-center">
<button type="button" class="btn
btn-primary" data-toggle="modal"
data-target="#modifyModal">Modificar</button>
<button type="button" class="btn
btn-danger" data-toggle="modal"
data-target="#deleteModal">Eliminar</button>
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
<!-- Modificar Modal -->
<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog"
aria-labelledby="modifyModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"
id="modifyModalLabel">Necesita Modificar?</h5>
<button type="button" class="close"
data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
¿Está seguro que desea modificar los datos?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-dismiss="modal">Cancelar</button>
<button type="button" class="btn
btn-primary">Aceptar</button>
</div>
</div>
</div>
</div>
<!-- Eliminar Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1"
role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title"
id="deleteModalLabel">Necesita Eliminar?</h5>
<button type="button" class="close"
data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
¿Está seguro que desea eliminar este registro?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-dismiss="modal">Cancelar</button>
<button type="button" class="btn
btn-danger">Aceptar</button>
</div>
</div>
</div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1"
role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">¿Ya
te vas <?php echo $_SESSION['usuario_nombre']; ?>?</h5>
<button class="close" type="button"
data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">Selecciona "Cerrar Sesion" si
queres cerrar esta sesion.</div>
<div class="modal-footer">
<button class="btn btn-secondary" type="button"
data-dismiss="modal">Cancelar</button>
<a class="btn btn-primary"
href="cerrar_sesion.php">Cerrar Sesion</a>
</div>
</div>
</div>
</div>
<?php
require_once 'partes_Pagina/script.php';
?>
>>>>>>> GERA-FRONTEND
</body>
</html>