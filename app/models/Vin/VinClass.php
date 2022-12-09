<?php

class vin {

    private $id;
    private $Reference;
    private $millesime;
    private $image;

    public function __construct($id,$Reference,$millesime,$image) {
        $this->id = $id;
        $this->Reference = $Reference;
        $this->millesime = $millesime;
        $this->image = $image;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getReference() {
        return $this->Reference;
    }
    public function setReference($Reference) {
        $this->Reference = $Reference;
    }

    public function getmillesime() {
        return $this->millesime;
    }
    public function setmillesime($millesime) {
        $this->millesime = $millesime;
    }

    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }
}