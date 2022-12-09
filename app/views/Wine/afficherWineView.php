<?php ob_start() ?>

<div class="row">
    <div class="col-6">
        <img src="<?=URL?>../public/images/<?=$vin->getImage()?>" alt="">
    </div>
    <div class="col-6">
        <p>Reference : <?=$vin->getReference()?></p>
        <p>Pages : <?=$vin->getmillesime()?></p>
    </div>
</div>

<?php
$Reference = $vin->getReference();
$content = ob_get_clean();
require_once "../App/views/template.php";