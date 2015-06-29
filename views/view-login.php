<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
		<title>BTS SIO A1</title>
	</head>
	<body>
	    <div id="erreur" style="display: <?php if(isset($erreur)){ echo 'block'; }else{ echo 'none';} ?>">
	        <?php if(isset($erreur)){ echo $erreur; } ?>
	    </div>
		<form action="" method="POST" id="login" class="blueLogin">
			<input type="text" name="prenom" placeholder="Pseudo" autofocus /><br />
			<input type="password" name="mdp" placeholder="Mot de passe"/><br />
			<input type="checkbox" name="save"/><label for="save">Enregistrer ?</label><br />
			<input type="submit" id="valider" name="valider" value="Connexion"/>
		</form>
	</body>
</html>