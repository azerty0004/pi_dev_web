<?php
require_once(__DIR__.'/../controller/TrajetC.php');
require_once(__DIR__.'/../model/Trajet.php');

session_start();

if (!isset($_SESSION["user_role"]) or $_SESSION["user_role"] != 1) {
    http_response_code(403);
    header("Location:../index.php");
    exit();
}

//var_dump($_POST);

// create an instance of the controller
$TrajetC = new TrajetController();
if (
    isset($_POST["depart"]) &&
    isset($_POST["arrivee"]) &&
    isset($_POST["distance"]) &&
    isset($_SESSION["user_id"]) &&
    isset($_POST["date_d"])) {

    $depart = $_POST["depart"];
    $arrivee = $_POST["arrivee"];
    $distance = $_POST["distance"];
    $id_conducteur = $_SESSION["user_id"];
    $date_d = $_POST["date_d"];

    
    $Trajet = new Trajet(
        null,
        $depart,
        $arrivee,
        $distance,
        $date_d,
        $id_conducteur,
    );


    $TrajetC->addTrajet($Trajet);

    header("Location:conducteur.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HTML Education Template</title>

		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>

    <body>
    <header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.php">
							<img src="img/logo-alt.png" alt="logo">
						</a>
					</div>
					<button class="navbar-toggle">
						<span></span>
					</button>
				</div>
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
					</ul>
				</nav>
                </div>
		</header>
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.php">Home</a></li>
							<li>Trajet</li>
						</ul>
						<h1 class="white-text">Ajouter un trajet</h1>

					</div>
				</div>
			</div>

		</div>

        <!-- /Hero-area -->
        <form id="signupForm" action="" method="POST">
            <div>
                <label for="depart">depart</label>
                <input type="text" id="depart" name="depart" maxlength=20 required>
            </div>

            <div>
                <label for="arrivee">arrivée</label>
                <input type="text" id="arrivee" name="arrivee" required>
            </div>
            <div>
                <label for="distance">distance</label>
                <input type="text" id="distance" name="distance" required>
            </div>

            <div>
                <label for="date_d">date départ</label>
                <input type="text" id="date_d" name="date_d" required>
            </div>

            <br/>

            <button type="submit">Ajoutez un trajet</button>
        </form>



    <!-- preloader -->
    <div id='preloader'><div class='preloader'></div></div>
    <!-- /preloader -->


    <!-- jQuery Plugins -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript" src="js/google-map.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <script src="script.js"></script>

        
    </body>
</html>