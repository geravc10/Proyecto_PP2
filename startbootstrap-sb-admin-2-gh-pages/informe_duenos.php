<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();


require_once 'funciones/funcion_consulta_duenio_animal.php';

$ConsultaAnimal=DatosDuenioAnimal_2($MiConexion);

$cantidad_duenos_animales = $ConsultaAnimal['cantidad_duenos_animales'];
$cantidad_familias_con_perros = $ConsultaAnimal['cantidad_familias_con_perros'];
$cantidad_familias_con_gatos = $ConsultaAnimal['cantidad_familias_con_gatos'];
$cantidad_familias_con_caballos = $ConsultaAnimal['cantidad_familias_con_caballos'];
$cantidad_duenos_mas_de_un_animal = $ConsultaAnimal['cantidad_duenos_mas_de_un_animal'];





?>
<!DOCTYPE html>
<html lang="ES">
<?php
require_once 'partes_Pagina/head.php';
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .table-vertical {
      width: 100%;
      border-collapse: collapse;
    }

    .table-vertical .thead {
      font-weight: bold;
      background-color: #f8f9fa;
    }

    .table-vertical .tbody .td-header {
      font-weight: bold;
      color: #343a40; /* Texto más oscuro */
      text-align: left;
    }

    .table-vertical .tbody .td-value {
      text-align: center;
    }

    .table-vertical td {
      border: 1px solid #dee2e6;
      padding: 8px;
    }

    .table-vertical th {
      text-align: left;
      padding: 8px;
      background-color: #f1f1f1;
    }
  </style>
</head>


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
                    <h1 class="my-5 text-center fw-bold">Informe Completo</h1>

                    <div class="container mt-5 mb-5">
                    <h4 class="mb-4">Informe de dueños de animales de la ciudad:</h4>
                    <div class="row g-3">
                    
                    <table class="table-vertical mt-4">
                    <tbody>
                        <?php ?>
                        <tr>
                        <td class="td-header">Cantidad de duenos de animales</td>
                        <td class="td-value"><?php echo $cantidad_duenos_animales; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de familias con perros</td>
                        <td class="td-value"><?php echo $cantidad_familias_con_perros; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de familias con gatos</td>
                        <td class="td-value"><?php echo $cantidad_familias_con_gatos; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de familias con caballos</td>
                        <td class="td-value"><?php echo $cantidad_familias_con_caballos; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de dueños con mas de un animal</td>
                        <td class="td-value"><?php echo $cantidad_duenos_mas_de_un_animal; ?></td>
                        </tr>
                        
                        <?php  ?>
                    </tbody>
                    </table>
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