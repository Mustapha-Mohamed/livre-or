
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Inscription</title>
	</head>

<body class="livreor">

<header class="menu">
 <nav>
<ul>
<?php include "header.php"?>

</ul>
 </nav>
</header>

<?php
	$connexion = mysqli_connect("localhost", "root", "", "livreor");
	$requete = "SELECT login,commentaire,date FROM `commentaires` INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id"; 
	$query=mysqli_query($connexion, $requete);
    $resultat=mysqli_fetch_all($query);
  
	
	foreach ($resultat as $key ) 
	{
		echo"<div>".$key[0]." ".$key[2]." ".$key[1]." </div><br>";
	}
?>

</body>
		

</html>