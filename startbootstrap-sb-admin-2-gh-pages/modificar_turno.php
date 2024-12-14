<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

$idTurno=$_SESSION['id_turno_este_animal'];
$fechaTurno=$_SESSION['fecha_turno_este_animal'];
$horaTurno=$_SESSION['hora_turno_este_animal'];

require_once 'funciones/funcion_consultas_generales.php';
$ListaTurnosVacu = TraerTurnosVacunacion($MiConexion,$_SESSION['especie_animal_vacunacion']);
$CantidadTurnosVacu= count($ListaTurnosVacu);

require_once 'funciones/validaciones.php';
$Mensaje = "";
$Apto="";
$puede="";

if(!empty($_POST['BotonTurno'])){
    $Mensaje= ValidarTurno();
    if(empty($Mensaje)){
        
        if($_POST['pass'] == $_SESSION['usuario_contrasena']){
            require_once 'funciones/funcion_modificar_turno.php';
            $turnoModificado=ModificarTurnoVacu($MiConexion,$idTurno,$_POST['turno']);

            if(empty($turnoModificado)){
                $Mensaje="no se modifico el turno";
            }else{
                //$_SESSION['Mensaje']="Turno Modificado";
                $_SESSION['id_turno_este_animal']=$_POST['turno'];

                require_once 'funciones/funcion_consultas_generales.php';
                $idDuenoAnimal = TraerIdDuenoAnimal($MiConexion, $_SESSION['usuario_dni']);
                $_POST['id_dueno_animal']=$idDuenoAnimal;                
                $_POST['id_campana']=$ListaTurnosVacu['0']['id_campana'];

                require_once 'funciones/funcion_consultas_generales.php';
                $datosAnimal = TraerAnimalCompleto($MiConexion, $_SESSION['codigo_animal_para_turnos']);
                $_SESSION['especie_animal_vacunacion']=$datosAnimal['id_especie_animal'];


                require_once 'funciones/funcion_consultas_generales.php';
                $ListaTurnosReservados = TraerTurnosReservadosVacu($MiConexion, $_SESSION['codigo_animal_para_turnos']);

                if ($datosAnimal !== null && empty($ListaTurnosReservados)) { // Verificar si se encontró el animal
                    foreach ($ListaTurnosVacu as $turno) {
                        if ($turno['estado_campana'] == 1 &&
                            $turno['especie_campana'] == $datosAnimal['id_especie_animal'] &&
                            $datosAnimal['estado_animal'] ==1) {
                            $Apto = "¡Sí, puedes inscribir a tu animal en la campaña de vacunación!";
                            $puede=1;
                            break;
                        }
                    }
                }
                if(!empty($puede)){
                    $_SESSION['apto_vacuna_codigo']=$datosAnimal['codigo_animal'];
                    $_SESSION['apto_vacuna_especie']=$datosAnimal['id_especie_animal'];
                    $_SESSION['apto_vacuna_raza']=$datosAnimal['id_raza_animal'];
                    $_SESSION['apto_vacuna_rol']=$datosAnimal['id_rol_animal'];
                    $_SESSION['apto_vacuna_nombre']=$datosAnimal['nombre_animal'];
                    $_SESSION['apto_vacuna_estado']=$datosAnimal['estado_animal'];
                    require_once 'funciones/funcion_reservar_turnos.php';
                    $turnoReservado= ReservarTurno($MiConexion);

                    if(!empty($turnoReservado)){
                        $_SESSION['Mensaje']="Turno modificado con exito!";
                        header('Location: index.php');
                        exit;
                    }
                }
            }
        }else{
            $Mensaje="Contraseña incorrecta";
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
                    <div class="d-sm-flex align-items-center
justify-content-between mb-4">
                        <!--
                        <h1 class="h3 mb-0 text-gray-800">Bienvenido
                            <?php echo $_SESSION['usuario_nombre'] . ' ' .
                                $_SESSION['usuario_apellido']; ?>
                        </h1>
-->
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!-- nav index -->

                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand mr-5">Necesitas Informacion?</a>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="campania_vacunacion.php">Campaña de Vacunacion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="campania_castracion.php">Campaña Castracion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="campania_informacion.php">Informacion Municipal</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!-- CAMPAÑA DE VACUNACION -->
                    <div class="container-fluid text-center">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="text-center">Campaña de Vacunación</h1>

                                    <?php
                                        if (!empty($Mensaje)) { ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <i class="bi bi-exclamation-triangle me-1"></i>
                                                <?php echo $Mensaje; ?>
                                            </div>
                                        <?php }
                                        ?>

                                    <div class="container mt-5">
                                        <!--
                                        <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_campania" method="post">
                                            <h4 class="text-center mb-4">Consulta si tu animal es apto para esta
                                                vacunacion:</h4>

                                            <div class="row d-flex justify-content-center">
                                                <div class="col-6">
                                                    <label for="nombre" class="form-label">ID Animal</label>
                                                    <input type="number" class="form-control" id="nombre"
                                                        placeholder="ID Animal" name="codigo" required
                                                        value= "<?php echo $_SESSION['apto_vacuna_codigo']; ?>">
                                                </div>
                                                <div class="text-center mt-4">
                                                    <button class="btn btn-primary" type="submit" value="registrar" name="BotonRegistrar">Consultar</button>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-4">
                                                <label for="validationServer05" class="form-label">¿Tu animal esta
                                                    apto?</label>
                                                <input type="text" class="form-control" id="validationServer05"
                                                    aria-describedby="validationServer05Feedback" placeholder=""
                                                    readonly name="apto" value= "Sí, es apto. Selecciona un turno.">
                                                <div id="validationServer05Feedback" class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>

                                        </form>
                                        -->

                                                                             
                                        <form form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_campania_2" method="post">
                                            <div class="col-md-12 mt-5 mb-1 text-center">
                                                <div class="col-md-12 mt-4">
                                                    <label for="validationServer05" class="form-label">Tu animal tiene turno:</label>
                                                    <input type="text" class="form-control" id="validationServer05"
                                                    aria-describedby="validationServer05Feedback" placeholder=""
                                                    readonly name="apto" value="El día: <?php echo $fechaTurno; ?> a la hora: <?php echo $horaTurno; ?>" class="invalid-feedback">                                                    
                                                </div>
                                                <hr>
                                            </div>
                                            <h4 class="text-center mt-5">Selecciona el dia y hora del turno que necesitas:
                                            </h4>

                                            <div class="mb-3 mt-5">
                                                <label for="fecha" class="form-label">Selecciona una fecha
                                                    disponible</label>
                                                <select class="form-select" id="fecha" required name="turno">
                                                    <option selected disabled>Selecciona un turno</option>

                                                    <?php 
                                                        $selected='';                                
                                                        for($i=0;$i<$CantidadTurnosVacu;$i++){                                     
                                                                if (!empty( $_POST['turno']) && $_POST['turno'] ==  $ListaTurnosVacu[$i]['id_turno']) {
                                                                    $selected = 'selected';
                                                                }else {
                                                                    $selected='';
                                                                }
                                                            ?>
                                                            <option value="<?php echo $ListaTurnosVacu[$i]['id_turno']; ?>" <?php echo $selected; ?>>
                                                                <?php echo $ListaTurnosVacu[$i]['fecha_turno'].' - '. $ListaTurnosVacu[$i]['hora_inicio_turno'].' - '.$ListaTurnosVacu[$i]['hora_fin_turno'] ; ?></option>
                                                        <?php }  ?>
                                                    
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="mail" class="form-label text-start">Ingrese su Contraseña para
                                                    confirmar turno:</label>
                                                <input type="password" class="form-control mt-2" id="mail"
                                                    placeholder="Contraseña"  required name="pass"
                                                    value= "<?php echo (!empty($_POST['pass']) ? $_POST['pass']:''); ?>">
                                            </div>
                                            <div class="col-md-12 mt-5 mb-1 text-center">
                                                <hr>
                                            </div>
                                            <div class="col-12 mt-4 text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="invalidCheck3" aria-describedby="invalidCheck3Feedback"
                                                        required>
                                                    <label class="form-check-label" for="invalidCheck3">
                                                        Acepto los Terminos y Condiciones
                                                    </label>
                                                    <div id="invalidCheck3Feedback" class="invalid-feedback">
                                                        Enviar.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 mt-5">
                                                <button class="btn btn-primary" type="submit" value="turno" name="BotonTurno">Reservar Turno</button>
                                            </div>
                                        </form>
                                                                
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <h5 class="modal-title" id="exampleModalLabel">¿Ya
                            te vas <?php echo $_SESSION['usuario_nombre']; ?>?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Selecciona "Cerrar Sesion" si
                        queres cerrar esta sesion. </div>
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