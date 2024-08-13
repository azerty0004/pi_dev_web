<?php
require_once(__DIR__.'/../controller/TrajetC.php');
require_once(__DIR__.'/../model/Trajet.php');

session_start();


function sortTrajets($criteria) {
    $db = config::getConnexion();
    $sql = "SELECT * from pidev.trajet ORDER BY $criteria";
    $req = $db->prepare($sql);
    try {
        $req->execute();
        $result = $req->fetchAll();
    }
    catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }

    return $result;
}

$criteria = "null";

if (isset($_GET["criteria"]) and !empty($_GET["criteria"])) {
    $criteria = $_GET["criteria"];
}

$list = sortTrajets($criteria);

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

<div> 


<div> 
  <table border="1" align="center" width="60%">
     <tr>
        <th>Id</th>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Distance</th>
        <th>Date Départ</th>
        <th>Id Conducteur</th>
    </tr>
    <?php
    foreach ($list as $trajet) {
    ?>
        <tr>
            <td><?= $trajet['id']; ?></td>
            <td><?= $trajet['depart']; ?></td>
            <td><?= $trajet['arrivee']; ?></td>
            <td><?= $trajet['distance']; ?></td>
            <td><?= $trajet['date_d']; ?></td>
            <td><?= $trajet['id_conducteur']; ?></td>
        </tr> 
    <?php
    }
    ?>
  </table>
</div>


<form action="" method="GET">
    <div class="sortForm">
        <label for="criteria">Critère de tri</label>
        <select id="etat" name="criteria" required>
            <option value="id">Tri selon l'id</option>
            <option value="depart">Tri selon le départ</option>
            <option value="arrivee">Tri selon l'arrivée</option>
            <option value="distance">Tri selon la distance</option>
            <option value="date_d">Tri selon la date de départ</option>
            <option value="id_conducteur">Tri selon l'id du conducteur</option>
        </select>
    </div>

    <button id="sortButton" type="submit">Trier</button>
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