<?php 
ob_start();

if (!empty($_SESSION['alert'])) {
?>
<div class="alert alert-<?=$_SESSION['alert']['type']?> text-center">
    <?=$_SESSION['alert']['msg']?>
</div>
<?php
unset($_SESSION['alert']);
}
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Reference</th>
        <th>Millésime</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    foreach($vins as $vin) {
    ?>
    <tr>
        <td class="align-middle"><img src="../public/images/<?=$vin->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>vins/lire/<?=$vin->getId()?>"><?= $vin->getReference() ?></a></td>
        <td class="align-middle"><?= $vin->getmillesime() ?></td>
        <td class="align-middle"><a href="<?=URL?>vins/modifier/<?=$vin->getId()?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><form action="<?=URL?>vins/supprimer/<?=$vin->getId()?>" onsubmit="confirm('voulez vous vraiment supprimer ce vin ?')"><button class="btn btn-danger">Supprimer</button></form></td>
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>vins/ajouter" class="btn btn-success d-block">Ajouter</a>

<?php
$Reference = "Liste des vins";
$content = ob_get_clean();
require_once "../App/views/template.php";