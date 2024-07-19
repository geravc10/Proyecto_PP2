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
<header class="conteneiner-fluid <?php echo $colorH; ?> d-flex
justify-content-center fw-bold">
    <a class="text-light m-0 mt-2 mb-2 fs-5" id="pet_header" href="index.php">PET SALUD</a>
</header>