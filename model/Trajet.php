<?php
class Trajet {
    private ?int $id = null;
    private ?string $depart = null;
    private ?string $arrivee = null;
    private ?float $distance = null;
    private ?string $date_d = null;
    private ?string $id_conducteur = null;

    public function __construct($id, $depart, $arrivee, $distance, $date_d, $id_conducteur)
    {
        $this->id = $id;
        $this->depart = $depart;
        $this->arrivee = $arrivee;
        $this->distance = $distance;
        $this->date_d = $date_d;
        $this->id_conducteur = $id_conducteur;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDepart()
    {
        return $this->depart;
    }

    public function getArrivee()
    {
        return $this->arrivee;
    }

    public function getDistance()
    {
        return $this->distance;
    }

    public function getDate_d() {
        return $this->date_d;
    }

    public function getId_Conducteur() {
        return $this->id_conducteur;
    }
}