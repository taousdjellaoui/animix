<?php
session_start();

	/*// Si la variable 'utilisateurConnecte' n’existe pas alors il n’est pas  
 	// connecté, et on le redirige à la page de connexion
	if (!ISSET($_SESSION['utilisateurConnecte'] )) 
      {
		header("Location: formulaire1.php");
	}
*/
      // Sinon démarrer sa session
//	$nomUtilisateur=$_SESSION['utilisateurConnecte'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulaire.style.css">
    <link rel="stylesheet" href="css/entete.style.css"> <!-- à enlever aprés-->
    <title>sign in</title>
</head>
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
   <body>
    <main>
      <section>
        <form action="" method="get">
            <label for="user">nom utilisateur:</label> <br>
            <input type="text" id="user" name="user" required><br>
            <label for="email">adresse email:</label> <br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" required><br>
          
          
            <input type="submit" value="S'inscrire"><br><br>

             
        </form>

    </main>
    
<footer>
    <?php
        include_once("inc/footer.inc.php");
      ?> 
    </footer> 
    </body>

</html>