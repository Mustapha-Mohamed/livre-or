  <?php
session_start();

if (isset($_SESSION['login'])):
	?>

<header>

<div class="menu">
      	
          <a class="lasuite" href="inscription">inscription</a>
          <a href="connexion.php">connexion</a>
          <a href="profil.php">profil</a>
          <a href="livre-or.php">livreor</a>
          <a href="commentaire.php">commentaire</a>
        
              </div>
 </header>

 <body>


        <form action="index.php" method="post">
            <input type="submit" name='deconnexion' value="Deconnexion">
        </form>
        <?php if (isset($_POST['deconnexion'])) {
                session_unset();
                session_destroy();
                header('Location:index.php');
            }
            ?></li>


 <?php else:?>     
 

  <div class="menu">

  <a class="lasuite" href="inscription">inscription</a>
  <a href="connexion.php">connexion</a>
  <a href="#profil.php">profil</a>
  <a href="#livre-or.php">livreor</a>
  <a href="#commentaire.php">commentaire</a>




      </div>

 
      <?php endif;?>             
</body>
