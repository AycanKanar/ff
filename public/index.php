<?php
session_start();

require_once "../app/controllers/vin/vinController.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? " https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

$vinController = new vinController;

try {
    if (empty($_GET['page'])) {
        require "../App/views/accueilView.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require "../App/views/accueilView.php";
                break;
            case "vins":
                if (empty($url[1])) {
                    $vinController->affichervins();
                } else if ($url[1] === "modifier") {
                    $vinController->modifiervin($url[2]);
                } else if ($url[1] === "modifValider") {
                    $vinController->modifiervinValider();
                } else if ($url[1] === "supprimer") {
                    $vinController->supprimervin($url[2]);
                } else if ($url[1] === "ajouter") {
                    $vinController->ajoutvin();
                } else if ($url[1] === "lire") {
                    $vinController->affichervin($url[2]);
                } else if ($url[1] === "valider") {
                    $vinController->ajoutvinValidation();
                } else {
                    throw new Exception('Error 404, vins not found');
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
