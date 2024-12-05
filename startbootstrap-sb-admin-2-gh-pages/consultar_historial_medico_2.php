<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/funcion_consultas_generales.php';
$ListaHistorial = TraerHistorialMedico($_SESSION['animal_Id'],$MiConexion);
$CantidadHistorias= count($ListaHistorial);

require_once 'funciones/funcion_consultas_generales.php';
$ListaEnfermedades = TraerEnfermedades($MiConexion);
$CantidadEnfermedades= count($ListaEnfermedades);

require_once 'funciones/funcion_consultas_generales.php';
$ListaVacunas = TraerVacunas($_SESSION['animal_Id_Especie'], $MiConexion);
$CantidadVacunas= count($ListaVacunas);

require_once 'funciones/validaciones.php';
$Mensaje = "";



if (!empty($_POST['BotonConsultar'])) {   
    
    
    $Mensaje = ValidarFechaHistorial();

    if (empty($Mensaje)) {
        foreach ($ListaHistorial as $historial) {
            if ($historial['id_historial_medico'] === $_POST['fecha']) {
                // Carga los datos en las variables de sesión
                $_SESSION['historial_medico_id'] = $historial['id_historial_medico'];
                $_SESSION['historial_medico_fecha'] = $historial['fecha_historial_medico'];
                $_SESSION['historial_medico_descripcion'] = $historial['descripcion_historial_medico'];
                $_SESSION['historial_medico_veterinario'] = $historial['vetrinario_historial_medico'];
                $_SESSION['historial_medico_enfermedad'] = $historial['enfermedad_historial_medico'];
                $_SESSION['historial_medico_vacuna'] = $historial['vacuna_historial_medico'];
                
    
                break; // Detenemos el bucle tras encontrar el registro
            }else{
                $Mensaje="no se encontro historia medica.";
            }    
        }
        header('Location: consultar_historial_medico_3.php');
        exit;        
    }
    
}



?>
<!DOCTYPE html>
<html lang="ES">
<?php
require_once 'partes_Pagina/head.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


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
                    <h1 class="my-5 text-center fw-bold">Consultar Historial Medico</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>
                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method="post">
                        <p class="text-center">Informacion del Animal y Dueño</p>
                        <div class="container vh-90 d-flex justify-content-center align-items-center">
                            <div class="row w-100 text-center">
                                <div class="col-md-12 mb-4 text-center">
                                    <label for="dniDueño" class="form-label">DNI Dueño</label>
                                    <input type="number" class="form-control" id="dniDueño" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_dni'])) ? $_SESSION['animal_dni'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="idAnimal" class="form-label">ID Animal</label>
                                    <input type="number" class="form-control" id="idAnimal" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_Id'])) ? $_SESSION['animal_Id'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="nombreAnimal" class="form-label">Nombre Animal</label>
                                    <input type="text" class="form-control" id="nombreAnimal" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_Nombre_Animal'])) ? $_SESSION['animal_Nombre_Animal'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="especie" class="form-label">Especie</label>
                                    <input type="text" class="form-control" id="especie" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_Descripcion_Especie'])) ? $_SESSION['animal_Descripcion_Especie'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="raza" class="form-label">Raza</label>
                                    <input type="text" class="form-control" id="raza" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_Descripcion_Raza'])) ? $_SESSION['animal_Descripcion_Raza'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="rol" class="form-label">Rol</label>
                                    <input type="text" class="form-control" id="rol" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_Descripcion_Rol'])) ? $_SESSION['animal_Descripcion_Rol'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="estadoActivo" class="form-label">¿Estado Activo?</label>
                                    <input type="text" class="form-control" id="estadoActivo" placeholder="" readonly
                                        value="<?php echo (!empty($_SESSION['animal_Estado_Animal'])) ? $_SESSION['animal_Estado_Animal'] : ''; ?>">
                                    <div class="invalid-feedback">Please provide a valid zip.</div>
                                </div>
                                
                            </div>
                        </div>

                        <!--
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">¿Esta castrado?</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">¿Esta vacunado?</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                    -->

                    

                        <div class="col-md-12 mt-5 mb-1 text-center">
                            <hr>
                            <h3>Seleccione historia medica</h3>
                        </div>

                    <!-- Nuevo -->    

                    <div class="col-md-4 pt-4">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Fecha</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="fecha" >
                                <option selected disabled value="">Selecciona una Fecha...</option>
                                
                                <?php 
                                $selected='';
                                for($i=0;$i<$CantidadHistorias;$i++){ 
                                    
                                    if ($_POST['fecha'] ==  $ListaHistorial[$i]['id_historial_medico']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }
                                    ?>
                                    <option value="<?php echo $ListaHistorial[$i]['id_historial_medico']; ?>" <?php echo $selected; ?>>
                                        <?php 
                                            foreach($ListaEnfermedades as $enfermedades){
                                                if($enfermedades['id_enfermedad'] == $ListaHistorial[$i]['enfermedad_historial_medico'] ){
                                                    $Enfermedad=$enfermedades['nombre_enfermedad'];
                                                }                                                    
                                            }
                                        
                                            echo $ListaHistorial[$i]['fecha_historial_medico'] . ' - ' . $Enfermedad; ?></option>
                                <?php } ?>
                                
                                <!--
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
                                <option value="Tucumán">Tucumán</option> -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona una provincia válida.
                            </div>
                        </div>

                        
                    <!-- Nuevo -->

                       

                        
                            <!--
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
                            -->
                        </div>
                        
                        <div class="col-12 text-center mt-3">
                            <button class="btn btn-primary" type="submit" value="registrar" 
                            name="BotonConsultar">Cargar Historial</button>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>