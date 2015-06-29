<?php include('../include/config.php'); 

$prenom = $_SESSION['prenom'];



$req = $bdd->prepare('SELECT * FROM membre WHERE prenom = :prenom');

$req->execute(array('prenom' => $prenom));

$info_membre = $req->fetch();



$idPrenom = $info_membre['id'];



$req = $bdd->prepare('SELECT * FROM membre WHERE id= :id');

$req->execute(array('id' => $idPrenom));

$info_membre = $req->fetch();



if (isset($_POST['ancienMdp']) AND isset($_POST['nouveauMdp1']) AND isset($_POST['nouveauMdp2']))

{

    $ancienMdp = md5($_POST['ancienMdp']);

    $nouveauMdp1 = md5($_POST['nouveauMdp1']);

    $nouveauMdp2 = md5($_POST['nouveauMdp2']);



    if($ancienMdp == $info_membre['mdp'])

    {

        if($nouveauMdp1 == $nouveauMdp2)

        {

            $req = $bdd->prepare('UPDATE membre SET mdp = :mdp WHERE id = :id');

            $req->execute(array('mdp' => $nouveauMdp1, 'id' => $idPrenom));

            echo 'Success';

        }

        else

        {

            echo 'Les mots de passe ne correspondent pas';

        }

    }

    else

    {

        echo 'Le mot de passe est incorect';

    }

}else{ echo 'erreur';}

?>