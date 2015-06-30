<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
		<title>Partage de liens</title>
	</head>    
	                                                                                     
	<body>                                                        
		<?php require 'include/top.php'; 
        require 'include/left.php';
        if(isset($_GET['id']))
        {
            $reqLink = $bdd->prepare('SELECT url, titre FROM lien WHERE id = :id');
            $reqLink->execute(array('id' => $_GET['id']));
            $link = $reqLink->fetch();
            $titre = $link['titre'];
            $url = $link['url'];
        }
        ?>
		<section>
			<div class="bloc option">
                <h2>Partage de lien</h2>
                <form action="" method="post">
                    <label for="titre">Titre </label><input type="text" name="titre" maxlength="20" required="" value="<?php if(isset($titre)){ echo $titre; } ?>"><br>
                    <label for="url">Saisir url </label><input type="url" name="url" required="" value="<?php if(isset($url)){ echo $url; } ?>"><br>
                    <input type="submit" class="BtnValider" name="valider" value="<?php if(isset($_GET['id'])){ echo 'Modifier'; }else{ echo 'Ajouter'; }?>">
                </form>
			</div>
		</section>
<?php   include 'include/footer.php'; ?>
    
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
	</body>
</html>