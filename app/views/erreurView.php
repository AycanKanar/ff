<?php ob_start() ?>

<div class="alert alert-danger text-center my-5">
    <?=$msg?>
</div>

<?php
$Reference = "Erreur";
$content = ob_get_clean();
require_once "../App/views/template.php";