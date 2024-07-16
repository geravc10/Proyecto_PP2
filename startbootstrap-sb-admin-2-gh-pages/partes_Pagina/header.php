<?php
$nivel_u=$_SESSION['usuario_nivel'];
$color='';

switch($nivel_u){
    case 1://super usuario
        $color="bg-gradient-dark";
        break;
    case 2://municipal
        $color="bg-gradient-dark";
        break;
    case 3://veterinario
        $color=" bg-gradient-success";
        break;
    case 4://responsable animal
        $color="bg-gradient-warning";
        break;
    case 5://profesional
        $color="bg-gradient-info";
        break;
    case 6://refugio
        $color="bg-gradient-danger";
        break;    
}
?>

<header class="conteneiner-fluid <?php echo $color ?> d-flex justify-content-center fw-bold">
    <a class="text-light m-0 mt-2 mb-2 fs-5" id="pet_header" href="index.php">PET SALUD</a>
</header>