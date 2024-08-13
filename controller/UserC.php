<?php

require_once(__DIR__."/../config/config.php");

class UserController {
    public static function listUsers() {
        $db = config::getConnexion();
        $sql = "SELECT * from pidev.utilisateurs";
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

    public function deleteUser($id)
    {
        $sql = "DELETE FROM pidev.utilisateurs WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $sql = "INSERT INTO pidev.utilisateurs (email, telephone, nom, mdp)
        VALUES (:email, :phone, :name, :password)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'phone' => $user->getPhone(),
                'password' => $user->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateUser($user, $id)
    {
        $sql = "UPDATE pidev.utilisateurs SET email = :email, telephone = :phone, role = :role, nom = :name, mdp = :password WHERE id= :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id,
                'phone' => $user->getPhone(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
                'password' => $user->getPassword()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showUser($id)
    {
        $sql = "SELECT * from pidev.utilisateurs where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showUser_byName($username)
    {
        $sql = "SELECT * from pidev.utilisateurs where nom = '$username'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}