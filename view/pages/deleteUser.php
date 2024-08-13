<?php
require_once(__DIR__.'/../../controller/UserC.php');
require_once(__DIR__.'/../../model/User.php');

$userC = new UserController();
if (isset($_GET["id"])) {
    $userC->deleteUser($_GET["id"]);
    header("Location:tables.php");
}
else {
    echo "Missing id get parameter";
}