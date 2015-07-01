<button id="activeLeft"><i class="fa fa-chevron-circle-right"></i></button>

<div class="leftDiv" id="leftBlocForButton"></div>
<div class="leftDiv" id="leftBloc"></div>

<div class="leftDiv" id="left">
    <a href="http://webmail.clidatdou.com/" target="_blank">
        <p class="blueGradation" >Boite Mail Clidatdou</p>
    </a>
    <a href="https://login.microsoftonline.com/login.srf" target="_blank">
        <p class="greenGradation">Boite Mail IIA</p>
    </a>
    <a href="https://formations.mayenne.cci.fr/net-ypareo/script/commun/connexion.php" target="_blank">
        <p class="purpleGradation">Ypareo</p>
    </a>
    <a href="http://Download.clidatdou.com" target="_blank">
        <p class="yellowGradation">Download</p>
    </a>
    <a href="http://Test.clidatdou.com" target="_blank">
        <p class="redGradation">Test</p>
    </a>
<?php   $requete = $bdd->query('SELECT url, titre, prenom FROM lien, membre WHERE membre.id = lien.auteur ORDER BY titre');
        while($liste_lien = $requete->fetch())
        { ?>
            <a class="link" href="<?php echo $liste_lien['url']; ?>" target="_blank" title="Ajouté par <?php echo $liste_lien['prenom']; ?>"/>
                <p><?php echo $liste_lien['titre']; ?></p>
            </a>
<?php   } ?>
</div>