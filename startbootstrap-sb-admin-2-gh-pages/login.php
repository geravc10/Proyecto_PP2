<!DOCTYPE html>
<html lang="ES">


<?php


session_start();






require_once 'funciones/conexion.php';
$MiConexion=ConexionBD();


require_once 'funciones/validaciones.php';
$Mensaje="";


//si se presiona el BontonLogin
if(!empty($_POST['BotonLogin'])){


    //aca vamos a poner la conexion a BD
$Mensaje=ValidarUsuarioPass();
    if(empty($Mensaje)){
 
        require_once 'funciones/login_funcion.php';
        $UsuarioLogueado=DatosLogin($_POST['email'], $_POST['pass'], $MiConexion);


        if(empty($UsuarioLogueado)){


            $Mensaje="Verifique Email y Contraseña.";
           
        }else if($UsuarioLogueado['Estado']==0){
            $Mensaje="Usuario inactivo";
        }else{
            $_SESSION['usuario_nombre']= $UsuarioLogueado['Nombre'];
            $_SESSION['usuario_apellido']=$UsuarioLogueado['Apellido'];
            $_SESSION['usuario_estado']=$UsuarioLogueado['Estado'];
       
            header('Location: index.php');  
            exit;
       
        }
         
   }
}  




               
 










    require_once "partes_Pagina/head.php";
?>


<body class="bg-gradient-light">


    <div class="container">


        <!-- Outer Row -->
        <div class="row justify-content-center">


            <div class="col-xl-10 col-lg-12 col-md-9">


                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="imagenes/Home de Veterinario - DueñoDeAnimal.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php
                                 if(!empty($Mensaje)){ ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    <?php echo $Mensaje; ?>
                                    </div>
                                    <?php }
                                    ?>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                                    </div>
                                    <form class="user" method= 'post'>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email" name="email" value= <?php echo !empty($_POST['email']) ? $_POST['email'] : '' ?>>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña"
                                                name="pass">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                name="recuerdame">
                                                <label class="custom-control-label" for="customCheck">Recuerdame</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block"
                                                type="submit" value="Login" name="BotonLogin">
                                            Ingresar
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">No recuerdas la contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create una Cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>


    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>


</html>
