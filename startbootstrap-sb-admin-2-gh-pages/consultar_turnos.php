<?php
session_start();

if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/funcion_consultas_generales.php';
$Vete=TraerIdVeterinarios($MiConexion, $_SESSION['usuario_dni']);
$CantidadVete= count($Vete);
$idVete=$Vete[0]['id_veterinario'];

require_once 'funciones/funcion_consulta_turno.php';
$Turnos=ConsultaTurnoVete($MiConexion,$idVete);
$CantidadTurnos= count($Turnos);



require_once 'funciones/funcion_consultar_campania.php';
$campanias=DatosCampanias($MiConexion);
$CantidadCampanas= count($campanias);

require_once 'funciones/funcion_consultas_generales.php';
$TipoCamp=TraerCampanias($MiConexion);
$CantidadTipoCamp= count($TipoCamp);

require_once 'funciones/funcion_consultas_generales.php';
$Especies=TraerEspecieAnimal($MiConexion);
$CantidadEspecies= count($Especies);



require_once 'funciones/validaciones.php';

$Mensaje="";

if(!empty($_POST['BotonConsultar'])){
    $Mensaje= ValidarBuscarCampana_2();
    if(empty($Mensaje) && !empty($_POST['id_turno'])){
        $turnito="";
        foreach($Turnos as $tur){
            if($tur['id_turno_dado'] == $_POST['id_turno']){
                $turnito=$tur['id_turno_dado'];
                break;
            }
        }
        if(!empty($turnito)){
            require_once 'funciones/funcion_modificar_turno.php';
            $atendido=TurnoAtendido($MiConexion,$_POST['id_turno']);
            if(!empty($atendido)){
                $_SESSION['mensaje']="Se marco el turno como atendido";
                header('Location: index.php');
                exit;
            }
        }else{
            $Mensaje="El turno no se encuentra en la lista de Turnos Activos";
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
                    <h1 class="my-5 text-center fw-bold">Informacion de Turnos Activos</h1>

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
                                    Datos de Turnos</h6>
                            </div>
                            
                            <div class="card-body" >
                                <div class="table-responsive">
                                
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id del Turno </th>
                                                <th>Nombre del Animal </th>
                                                <th>Id del Animal </th>
                                                <th>Especie</th>
                                                <th>Nombre y Apellido del Dueño</th>
                                                <th>Tipo de Atencion</th>                                                
                                                <th>Fecha</th>
                                                <th>Hora</th>                                                
                                                <th>Telefono del Dueño</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php
                                            if (!empty($campanias)) {
                                                foreach ($Turnos as $campania) {
                                                    echo "<tr>";
                                                    // Agregar un checkbox por cada fila, con el valor del id_campana
                                                    echo "<td>". $campania['id_turno_dado'] . "</td>";
                                                    echo "<td>". $campania['nombre_animal_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['id_animal_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['especie_animal_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['nombre_dueno_turno_dado'] . ' ' . $campania['apellido_dueno_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['tipo_atencion_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['fecha_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['hora_turno_dado'] . "</td>";
                                                    echo "<td>" . $campania['telefono_dueno_turno_dado'] . "</td>";                                                    
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
                        $_SESSION['usuario_nivel'] == 1
                    ) { ?>
                        <div class="col-md-12">
                            <label for="validationServer03" class="form-label">ingrese el Id del Turno que dese marcar como Atendido:</label>
                            <input type="number" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="ID" name="id_turno">
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