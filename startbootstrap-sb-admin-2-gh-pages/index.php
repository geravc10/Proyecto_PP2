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


                    <?php
                    if (!empty($_SESSION['mensaje'])) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-1"></i>
                            <?php echo $_SESSION['mensaje']; ?>
                        </div>
                    <?php }
                    ?>
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
                                        <a class="nav-link" href="campania_castracion_2.php">Campaña Castracion</a>
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
                    <div class="row w-100 mx-auto my-1 fila-servicios">
                        <div class="container mt-2 text-center">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-">
                                    <div class="card">
                                        <a href="mostrar_data_veterinario.php">
                                            <img src="imagenes/veterinario.jpeg"
                                                class="card-img-top mx-auto mt-4 rounded" alt="Veterinario"
                                                id="servicio" style="width: 50%; height: 50%;" >
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Veterinarios</b></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                    <div class="card">
                                        <a href="mostrar_data_refugio_animal.php">
                                            <img src="imagenes/refugioAnimales.jpeg"
                                                class="card-img-top mx-auto mt-4 rounded" alt="Veterinario"
                                                id="servicio" style="width: 87%; height: 100%;">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Refugio</b></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                    <div class="card">
                                        <a href="mostrar_data_peluquero.php">
                                            <img src="imagenes/peluqueroCanino.jpg"
                                                class="card-img-top mx-auto mt-4 rounded" alt="Veterinario"
                                                id="servicio" style="width: 58%; height: 50%;">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Peluquero Canino</b></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                    <div class="card">
                                        <a href="mostrar_data_paseador.php">
                                            <img src="imagenes/paseador_perros.jpg"
                                                class="card-img-top mx-auto mt-4 rounded" alt="Veterinario"
                                                id="servicio" style="width: 78%; height: 50%;">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Paseadores</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                <!-- NOTICIAS O CAMPAÑA DE VACUNACION -->
                <div class="container-fluid text-center">
                    <h1 class="fw-bold p-2 fs-2 border-top border-3 w-50 mx-auto
text-center pt-5 fw-bold" id="principal">NOTICIAS Y NUEVAS CAMPAÑAS</h1>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="text-center">Campaña de Vacunación para
                                    Animales</h1>
                                <p class="text-center fs-5">Organizada por la
                                    Municipalidad de Cruz del Eje</p>
                                <p class="mt-4">La Municipalidad de Cruz del Eje se
                                    complace en anunciar una campaña de vacunación gratuita para animales
                                    de compañía. Esta iniciativa tiene como objetivo proteger la salud de
                                    nuestras mascotas y prevenir enfermedades comunes que pueden
                                    afectarlas.</p>
                                <h2 class="mt-4">Beneficios de Vacunar a su
                                    Mascota</h2>
                                <p>Vacunar a su mascota es esencial para su salud y
                                    bienestar. Los beneficios incluyen:</p>
                                <ul class="sacarPelota">
                                    <li>Protección contra enfermedades graves</li>
                                    <li>Reducción del riesgo de transmisión de
                                        enfermedades a humanos y otros animales</li>
                                    <li>Contribución al control de enfermedades a
                                        nivel comunitario</li>
                                </ul>
                                <p class="mt-4">¡No pierda esta oportunidad de
                                    proteger a su mascota y mantenerla saludable! La vacunación es gratuita
                                    y segura.</p>
                                <p class="mt-4"><strong>Para más información, puede
                                        comunicarse con la Municipalidad de Cruz del Eje al teléfono (03549)
                                        123-456 o visitar nuestra página web
                                        www.cruzdeleje.gob.ar.</strong></p>
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