<?php

require_once(__DIR__."/../config/config.php");

class TrajetController {
    public static function listTrajets() {
        $db = config::getConnexion();
        $sql = "SELECT * from pidev.trajet";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
        }
        catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }

        return $result;
    }

    public function deleteTrajet($id)
    {
        $sql = "DELETE FROM pidev.trajet WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addTrajet($trajet)
    {
        $sql = "INSERT INTO pidev.trajet (depart, arrivee, distance, date_d, id_conducteur)
        VALUES (:depart, :arrivee, :distance, :date_d, :id_conducteur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'depart' => $trajet->getDepart(),
                'arrivee' => $trajet->getArrivee(),
                'distance' => $trajet->getDistance(),
                'date_d' => $trajet->getDate_d(),
                'id_conducteur' => $trajet->getId_Conducteur(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateTrajet($trajet, $id)
    {
        $sql = "UPDATE pidev.trajet SET depart = :depart, arrivee = :arrivee, distance = :distance, date_d = :date_d, id_conducteur = :id_conducteur WHERE id= :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'depart' => $trajet->getDepart(),
                'arrivee' => $trajet->getArrivee(),
                'distance' => $trajet->getDistance(),
                'date_d' => $trajet->getDate_d(),
                'id_conducteur' => $trajet->getId_Conducteur(),
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showTrajet($id)
    {
        $sql = "SELECT * from pidev.trajet where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $trajet = $query->fetch();
            return $trajet;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showTrajetBy_Id_Conducteur($id_conducteur) {
        $db = config::getConnexion();
        $sql = "SELECT * from pidev.trajet where id_conducteur = $id_conducteur";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
        }
        catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
        return $result;
    }
}