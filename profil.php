<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Profil</title>
	</head>

	<body class="profil">
	<header class="menu">
 <nav>
<ul>
<?php include('header.php') ;

if( isset($_SESSION['login']))
	{		
	$connexion = mysqli_connect("localhost", "root", "", "livreor");
	$requete = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
	$query=mysqli_query($connexion, $requete);
	$resultat=mysqli_fetch_assoc($query);
	}
?>

</ul>
 </nav>
</header>
		
		<div class="profil">
			<div id="compte">
				<form method="post" >
					<fieldset>
						<legend>Login</legend><br/>
						<label>LOGIN :</label><input type="text" name="login" value="<?php echo $resultat['login']; ?>"/>

					</fieldset>
					
					<fieldset>
						<legend>Modifier mot de passe</legend><br />
						<label> ANCIEN MOT DE PASSE :</label><input type="password" name="passe" value="<?php echo $resultat['password']; ?>" class="compte_2"/>
						<label> NOUVEAU MOT DE PASSE :</label><input type="password" name="passe" value="<?php echo $resultat['password']; ?>"class="compte_2"/>
						<label> CONFIRMATION NOUVEAU MOT DE PASSE :</label><input type="password" name="passe" value="<?php echo $resultat['password'];?>"
						class="compte_2"/>
					</fieldset></p>
					<input type="submit" value="modifier" name="modifier" class="compte_2"/>


				</form>
			</div>
		</div>
			</body>	
</html>
		<?php 
	if(isset($_POST['modifier']))
	{
		    $connexion = mysqli_connect("localhost", "root","", "livreor");
			$login = $_POST['login'] ;                   
			$requete1 = "SELECT login FROM utilisateurs WHERE login = '$login'";         
			$query1 = mysqli_query($connexion, $requete1);         
			$resultat1 = mysqli_fetch_all($query1);             
			if (!empty($resultat1))             
			{                 
				echo "Ce Login est déjà prit";             
			}             
			else
			{
				if($_POST['login'] != $resultat['login'])
				{
				   $connexion = mysqli_connect("localhost","root","","livreor");
				   $query = "UPDATE utilisateurs SET login = '".$_POST['login']."' WHERE utilisateurs.login='".$resultat['login']."'";
				   $result = mysqli_query($connexion, $query);
				   $_SESSION['login']=$_POST['login'];
				}
				if($_POST['password'] != $resultat['password'])
				{
				   $connexion = mysqli_connect("localhost","root","","livreor");
				   $query = "UPDATE utilisateurs SET password = '".$_POST['password']."' WHERE utilisateurs.password='".$resultat['password']."'";
				   $result = mysqli_query($connexion, $query);
				}
				header("Location: index.php");
			}
	}     


		
?>