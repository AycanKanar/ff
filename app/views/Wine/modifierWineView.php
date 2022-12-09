<?php ob_start() ?>

<form action="<?=URL?>vins/modifValider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="Reference" class="form-label">Reference</label>
        <input type="text" class="form-control" id="Reference" name="Reference" value="<?=$vin->getReference()?>">
    </div>
    <div class="mb-3">
        <label for="millesime" class="form-label">Milésime</label>
        <input type="number" class="form-control" id="millesime" name="millesime" value="<?=$vin->getmillesime()?>">
    </div>
    <h3>Image : </h3>
    <img src="<?=URL?>public/images/<?=$vin->getImage()?>" alt="" width="180px">
    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="id" value="<?=$vin->getId()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$Reference = "Modification du vin : ".$vin->getReference();
$content = ob_get_clean();
require_once "../App/views/template.php";
