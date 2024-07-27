<?php

include_once '../../vistas/templates/header.php'; 

require '../../modelos/medico.php';

$buscarMedico = new medicos();
$medico = $buscarMedico->buscarMedicos()
?>

<h1 class="text-center">FORMULARIO DE CLINICAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/clinicas/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre_clinica">NOMBRE DE LA CLINICA</label>
                <input type="text" name="cli_nombre_clinica" id="cli_nombre_clinica" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_ubicacion">UBICACION DE LA CLINICA</label>
                <input type="text" name="cli_ubicacion" id="cli_ubicacion" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">TELEFONO</label>
                <input type="text" name="cli_telefono" id="cli_telefono" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="cli_medico_id">MEDICO</label>
                <select id="cli_medico_id" name="cli_medico_id" class="form-control">
                <option value="">SELECCIONE</option>
                    <?php foreach ($medico as $medico) : ?>
                        <option value="<?= $medico['medico_id'] ?>">
                            <?= $medico['med_especialidad'] ."" ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/clinicas/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>