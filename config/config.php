<?php
class config {
    private static $pdo = null;
    public static function getConnexion() {
        if (isset(self::$pdo)) {
            return;
        }
        // Données connextion
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pidev";

        try {
            self::$pdo = new PDO("mysql:host=$servername;dbname=$dbname",
            $username, $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        catch (Exception $e) {
            die("Erreur: ".$e->getMessage());
        }

        return self::$pdo;
    }
}
