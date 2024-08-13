<?php
require_once(__DIR__.'/../controller/TrajetC.php');
require_once(__DIR__.'/../model/Trajet.php');

session_start();


// create an instance of the controller
$TrajetC = new TrajetController();

$trajet = null;

if (isset($_GET["depart"]) and !empty($_GET["depart"]) and
    isset($_GET["arrivee"]) and !empty($_GET["arrivee"])) {
        $depart = $_GET["depart"];
        $arrivee = $_GET["arrivee"];

        $sql = "SELECT * from pidev.trajet where depart = '$depart' and arrivee = '$arrivee'";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute();

        $trajet = $query->fetch();
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
						<h1 class="white-text">Rechercher un trajet</h1>

					</div>
				</div>
			</div>
		</div>

        <?php

if ($trajet != null) {
?>
<div> 
  <table border="1" align="center" width="60%">
     <tr>
        <th>id</th>
        <th>depart</th>
        <th>arrivee</th>
        <th>distance</th>
        <th>date départ</th>
        <th>id_conducteur</th>
    </tr>
        <tr>
            <td><?= $trajet['id']; ?></td>
            <td><?= $trajet['depart']; ?></td>
            <td><?= $trajet['arrivee']; ?></td>
            <td><?= $trajet['distance']; ?></td>
            <td><?= $trajet['date_d']; ?></td>
            <td><?= $trajet['id_conducteur']; ?></td>
        </tr> 
  </table>
</div>
<?php
}
?>

<div class="searchForm">
    <form action="" method="GET">
        <label for="depart">Départ</label>
        <input type="text" name="depart" id="depart">

        <label for="arrivee">Arrivée</label>
        <input type="text" name="arrivee" id="arrivee">


        <button id="searchButton" type="submit">Rechercher</button>
    </form>
</div>




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