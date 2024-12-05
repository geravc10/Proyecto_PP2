<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

require_once 'funciones/funcion_consultas_generales.php';
$ListaSexo = TraerSexo($MiConexion);
$CantidadSexo= count($ListaSexo);

require_once 'funciones/funcion_consultas_generales.php';
$ListaProvincia = TraerProvincia($MiConexion);
$CantidadProvinvia= count($ListaProvincia);

require_once 'funciones/funcion_consultas_generales.php';
$ListaEspecialidad = TraerEspecialidad($MiConexion);
$CantidadEspecialidad= count($ListaEspecialidad);

require_once 'funciones/validaciones.php';
$Mensaje = "";

if (!empty($_POST['BotonModificar'])) {
    
    $Mensaje = ValidarModificacionVeterinario();

    if(empty($Mensaje)){

        require_once 'funciones/funcion_modificar_veterinario.php';
        $VeterinarioModificado = ModificarVeterinario( $MiConexion);

        if(empty($VeterinarioModificado)){
            $Mensaje="Fallo la modificacion del veterinario.";
        }else{
            $Mensaje="Se modifico el veterinario.";
            header('Location: consultar_veterinario.php');
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
                    <h1 class="my-5 text-center fw-bold">Modificar Veterinario</h1>

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
                            <label for="validationServer01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="validationServer01" placeholder="Nombre"
                                name="nombre" required
                                value="<?php echo (empty($_POST['nombre'])) ? $_SESSION['veterinario_nombre'] : $_POST['nombre']; ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <input type="image" src="" alt="">
                        <div class="col-md-12">
                            <label for="validationServer02" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="Apellido"
                                name="apellido" required
                                value="<?php echo (empty($_POST['apellido'])) ? $_SESSION['veterinario_apellido'] : $_POST['apellido']; ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Fecha de
                                Nacimiento</label>
                            <input type="date" class="form-control" id="validationServer02"
                                placeholder="Fecha de Nacimiento" name="fecha" required
                                value="<?php echo (empty($_POST['fecha'])) ? $_SESSION['veterinario_fecha'] : $_POST['fecha']; ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Nacionalidad</label>
                            <input type="text" class="form-control" id="validationServer02" placeholder="Nacionalidad"
                                name="nacionalidad" required
                                value="<?php echo (empty($_POST['nacionalidad'])) ? $_SESSION['veterinario_nacionalidad'] : $_POST['nacionalidad']; ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 text-center">
                            <label for="validationServer04" class="form-label">Sexo</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="sexo" required>
                                <option selected disabled value="">Sexo...</option>
                                
                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadSexo;$i++){
                                    if(!empty($_POST['sexo'])){ 
                                    if ( $_POST['sexo'] ==  $ListaSexo[$i]['id_sexo']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }} else{
                                        if ( $_SESSION['veterinario_sexo'] ==  $ListaSexo[$i]['descripcion_sexo']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaSexo[$i]['id_sexo']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaSexo[$i]['descripcion_sexo']; ?></option>
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
                        <div class="col-md-12">
                            <label for="validationServer02" class="form-label">Informacion
                                Personal</label>
                            <input type="text" class="form-control" id="validationServer02"
                                placeholder="Informacion Personal" name="informacion" required
                                value="<?php echo (empty($_POST['informacion'])) ? $_SESSION['veterinario_informacion'] : $_POST['informacion']; ?>">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Nombre de
                                Calle</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Nombre de Calle" name="calle"
                                value="<?php echo (empty($_POST['calle'])) ? $_SESSION['veterinario_direccion'] : $_POST['calle']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Numero</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Numero " name="numero"
                                value="<?php echo (empty($_POST['numero'])) ? $_SESSION['veterinario_numero'] : $_POST['numero']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <label for="validationServer04" class="form-label">Provincia</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="provincia" required>
                                <option selected disabled value="">Selecciona una provincia...</option>
                                
                                <?php 
                                $selected='';
                                for($i=0;$i<$CantidadProvinvia;$i++){ 
                                    if(!empty($_POST['provincia'])){
                                    if ($_POST['provincia'] ==  $ListaProvincia[$i]['id_provincia']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }}else{
                                        if ($_SESSION['veterinario_provincia'] ==  $ListaProvincia[$i]['nombre_provincia']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaProvincia[$i]['id_provincia']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaProvincia[$i]['nombre_provincia']; ?></option>
                                <?php } ?>
                                
                                <!---
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
                        <div class="col-md-6 mt-10">
                            <label for="validationServer03" class="form-label">Nombre de Ciudad</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Nombre de Ciudad" name="ciudad"
                                value="<?php echo (empty($_POST['ciudad'])) ? $_SESSION['veterinario_ciudad'] : $_POST['ciudad']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 pt-5 text-center">
                            <label for="validationServer04" class="form-label">Bis</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="bis" required>
                                <option selected disabled value="">BIS...</option>
                                
                                <?php 
                                    $sel="";
                                    $sele="";
                                    if(!empty($_POST['bis'])){
                                        if($_POST['bis']=="1"){
                                            $sel="selected";
                                        } else{
                                            $sele="selected";
                                        }             
                                    }elseif($_SESSION['veterinario_bis'] =="bis"){
                                            $sel="selected";
                                        } else{
                                            $sele="selected";
                                        }             
                                                           
                                    ?>
                                <option value="1" <?php echo $sel; ?>>SI</option>
                                <option value="0" <?php echo $sele; ?>>NO</option>
                                
                                <!---
                                <option value="0">SI</option>
                                <option value="1">NO</option> -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Email</label>
                            <input type="email" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Email" name="mail"
                                value="<?php echo (empty($_POST['mail'])) ? $_SESSION['veterinario_mail'] : $_POST['mail']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Contraseña" name="contrasena"
                                value="<?php echo (empty($_POST['contrasena'])) ? $_SESSION['veterinario_pass'] : $_POST['contrasena']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Red
                                Social</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Red Social" name="red"
                                value="<?php echo (empty($_POST['red'])) ? $_SESSION['veterinario_red'] : $_POST['red']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Telefono</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="Telefono" name="telefono"
                                value="<?php echo (empty($_POST['telefono'])) ? $_SESSION['veterinario_telefono'] : $_POST['telefono']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-6 mt-3 text-center">
                            <label for="validationServer04" class="form-label">Especialidad Veterinaria</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="especialidad" required>
                                <option selected disabled value="">Selecciona una Especialidad...</option>
                                
                                <?php 
                                $selected='';
                                for($i=0;$i<$CantidadEspecialidad;$i++){ 
                                    if(!empty($_POST['especialidad'])){
                                    if ($_POST['especialidad'] ==  $ListaEspecialidad[$i]['id_especialidad']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }}else{
                                        if ($_SESSION['veterinario_especialidad'] ==  $ListaEspecialidad[$i]['descripcion_especialidad']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaEspecialidad[$i]['id_especialidad']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaEspecialidad[$i]['descripcion_especialidad']; ?></option>
                                <?php } ?>
                                
                                <!--
                                <option value="Clínica General">Clínica General</option>
                                <option value="Cirugía">Cirugía</option>
                                <option value="Anestesiología">Anestesiología</option>
                                <option value="Diagnóstico por Imagen">Diagnóstico por Imagen</option> -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona una Especialidad Veterinaria válida.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">N° Habilitacion</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                                placeholder="N° Habilitacion" name="habilitacion"
                                value="<?php echo (empty($_POST['habilitacion'])) ? $_SESSION['veterinario_matricula'] : $_POST['habilitacion']; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-12 pt-3 text-center">
                            <label for="validationServer04" class="form-label">Estado</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="estado" required>
                                <option selected disabled value="">Estado...</option>
                                
                                <?php 
                                    $s1="";
                                    $s2="";
                                    if(!empty($_POST['estado'])){
                                        if($_POST['estado']=="1"){
                                            $s1="selected";
                                        } else{
                                            $s2="selected";
                                        }             
                                    }else if($_SESSION['veterinario_estado'] =="Activo"){
                                            $s1="selected";
                                        } else{
                                            $s2="selected";
                                        }             
                                                           
                                    ?>

                                <option value="2" <?php echo $s2 ; ?>>Inactivo</option>
                                <option value="1" <?php echo $s1 ; ?>>Activo</option>
                                
                                <!---
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option> -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
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