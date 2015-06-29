<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
		<title>BTS SIO A1</title>
	</head>
	<body>
		<?php require 'include/top.php';
        require 'include/left.php'; ?>
		<section>
			<article style="width: 300px">
				<form action="" method="post" class="option">
					<h1>Ajouter un lien</h1>
					<label for="titre">Titre</label><input type="text" name="titre" required/><br />
					<label for="url">URL</label><input type="url" name="url" value="http://" required/><br />
					<input type="submit" name="ajouter" value="Ajouter"/>
				</form>
				<hr />
				<form action="" method="post" class="option">
					<h1>Ajouter un message</h1>
					<textarea name="contenu" required ></textarea><br />
					<input type="submit" name="envoyer" value="Envoyer"/>
				</form>
			</article>
		</section>
		<footer>
			<p>Site de la classe de BTS SIO de l'Institut d'Informatique Appliqué</p>
		</footer>
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
	</body>
</html>