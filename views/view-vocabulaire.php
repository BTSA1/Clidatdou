<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
		<title>Vocabulaire Anglais</title>
 	</head>
 	
	<body>
		<?php require 'include/top.php';
        require 'include/left.php'; ?>
		<section>
		    <div class="bloc">
                <form action="" method="POST">
                    <table id="vocabulaire">
                        <tr>
                            <th class="champ">Anglais</th>
                            <th class="champ">Français</th>
                            <th class="reponseTH">Réponse</th>
                        </tr>
<?php 				  for($i = 1; $i <= 10; $i++)
                        {
                            $num = mt_rand(1,229);
                            
                            $req = $bdd->prepare('SELECT * FROM mots WHERE id = :num');
                            $req->execute(array(
                                'num' => $num
                            ));
                            $vocabulaire = $req->fetch();
    
                            $anglais[$i] = $vocabulaire['anglais']; 
                            $francais[$i] = $vocabulaire['francais']; 
                            if($i <= 5)
                            { ?>
                                <tr>
                                    <td class="champ"><input type="text" name ="<?php echo "champ".$i;?>"/></td>
                                    <td class="champ"><?php echo $vocabulaire['francais']; ?></td>
                                    <td class="reponse"><?php echo $vocabulaire['anglais']; ?></td>
                                </tr>
<?php					    }
                            else
                            { ?>
                                <tr>
                                    <td class="champ"><?php echo $vocabulaire['anglais']; ?></td>
                                    <td class="champ"><input type="text" name ="<?php echo "champ".$i;?>"/></td>
                                    <td class="reponse"><?php echo $vocabulaire['francais']; ?></td>
                                </tr>
<?php				   	    }
                        } ?>
                    </table>
                </form>
                <button class="BtnValider" id="valider" style="margin-bottom: 20px">Voir la correction</button>
		    </div>
		</section>
		<script src="js/jquery.js"></script>
		<script>
			var reponse = false;
			$('#valider').click(function(){
				$('.reponse').show();
				$('.reponseTH').show();
				if(reponse == false){
					reponse = true;
					$('#valider').html("Recommencer");
				}else{
					location.reload();
				}
			});
		</script>
        <script src="js/saveConnexion.js"></script>
	</body>
</html>