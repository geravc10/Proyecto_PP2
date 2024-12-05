<?php
session_start();

if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/funcion_consultas_generales.php';
$ListaEspecies = TraerEspecieAnimal($MiConexion);
$CantidadEspecies= count($ListaEspecies);

require_once 'funciones/funcion_consultas_generales.php';
$ListaRazas = TraerRazaAnimal( $_SESSION['especie_creacion_animal'], $MiConexion);
$CantidadRazas= count($ListaRazas);

require_once 'funciones/funcion_consultas_generales.php';
$ListaRoles = TraerRolAnimal($_SESSION['especie_creacion_animal'], $MiConexion);
$CantidadRoles= count($ListaRoles);

require_once 'funciones/funcion_consultas_generales.php';
$ListaVacunas = TraerVacunas($_SESSION['especie_creacion_animal'], $MiConexion);
$CantidadVacunas= count($ListaVacunas);




require_once 'funciones/validaciones.php';
$Mensaje = "";

if (!empty($_POST['BotonRegistrar'])) {
    $Mensaje = ValidarCreacionAnimal_2();

    require_once 'funciones/funcion_consultas_generales.php';
    $id_dueno_animal=TraerIdDuenoAnimal($MiConexion,$_POST['dni']);
    $AnimalExiste=TraerAnimal($MiConexion,$_POST['codigo']);
    
    if(empty($Mensaje)){
        if(empty($id_dueno_animal)){
            $Mensaje = "El DNI no pertenece a un dueño de animal";

        }else{
            if(!empty($AnimalExiste)){
            $Mensaje = "El animal ya existe";

            }else{ 
                $_SESSION['vac1']= isset($_POST['vac1']) && $_POST['vac1'] !== '' ? $_POST['vac1'] : NULL;
                $_SESSION['vac2']= isset($_POST['vac2']) && $_POST['vac2'] !== '' ? $_POST['vac2'] : NULL;
                require_once 'funciones/funcion_crear_animal.php';
               
                $AnimalCreado = CrearAnimal($MiConexion,$id_dueno_animal);
                   
                    if(empty($AnimalCreado)){
                       $Mensaje="Fallo la creacion del animal.";

                    }else{
                         $Mensaje="Se creo el animal.";
                        //$_SESSION['usuario_creado'] = $Mensaje;        
                        header('Location: index.php');
                        exit;
                    }
                   
                }   
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
                        <h1 class="h3 mb-0
text-gray-800">Bienvenidos</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!--FORMULARIO-->
                    <h1 class="my-5 text-center fw-bold">Crear Animal</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                            
                        </div>
                    <?php }
                    ?>

                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method="post">
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label"><b style="color: red;">*</b> Nombre del animal</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="Nombre Animal"
                                name="nombre" value= "<?php echo $_SESSION['nombre_creacion_animal']; ?>" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label"><b style="color: red;">*</b> DNI del Dueño</label>
                            <input type="number" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="DNI del Dueño"
                                name="dni"
                                value= "<?php echo $_SESSION['dni_dueno_creacion_animal']; ?>" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Codigo de identificacion del animal</label>
                            <input type="number" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="Codigo..."
                                name="codigo"
                                value= "<?php echo $_SESSION['codigo_creacion_animal']; ?>" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Especie de Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required name="especie" disabled
                                >
                                <option selected disabled value="">Especie de Animal...</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadEspecies;$i++){                                     
                                        if (!empty( $_SESSION['especie_creacion_animal']) &&  $_SESSION['especie_creacion_animal'] ==  $ListaEspecies[$i]['id_especie']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    ?>
                                    <option value="<?php echo $ListaEspecies[$i]['id_especie']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaEspecies[$i]['descripcion_especie']; ?></option>
                                <?php }  ?>

                                <!---
                                <option value="perro">Perro</option>
                                <option value="gato">Gato</option>
                                <option value="ave">Ave</option>
                                <option value="reptil">Reptil</option>
                                <option value="roedor">Roedor</option>
                                <option value="pez">Pez</option>
                                <option value="otro">Otro</option>
                                --->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid species.
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Raza</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required name = "raza">
                                <option selected disabled value="">Raza...</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadRazas;$i++){                                     
                                        if (!empty($_POST['raza']) && $_POST['raza'] ==  $ListaRazas[$i]['id_raza']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    ?>
                                    <option value="<?php echo $ListaRazas[$i]['id_raza']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaRazas[$i]['descripcion_raza']; ?></option>
                                <?php }  ?>
                                <!--
                                <option>Raza 1</option>
                                <option>Raza 2</option>
                                <option>Raza 3</option>
                                -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Rol del Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required name="rol">
                                <option selected disabled value="">Rol del Animal...</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadRoles;$i++){                                     
                                        if (!empty($_POST['rol']) && $_POST['rol'] ==  $ListaRoles[$i]['id_rol']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    ?>
                                    <option value="<?php echo $ListaRoles[$i]['id_rol']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaRoles[$i]['descripcion_rol']; ?></option>
                                <?php }  ?>

                                <!--
                                <option value="mascota">Mascota</option>
                                <option value="trabajo">Animal de Trabajo</option>
                                <option value="granja">Animal de Granja</option>
                                <option value="salvaje">Animal Salvaje</option>
                                    -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid role.
                            </div>
                        </div>
                        <div class="col-md-4 text-center mt-5">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Estado del Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="estado" required>
                                
                                <?php 
                                    $selectedBis = isset($_POST['estado']) ? $_POST['estado'] : ''; // Verificar si se ha enviado el valor
            
                                    $s0 = $selectedBis === '' ? 'selected' : ''; // Selecciona 'Estado...' si no hay valor
                                    $s1 = $selectedBis === 'si' ? 'selected' : ''; // Selecciona 'Inactivo' si se ha elegido 'no'
                                    $s2 = $selectedBis === 'no' ? 'selected' : ''; // Selecciona 'Activo' si se ha elegido 'si'
                                ?>                                
                                <option <?php echo $s0; ?> disabled value="">Estado...</option>                                
                                <option value="no" <?php echo $s2 ; ?>>Inactivo</option>
                                <option value="si" <?php echo $s1 ; ?>>Activo</option>
                                
                                <!--
                                <option>ACTIVO</option>
                                <option>INACTIVO</option>
                                -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div>
                            <hr>
                                <h4>Estado de Vacunacion</h4>
                            <div class="col-md-4 text-center mt-5">
                                <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Vacuna n° 1</label>
                                <select class="form-select" id="validationServer04"
                                    aria-describedby="validationServer04Feedback"  name="vac1" required>
                                    <option  disabled value="" selected>
                                        Vacuna...</option>

                                        <?php 
                                            $selected='';                                
                                            for($i=0;$i<$CantidadVacunas;$i++){                                     
                                                    if (!empty($_POST['vac1']) && $_POST['vac1'] ==  $ListaVacunas[$i]['id_vacuna']) {
                                                        $selected = 'selected';
                                                    }else {
                                                        $selected='';
                                                    }
                                        ?>
                                    <option value="<?php echo $ListaVacunas[$i]['id_vacuna']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaVacunas[$i]['nombre_vacuna']; ?></option>
                                    <?php }  ?>

                                    <!--    
                                    <option>SI</option>
                                    <option>NO</option>
                                    -->
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>

                            <div class="col-md-4 text-center mt-5">
                                <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Vacuna n° 2</label>
                                <select class="form-select" id="validationServer04"
                                    aria-describedby="validationServer04Feedback"  name="vac2" required>
                                    <option  disabled value="" selected>
                                        Vacuna...</option>

                                        <?php 
                                            $selected='';                                
                                            for($i=0;$i<$CantidadVacunas;$i++){                                     
                                                    if (!empty($_POST['vac2']) && $_POST['vac2'] ==  $ListaVacunas[$i]['id_vacuna']) {
                                                        $selected = 'selected';
                                                    }else {
                                                        $selected='';
                                                    }
                                        ?>
                                    <option value="<?php echo $ListaVacunas[$i]['id_vacuna']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaVacunas[$i]['nombre_vacuna']; ?></option>
                                    <?php }  ?>

                                    <!--    
                                    <option>SI</option>
                                    <option>NO</option>
                                                -->
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                        </div>
                        <div>
                            <hr>
                                <h4>Estado de Castracion</h4>
                            <div class="col-md-4 text-center mt-5">
                                <label for="validationServer04" class="form-label"><b style="color: red;">*</b> Estado de castracion</label>
                                <select class="form-select" id="validationServer04"
                                    aria-describedby="validationServer04Feedback" required name="castracion">
                                    
                                <?php 
                                    $selectedBis = isset($_POST['castracion']) ? $_POST['castracion'] : ''; // Verificar si se ha enviado el valor
            
                                    $s0 = $selectedBis === '' ? 'selected' : ''; // Selecciona 'Estado...' si no hay valor
                                    $s1 = $selectedBis === 'si' ? 'selected' : ''; // Selecciona 'Inactivo' si se ha elegido 'no'
                                    $s2 = $selectedBis === 'no' ? 'selected' : ''; // Selecciona 'Activo' si se ha elegido 'si'
                                ?>                                
                                <option <?php echo $s0; ?> disabled value="">Estado...</option>                                
                                <option value="no" <?php echo $s2 ; ?>>No Castrado</option>
                                <option value="si" <?php echo $s1 ; ?>>Castrado</option>

                                    <!--
                                    <option selected disabled value="">
                                        Castracion...</option>
                                    <option>SI</option>
                                    <option>NO</option>
                                                -->
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label for="exampleFormControlTextarea1" class="form-label"><b style="color: red;">*</b> Descripcion de la Familia del animal</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                            name="descripcion"><?php echo (!empty($_POST['descripcion']) ? $_POST['descripcion']:''); ?></textarea>
                        </div>
                        <div class="col-12 mt-4 text-center">
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
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button class="btn btn-primary" type="submit" value="registrar" name="BotonRegistrar">
                                Enviar</button>
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
        ?>
</body>

</html>