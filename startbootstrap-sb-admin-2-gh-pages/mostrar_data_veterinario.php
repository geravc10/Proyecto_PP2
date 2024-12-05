<!DOCTYPE html>
<html lang="ES">
<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}
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
                                        <a class="nav-link" href="#">Campaña de Vacunacion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Campaña Castracion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Informacion Municipal</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!-- SLIDER -->
                    <!--                   <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/slider1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/slider4.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
-->
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- PRINCIPAL -->
                    <!--                    <section class="w-50 mx-auto text-center pt-5" id="principal">
                        <h1 class="p-3 fs-2 border-top border-3">TODO EN UN SOLO LUGAR
                            <br>
                            <span class="fw-bold fs-4">Solucion Digital para tus
                                Mascotas</span>
                        </h1>
                        <p class="p-3 fs-4">
                            <span class="fw-bold">PetSalud</span>
                            es la mejor pagina del pais donde llevamos el control total
                            de tus animales
                        </p>
                    </section>
--> <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- LO QUE OFRECEMOS -->
                    <!--                    <div class="container-fluid text-center bg-success-subtle">
                        <h1 class="p-2 fs-2 border-top border-3 w-50 mx-auto
text-center pt-5 fw-bold" id="principal">
                            ENTRE NUESTROS SERVICIOS ENCONTRARAS
                        </h1>
-->
                </div>
                <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                <!-- NOTICIAS O CAMPAÑA DE VACUNACION -->
                <div class="container-fluid">
                    <h1 class="fw-bold p-2 fs-2 border-top border-3 w-50 mx-auto text-center pt-5 fw-bold"
                        id="principal">VETERINARIOS</h1>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">Contactos de todos los Veterinarios de nuestra ciudad</h2>
                                <p class="text-center fs-5">Organizada por la Municipalidad de Cruz del Eje</p>

                                <h4 class="mt-4">Veterinarios</h4>
                                <ul class="sacarPelota">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Ana Rodríguez<br>
                                        <strong>Clínica:</strong> Clínica Veterinaria San Roque<br>
                                        <strong>Ubicación:</strong> Calle Falsa 123<br>
                                        <strong>Teléfono:</strong> (03549) 123-456<br>
                                        <strong>Barrio:</strong> Centro<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 8:00 - 18:00, Sábados 9:00
                                        - 13:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Luis Fernández<br>
                                        <strong>Clínica:</strong> Centro Veterinario Oeste<br>
                                        <strong>Ubicación:</strong> Calle Real 456<br>
                                        <strong>Teléfono:</strong> (03549) 234-567<br>
                                        <strong>Barrio:</strong> Oeste<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 9:00 - 19:00, Sábados
                                        10:00 - 14:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. María García<br>
                                        <strong>Clínica:</strong> Clínica Mascotas Felices<br>
                                        <strong>Ubicación:</strong> Avenida Siempreviva 789<br>
                                        <strong>Teléfono:</strong> (03549) 345-678<br>
                                        <strong>Barrio:</strong> Norte<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 8:00 - 17:00, Sábados 9:00
                                        - 12:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Juan Pérez<br>
                                        <strong>Clínica:</strong> Hospital Animal<br>
                                        <strong>Ubicación:</strong> Calle Principal 101<br>
                                        <strong>Teléfono:</strong> (03549) 456-789<br>
                                        <strong>Barrio:</strong> Sur<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 10:00 - 20:00, Sábados
                                        11:00 - 15:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Laura Sánchez<br>
                                        <strong>Clínica:</strong> Centro de Salud Animal<br>
                                        <strong>Ubicación:</strong> Calle Secundaria 202<br>
                                        <strong>Teléfono:</strong> (03549) 567-890<br>
                                        <strong>Barrio:</strong> Este<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 8:00 - 18:00, Sábados 9:00
                                        - 13:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Carlos Ruiz<br>
                                        <strong>Clínica:</strong> Clínica VetCare<br>
                                        <strong>Ubicación:</strong> Avenida Principal 303<br>
                                        <strong>Teléfono:</strong> (03549) 678-901<br>
                                        <strong>Barrio:</strong> Centro<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 8:00 - 17:00, Sábados 9:00
                                        - 12:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Elena López<br>
                                        <strong>Clínica:</strong> Centro Veterinario Este<br>
                                        <strong>Ubicación:</strong> Calle Terciaria 404<br>
                                        <strong>Teléfono:</strong> (03549) 789-012<br>
                                        <strong>Barrio:</strong> Este<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 9:00 - 19:00, Sábados
                                        10:00 - 14:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Miguel Díaz<br>
                                        <strong>Clínica:</strong> Clínica Bienestar Animal<br>
                                        <strong>Ubicación:</strong> Avenida Central 505<br>
                                        <strong>Teléfono:</strong> (03549) 890-123<br>
                                        <strong>Barrio:</strong> Norte<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 8:00 - 18:00, Sábados 9:00
                                        - 13:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Patricia Gómez<br>
                                        <strong>Clínica:</strong> Clínica Mascotas Sanas<br>
                                        <strong>Ubicación:</strong> Calle Cuarta 606<br>
                                        <strong>Teléfono:</strong> (03549) 901-234<br>
                                        <strong>Barrio:</strong> Sur<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 10:00 - 20:00, Sábados
                                        11:00 - 15:00<br>
                                    </li>
                                    <hr class="col-12">
                                    <li>
                                        <strong>Veterinario:</strong> Dr. Ricardo Morales<br>
                                        <strong>Clínica:</strong> Centro Veterinario Norte<br>
                                        <strong>Ubicación:</strong> Avenida Norte 707<br>
                                        <strong>Teléfono:</strong> (03549) 012-345<br>
                                        <strong>Barrio:</strong> Norte<br>
                                        <strong>Horario de atención:</strong> Lunes a Viernes 9:00 - 19:00, Sábados
                                        10:00 - 14:00<br>
                                    </li>
                                    <hr class="col-12">
                                </ul>
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