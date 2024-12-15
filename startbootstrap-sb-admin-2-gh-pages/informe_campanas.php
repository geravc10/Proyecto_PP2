<?php
session_start();
if (empty($_SESSION['usuario_nombre'])) {
    header('Location: cerrar_sesion.php');
    exit;
}
require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();


require_once 'funciones/funcion_consulta_campanas.php';

$ConsultaAnimal=DatosCampana($MiConexion);

$cantidad_historica_de_campanas = $ConsultaAnimal['cantidad_historica_de_campanas'];
$cantidad_historica_de_campanas_vacunacion = $ConsultaAnimal['cantidad_historica_de_campanas_vacunacion'];
$cantidad_historica_de_campanas_castracion = $ConsultaAnimal['cantidad_historica_de_campanas_castracion'];
$cantidad_campanas_activas_vacunacion = $ConsultaAnimal['cantidad_campanas_activas_vacunacion'];
$cantidad_campanas_activas_castracion = $ConsultaAnimal['cantidad_campanas_activas_castracion'];

$veterinario_vacunacion = $ConsultaAnimal['veterinario_vacunacion'];

$veterinario_mas_participaciones_castracion = $ConsultaAnimal['veterinario_mas_participaciones_castracion'];
$cantidad_historica_turnos_vacunacion = $ConsultaAnimal['cantidad_historica_turnos_vacunacion'];
$cantidad_historica_turnos_castracion = $ConsultaAnimal['cantidad_historica_turnos_castracion'];





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
                    <h4 class="mb-4">Informe de Campañas de la ciudad:</h4>
                    <div class="row g-3">
                    
                    <table class="table-vertical mt-4">
                    <tbody>
                        <?php ?>
                        <tr>
                        <td class="td-header">Cantidad historica de campañas</td>
                        <td class="td-value"><?php echo $cantidad_historica_de_campanas; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad historica de campañas vacunacion</td>
                        <td class="td-value"><?php echo $cantidad_historica_de_campanas_vacunacion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad historica de campañas castracion</td>
                        <td class="td-value"><?php echo $cantidad_historica_de_campanas_castracion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad de campañas activas de vacunacion</td>
                        <td class="td-value"><?php echo $cantidad_campanas_activas_vacunacion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad campañas activas de castracion</td>
                        <td class="td-value"><?php echo $cantidad_campanas_activas_castracion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Veterinario con mas participaciones en campañas de vacunacion</td>
                        <td class="td-value"><?php echo $veterinario_vacunacion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Veterinario con mas participaciones en campañas de castracion</td>
                        <td class="td-value"><?php echo $veterinario_mas_participaciones_castracion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad historica de turnos de campañas de vacunacion</td>
                        <td class="td-value"><?php echo $cantidad_historica_turnos_vacunacion; ?></td>
                        </tr>
                        <tr>
                        <td class="td-header">Cantidad historica de turnos de campañas de castracion</td>
                        <td class="td-value"><?php echo $cantidad_historica_turnos_castracion; ?></td>
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