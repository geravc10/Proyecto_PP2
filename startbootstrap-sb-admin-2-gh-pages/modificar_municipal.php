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
$ListaNaciones = TraerNaciones($MiConexion);
$CantidadNaciones= count($ListaNaciones);

require_once 'funciones/funcion_consultas_generales.php';
$ListaProvincia = TraerProvincia($MiConexion);
$CantidadProvinvia= count($ListaProvincia);

require_once 'funciones/funcion_consultas_generales.php';
$ListaAreas = TraerArea($MiConexion);
$CantidadAreas= count($ListaAreas);

require_once 'funciones/funcion_consultas_generales.php';
$ListaRoles = TraerRol($MiConexion);
$CantidadRoles= count($ListaRoles);


require_once 'funciones/validaciones.php';

$Mensaje = "";

if(empty($ListaSexo)){
    $Mensaje = "No vino nada de la tabla sexo";
}else{
    if (!empty($_POST['BotonModificar'])) {
    
        $Mensaje = ValidarModificacionMuni();
    
        if(empty($Mensaje)){
            require_once 'funciones/funcion_modificar_municipal.php';
            $MunicipalModificado = ModificarMunicipal( $MiConexion);
    
            if(empty($MunicipalModificado)){
                $Mensaje="Fallo la modificacion del usuario municipal.";
            }else{
                $Mensaje="Se modifico el usuario municipal.";
                header('Location: consultar_municipal.php');
                exit;
    
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenidos</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>
                    <!--FORMULARIO-->
                    <h1 class="my-5 text-center fw-bold">Modificar Empleado Municipal</h1>
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
                            <input type="text" class="form-control" id="validationServer01" 
                            value="<?php echo (empty($_POST['nombre'])) ? $_SESSION['municipal_nombre'] : $_POST['nombre']; ?>"
                            name="nombre" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <input type="image" src="" alt="">
                        <div class="col-md-12">
                            <label for="validationServer02" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="validationServer02" 
                            value="<?php echo (empty($_POST['apellido'])) ? $_SESSION['municipal_apellido'] : $_POST['apellido']; ?>"
                                name="apellido" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer02" class="form-label">Fecha de
                                Nacimiento</label>
                            <input type="date" class="form-control" id="validationServer02"
                                placeholder="Fecha de Nacimiento" name="fecha" required 
                                value= <?php echo (empty($_POST['fecha'])) ? $_SESSION['municipal_fecha'] : $_POST['fecha']; ?>>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 pt-5">
                            <label for="validationServer04" class="form-label"><b style="color: red;">*</b>Nacionalidad</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="nacionalidad" >
                                <option selected disabled value="">Nacionalidad...</option>

                                <?php 
                                    $selected = ''; 

                                    // Determina el valor a seleccionar
                                    $valorSeleccionado = !empty($_POST['nacionalidad'])
                                                        ? $_POST['nacionalidad'] 
                                                        : (isset($_SESSION['municipal_id_nacionalidad']) 
                                                            ? $_SESSION['municipal_id_nacionalidad'] 
                                                            : '');

                                    // Genera las opciones del select
                                    for ($i = 0; $i < $CantidadNaciones; $i++) {
                                        $selected = ($valorSeleccionado == $ListaNaciones[$i]['id_nacion']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $ListaNaciones[$i]['id_nacion']; ?>" <?php echo $selected; ?>>
                                            <?php echo $ListaNaciones[$i]['nombre_nacion']; ?>
                                        </option>
                                <?php } ?>
                                    <!--
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option> -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-12 mt-4 text-center">
                            <label for="validationServer04" class="form-label">Sexo</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="sexo" required>
                                <option value="">Sexo...</option>

                                <?php 
                                $selected='';                                
                                for($i=0;$i<$CantidadSexo;$i++){
                                    if(!empty($_POST['sexo'])){ 
                                    if ( $_POST['sexo'] ==  $ListaSexo[$i]['id_sexo']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }} else{
                                        if ( $_SESSION['municipal_sexo'] ==  $ListaSexo[$i]['descripcion_sexo']) {
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
                                <option value="0">Femenino</option>
                                <option value="2">Otro</option>
                                -->
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer02" class="form-label">Informacion
                                Personal</label>
                            <input type="text" class="form-control" id="validationServer02"
                            value="<?php echo (empty($_POST['informacion'])) ? $_SESSION['municipal_informacion'] : $_POST['informacion']; ?>" 
                            name="informacion" >
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
                            value="<?php echo (empty($_POST['nombre_calle'])) ? $_SESSION['municipal_direccion'] : $_POST['nombre_calle']; ?>" 
                            name="nombre_calle">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Numero</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                            value="<?php echo (empty($_POST['numero'])) ? $_SESSION['municipal_numero'] : $_POST['numero']; ?>" 
                            name="numero">
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
                                        if ($_SESSION['municipal_provincia'] ==  $ListaProvincia[$i]['nombre_provincia']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaProvincia[$i]['id_provincia']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaProvincia[$i]['nombre_provincia']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona una provincia válida.
                            </div>
                        </div>
                        <div class="col-md-6 mt-10">
                            <label for="validationServer03" class="form-label">Nombre de
                                Ciudad</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                            value="<?php echo (empty($_POST['nombre_ciudad'])) ? $_SESSION['municipal_ciudad'] : $_POST['nombre_ciudad']; ?>" 
                            name="nombre_ciudad">
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
                                    }elseif($_SESSION['municipal_bis'] =="1"){
                                            $sel="selected";
                                        } else{
                                            $sele="selected";
                                        }             
                                                           
                                    ?>
                                <option value="1" <?php echo $sel ; ?>>SI</option>
                                <option value="0" <?php echo $sele; ?>>NO</option>
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
                            value="<?php echo (empty($_POST['mail'])) ? $_SESSION['municipal_mail'] : $_POST['mail']; ?>" 
                            name="mail">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" aria-describedby="validationServer03Feedback"
                            value="<?php echo (empty($_POST['contrasena'])) ? $_SESSION['municipal_pass'] : $_POST['contrasena']; ?>" 
                            name="contrasena">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Red
                                Social</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                            value="<?php echo (empty($_POST['red'])) ? $_SESSION['municipal_red'] : $_POST['red']; ?>" 
                            name="red">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer03" class="form-label">Telefono</label>
                            <input type="text" class="form-control" aria-describedby="validationServer03Feedback"
                            value="<?php echo (empty($_POST['telefono'])) ? $_SESSION['municipal_telefono'] : $_POST['telefono']; ?>" 
                            name="telefono">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="validationServer04" class="form-label">Área de Trabajo Interna</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="area" required>
                                <option selected disabled value="">Selecciona un Área...</option>
                                <?php 
                                $selected='';
                                for($i=0;$i<$CantidadAreas;$i++){ 
                                    if(!empty($_POST['area'])){
                                    if ($_POST['area'] ==  $ListaAreas[$i]['id_area_municipal']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }}else{
                                        if ($_SESSION['municipal_area'] ==  $ListaAreas[$i]['descripcion_area_municipal']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaAreas[$i]['id_area_municipal']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaAreas[$i]['descripcion_area_municipal']; ?></option>
                                <?php } ?>                                
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona un Área de Trabajo Interna válida.
                            </div>
                        </div>


                        <div class="col-md-6 pt-3 text-center">
                            <label for="validationServer04" class="form-label">Rol</label>
                            <select class="form-select" id="validationServer04"
                                aria-describedby="validationServer04Feedback" name="rol" required>
                                <option selected disabled value="">Selecciona un Rol...</option>
                                
                                <?php 
                                $selected='';
                                for($i=0;$i<$CantidadRoles;$i++){ 
                                    if(!empty($_POST['rol'])){
                                    if ($_POST['rol'] ==  $ListaRoles[$i]['id_rol_municipal']) {
                                        $selected = 'selected';
                                    }else {
                                        $selected='';
                                    }}else{
                                        if ($_SESSION['municipal_rol'] ==  $ListaRoles[$i]['descripcion_rol_municipal']) {
                                            $selected = 'selected';
                                        }else {
                                            $selected='';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $ListaRoles[$i]['id_rol_municipal']; ?>" <?php echo $selected; ?>>
                                        <?php echo $ListaRoles[$i]['descripcion_rol_municipal']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Selecciona un Rol válido.
                            </div>
                        </div>
                        <div class="col-md-12 mt-3 mb-3">
                            <hr>
                        </div>
                        <div class="col-md-12 mt-2 text-center">
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
                                    }else if($_SESSION['municipal_estado'] =="1"){
                                            $s1="selected";
                                        } else{
                                            $s2="selected";
                                        }             
                                                           
                                    ?>

                                <option value="0" <?php echo $s2 ; ?>>Inactivo</option>
                                <option value="1" <?php echo $s1 ; ?>>Activo</option>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button class="btn btn-primary" type="submit" value="modificar" name="BotonModificar">Acepta la
                                modificacion</button>
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