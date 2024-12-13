<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();


$id=$_SESSION['id_campana_elegida'];
$nombre=$_SESSION['nombre_campana_elegida'];
$tipo=$_SESSION['id_tipo_campana_elegida'];
$especie=$_SESSION['id_especie_campana_elegida'];
$veteriario=$_SESSION['id_veterinario_campana_elegida'];
$fechaInicio=$_SESSION['fecha_inicio_campana_elegida'];
$fechaFin=$_SESSION['fecha_fin_campana_elegida'];
$primerTurno=$_SESSION['primer_turno_campana_elegida'];
$cantidadTurnos=$_SESSION['cant_turno_campana_elegida'];
$duracion=$_SESSION['duracion_turno_campana_elegida'];
$intervalo=$_SESSION['intervalo_turno_campana_elegida'];

require_once 'funciones/funcion_consultas_generales.php';
$ListaCampanas = TraerCampanias($MiConexion);
$CantidadCampanas= count($ListaCampanas);

require_once 'funciones/funcion_consultas_generales.php';
$ListaEspecies = TraerEspecieAnimal($MiConexion);
$CantidadEspecies= count($ListaEspecies);

require_once 'funciones/funcion_consultas_generales.php';
$ListaVeterinarios = TraerVeterinarios_2($MiConexion);
$CantidadVeterinarios= count($ListaVeterinarios);

$hoy = new DateTime();            
$inicio = new DateTime($fechaInicio);
$fin = new DateTime($fechaFin);
$maxInicio = new DateTime($hoy->format('Y-m-d H:i:s'));
$maxInicio->modify('+6 months');
$maxFin = new DateTime($inicio->format('Y-m-d H:i:s'));
$maxFin->modify('+1 week');
$soloLectura="";
if($inicio<$hoy){
    $soloLectura="readonly";
    $_POST['soloLectura']= $soloLectura;
}

require_once 'funciones/validaciones.php';
$Mensaje = "";

if(!empty($_POST['BotonModificar'])){

    $Mensaje= ValidarmodificacionCampana();
    if(empty($Mensaje)){

        $Mensaje="Modiffff!";

        require_once 'funciones/funcion_modificar_campana.php';
            $CampanaModificada = ModificarCampana( $MiConexion, $id);
    
            if(empty($CampanaModificada)){
                $Mensaje="Fallo la modificacion de la campaña.";
            }else{                
                $_SESSION['mensaje']="Se modifico la campaña.";
                header('Location: index.php');
                exit;
    
            }
        /*
        require_once 'funciones/funcion_crear_campania.php';
        $HistorialCreado = CrearCampana($MiConexion);

        if(empty($HistorialCreado)){
            $Mensaje="Fallo la creacion del Historial.";
        }else{
            header('Location: index.php');
            exit;
        }*/
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
                    <div class="d-sm-flex align-items-center
justify-content-between mb-4">
                        <h1 class="h3 mb-0
text-gray-800">Bienvenidos</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!--FORMULARIO-->
                    <h1 class="my-5 text-center fw-bold">Modificar Capaña</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>

<!--Campaña -->

                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_campania" method="post">
                        <div class="col-md-6">
                            <label for="validationServer01" class="form-label">Nombre de la Campaña</label>
                            <input type="text" class="form-control" id="validationServer01" placeholder="Nombre"
                                name="nombre_campana"  value= "<?php echo (!empty($_POST['nombre_campana']) ? $_POST['nombre_campana']:$nombre); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6 pt-5 text-center">
                            <label for="validationServer04" class="form-label">Tipo de Campaña</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="tipo_campana" >
                                <option selected disabled value="">Seleccione Campaña</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadCampanas;$i++){
                                    if(!empty($_POST['tipo_campana'])){ 
                                        if ( $_POST['tipo_campana'] ==  $ListaCampanas[$i]['id_campana']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    } else{
                                        $selected = ($tipo == $ListaCampanas[$i]['id_campana']) ? 'selected' : '';
                                    }
                                    ?>
                                    <option value="<?php echo $ListaCampanas[$i]['id_campana']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaCampanas[$i]['descripcion_campana']; ?></option>
                                <?php }  ?>
                                    <!--
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option> -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="col-md-6 pt-5 text-center">
                            <label for="validationServer04" class="form-label">Especie objetivo de la campaña</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="especie" >
                                <option selected disabled value="">Seleccione Especie</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadEspecies;$i++){                                     
                                    if (!empty($_POST['especie'])){
                                        if($_POST['especie'] ==  $ListaEspecies[$i]['id_especie']){
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                        
                                    }else{
                                        $selected = ($especie == $ListaEspecies[$i]['id_especie']) ? 'selected' : '';
                                    }
                                
                                    ?>
                                    <option value="<?php echo $ListaEspecies[$i]['id_especie']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaEspecies[$i]['descripcion_especie']; ?></option>
                                <?php }  ?>
                                    
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                        <div class="col-md-6 pt-5 text-center">
                            <label for="validationServer04" class="form-label">Veterinario a cargo</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="veterinario" >
                                <option selected disabled value="">Seleccione Veterinario</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadVeterinarios;$i++){                                     
                                        if (!empty( $_POST['veterinario'])){
                                            if($_POST['veterinario'] ==  $ListaVeterinarios[$i]['id_veterinario']){
                                                $selected = 'selected';
                                            }else {
                                                $selected='';
                                            }
                                        }else{
                                            $selected = ($veteriario == $ListaVeterinarios[$i]['id_veterinario']) ? 'selected' : '';
                                        }
                                        
                                            
                                    ?>
                                    <option value="<?php echo $ListaVeterinarios[$i]['id_veterinario']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaVeterinarios[$i]['nombre_veterinario'].' '.$ListaVeterinarios[$i]['apellido_veterinario'] ; ?></option>
                                <?php }  ?>
                                    
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Fecha de
                                Inicio</label>
                            <input type="date" class="form-control" id="validationServer02"
                                placeholder="Fecha de Inicio" name="fecha_inicio"  <?php echo $soloLectura;?>
                                value= "<?php echo (!empty($_POST['fecha_inicio']) ? $_POST['fecha_inicio']:$fechaInicio); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Fecha de fin</label>
                            <input type="date" class="form-control" id="validationServer02"
                                placeholder="Fecha de Inicio" name="fecha_fin"  
                                value= "<?php echo (!empty($_POST['fecha_fin']) ? $_POST['fecha_fin']:$fechaFin); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">
                                Horario del primer turno
                            </label>
                            <input type="time" class="form-control" id="validationServer02"
                                placeholder="horario" name="horario"
                                min="07:00" max="19:00"
                                value="<?php echo (!empty($_POST['horario']) ? $_POST['horario'] : $primerTurno); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Cantidad de turnos por dia</label>
                            <input type="number" class="form-control" id="validationServer02"
                                placeholder="cantidad" name="cantidad"  
                                value= "<?php echo (!empty($_POST['cantidad']) ? $_POST['cantidad']:$cantidadTurnos); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">
                                Duracion del turno (en minutos)
                            </label>
                            <input type="number" class="form-control" id="validationServer02"
                                placeholder="duracion" name="duracion"
                                min="0" max="180" step="1"
                                value="<?php echo (!empty($_POST['duracion']) ? $_POST['duracion'] : $duracion); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">
                                Intervalo entre turnos (en minutos)
                            </label>
                            <input type="number" class="form-control" id="validationServer02"
                                placeholder="Intervalo" name="intervalo"
                                min="0" max="60" step="1"
                                value="<?php echo (!empty($_POST['intervalo']) ? $_POST['intervalo'] : $intervalo); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <!--
                        <div class="col-md-4">
                            <label for="validationServer02" class="form-label"><b style="color: red;">*</b> Nacionalidad</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="Nacionalidad"
                                name="nacionalidad" required value= "<?php echo (!empty($_POST['nacionalidad']) ? $_POST['nacionalidad']:''); ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        -->

                       



                        <!-- ATENCION: NO PUSE ESTADO PORQUE PASA A ACTIVA CUANDO LLEGA A LA FECHA.
                                    EN LA MODIFICACION SI SE VA A PODER PASAR MANUALMENTE EL ESTADO.

                        <div class="col-md-12 pt-5 text-center">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Estado</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="estado" >
                                
                                
                                <?php 
                                    $selectedBis = isset($_POST['estado']) ? $_POST['estado'] : ''; // Verificar si se ha enviado el valor
            
                                    $s0 = $selectedBis === '' ? 'selected' : ''; // Selecciona 'Estado...' si no hay valor
                                    $s1 = $selectedBis === 'si' ? 'selected' : ''; // Selecciona 'Inactivo' si se ha elegido 'no'
                                    $s2 = $selectedBis === 'no' ? 'selected' : ''; // Selecciona 'Activo' si se ha elegido 'si'
                                ?>                                
                                <option <?php echo $s0; ?> disabled value="">Estado de Campaña</option>                                
                                <option value="si" <?php echo $s2 ; ?>>Activa</option>
                                <option value="no" <?php echo $s1 ; ?>>Inactiva</option>
                                
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                                -->
                        <div class="col-12 text-center">
                            <div class="form-check mt-4">
                                <input class="form-check-input" type="checkbox"  id="invalidCheck3"
                                    aria-describedby="invalidCheck3Feedback" required name="acepto"
                                    value= "<?php echo (!empty($_POST['acepto']) ? $_POST['acepto']:''); ?>">
                                <label class="form-check-label" for="invalidCheck3">
                                    Acepto los Terminos y Condiciones
                                </label>
                                <div id="invalidCheck3Feedback" class="invalid-feedback">
                                    Enviar.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit" value="modificar" name="BotonModificar">
                                Acepta la modificacion</button>
                            <button class="btn btn-primary" type="submit">
                                Cancelo la modificacion</button>
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
</body>

</html>