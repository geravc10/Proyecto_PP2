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
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!--FORMULARIO-->
                    <h1 class="my-5 text-center fw-bold">Informacion de Campaña</h1>
                    <form class="row g-3 m-4 my-5 p-3 mx-auto width=100% id="formulario_E_Municipal">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Datos de <?php echo $_SESSION['veterinario_nombre']; ?></h6>
                            </div>
                            
                            <div class="card-body" >
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre de Campaña</th>
                                                <th>Tipo de Campaña</th>
                                                <th>Especie objetivo de la Campaña</th>
                                                <th>Nombre Veterinario a Cargo</th>
                                                <th>Fecha de Inicio</th>
                                                <th>Fecha de Fin</th>
                                                <th>Horario del primer turno</th>
                                                <th>Cantidad de turnos por dia</th>
                                                <th>Duracion del turno (minutos)</th>
                                                <th>Intervalo entre turnos (minutos)</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>DNI</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Años</th>
                                                <th>Nacionalidad</th>
                                                <th>Sexo</th>
                                                <th>Direccion</th>
                                                <th>Provincia</th>
                                                <th>Email</th>
                                                <th>Red Social</th>
                                                <th>Telefono</th>
                                                <th>Area de Trabajo</th>
                                                <th>Rol de Trabajo</th>
                                                <th>Activo</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                            <!-- <tr>
                                                <td><?php echo
                                                    $_SESSION['municipal_nombre']; ?></td>
                                                <td><?php echo
                                                    $_SESSION['municipal_apellido']; ?></td>
                                                <td><?php echo
                                                    $_SESSION['municipal_dni']; ?></td>
                                                <td><?php echo
                                                    $_SESSION['municipal_fecha']; ?></td>
                                                <td><?php echo
                                                    $_SESSION['municipal_telefono'] . ' ' . $_SESSION['municipal_area'] . '
' . $_SESSION['municipal_rol']; ?></td>
                                                <td><?php echo
                                                    $_SESSION['municipal_direccion'] . ' ' . $_SESSION['municipal_ciudad'] . '
' . $_SESSION['municipal_provincia']; ?> </td>
                                            </tr> -->
                                            <tr>    
                                                <td><?php echo $_SESSION['veterinario_dni']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_nombre'].' '.$_SESSION['veterinario_apellido'] ; ?></td>
                                                <td><?php echo $_SESSION['veterinario_fecha']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_edad']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_nacionalidad']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_sexo']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_direccion'].' '.$_SESSION['veterinario_numero'].' '.$_SESSION['veterinario_bis'].', '.$_SESSION['veterinario_ciudad']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_provincia']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_mail']; ?></td>
                                                <td><?php echo $_SESSION['veterinario_red']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php 
                    if (
                        $_SESSION['usuario_nivel'] == 1 ||
                        $_SESSION['usuario_nivel'] == 2
                    ) { ?>
                        <div class="col-12 text-center">
                            <button type="button" class="btn
btn-primary" data-toggle="modal" data-target="#modifyModal">Modificar</button>
                            <button type="button" class="btn
btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
                        </div>
                        <?php } ?>
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
        <div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel"
            aria-hidden="true">
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
                        <button type="button" class="btn btn-danger" onclick="window.location.href='modificar_campania.php'">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Eliminar Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
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
                        <button type="button" class="btn
btn-danger">Aceptar</button>
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
        require_once 'partes_Pagina/footer.php';
        ?>
</body>

</html>