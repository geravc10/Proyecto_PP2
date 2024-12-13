<?php
session_start();

if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/funcion_consultar_campania.php';
$campanias=DatosCampanias($MiConexion);
$CantidadCampanas= count($campanias);

require_once 'funciones/funcion_consultas_generales.php';
$TipoCamp=TraerCampanias($MiConexion);
$CantidadTipoCamp= count($TipoCamp);

require_once 'funciones/funcion_consultas_generales.php';
$Especies=TraerEspecieAnimal($MiConexion);
$CantidadEspecies= count($Especies);

require_once 'funciones/funcion_consultas_generales.php';
$Vete=TraerVeterinarios_2($MiConexion);
$CantidadVete= count($Vete);

require_once 'funciones/validaciones.php';

$Mensaje="";

if(!empty($_POST['BotonConsultar'])){
    $Mensaje= ValidarBuscarCampana();
    if(empty($Mensaje) && !empty($_POST['id'])){

        require_once 'funciones/funcion_consultar_campania.php';
        $CampaniaElegida=DatosCampanias_3($MiConexion, $_POST['id']);
        
        if(!empty($CampaniaElegida)){
            $_SESSION['id_campana_elegida']=$CampaniaElegida['0']['id_campana'];
            $_SESSION['id_tipo_campana_elegida']=$CampaniaElegida['0']['id_tipo_campana'];
            $_SESSION['id_municipal_campana_elegida']=$CampaniaElegida['0']['id_municipal_campana'];
            $_SESSION['nombre_campana_elegida']=$CampaniaElegida['0']['descripcion_campana'];
            $_SESSION['fecha_creacion_campana_elegida']=$CampaniaElegida['0']['fecha_creacion_campana'];
            $_SESSION['fecha_inicio_campana_elegida']=$CampaniaElegida['0']['fecha_inicio_campana'];
            $_SESSION['fecha_fin_campana_elegida']=$CampaniaElegida['0']['fecha_fin_campana'];
            $_SESSION['estado_campana_elegida']=$CampaniaElegida['0']['estado_campana'];
            $_SESSION['id_especie_campana_elegida']=$CampaniaElegida['0']['id_especie_campana'];
            $_SESSION['id_veterinario_campana_elegida']=$CampaniaElegida['0']['id_veterinario_campana'];
            $_SESSION['primer_turno_campana_elegida']=$CampaniaElegida['0']['primer_turno_campana'];
            $_SESSION['cant_turno_campana_elegida']=$CampaniaElegida['0']['canitdad_turno_campana'];
            $_SESSION['duracion_turno_campana_elegida']=$CampaniaElegida['0']['duracion_turno_campana'];
            $_SESSION['intervalo_turno_campana_elegida']=$CampaniaElegida['0']['intervalo_turno_campana'];

            header('Location: modificar_campania.php');
            exit;
        }else{
            $Mensaje=$_POST['id'] . "No se encontro la campaña que indicaste. Verifica que hayas cargado el Id de campaña correctamente";
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenidos</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!--FORMULARIO-->
                    <h1 class="my-5 text-center fw-bold">Informacion de Campañas</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>

                    <form class="row g-3 m-4 my-5 p-3 mx-auto width=100% id="formulario_E_Municipal" method="post">
                        
                    <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Datos de Campañas Activas</h6>
                            </div>
                            
                            <div class="card-body" >
                                <div class="table-responsive">
                                
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id Campaña</th>
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
                                        <?php
                                            if (!empty($campanias)) {
                                                foreach ($campanias as $campania) {
                                                    echo "<tr>";
                                                    // Agregar un checkbox por cada fila, con el valor del id_campana
                                                    echo "<td>". $campania['id_campana'] . "</td>";
                                                    echo "<td>" . $campania['descripcion_campana'] . "</td>";
                                                    $c = "";
                                                    foreach ($TipoCamp as $tipo) {
                                                        if ($tipo['id_campana'] == $campania['id_tipo_campana']) {
                                                            $c = $tipo['descripcion_campana'];
                                                        }
                                                    }
                                                    echo "<td>" . $c . "</td>";
                                                    $e = "";
                                                    foreach ($Especies as $esp) {
                                                        if ($esp['id_especie'] == $campania['id_especie_campana']) {
                                                            $e = $esp['descripcion_especie'];
                                                        }
                                                    }
                                                    echo "<td>" . $e . "</td>";
                                                    $v = "";
                                                    foreach ($Vete as $vet) {
                                                        if ($vet['id_veterinario'] == $campania['id_veterinario_campana']) {
                                                            $v = $vet['nombre_veterinario'] . ' ' . $vet['apellido_veterinario'];
                                                        }
                                                    }
                                                    echo "<td>" . $v . "</td>";
                                                    echo "<td>" . $campania['fecha_inicio_campana'] . "</td>";
                                                    echo "<td>" . $campania['fecha_fin_campana'] . "</td>";
                                                    echo "<td>" . $campania['primer_turno_campana'] . "</td>";
                                                    echo "<td>" . $campania['canitdad_turno_campana'] . "</td>";
                                                    echo "<td>" . $campania['duracion_turno_campana'] . " minutos</td>";
                                                    echo "<td>" . $campania['intervalo_turno_campana'] . " minutos</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='10'>No hay campañas activas disponibles.</td></tr>";
                                            }
                                            ?>
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
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">ingrese el Id de la Campaña que desea modificar:</label>
                            <input type="number" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="ID" name="id">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-12 text-center">
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit" value="Login"
                            name="BotonConsultar">Modificar</button>
                        </div>
                            <!--
                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modifyModal" name="modificar">Modificar</button>
                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
                            -->
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