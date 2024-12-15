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
$ListaRazas = TraerRazaAnimal_2($MiConexion);
$CantidadRazas= count($ListaRazas);

require_once 'funciones/funcion_consultas_generales.php';
$ListaRoles = TraerRolAnimal_2($MiConexion);
$CantidadRoles= count($ListaRoles);

require_once 'funciones/validaciones.php';
$Mensaje = "";

if (!empty($_POST['BotonModificar'])) {

    $Mensaje = ValidarModificacionAnimal();

    if(empty($Mensaje)){

        require_once 'funciones/funcion_modificar_animal.php';
        $AnimalModificado = ModificarAnimal($MiConexion, $_SESSION['animal_Id']);

        if(empty($AnimalModificado)){
            $Mensaje="Fallo la modificacion del Dueño del animal.";
        }else{
            $Mensaje="Se modifico el Dueño del animal.";
            header('Location: consultar_animal.php');
            exit;

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
                    <h1 class="my-5 text-center fw-bold">Modificar Animal</h1>

                    <?php
                    if (!empty($Mensaje)) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $Mensaje; ?>
                        </div>
                    <?php }
                    ?>

                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal" method="post">
                        <div class="col-md-12">
                            <label for="validationServer05" class="form-label">Nombre
                                del Animal</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="Nombre del Animal"
                                name = "nombre"
                                value="<?php echo (empty($_POST['nombre'])) ? $_SESSION['animal_Nombre_Animal'] : $_POST['nombre']; ?>">
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label">Raza</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required
                                name = "raza">
                                <option selected disabled value="">Raza...</option>
                                
                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadRazas;$i++){  
                                    if(!empty($_POST['raza'])){                                   
                                        if ($_POST['raza'] ==  $ListaRazas[$i]['id_raza']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }else{
                                        if ($_SESSION['animal_Id_Raza'] ==  $ListaRazas[$i]['id_raza']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaRazas[$i]['id_raza']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaRazas[$i]['descripcion_raza']; ?></option>
                                <?php }  ?>
                                
                                <!--
                                <option>Rol 1</option>
                                <option>Rol 2</option>
                                <option>Rol 3</option>
                                -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label">Rol del
                                Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required
                                name = "rol">
                                <option selected disabled value="">Rol del Animal...</option>

                                    <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadRoles;$i++){  
                                    if(!empty($_POST['rol'])){                                   
                                        if ($_POST['rol'] ==  $ListaRoles[$i]['id_rol']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }else{
                                        if ($_SESSION['animal_Id_Rol'] ==  $ListaRoles[$i]['id_rol']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaRoles[$i]['id_rol']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaRoles[$i]['descripcion_rol']; ?></option>
                                <?php }  ?>

                                <!--    
                                <option>Rol 1</option>
                                <option>Rol 2</option>
                                <option>Rol 3</option>
                                    -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationServer04" class="form-label">Estado
                                del Animal</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" required
                                name = "estado">                               

                                <?php 
                                    $selectedBis = isset($_POST['estado']) ? $_POST['estado'] : (isset($_SESSION['animal_Estado_Animal']) ? $_SESSION['animal_Estado_Animal'] : ''); // Verificar si se ha enviado el valor
            
                                    $s0 = $selectedBis === '' ? 'selected' : ''; // Selecciona 'Estado...' si no hay valor
                                    $s1 = $selectedBis === 'si' ? 'selected' : ''; // Selecciona 'Inactivo' si se ha elegido 'no'
                                    $s2 = $selectedBis === 'no' ? 'selected' : ''; // Selecciona 'Activo' si se ha elegido 'si'
                                ?>                                
                                <option <?php echo $s0; ?> disabled value="">Estado...</option>                                
                                <option value="no" <?php echo $s2 ; ?>>Inactivo</option>
                                <option value="si" <?php echo $s1 ; ?>>Activo</option>

                                <!--
                                <option selected disabled value="">Estado del Animal...</option>
                                <option>Estado 1</option>
                                <option>Estado 2</option>
                                <option>Estado 3</option>
                                    -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripcion familiar</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                            name = "descripcion"><?php echo (!empty($_POST['descripcion']) ? $_POST['descripcion']:$_SESSION['animal_Descripcion_Familia']); ?></textarea>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit" type="submit" value="modificar" name="BotonModificar">Modificar</button>
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