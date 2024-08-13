<?php
require_once(__DIR__.'/../controller/TrajetC.php');
require_once(__DIR__.'/../model/Trajet.php');

$Trajetc = new TrajetController();
if (isset($_GET["id"])) {
    $Trajetc->deleteTrajet($_GET["id"]);
    header("Location:conducteur.php");
}
else {
    echo "Missing id get parameter";
}