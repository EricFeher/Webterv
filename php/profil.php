<?php
		//include "load.php";
	//$fiokok = loadUsers("../adatok/txt/users.txt");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Space and Stuff</title>
		<link rel="stylesheet" href="../css/profil.css">
		<link rel="shortcut icon" href="../img/logo.jfif">
		<link rel="apple-touch-icon" href="../img/logo.jfif">
	</head>
	<body>
		<div>
			<h1 id="mainTitle">Your profile</h1>
		</div>
		<div id="articles">
			<main>
				<article id="profilstyle">
					<ul>
					<li>
					<form action="index.php?p=profil.php" method="post" enctype="multipart/form-data">
						Upload a meme for us to see:
						<input type="file" name="fileToUpload" id="fileToUpload">
						<input type="submit" value="Upload Image" name="submit">
					</form>
					<?php
						include "upload.php";
					?></li><?php
						if($_SESSION["user"]->getSex() == "m"){
							$sex = "male";
						}
						else if($_SESSION["user"]->getSex() == "f"){
							$sex = "female";
						}
						else {
							$sex = "other";
						}
						
						echo "<li>Username: " . $_SESSION["user"]->getFelhasznalonev() . "<br>melynek karaktereinek hossza: ". strlen($_SESSION["user"]->getFelhasznalonev()) ."</li>";
						echo "<li>E-mail: " . $_SESSION["user"]->getEmail() . "</li>";
						echo "<li>Date of birth: " . $_SESSION["user"]->getDateof() . "<br>". floor((getdate()[0]-strtotime($_SESSION["user"]->getDateof()))/60/60/24) . " napja élsz </li>";
						echo "<li>Register date: " . $_SESSION["user"]->getRegdate() . "<br>". floor((getdate()[0]-strtotime($_SESSION["user"]->getRegdate()))/60) . " perce regisztráltál</li>";
						echo "<li>Sex: " . strtoupper($sex) . "</li>";
					?>
					</ul>
				</article>
			</main>
		</div>
	</body>
</html>