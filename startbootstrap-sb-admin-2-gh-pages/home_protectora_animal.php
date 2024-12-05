<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ES">

<?php
require_once 'partes_Pagina/head.php';
?>

<body id="page-top">
    <header class="conteneiner-fluid bg-gradient-dark d-flex justify-content-center fw-bold">
        <a class="text-light m-0 mt-2 mb-2 fs-5" id="pet_header" href="index.php">PET SALUD</a>
    </header>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                ¿QUE NECESITAS?
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Cargar Nuevo</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Components:</h6>-->
                        <a class="collapse-item" href="formulario_veterinario.php">Veterinario</a>
                        <a class="collapse-item" href="formulario_profesional.php">Profesional</a>
                        <a class="collapse-item" href="formulario_protectora_animal.php">Protectora Animal</a>
                        <a class="collapse-item" href="formulario_dueño_animal.php">Dueño de Animal</a>
                        <a class="collapse-item" href="formulario_animal.php">Animal</a>
                        <a class="collapse-item" href="formulario_municipal.php">Municipal</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Consultar</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                        <a class="collapse-item" href="consultar_veterinario.php">Veterinario</a>
                        <a class="collapse-item" href="consultar_profesional.php">Profesional</a>
                        <a class="collapse-item" href="consultar_protectora_animal.php">Protectora Animal</a>
                        <a class="collapse-item" href="consultar_dueño_animal.php">Dueño de Animal</a>
                        <a class="collapse-item" href="consultar_animal.php">Animal</a>
                        <a class="collapse-item" href="consultar_municipal.php">Municipal</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                CAMPAÑAS / INFO
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cargar Nueva</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Nueva Campaña</a>
                        <a class="collapse-item" href="#">Nueva Noticia</a>
                        <!--
             <h6 class="collapse-header">Login Screens:</h6>
             <a class="collapse-item" href="login.php">Login</a>
             <a class="collapse-item" href="register.php">Register</a>
             <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
             <div class="collapse-divider"></div>
             <h6 class="collapse-header">Other Pages:</h6>
             <a class="collapse-item" href="404.html">404 Page</a>
             <a class="collapse-item" href="blank.html">Blank Page</a>
-->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <!--<li class="nav-item">
     <a class="nav-link" href="charts.html">
         <i class="fas fa-fw fa-chart-area"></i>
         <span>Charts</span></a>
 </li>
-->
            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
     <a class="nav-link" href="tables.html">
         <i class="fas fa-fw fa-table"></i>
         <span>Tables</span></a>
 </li>
-->
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-danger topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
         <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-search fa-fw"></i>
         </a>
        Dropdown - Messages -->
                        <!--     <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
             aria-labelledby="searchDropdown">
             <form class="form-inline mr-auto w-100 navbar-search">
                 <div class="input-group">
                     <input type="text" class="form-control bg-light border-0 small"
                         placeholder="Search for..." aria-label="Search"
                         aria-describedby="basic-addon2">
                     <div class="input-group-append">
                         <button class="btn btn-primary" type="button">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div>
                 </div>
             </form>
         </div>
     </li>

    <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
         <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-bell fa-fw"></i>
             <!-- Counter - Alerts -->
                        <!--         <span class="badge badge-danger badge-counter">3+</span>
         </a>
         <!-- Dropdown - Alerts -->
                        <!--     <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="alertsDropdown">
             <h6 class="dropdown-header">
                 Alerts Center
             </h6>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="mr-3">
                     <div class="icon-circle bg-primary">
                         <i class="fas fa-file-alt text-white"></i>
                     </div>
                 </div>
                 <div>
                     <div class="small text-gray-500">December 12, 2019</div>
                     <span class="font-weight-bold">A new monthly report is ready to download!</span>
                 </div>
             </a>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="mr-3">
                     <div class="icon-circle bg-success">
                         <i class="fas fa-donate text-white"></i>
                     </div>
                 </div>
                 <div>
                     <div class="small text-gray-500">December 7, 2019</div>
                     $290.29 has been deposited into your account!
                 </div>
             </a>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="mr-3">
                     <div class="icon-circle bg-warning">
                         <i class="fas fa-exclamation-triangle text-white"></i>
                     </div>
                 </div>
                 <div>
                     <div class="small text-gray-500">December 2, 2019</div>
                     Spending Alert: We've noticed unusually high spending for your account.
                 </div>
             </a>
             <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
         </div>
     </li>

     <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
         <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-envelope fa-fw"></i>
             <!-- Counter - Messages -->
                        <!--         <span class="badge badge-danger badge-counter">7</span>
         </a>
         <!-- Dropdown - Messages -->
                        <!--     <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
             aria-labelledby="messagesDropdown">
             <h6 class="dropdown-header">
                 Message Center
             </h6>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="dropdown-list-image mr-3">
                     <img class="rounded-circle" src="img/undraw_profile_1.svg"
                         alt="...">
                     <div class="status-indicator bg-success"></div>
                 </div>
                 <div class="font-weight-bold">
                     <div class="text-truncate">Hi there! I am wondering if you can help me with a
                         problem I've been having.</div>
                     <div class="small text-gray-500">Emily Fowler · 58m</div>
                 </div>
             </a>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="dropdown-list-image mr-3">
                     <img class="rounded-circle" src="img/undraw_profile_2.svg"
                         alt="...">
                     <div class="status-indicator"></div>
                 </div>
                 <div>
                     <div class="text-truncate">I have the photos that you ordered last month, how
                         would you like them sent to you?</div>
                     <div class="small text-gray-500">Jae Chun · 1d</div>
                 </div>
             </a>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="dropdown-list-image mr-3">
                     <img class="rounded-circle" src="img/undraw_profile_3.svg"
                         alt="...">
                     <div class="status-indicator bg-warning"></div>
                 </div>
                 <div>
                     <div class="text-truncate">Last month's report looks great, I am very happy with
                         the progress so far, keep up the good work!</div>
                     <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                 </div>
             </a>
             <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="dropdown-list-image mr-3">
                     <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                         alt="...">
                     <div class="status-indicator bg-success"></div>
                 </div>
                 <div>
                     <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                         told me that people say this to all dogs, even if they aren't good...</div>
                     <div class="small text-gray-500">Chicken the Dog · 2w</div>
                 </div>
             </a>
             <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
         </div>
     </li>

     <div class="topbar-divider d-none d-sm-block"></div>
-->
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-ligth small"><?php echo $_SESSION['usuario_nombre'] . ' ' . $_SESSION['usuario_apellido']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="cerrar_sesion.php" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenidos</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm
text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- SLIDER -->
                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/slider1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/slider4.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->
                    <!-- PRINCIPAL -->

                    <section class="w-50 mx-auto text-center pt-5" id="principal">
                        <h1 class="p-3 fs-2 border-top border-3">TODO EN UN SOLO LUGAR
                            <br>
                            <span class="fw-bold fs-4">Solucion Digital para tus Mascotas</span>
                        </h1>
                        <p class="p-3 fs-4">
                            <span class="fw-bold">PetSalud</span>
                            es la mejor pagina del pais donde llevamos el control total de tus animales
                        </p>
                    </section>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->

                    <!-- LO QUE OFRECEMOS -->

                    <div class="container mt-5">
                        <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
                            <div class="col d-flex justify-content-center">
                                <figure class="figure text-center">
                                    <a href="formulario_Dueño_Animal.html">
                                        <img src="imagenes/Home de Veterinario - DueñoDeAnimal.jpg"
                                            class="figure-img img-fluid rounded" alt="..." id="img_home_vete">
                                    </a>
                                    <figcaption class="figure-caption">CARGAR DUEÑO DE ANIMAL</figcaption>
                                </figure>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <figure class="figure text-center">
                                    <a href="#">
                                        <img src="imagenes/Home de Veterinario - Historial Medico.jpg"
                                            class="figure-img img-fluid rounded" alt="..." id="img_home_vete">
                                    </a>
                                    <figcaption class="figure-caption">CARGAR HISTORIAL MEDICO</figcaption>
                                </figure>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <figure class="figure text-center">
                                    <a href="formulario_Animal.html">
                                        <img src="imagenes/Home de Veterinario - Animal de la Calle.jpg"
                                            class="figure-img img-fluid rounded" alt="..." id="img_home_vete">
                                    </a>
                                    <figcaption class="figure-caption">Animal de la Calle</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""" -->


                    <!-- NOTICIAS O CAMPAÑA DE VACUNACION -->
                    <div class="container-fluid text-center">
                        <h1 class="fw-bold p-2 fs-2 border-top border-3 w-50 mx-auto text-center pt-5 fw-bold"
                            id="principal">NOTICIAS</h1>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="text-center">Campaña de Vacunación para Animales</h1>
                                    <p class="text-center fs-5">Organizada por la Municipalidad de Cruz del Eje</p>
                                    <p class="mt-4">La Municipalidad de Cruz del Eje se complace en anunciar una campaña
                                        de vacunación gratuita para animales de compañía. Esta iniciativa tiene como
                                        objetivo proteger la salud de nuestras mascotas y prevenir enfermedades comunes
                                        que pueden afectarlas.</p>
                                    <h2 class="mt-4">Fechas y Horarios</h2>
                                    <p>La campaña se llevará a cabo del <strong>1 al 15 de junio</strong>, en los
                                        siguientes horarios:</p>
                                    <ul class="sacarPelota">
                                        <li>Lunes a Viernes: 8:00 AM - 6:00 PM</li>
                                        <li>Sábados: 9:00 AM - 1:00 PM</li>
                                    </ul>
                                    <h2 class="mt-4">Lugares de Vacunación</h2>
                                    <p>Las vacunaciones se realizarán en los siguientes centros:</p>
                                    <ul class="sacarPelota">
                                        <li><strong>Centro Veterinario Municipal:</strong> Calle Principal 123</li>
                                        <li><strong>Centro de Atención Animal Este:</strong> Av. Libertador 456</li>
                                        <li><strong>Centro de Atención Animal Oeste:</strong> Calle San Martín 789</li>
                                    </ul>
                                    <h2 class="mt-4">Vacunas Disponibles</h2>
                                    <p>Durante esta campaña, se ofrecerán las siguientes vacunas para perros y gatos:
                                    </p>
                                    <ul class="sacarPelota">
                                        <li>Vacuna contra la rabia</li>
                                        <li>Vacuna quintuple (moquillo, parvovirus, hepatitis, leptospirosis,
                                            parainfluenza) para perros</li>
                                        <li>Vacuna triple felina (panleucopenia, rinotraqueitis, calicivirus) para gatos
                                        </li>
                                    </ul>
                                    <h2 class="mt-4">Requisitos</h2>
                                    <p>Para recibir la vacunación, los propietarios deben cumplir con los siguientes
                                        requisitos:</p>
                                    <ul class="sacarPelota">
                                        <li>Presentar el carné de vacunación del animal (si lo tiene)</li>
                                        <li>Llevar a los perros con correa y bozal, y a los gatos en transportadora</li>
                                        <li>Ser mayor de edad para firmar el consentimiento de vacunación</li>
                                    </ul>
                                    <h2 class="mt-4">Beneficios de Vacunar a su Mascota</h2>
                                    <p>Vacunar a su mascota es esencial para su salud y bienestar. Los beneficios
                                        incluyen:</p>
                                    <ul class="sacarPelota">
                                        <li>Protección contra enfermedades graves</li>
                                        <li>Reducción del riesgo de transmisión de enfermedades a humanos y otros
                                            animales</li>
                                        <li>Contribución al control de enfermedades a nivel comunitario</li>
                                    </ul>
                                    <p class="mt-4">¡No pierda esta oportunidad de proteger a su mascota y mantenerla
                                        saludable! La vacunación es gratuita y segura.</p>
                                    <p class="mt-4"><strong>Para más información, puede comunicarse con la Municipalidad
                                            de Cruz del Eje al teléfono (03549) 123-456 o visitar nuestra página web
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
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
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