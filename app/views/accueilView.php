<?php ob_start() ?>

<p>Accueil</p>

<?php
$Reference = "Wine Not";
$content = ob_get_clean();
require_once "../App/views/template.php";