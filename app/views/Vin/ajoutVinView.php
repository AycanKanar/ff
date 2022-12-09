<?php ob_start() ?>

<form action="<?=URL?>vins/valider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="Reference" class="form-label">Réfférence</label>
        <input type="text" class="form-control" id="Reference" name="Reference">
    </div>
    <div class="mb-3">
        <label for="millesime" class="form-label">Millésime</label>
        <input type="number" class="form-control" id="millesime" name="millesime">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$Reference = "Ajout d'un vins";
$content = ob_get_clean();
require_once "../App/views/template.php";
