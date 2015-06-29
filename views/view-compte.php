<!DOCTYPE html>
<html>
    <head >
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
        <title>Accueil</title>
        <style>
            #modifierMdp{
                width: 200px;
                height: 30px;
                margin: 10px 0 -10px 0;
            }
            #fermerMdp{
                width: 100px;
                height: 30px; 
                margin: 10px 0 -10px 0;
            }
            #validerMdp{
                width: 204px;
                height: 30px;
                float: right;
                margin: 10px 10px -10px 0;
            }
            #resultMdp{
                color: green;
            }
            #erreurMdp{
                color: red;
                text-align: center;
            }
        </style>
    </head>

    <body>
<?php   require 'include/top.php';
        require 'include/left.php';
        $req = $bdd->prepare('SELECT * FROM membre WHERE id= :id');
    $req->execute(array(
        'id' => $idPrenom
    ));
    $info_membre = $req->fetch();
        
        ?>
        <section>
            <div class="bloc compte">
                <form action="" method="POST">
                    <fieldset>
                        <legend>Coordonnées</legend>
                        <label for="adresse">Adresse :</label>
                        <input type="text" class="champ" name="adresse" value="<?php echo $info_membre['adresse']; ?>"/></br>

                        <label for="ville">Ville :</label>
                        <input type="text" class="champ" name="ville" value="<?php echo $info_membre['ville']; ?>"/></br>  

                        <label for="tel">N° de téléphone :</label>
                        <input type="phone" class="champ" name="tel" value="<?php echo $info_membre['tel']; ?>"/></br>  

                        <label for="dateNaissance">Date de naissance :</label>
                        <input type="date" class="champ" name="dateNaissance" value="<?php if($info_membre['dateNaissance'] != "0000-00-00"){ echo $info_membre['dateNaissance']; } ?>"/></br>  

                        <label for="email">E-mail :</label>
                        <input type="email" class="champ" name="email" value="<?php echo $info_membre['email']; ?>"/></br>

                        <label for="skype">Pseudo Skype :</label>
                        <input type="text" class="champ" name="skype" value="<?php echo $info_membre['skype']; ?>"/></br>
                        
                        <input type="button" id="modifierMdp" value="Modifier mon mot de passe"/>
                        <p id="resultMdp"></p>
                    </fieldset>
                    <input type="submit" class="BtnValider" name="valider" value="Valider"></br>
                </form>
            </div>
        </section>
        
        <div id="popin">
            <div id="mdp">
                <p id="erreurMdp"></p>
                <label for="ancierMdp">Ancien mot de passe :</label>
                <input type="password" class="champ" id="ancienMdp"/></br>
                
                <label for="nouveauMdp2">Nouveau mot de passe :</label>
                <input type="password" class="champ" id="nouveauMdp1"/></br>
                
                <label for="nouveauMdp2">Vérification mot de passe :</label>
                <input type="password" class="champ" id="nouveauMdp2"/>
                
                <input type="button" id="fermerMdp" value="Fermer">
                <input type="button" id="validerMdp" value="Valider">
            </div>
        </div>
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
		<script src="js/compte.js"></script>
    </body>
</html>