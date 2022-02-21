<?php
   if (!isset($_SESSION)){
	   include "load.php";
	   session_start();
   }
              
	$fiokok = loadUsers("../adatok/txt/users.txt"); 
	
	$uzenet = "";

	if (isset($_POST["login"])) {
	  
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["passwd"]) || trim($_POST["passwd"]) === "") {
		
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
	  
    } 
	
	else
	{
      $felhasznalonev = $_POST["username"];
      $jelszo = $_POST["passwd"];

      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";

      foreach ($fiokok as $fiok) {
        if ($fiok->getFelhasznalonev() === $felhasznalonev && $fiok->getJelszo() === $jelszo) {
			
          $uzenet = "Sikeres belépés!";
          $_SESSION["user"] = $fiok;
          //header("Location: index.php");
        }
      }
    }
  }
?>
<?php
  $hibak = [];

  if (isset($_POST["reg"])) {
	$felhasznalo=new Felhasznalo($_POST["username"],$_POST["passwd"],$_POST["date-of-birth"],$_POST["sex"],$_POST["email"],date("F j, Y, g:i a"));
	echo $felhasznalo->getFelhasznalonev()."";
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
      $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["passwd"]) || trim($_POST["passwd"]) === "" || !isset($_POST["repasswd"]) || trim($_POST["repasswd"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["date-of-birth"]))
      $hibak[] = "A szuletesi ev megadása kötelező!";
  
    if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
      $hibak[] = "Egy e-mail megadása kötelező!";
	
	
    for ($i=0;$i<count($fiokok);$i++) {
		echo $felhasznalo->getFelhasznalonev()."";
		if ($fiokok[$i]->getFelhasznalonev() === $_POST["username"])
			$hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($_POST["passwd"]) < 5)
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    if ($_POST["repasswd"] !== $_POST["passwd"])
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if (count($hibak) === 0) {
      $fiokok[] = $felhasznalo;
      saveUsers("../adatok/txt/users.txt", $fiokok);
      $siker = TRUE;
      header("Location: index.php?p=bejelentkezes.php");
    } else {
      $siker = FALSE;
    }
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Space and Stuff - Login</title>
		<link rel="stylesheet" href="../css/overall.css">
		<link rel="stylesheet" href="../css/bejelentkezes.css">
		<link rel="shortcut icon" href="../img/logo.jfif">
		<link rel="apple-touch-icon" href="../img/logo.jfif">
	</head>
	<body>
		<div id="login">
			<h2>Login</h2>
			<form class="login" action="index.php?p=bejelentkezes.php" method="POST">
				<fieldset class="center">
					<label class="center"><span class="textLogin">Username:</span> <input type="text" name="username" /></label><br/>
					<label class="center"><span class="textLogin">Password:</span> <input type="password" name="passwd" /></label><br/>
				</fieldset>
				<input class="center" type="submit" name="login" value="Login"/>
			</form>
			<?php
			echo $uzenet . "<br>";
			?>
		</div>
		<div id="login">
			<h2>Register</h2>
			<form class="reg" action="index.php?p=bejelentkezes.php" method="POST">
				<fieldset class="center">
					<label class="center"><span class="textLogin">Username:</span> <input type="text" name="username" required/></label><br/>
					<label class="center"><span class="textLogin">Password:</span> <input type="password" name="passwd" required/></label><br/>
					<label class="center"><span class="textLogin">Re-Password:</span> <input type="password" name="repasswd" required/></label><br/>
					<label class="center"><span class="textLogin">E-mail:</span> <input type="email" name="email" required/></label><br/>
					<label class="center"><span class="textLogin">Date of Birth:</span> <input type="date" name="date-of-birth" min="1920-01-01" required/></label> <br/>
					<label class="center" for="sex">Sex:
						<select id="sex" name="sex">
						  <option value="f">Female</option>
						  <option value="m"selected>Male</option>
						  <option value="other">Other</option>
						</select><br/>
					</label>
					<label class="center"><span class="textLogin">Accept Terms of Service:</span> <input id="oof" name="checkbox" type="checkbox" required/></label><br/>
					<label class="center"><input type="hidden"/></label><br/>
					
				</fieldset>
				<input class="center" type="submit" name="reg" value="Register"/>
				<?php
					if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
						echo "<p>Sikeres regisztráció!</p>";
					} else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
						foreach ($hibak as $hiba) {
						echo "<p>" . $hiba . "</p>";
						}
					}
				?>
			</form>
		</div>
	</body>
</html>