<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
        <title>Mes liens</title>
    </head>

    <body>
<?php   require 'include/top.php';
        require 'include/left.php'; ?>
        <section>
<?php       $requete = $bdd->prepare('SELECT lien.id id, url, titre FROM lien, membre WHERE membre.prenom = :prenom AND membre.id = lien.auteur ORDER BY lien.id DESC');
            $requete->execute(array('prenom' => $prenom));
            while($liste_lien = $requete->fetch())
            { ?>
                <div class="bloc link" id="<?php echo $liste_lien['id'];?>">
                    <button class="icone_supprimer" onclick="DeleteLink(<?php echo $liste_lien['id'];?>)"><i class="fa fa-times"></i></button>
                    <a href="<?php echo 'partageLien.php?id='.$liste_lien['id'];?>"><button class="icone_modifier"><i class="fa fa-pencil"></i></button></a>
                    <p><?php echo 'Titre : '.$liste_lien['titre'].'<br />Lien : <a href="'.$liste_lien['url'].'">'.$liste_lien['url'].'</a>'; ?></p>
                </div>
<?php       } ?>
        </section>
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
        <script src="js/CommentLink.js"></script>
    </body>
</html>