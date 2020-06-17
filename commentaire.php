<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Commentaires</title>
	</head>
	

<body class="commentaire">
		

<header class="menu">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
 </nav>
</header>		

			
			<div id="formulaire">
				<h2>Ajouter un commentaire</h2>
				<form method="post" action="commentaire.php">
					<textarea name="commentaire" id="formulaire_2" placeholder="ÉCRIVEZ VOTRE COMMENTAIRE"></textarea></p>
					<input type="submit" name="submit" id="formulaire_3">
				</form>

				
				<?php 
					if(isset($_POST['submit']))
					{
						$utilisateur = $_SESSION['id'];
						$commentaire = $_POST['commentaire'];
						$commentaire2 = addslashes($commentaire);
						
						$connexion = mysqli_connect("localhost", "root", "", "livreor");
						$requete= "INSERT INTO commentaires (commentaire,id_utilisateur, date) VALUES ('$commentaire2','". $utilisateur."', NOW())";

						mysqli_query($connexion, $requete);
						mysqli_close($connexion);
						header("Location: livre-or.php");
						
					}
				?>
				
			</div>