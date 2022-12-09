<?php

require_once "../App/models/vin/vinManager.php";
require_once "../App/controllers/GlobalController.php";

class vinController{

    private $vinManager;

    public function __construct() {
        $this->vinManager = new vinManager();
        $this->vinManager->chargementvins();
    }

    public function affichervins() {
        $vins = $this->vinManager->getvins();
        require "../App/views/vin/vinsView.php";
    }

    public function affichervin($id) {
        $vin = $this->vinManager->getvinById($id);
        if (!$vin) {
            throw new Exception('Le vin que vous recherchez n\'existe pas.');
        }
        require "../App/views/vin/affichervinView.php";
    }

    public function ajoutvin() {
        require "../App/views/vin/ajoutvinView.php";
    }

    public function ajoutvinValidation() {
        $file = $_FILES['image'];
        $repertoire = "../public/images/";
        $image = GlobalController::ajoutImage($_POST['Reference'],$file,$repertoire);
        $this->vinManager->ajoutvinBD($_POST['Reference'],$_POST['millesime'],$image);
        header("location:".URL."vins");
    }

    public function supprimervin($id) {
        $monImage = $this->vinManager->getvinById($id)->getImage();
        unlink("../public/images/".$monImage);
        $this->vinManager->supprimervinBD($id);
        header("location:".URL."vins");
    }

    public function modifiervin($id) {
        $vin = $this->vinManager->getvinById($id);
        require "../App/views/vin/modifiervinView.php";
    }

    public function modifiervinValider() {
        $imgActuelle = $this->vinManager->getvinById($_POST['id'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->vinManager->modifiervinBD($_POST['id'],$_POST['Reference'],$_POST['millesime'],$imgToAdd);
        header("location:".URL."vins");
    }

}