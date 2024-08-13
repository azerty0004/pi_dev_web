<?php

session_start();

require_once(__DIR__.'/../controller/UserC.php');
require_once(__DIR__.'/../model/User.php');
require_once(__DIR__.'/../utils.php');

//print_r($_SESSION);

// create user
$user = null;

$input_validation = true;

if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] == 1) {
    header("Location:conducteur.php");
}
else if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] == 2) {
    header("Location:passager.php");
}
else if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] === 0) {
    header("Location:pages/tables.php");
}
else if (isset($_POST["name"]) and isset($_POST["password"])) {
    $input_validation = validate_form_input_login($_POST["name"], $_POST["password"]);

    if ($input_validation) {
        $sql = "SELECT * from pidev.utilisateurs where nom = '" .  $_POST['name'] . "' and mdp = '" . md5($_POST["password"]) . "'";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
    
            $user = $query->fetch();
            if ($user != null) {
                $_SESSION["user_role"] = $user["role"];
                $_SESSION["user_id"] = $user["id"];
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }    
    }
}

if (!$input_validation) {
    ?>
    <script>
        alert("Le nom d'utilisateur doit uniquement contenir des caractères simple\nLe mot de passe doit être entre 4 et 34 caractères et contenir au moins une lette majuscule")
    </script>
    <?php
}


if ($user and $user["role"] == "0") {
    header("Location:pages/tables.php");
}

else if ($user and $user["role"] == "1") {
    header("Location:conducteur.php");
}
else if ($user and $user["role"] == "2") {
    header("Location:passager.php");
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
                        <li><a href="signIn.php">Sign In</a></li>
                        <li><a href="signUp.php">Sign Up</a></li>
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
							<li>Sign in</li>
						</ul>
						<h1 class="white-text">Login to your DriveMe account</h1>

					</div>
				</div>
			</div>

		</div>


		<!-- /Hero-area -->
        <form id="signupForm" action="" method="POST">
            <div>
                <label for="Nom">Username</label>
                <input type="text" id="Nom" name="name" maxlength=20 required>
            </div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <hr>
            <button type="submit">Connect</button>
        </form>



    <!-- Footer -->
    <footer id="footer" class="section">

    <!-- container -->
    <div class="container">
        <div id="bottom-footer" class="row">
            <!-- social -->
            <div class="col-md-4 col-md-push-8">
                <ul class="footer-social">
                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- /social -->

            <!-- copyright -->
            <div class="col-md-8 col-md-pull-4">
                <div class="footer-copyright">
                    <span>&copy; Copyright 2024. All Rights Reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i></span>
                </div>
            </div>
            <!-- /copyright -->

        </div>
        <!-- row -->

    </div>
    <!-- /container -->

    </footer>
    <!-- /Footer -->

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