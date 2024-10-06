<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ES">
<?php
require_once 'partes_Pagina/head.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


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
                    <h1 class="my-5 text-center fw-bold">Crear Historial Medico</h1>
                    <p class="text-center">Coloca el ID de animal y corrobora que el animalito sea el que estes atendiendo.</p>
                    <form class="row g-3 m-4 my-5 p-3 mx-auto" id="formulario_E_Municipal">
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label"><b style="color: red;">*</b>
                            Codigo de Verificacion Animal</label>
                            <input type="number" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="Codigo Animal">
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-6 text-center mt-5">
                            <button class="btn btn-primary" type="submit">Traer Informacion</button>
                        </div>
                        <div class="col-md-12 mt-5 mb-1 text-center">
                            <hr>
                        </div>
                        <p class="text-center">Informacion del Animal y Dueño</p>
                        <div class="col-md-12">
                            <label for="validationServer05" class="form-label">DNI Dueño</label>
                            <input type="number" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Codigo de Verificacion Animal</label>
                            <input type="number" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Nombre Animal</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Especie</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Raza</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Rol</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Esta castrado?</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationServer05" class="form-label">Esta vacunado?</label>
                            <input type="text" class="form-control" id="validationServer05"
                                aria-describedby="validationServer05Feedback" placeholder="" readonly>
                            <div id="validationServer05Feedback" class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-12 mt-5 mb-1 text-center">
                            <hr>
                            <h3>Enfermedad que presenta</h3>
                        </div>

                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <!-- Columna para Perros -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapsePerros" aria-expanded="false"
                                        aria-controls="flush-collapsePerros"><b style="color: red;">*</b> Perros
                                    </button>
                                </h2>
                                <div id="flush-collapsePerros" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="parvovirusPerro">
                                        <label class="form-check-label" for="parvovirusPerro">Parvovirus
                                            canino</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="moquilloPerro">
                                        <label class="form-check-label" for="moquilloPerro">Moquillo</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="rabiaPerro">
                                        <label class="form-check-label" for="rabiaPerro">Rabia</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="leptospirosisPerro">
                                        <label class="form-check-label" for="leptospirosisPerro">Leptospirosis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="dermatitisPerro">
                                        <label class="form-check-label" for="dermatitisPerro">Dermatitis por
                                            pulgas</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="otitisPerro">
                                        <label class="form-check-label" for="otitisPerro">Otitis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="sarnaPerro">
                                        <label class="form-check-label" for="sarnaPerro">Sarna</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="enfermedadRenalPerro">
                                        <label class="form-check-label" for="enfermedadRenalPerro">Enfermedad renal
                                            crónica</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="displasiaCaderaPerro">
                                        <label class="form-check-label" for="displasiaCaderaPerro">Displasia de
                                            cadera</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="cataratasPerro">
                                        <label class="form-check-label" for="cataratasPerro">Cataratas</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="diabetesPerro">
                                        <label class="form-check-label" for="diabetesPerro">Diabetes
                                            mellitus</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="hepatitisPerro">
                                        <label class="form-check-label" for="hepatitisPerro">Hepatitis
                                            canina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="insuficienciaCardiacaPerro">
                                        <label class="form-check-label" for="insuficienciaCardiacaPerro">Insuficiencia
                                            cardíaca
                                            congestiva</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="obesidadPerro">
                                        <label class="form-check-label" for="obesidadPerro">Obesidad</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="gastritisPerro">
                                        <label class="form-check-label" for="gastritisPerro">Gastritis y problemas
                                            digestivos</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna para Gatos -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseGatos" aria-expanded="false"
                                        aria-controls="flush-collapseGatos">
                                        <b style="color: red;">*</b> Gatos
                                    </button>
                                </h2>
                                <div id="flush-collapseGatos" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="rabiaGato">
                                        <label class="form-check-label" for="rabiaGato">Rabia</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="gripeFelina">
                                        <label class="form-check-label" for="gripeFelina">Gripe felina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="leucemiaFelina">
                                        <label class="form-check-label" for="leucemiaFelina">Leucemia felina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="peritonitisFelina">
                                        <label class="form-check-label" for="peritonitisFelina">Peritonitis
                                            infecciosa felina (PIF)</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="lombricesGato">
                                        <label class="form-check-label" for="lombricesGato">Lombrices
                                            intestinales</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="dermatitisGato">
                                        <label class="form-check-label" for="dermatitisGato">Dermatitis por
                                            pulgas</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="otitisGato">
                                        <label class="form-check-label" for="otitisGato">Otitis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="sarnaGato">
                                        <label class="form-check-label" for="sarnaGato">Sarna</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="enfermedadRenalGato">
                                        <label class="form-check-label" for="enfermedadRenalGato">Enfermedad renal
                                            crónica</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="cataratasGato">
                                        <label class="form-check-label" for="cataratasGato">Cataratas</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="diabetesGato">
                                        <label class="form-check-label" for="diabetesGato">Diabetes mellitus</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="insuficienciaCardiacaGato">
                                        <label class="form-check-label" for="insuficienciaCardiacaGato">Insuficiencia
                                            cardíaca
                                            congestiva</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="obesidadGato">
                                        <label class="form-check-label" for="obesidadGato">Obesidad</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="gastritisGato">
                                        <label class="form-check-label" for="gastritisGato">Gastritis y problemas
                                            digestivos</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna para Conejos -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseConejos" aria-expanded="false"
                                        aria-controls="flush-collapseConejos">
                                        <b style="color: red;">*</b> Conejos
                                    </button>
                                </h2>
                                <div id="flush-collapseConejos" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="coccidiosisConejo">
                                        <label class="form-check-label" for="coccidiosisConejo">Coccidiosis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="sarnaConejo">
                                        <label class="form-check-label" for="sarnaConejo">Sarna</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="lombricesConejo">
                                        <label class="form-check-label" for="lombricesConejo">Lombrices
                                            intestinales</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="dermatitisConejo">
                                        <label class="form-check-label" for="dermatitisConejo">Dermatitis por
                                            pulgas</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="otitisConejo">
                                        <label class="form-check-label" for="otitisConejo">Otitis</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna para Aves -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseAves" aria-expanded="false"
                                        aria-controls="flush-collapseAves">
                                        <b style="color: red;">*</b> Aves
                                    </button>
                                </h2>
                                <div id="flush-collapseAves" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="coccidiosisAves">
                                        <label class="form-check-label" for="coccidiosisAves">Coccidiosis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="lombricesAves">
                                        <label class="form-check-label" for="lombricesAves">Lombrices
                                            intestinales</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna para Caballos -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseCaballos" aria-expanded="false"
                                        aria-controls="flush-collapseCaballos">
                                        <b style="color: red;">*</b> Caballos
                                    </button>
                                </h2>
                                <div id="flush-collapseCaballos" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="colicosCaballos">
                                        <label class="form-check-label" for="colicosCaballos">Cólicos</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="anemiaCaballos">
                                        <label class="form-check-label" for="anemiaCaballos">Anemia infecciosa
                                            equina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="gripeCaballos">
                                        <label class="form-check-label" for="gripeCaballos">Gripe equina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="tetanusCaballos">
                                        <label class="form-check-label" for="tetanusCaballos">Tétanos</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="laminitisCaballos">
                                        <label class="form-check-label" for="laminitisCaballos">Laminitis
                                            (infosura)</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="garrapatasCaballos">
                                        <label class="form-check-label" for="garrapatasCaballos">Garrapatas y
                                            enfermedades parasitarias</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="leptospirosisCaballos">
                                        <label class="form-check-label"
                                            for="leptospirosisCaballos">Leptospirosis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="moquilloCaballos">
                                        <label class="form-check-label" for="moquilloCaballos">Moquillo
                                            equino</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="encefalitisCaballos">
                                        <label class="form-check-label" for="encefalitisCaballos">Encefalitis
                                            equina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="abscesosCaballos">
                                        <label class="form-check-label" for="abscesosCaballos">Abscesos en los
                                            cascos</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="rabiaCaballos">
                                        <label class="form-check-label" for="rabiaCaballos">Rabia</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Columna para Vacas -->
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseVacas" aria-expanded="false"
                                        aria-controls="flush-collapseVacas">
                                        <b style="color: red;">*</b> Vacas
                                    </button>
                                </h2>
                                <div id="flush-collapseVacas" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="fiebreAftosaVacas">
                                        <label class="form-check-label" for="fiebreAftosaVacas">Fiebre
                                            aftosa</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="brucelosisVacas">
                                        <label class="form-check-label" for="brucelosisVacas">Brucelosis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="mastitisVacas">
                                        <label class="form-check-label" for="mastitisVacas">Mastitis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="leptospirosisVacas">
                                        <label class="form-check-label" for="leptospirosisVacas">Leptospirosis</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="diarreaViralBovinaVacas">
                                        <label class="form-check-label" for="diarreaViralBovinaVacas">Diarrea viral
                                            bovina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="lenguaAzulVacas">
                                        <label class="form-check-label" for="lenguaAzulVacas">Lengua azul</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="tuberculosisBovinaVacas">
                                        <label class="form-check-label" for="tuberculosisBovinaVacas">Tuberculosis
                                            bovina</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="antraxVacas">
                                        <label class="form-check-label" for="antraxVacas">Ántrax</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="lombricesIntestinalesVacas">
                                        <label class="form-check-label" for="lombricesIntestinalesVacas">Lombrices
                                            intestinales</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="rabiaVacas">
                                        <label class="form-check-label" for="rabiaVacas">Rabia</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="ectimaVacas">
                                        <label class="form-check-label" for="ectimaVacas">Ectima contagioso (también
                                            afecta a ovejas y cabras)</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="enfermedadesParasitariasVacas">
                                        <label class="form-check-label" for="enfermedadesParasitariasVacas">Enfermedades
                                            parasitarias
                                            (garrapatas, piojos)</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 mt-4">
                            <label for="exampleFormControlTextarea1" class="form-label"><b style="color: red;">*</b> Descripcion del
                                Historial</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                        </div>
                        <div class="col-12 mt-4 text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck3"
                                    aria-describedby="invalidCheck3Feedback" required>
                                <label class="form-check-label" for="invalidCheck3">
                                    Acepto los Terminos y Condiciones
                                </label>
                                <div id="invalidCheck3Feedback" class="invalid-feedback">
                                    Enviar.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
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
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>