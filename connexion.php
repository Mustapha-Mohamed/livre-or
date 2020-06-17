<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Inscription</title>
	</head>



<body class="connexion">




<header class="menu">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
</nav>
</header>   

<div class="tout"> 
				<form method="post">
						<div class="texte">
						<marquee BGCOLOR="green"><legend>connexion</legend></marquee>
					</div>
					<p>
						<input type="text" name="login" placeholder="login"required/>
						
						<input type="password" name="pass"  placeholder="mot de passe"required/>
					</p>	
						<input type="submit" value="Connexion" name="Connexion"required/>
						
					
				</form>
				</div>

</body></html>

<?php

if(isset($_POST['Connexion']))
{
    $login=$_POST["login"];
	$password=$_POST["pass"];

		//Création de la connexion à a base de données
		$connexion=mysqli_connect("localhost","root","","livreor");
		//Préparation de la requête SQL
		$requete = "SELECT * FROM utilisateurs WHERE login='$login'";
		//$requete = 	"SELECT FROM utilisateurs (id,login,password) values (NULL,'$login','$password')";

		//Execution de la requête SQL
		$query=mysqli_query($connexion,$requete);
		
		//Récupération du résultat de la requête
        $resultat=mysqli_fetch_all($query);
        
        
          
  if(!empty($resultat))
  {
    if ($password == $resultat[0][2])
    {

    	session_start();
      $_SESSION['id']=$resultat[0][0];
      $_SESSION['login']=$resultat[0][1];
    //Fermeture de la connexion
    mysqli_close($connexion);
    header('Location: livre-or.php');
    
    }
    else
    {
      ?>
      <div class="test">
    <?php
      echo "le mot de passe est incorrect";
        ?>
      </div>
    <?php
    }

  }
  else
  {
    ?>
      <div class="test">
    <?php
      echo "l'identifiant n'existe pas";
    ?>
      </div>
    <?php

  }

}

?>