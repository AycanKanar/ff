<?php

require_once "../App/models/Wine/WineManager.php";
require_once "../App/controllers/GlobalController.php";

class WineController{

    private $wineManager;

    public function __construct() {
        $this->wineManager = new WineManager();
        $this->wineManager->chargementWines();
    }

    public function afficherWines() {
        $vins = $this->wineManager->getWines();
        require "../App/views/Wine/vinsView.php";
    }

    public function afficherWine($id) {
        $vin = $this->wineManager->getWineById($id);
        if (!$vin) {
            throw new Exception('Le Wine que vous recherchez n\'existe pas.');
        }
        require "../App/views/Wine/afficherWineView.php";
    }

    public function ajoutWine() {
        require "../App/views/Wine/ajoutWineView.php";
    }

    public function ajoutWineValidation() {
        $file = $_FILES['image'];
        $repertoire = "../public/images/";
        $image = GlobalController::ajoutImage($_POST['Reference'],$file,$repertoire);
        $this->wineManager->ajoutWineBD($_POST['Reference'],$_POST['millesime'],$image);
        header("location:".URL."vins");
    }

    public function supprimerWine($id) {
        $monImage = $this->wineManager->getWineById($id)->getImage();
        unlink("../public/images/".$monImage);
        $this->wineManager->supprimerWineBD($id);
        header("location:".URL."vins");
    }

    public function modifierWine($id) {
        $vin = $this->wineManager->getWineById($id);
        require "../App/views/Wine/modifierWineView.php";
    }

    public function modifierWineValider() {
        $imgActuelle = $this->wineManager->getWineById($_POST['id'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->wineManager->modifierWineBD($_POST['id'],$_POST['Reference'],$_POST['millesime'],$imgToAdd);
        header("location:".URL."vins");
    }

}