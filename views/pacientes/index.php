<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="pac_nombre1" id="pac_nombre1" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="pac_nombre2" id="pac_nombre2" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="pac_apellido1" id="pac_apellido1" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="pac_apellido2" id="pac_apellido2" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_dpi">DPI</label>
                <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="pac_sexo">GENERO</label>
                <select name="pac_sexo" id="pac_sexo">
                    <option>Seleccione su Genero</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="pac_referido">¿TRAE REFERENCIA?</label>
                <select name="pac_referido" id="pac_referido">
                    <option>Seleccione una Opcion</option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/buscar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>
