<?php
$nivel_u = $_SESSION['usuario_nivel'];
$colorH = '';
$colorS = '';
$colorT = '';
$texto = '';
switch ($nivel_u) {
    case 1://super usuario
        $colorH = "bg-gradient-dark";
        $colorS = "bg-gradient-dark";
        $colorT = "bg-gradient-secondary";
        $texto = "text-bg-light";
        break;
    case 2://municipal
        $colorH = "bg-gradient-dark";
        $colorS = "bg-gradient-dark";
        $colorT = "bg-gradient-secondary";
        $texto = "text-bg-light";
        break;
    case 3://veterinario
        $colorH = "bg-gradient-success";
        $colorS = "bg-gradient-success";
        $colorT = "bg-gradient-success";
        $texto = "text-light";
        break;
    case 4://responsable animal
        $colorH = "bg-gradient-secondary";
        $colorS = "bg-gradient-warning";
        $colorT = "bg-gradient-warning";
        $texto = "text-light";
        break;
    case 5://profesional
        $colorH = "bg-gradient-dark";
        $colorS = "bg-info";
        $colorT = "bg-gradient-info";
        $texto = "text-ligth";
        break;
    case 6://refugio
        $colorH = "bg-gradient-dark";
        $colorS = "bg-gradient-danger";
        $colorT = "bg-gradient-danger";
        $texto = "text-ligth";
        break;
}
?>
<!-- Sidebar -->
<ul class="navbar-nav <?php echo $colorS; ?> sidebar sidebar-dark
accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center
justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo
            $_SESSION['usuario_descripcion_nivel']; ?> </div>
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
    <?php if (
        $_SESSION['usuario_nivel'] == 1 || $_SESSION['usuario_nivel'] == 2 || $_SESSION['usuario_nivel'] == 3
    ) {
        ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Cargar Nuevo</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!--<h6 class="collapse-header">Custom Components:</h6>-->
                    <?php if (
                        $_SESSION['usuario_nivel'] == 1 ||
                        $_SESSION['usuario_nivel'] == 2
                    ) { ?>
                        <a class="collapse-item" href="formulario_municipal.php">Municipal</a>
                        <a class="collapse-item" href="formulario_veterinario.php">Veterinario</a>
                        <a class="collapse-item" href="formulario_profesional.php">Profesional</a>
                        <a class="collapse-item" href="formulario_protectora_animal.php">Protectora Animal</a>
                        <a class="collapse-item" href="formulario_historial_medico.php">Historial Medico</a>
                    <?php }
                    if (
                        $_SESSION['usuario_nivel'] != 4 ||
                        $_SESSION['usuario_nivel'] != 5
                    ) { ?>
                        <a class="collapse-item" href="formulario_dueño_animal.php">Dueño de Animal</a>
                        <a class="collapse-item" href="formulario_animal.php">Animal</a>
                    <?php } ?>
                </div>
            </div>
        </li>
    <?php } ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Consultar</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                <a class="collapse-item" href="consultar_veterinario.php">Veterinario</a>
                <a class="collapse-item" href="consultar_profesional.php">Profesional</a>
                <a class="collapse-item" href="consultar_protectora_animal.php">Protectora Animal</a>
                <a class="collapse-item" href="consultar_duenio_animal.php">Dueño de Animal</a>
                <a class="collapse-item" href="consultar_animal.php">Animal</a>
                <a class="collapse-item" href="consultar_municipal.php">Municipal</a>
                <a class="collapse-item" href="consultar_historial_medico.php">Historial Medico</a>
            </div>
        </div>
    </li>
    <?php if (
        $_SESSION['usuario_nivel'] == 1 ||
        $_SESSION['usuario_nivel'] == 2
    ) { ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            CAMPAÑAS / INFO
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
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
<a class="collapse-item"
href="forgot-password.html">Forgot Password</a>
<div class="collapse-divider"></div>
<h6 class="collapse-header">Other Pages:</h6>
<a class="collapse-item" href="404.html">404 Page</a>
<a class="collapse-item" href="blank.html">Blank Page</a>
-->
                </div>
            </div>
        </li>
    <?php } ?>
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