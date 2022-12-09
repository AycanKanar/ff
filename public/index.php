<?php
session_start();

require_once "../app/controllers/Wine/WineController.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? " https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

$wineController = new WineController;

try {
    if (empty($_GET['page'])) {
        require "../App/views/accueilView.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require "../App/views/accueilView.php";
                break;
            case "Wines":
                if (empty($url[1])) {
                    $WineController->afficherWines();
                } else if ($url[1] === "modifier") {
                    $WineController->modifierWine($url[2]);
                } else if ($url[1] === "modifValider") {
                    $WineController->modifierWineValider();
                } else if ($url[1] === "supprimer") {
                    $WineController->supprimerWine($url[2]);
                } else if ($url[1] === "ajouter") {
                    $WineController->ajoutWine();
                } else if ($url[1] === "lire") {
                    $WineController->afficherWine($url[2]);
                } else if ($url[1] === "valider") {
                    $WineController->ajoutWineValidation();
                } else {
                    throw new Exception('Error 404, Wines not found');
                }
                break;
            default:
                throw new Exception('Error 404, page not found'); 
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    require "../App/views/erreurView.php";
}
