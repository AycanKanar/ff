<?php

require_once "../app/models/ModelClass.php";
require_once "../app/models/vin/vinClass.php";

class vinManager extends Model {

    private $vins;

    public function ajoutvin($vin) {
        $this->vins[] = $vin;
    }

    public function getvins() {
        return $this->vins;
    }

    public function getvinById($id) {
        foreach($this->vins as $vin) {
            if ($vin->getId() === $id) {
                return $vin;
            }
        }
    }

    public function chargementvins() {
        $sql = "SELECT * FROM vins";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new vin($value->id,$value->Reference,$value->millesime,$value->image);
            $this->ajoutvin($add);
        }
    }

    public function ajoutvinBD($Reference,$millesime,$image){
        $sql = "INSERT INTO vins (Reference, millesime, image) values (:Reference,:millesime,:image)";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":Reference"=>$Reference,
            ":millesime"=>$millesime,
            ":image"=>$image
        ]);
    }

    public function supprimervinBD($id) {
        $sql = "DELETE FROM vins WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id" => $id
        ]);
    }

    public function modifiervinBD($id,$Reference,$millesime,$image) {
        $sql = "UPDATE vins SET Reference = :Reference, millesime = :millesime, image = :image WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":Reference" => $Reference,
            ":millesime" => $millesime,
            ":image" => $image,
            ":id" => $id
        ]);
    }
}