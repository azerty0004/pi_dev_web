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
    isset($_POST["id"]) &&
    isset($_POST["depart"]) &&
    isset($_POST["arrivee"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["distance"]) &&
    isset($_POST["id_conducteur"])) {

      $trajet = new Trajet(
          id: $_POST['id'],
          depart: $_POST['depart'],
          arrivee: $_POST['arrivee'],
          distance: $_POST['distance'],
          date_d: $_POST['date_d'],
          id_conducteur:$_POST["id_conducteur"],
      );

      $TrajetC->updateTrajet($trajet, $_POST["id"]);
      header("Location:conducteur.php");
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
						<h1 class="white-text">Modifier un trajet</h1>

					</div>
				</div>
			</div>
		</div>

        <?php
    if (isset($_POST['id'])) {
        $trajet = $TrajetC->showTrajet($_POST['id']);
    ?>
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="id">ID:
                    </label>
                </td>
                <td><input type="text" name="id" id="id" value="<?php echo $trajet['id']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="depart">Départ:
                    </label>
                </td>
                <td><input type="text" name="depart" id="depart" value="<?php echo $trajet['depart']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="arrivee">Arrivée:
                    </label>
                </td>
                <td><input type="text" name="arrivee" id="arrivee" value="<?php echo $trajet['arrivee']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="distance">Distance:
                    </label>
                </td>
                <td><input type="text" name="distance" id="distance" value="<?php echo $trajet['distance']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="date_d">Date départ:
                    </label>
                </td>
                <td>
                    <input type="text" name="date_d" value="<?php echo $trajet['date_d']; ?>" id="date_d">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id_conducteur">id_conducteur:
                    </label>
                </td>
                <td>
                    <input type="text" name="id_conducteur" id="id_conducteur" value="<?php echo $trajet["id_conducteur"]; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Update">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>

        </table>
    </form>
<?php
}
?>


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