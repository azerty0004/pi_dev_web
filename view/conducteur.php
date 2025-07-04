<?php

require_once(__DIR__.'/../controller/TrajetC.php');
require_once(__DIR__.'/../model/Trajet.php');

session_start();

if (!isset($_SESSION["user_role"]) or $_SESSION["user_role"] != 1) {
    http_response_code(403);
    header("Location:../index.php");
    exit();
}

$id_conducteur = $_SESSION["user_id"];

$trajetC = new TrajetController();
$list = $trajetC->showTrajetBy_Id_Conducteur($id_conducteur);
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
                        <li><a href="signIn.php">Sign In</a></li>
                        <li><a href="addUser.php">Sign Up</a></li>
                        <!--
                        <li><a href="coures.html">Courses</a></li>
                        <li><a href="devoir.html">Devoir</a></li>
                        <li><a href="reclamation.html">Reclamation</a></li>
                        <li><a href="formu.html">Forum</a></li>
                        -->
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
							<li>Conducteur</li>
						</ul>
						<h1 class="white-text">Gérez vos trajets</h1>

					</div>
				</div>
			</div>

		</div>

<div class="user-table"> 
  <table border="1" align="center" width="60%">
     <tr>
        <th>Id</th>
        <th>depart</th>
        <th>arrivée</th>
        <th>distance</th>
        <th>date départ</th>
        <th>id conducteur</th>
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
            
            <td align="center">
                <form method="POST" action="updateTrajet.php">
                    <input type="submit" name="update" value="Update">
                    <input type="hidden" value=<?PHP echo $trajet['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteTrajet.php?id=<?php echo $trajet['id']; ?>">Delete</a>
            </td>
        </tr>
        
    <?php
    }
    ?>
  </table>
</div>

<form id="signupForm">
    <button><a href="ajouterTrajet.php">Ajouter un trajet</a></button>
    <button><a href="searchTrajet.php">Rechercher un trajet</a></button>
    <button><a href="sortTrajet.php">Trier les trajets</a></button>
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