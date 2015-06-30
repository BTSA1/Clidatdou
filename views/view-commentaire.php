<!DOCTYPE html>
<html>
	<head >
		<meta charset="utf-8">
		<link type="text/css" rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<link rel="icon" href="img/logo.png" />
		<title>Commentaires</title>
	</head>
	
	<body>
		<?php require 'include/top.php'; 
        require 'include/left.php'; ?>
		
		<section>
			<div class="bloc option">
                <h2>Ajouter un message</h2>
                <div id="bbcode">
                    <button class="bbcode" id="italique" title="Italique"><i class="fa fa-italic"></i></button>
                    <button class="bbcode" id="gras" title="Gras"><i class="fa fa-bold"></i></button>
                    <button class="bbcode" id="souligne" title="Souligné"><i class="fa fa-underline"></i></button>
                    <button class="bbcode" id="gauche" title="Alignement à gauche"><i class="fa fa-align-left"></i></button>
                    <button class="bbcode" id="centre" title="Alignement centré"><i class="fa fa-align-center"></i></button>
                    <button class="bbcode" id="droite" title="Alignement à droite"><i class="fa fa-align-right"></i></button>
                    <button class="bbcode" id="justifier" title="Alignement justifier"><i class="fa fa-align-justify"></i></button>
                    <button class="bbcode" id="lien" title="Ajouter un lien"><i class="fa fa-share-alt"></i></button>
                    <button class="bbcode" id="image" title="Ajouter une image"><i class="fa fa-picture-o"></i></button>
                    <button class="bbcode" id="ligne" title="Ajouter une ligne"><i class="fa fa-minus"></i></button>
                    <select id="taille" title="Taille de police">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                        <option value="20">20</option>
                        <option value="22">22</option>
                        <option value="24">24</option>
                        <option value="26">26</option>
                        <option value="28">28</option>
                        <option value="32">32</option>
                        <option value="36">36</option>
                        <option value="48">48</option>
                    </select>
                </div>
			    <form action="" method="POST">
			        <textarea id="texte" name="contenu"><?php if(isset($_GET['id']))
                        {
                            $reqId = $bdd->prepare('SELECT contenu FROM message WHERE id = :id');
                            $reqId->execute(array('id' => $_GET['id']));
                            $contentComment = $reqId->fetch();
                            echo $contentComment['contenu'];
                        } ?></textarea>
                    <input type="submit" class="BtnValider" name="envoyer" value="Envoyer"/>
			    </form>
			</div>
			<div id="apercu" class="bloc comment">
                <p></p>
                <em>par: <?php echo $prenom; ?></em>
            </div>
		</section>
<?php   include 'include/footer.php'; ?>
    
		<script src="js/jquery.js"></script>
        <script src="js/saveConnexion.js"></script>
		<script src="js/BBCode.js"></script>
	</body>
</html>