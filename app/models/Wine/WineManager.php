<?php

require_once "../app/models/ModelClass.php";
require_once "../app/models/Wine/WineClass.php";

class WineManager extends Model {

    private $vins;

    public function ajoutWine($Wine) {
        $this->vins[] = $Wine;
    }

    public function getWines() {
        return $this->vins;
    }

    public function getWineById($id) {
        foreach($this->vins as $Wine) {
            if ($Wine->getId() === $id) {
                return $Wine;
            }
        }
    }

    public function chargementWines() {
        $sql = "SELECT * FROM vins";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new Wine($value->id,$value->Reference,$value->millesime,$value->image);
            $this->ajoutWine($add);
        }
    }

    public function ajoutWineBD($Reference,$millesime,$image){
        $sql = "INSERT INTO vins (Reference, millesime, image) values (:Reference,:millesime,:image)";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":Reference"=>$Reference,
            ":millesime"=>$millesime,
            ":image"=>$image
        ]);
    }

    public function supprimerWineBD($id) {
        $sql = "DELETE FROM vins WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $result = $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierWineBD($id,$Reference,$millesime,$image) {
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