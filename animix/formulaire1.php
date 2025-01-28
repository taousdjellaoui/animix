<?php
    require_once('Modele/DAO/UtilisateurDAO.class.php');
  // On récupère la session active, ou on en recommence une nouvelle	
  session_start();

  // On regarde si le formulaire de connexion vient d’être soumis
  if (ISSET($_POST['user']) && ISSET($_POST['password'])) 
  {
	//Est-ce que l’utilisateur existe
	$unUtilisateur = UtilisateurDAO::chercher($_POST['user']);

	//Oui il existe, on vérifie son mot de passe
	if ($unUtilisateur != null) 
    {
	  if ($unUtilisateur->verifierMotPasse($_POST['password'])) 
        {
		// on ajoute une donnée à l’objet session qui permet de dire que  
           //l’utilisateur est connecte
		$_SESSION['utilisateurConnecte'] = $_POST['user'];

		// le rediriger à la pagePrivee.php
		header("Location: Accueil.php");
	   }
       else
       {
            echo "Mot de passe erroné";
       }
	}
    else
    {
        echo "Cet utilisateur n'Existe pas";
    }
   } 
   // On regarde si la session était déjà active
   else if (ISSET($_SESSION['utilisateurConnecte'] )) 
   {
	// la session était active, on redirige à la pagePrivee.php
	header("Location: Accueil.php");
   }
   // Dans les autres cas, on affiche un message et demeure sur la page de  
   //connexion	
  
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulaire.style.css">
    <link rel="stylesheet" href="css/entete.style.css"> <!-- à enlever aprés-->
    <title>log in</title>
</head>
<body>
    <header>
    <!-- ici on replace le code avec  le "include_once pour l'entête" (code php)
    pour le moment sans php les styles dans le fichier css de l'entete affectent aussi les autre fichier-->    
    <?php
        require_once('Modele/DAO/UtilisateurDAO.class.php');
      ?>  
           
        <?php
        if (ISSET($_SESSION['utilisateurConnecte'])) { 
          if (UtilisateurDAO::chercher($_SESSION['utilisateurConnecte'])->getStatus() =="admin"){
            include_once("inc/entete-connecterAdmin.inc.php");
          }
          else{
            include_once("inc/entete-connecterUser.inc.php");
          }
        }else{
          include_once("inc/entete-visiteur.inc.php");
        }
       
        ?>
    
    </header>
    <main>
        <section>
        <form action="" method="POST">
            <label for="user">Nom d'utilisateur :</label> <br>
            <input type="text" id="user" name="user" required><br>
          
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" required><br>
          
            <input type="submit" value="Se connecter"><br><br>

            nouveau utilisateur?<a href="formulaire2.php"> créer un compte!</a>
        </form>

    </main>
</body>
<footer>
    <?php
        include_once("inc/footer.inc.php");
      ?> 
    </footer> 
</html>