<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Inscription</title>
	</head>


    <header class="menu">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
</nav>
</header>   

<body class="inscription">
		

			
				<div class="fond">
				<form method="post">
						<div class="ecriture">
						<marquee behavior="alternate"><legend>Inscription</legend></marquee>
					</div>
					<p>
						<input type="text" name="login" placeholder="login"required/>
						
						<input type="password" name="pass"  placeholder="mot de passe"required/>
						
						<input type="password" name="confirmpass" placeholder="confirme mot de passe"required/></p>
						
						<input type="submit" value="Inscription" name="inscription"required/>
					
						
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php

if(isset($_POST["inscription"]))
{

	$login=$_POST["login"];
	$password=$_POST["pass"];
	$confirmpassword=$_POST["confirmpass"];

		if($password==$confirmpassword)
		{
			//Création de la connexion à a base de données
		$connexion=mysqli_connect("localhost","root","","livreor");
		//Préparation de la requête SQL
		//$requete = "SELECT * FROM utilisateurs WHERE login=$login";
		$requete = 	"INSERT INTO utilisateurs (id,login,password) values (NULL,'$login','$password')";

		//Execution de la requête SQL
		$query=mysqli_query($connexion, $requete);
		
		//Récupération du résultat de la requête
		//$resultat=mysqli_fetch_all($query);

		//Fermeture de la connexion
		mysqli_close($connexion);
        header('Location: connexion.php');
       

		}
		else
		{
			?>
			<div class="test">
		<?php
			echo "Vos deux mdp ne correspondent pas.";
			?>
			</div>
		<?php
		}



}

?>