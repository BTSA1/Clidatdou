<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8"/>
        <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
        <title>Accueil</title>
    </head>

    <body>
<?php   require 'include/top.php';
        require 'include/left.php'; ?>
        <section>
<?php       $requete = $bdd->query('SELECT * FROM membre WHERE 1 ORDER BY prenom');
            while($liste_membre = $requete->fetch())
            { 
                if($liste_membre['derniereConnexion'] != NULL)
                {
                    $now = new DateTime();
                    $last  = new DateTime($liste_membre['derniereConnexion']);
                    $ecart = $now->diff($last);
                    $minutes = $ecart->days * 24 * 60;
                    $minutes += $ecart->h * 60;
                    $minutes += $ecart->i;
                    if($minutes > 3)
                    {
                        $etat = 'Dernière connexion le ' . $last->format('d/m/Y');
                        $color = 'red';
                    }
                    else
                    {
                        $etat = "En ligne";
                        $color = 'green';
                    }
                }
                else
                {
                    $etat = '';
                    $color = 'black';
                }
            ?>
                <div class="bloc contact">
                    <h3><?php echo $liste_membre['prenom'].' '.$liste_membre['nom']; ?><span style="color: <?php echo $color; ?>" class="etat"><?php echo $etat; ?></span></h3>
                    <p>
                        <?php if($liste_membre['adresse'] != ""){ ?>
                            <span class="libelle">Adresse :</span>
                            <?php echo $liste_membre['adresse']; ?><br />
                        <?php } ?>
                        
                        <?php if($liste_membre['ville'] != ""){ ?>
                            <span class="libelle">Ville :</span>
                            <?php echo $liste_membre['ville']; ?><br />
                        <?php } ?>
                        
                        <?php if($liste_membre['tel'] != ""){ ?>
                            <span class="libelle">Téléphone :</span>
                            <?php echo $liste_membre['tel']; ?><br />
                        <?php } ?>
                        
                        <?php if($liste_membre['dateNaissance'] != "0000-00-00"){ ?>
                            <span class="libelle">Date de naissance :</span>
                            <?php echo DateEnLettre($liste_membre['dateNaissance']); ?><br />
                        <?php } ?>
                        
                        <?php if($liste_membre['email'] != ""){ ?>
                            <span class="libelle">E-mail :</span>
                            <?php echo $liste_membre['email']; ?><br />
                        <?php } ?>
                        
                        <?php if($liste_membre['skype'] != ""){ ?>
                            <span class="libelle">Skype :</span>
                            <a href="skype:<?php echo $liste_membre['skype']; ?>?call" title="Appeler sur skype">
                            <?php echo $liste_membre['skype']; ?></a><br />
                        <?php } ?>
                    </p>
                </div>
<?php       } ?>
        </section>
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
    </body>
</html>