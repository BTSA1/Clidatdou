<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
        <title>Mes Commentaires</title>
    </head>

    <body>
<?php   require 'include/top.php';
        require 'include/left.php'; ?>
        <section>
<?php       $requete = $bdd->prepare('SELECT message.id id, contenu FROM message, membre WHERE membre.prenom = :prenom AND membre.id = message.auteur ORDER BY message.id DESC');
            $requete->execute(array('prenom' => $prenom));
            while($liste_message = $requete->fetch())
            { ?>
                <div class="bloc comment" id="<?php echo $liste_message['id'];?>">
                    <button class="icone_supprimer" onclick="DeleteComment(<?php echo $liste_message['id'];?>)"><i class="fa fa-times"></i></button>
                    <a href="<?php echo 'commentaire.php?id='.$liste_message['id'];?>"><button class="icone_modifier"><i class="fa fa-pencil"></i></button></a>
                    <p><?php echo BBCode(nl2br($liste_message['contenu'])); ?></p>
                </div>
<?php       } ?>
        </section>
<?php   include 'include/footer.php'; ?>
    
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
        <script src="js/CommentLink.js"></script>
    </body>
</html>