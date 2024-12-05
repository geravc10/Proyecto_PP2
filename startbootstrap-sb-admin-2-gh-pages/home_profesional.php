<?php
session_start();
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
                    <!-- SLIDER -->
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../imagenes/slider1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../imagenes/slider4.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- PRINCIPAL -->
                    <section class="w-50 mx-auto text-center pt-5" id="principal">
                        <h1 class="p-3 fs-2 border-top border-3">TODO EN UN SOLO LUGAR
                            <br>
                            <span class="fw-bold fs-4">Solucion Digital para tus
                                Mascotas</span>
                        </h1>
                        <p class="p-3 fs-4">
                            <span class="fw-bold">PetSalud</span>
                            es la mejor pagina del pais donde llevamos el control total de
                            tus animales
                        </p>
                    </section>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- LO QUE OFRECEMOS -->
                    <div class="container mt-5">
                        <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
                            <div class="col d-flex justify-content-center">
                                <figure class="figure text-center">
                                    <a href="#">
                                        <img src="imagenes/Home de Veterinario -
Paseador de Animales.jpg" class="figure-img img-fluid rounded" alt="..." id="img_home_vete">
                                    </a>
                                    <figcaption class="figure-caption">PASEADOR DE
                                        ANIMALES</figcaption>
                                </figure>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <figure class="figure text-center">
                                    <a href="#">
                                        <img src="imagenes/Home de Veterinario -
Profesional.jpg" class="figure-img img-fluid rounded" alt="..." id="img_home_vete">
                                    </a>
                                    <figcaption class="figure-caption">CORTE DE
                                        PELO</figcaption>
                                </figure>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <figure class="figure text-center">
                                    <a href="#">
                                        <img src="imagenes/Home de Veterinario -
Juguetes para Animales.jpg" class="figure-img img-fluid rounded" alt="..." id="img_home_vete">
                                    </a>
                                    <figcaption class="figure-caption">Juguetes para
                                        Animales</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- NOTICIAS O CAMPAÑA DE VACUNACION -->
                    <div class="container-fluid text-center">
                        <h1 class="fw-bold p-2 fs-2 border-top border-3 w-50 mx-auto
text-center pt-5 fw-bold" id="principal">NOTICIAS</h1>
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
                                    <h2 class="mt-4">Fechas y Horarios</h2>
                                    <p>La campaña se llevará a cabo del <strong>1 al 15
                                            de junio</strong>, en los siguientes horarios:</p>
                                    <ul class="sacarPelota">
                                        <li>Lunes a Viernes: 8:00 AM - 6:00 PM</li>
                                        <li>Sábados: 9:00 AM - 1:00 PM</li>
                                    </ul>
                                    <h2 class="mt-4">Lugares de Vacunación</h2>
                                    <p>Las vacunaciones se realizarán en los siguientes
                                        centros:</p>
                                    <ul class="sacarPelota">
                                        <li><strong>Centro Veterinario
                                                Municipal:</strong> Calle Principal 123</li>
                                        <li><strong>Centro de Atención Animal
                                                Este:</strong> Av. Libertador 456</li>
                                        <li><strong>Centro de Atención Animal
                                                Oeste:</strong> Calle San Martín 789</li>
                                    </ul>
                                    <h2 class="mt-4">Vacunas Disponibles</h2>
                                    <p>Durante esta campaña, se ofrecerán las
                                        siguientes vacunas para perros y gatos:</p>
                                    <ul class="sacarPelota">
                                        <li>Vacuna contra la rabia</li>
                                        <li>Vacuna quintuple (moquillo, parvovirus,
                                            hepatitis, leptospirosis, parainfluenza) para perros</li>
                                        <li>Vacuna triple felina (panleucopenia,
                                            rinotraqueitis, calicivirus) para gatos</li>
                                    </ul>
                                    <h2 class="mt-4">Requisitos</h2>
                                    <p>Para recibir la vacunación, los propietarios
                                        deben cumplir con los siguientes requisitos:</p>
                                    <ul class="sacarPelota">
                                        <li>Presentar el carné de vacunación del animal
                                            (si lo tiene)</li>
                                        <li>Llevar a los perros con correa y bozal, y a
                                            los gatos en transportadora</li>
                                        <li>Ser mayor de edad para firmar el
                                            consentimiento de vacunación</li>
                                    </ul>
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
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you
                        are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
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