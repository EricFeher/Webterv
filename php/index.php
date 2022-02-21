<?php
	include "load.php";
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Space and Stuff</title>
		<link rel="stylesheet" href="../css/overall.css">
		<!--<link rel="stylesheet" href="../css/index.css">-->
		<link rel="shortcut icon" href="../img/logo.jfif">
		<link rel="apple-touch-icon" href="../img/logo.jfif">
	</head>
	<body>
		<?php
            if(isset($_GET['p'])) { 
				include $_GET['p'];?>
				<nav>
					<h2>SPACE AND STUFF</h2>
					 <ul  id="navigation" class="active">
						<?php if ($_GET ["p"] === "main.php"){ ?>
						<li>
							<a class="active" href="../php/index.php?p=main.php">Home</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="../php/index.php?p=main.php">Home</a>
						</li>
						<?php } ?>
						<?php if (isset($_SESSION["user"])) { ?>
						
						<?php if ($_GET ["p"] === "profil.php"){ ?>
						<li>
							<a class="active" href="../php/index.php?p=profil.php">Profile</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="../php/index.php?p=profil.php">Profile</a>
						</li>
						<?php } ?>
						<li>
							<a href="../php/index.php?p=kilep.php">Kijelentkezés</a>
						</li>
						<?php } else { ?>
						
						<?php if ($_GET ["p"] === "bejelentkezes.php"){ ?>
							<li> 	
								<a class="active" href="../php/index.php?p=bejelentkezes.php">Login / Register</a>
							</li>
							<?php } else { ?>
							<li> 	
								<a href="../php/index.php?p=bejelentkezes.php">Login / Register</a>
							</li>
							
							<?php } ?>
						<?php } ?>
					
						<?php if ($_GET ["p"] === "aboutus.php"){ ?>
						<li>
							<a class= "active" href="../php/index.php?p=aboutus.php">About us</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="../php/index.php?p=aboutus.php">About us</a>
						</li>
						<?php } ?>
						<?php if ($_GET ["p"] === "space.php"){ ?>
						<li>
							<a class="active" href="../php/index.php?p=space.php">Space</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="../php/index.php?p=space.php">Space</a>
						</li>
						<?php } ?>
						<?php if ($_GET ["p"] === "planets.php"){ ?>
						<li>
							<a class="active" href="../php/index.php?p=planets.php">Planets</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="../php/index.php?p=planets.php">Planets</a>
						</li>
						<?php } ?>
					</ul>
				</nav>
			<?php 
			}
            else { ?>
				<nav>
					<h2>SPACE AND STUFF</h2>
					 <ul  id="navigation" class="active">
						<li>
							<a class="active" href="../php/index.php?p=main.php">Home</a>
						</li>
						<?php if (isset($_SESSION["user"])) { ?>
							<li>
								<a href="../php/index.php?p=profil.php">Profilom</a>
							</li>
							<li>
								<a href="../php/index.php?p=kilep.php">Kijelentkezés</a>
							</li>
						<?php } else { ?>
							<li> 	
								<a href="../php/index.php?p=bejelentkezes.php">Login / Register</a>
							</li>
						<?php } ?>

						<li>
							<a href="../php/index.php?p=aboutus.php">About us</a>
						</li>
						<li>
							<a href="../php/index.php?p=space.php">Space</a>
						</li>
						<li>
							<a href="../php/index.php?p=planets.php">Planets</a>
						</li>
					 </ul>
				</nav>
			<?php include "main.php";}
        ?>
	</body>
</html>