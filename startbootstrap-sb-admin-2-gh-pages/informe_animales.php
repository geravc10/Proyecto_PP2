<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();


require_once 'funciones/funcion_consulta_animal.php';

$ConsultaAnimal=DatosAnimal_2($MiConexion);

$total_animales_activos = $ConsultaAnimal['total_animales_activos'];
$cantidad_castrados = $ConsultaAnimal['cantidad_castrados'];
$cantidad_caballos = $ConsultaAnimal['cantidad_caballos'];
$cantidad_gatos = $ConsultaAnimal['cantidad_gatos'];
$cantidad_perros = $ConsultaAnimal['cantidad_perros'];
$cantidad_carreras = $ConsultaAnimal['cantidad_carreras'];
$cantidad_mascota = $ConsultaAnimal['cantidad_mascota'];
$cantidad_terapia = $ConsultaAnimal['cantidad_terapia'];
$cantidad_lazarillo = $ConsultaAnimal['cantidad_lazarillo'];





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
                    <h4 class="mb-4">Informe de animales de la ciudad:</h4>
                    <div class="row g-3">
                    
                    <table class="table-vertical mt-4">
                    <tbody>
                        <?php ?>
                        <tr>
                        <td class="td-header">Total de animales activos en la ciudad</td>
                        <td class="td-value"><?php echo $total_animales_activos; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de perros activos en la ciudad</td>
                        <td class="td-value"><?php echo $cantidad_perros; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de gatos activos en la ciudad</td>
                        <td class="td-value"><?php echo $cantidad_gatos; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de caballos activos en la ciudad</td>
                        <td class="td-value"><?php echo $cantidad_caballos; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de animales utilizados para Carreras</td>
                        <td class="td-value"><?php echo $cantidad_carreras; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de animales Mascota</td>
                        <td class="td-value"><?php echo $cantidad_mascota; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de animales de Terapia</td>
                        <td class="td-value"><?php echo $cantidad_terapia; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de animles Lazarillo</td>
                        <td class="td-value"><?php echo $cantidad_lazarillo; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de animales Castrados</td>
                        <td class="td-value"><?php echo $cantidad_castrados; ?></td>
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