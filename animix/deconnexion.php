<?php
	session_start();

	// Si la variable 'utilisateurConnecte' n’existe plus alors il n’est
 	// pas connecté, et on retourne à la page de connexion
	if  (!(ISSET($_SESSION['utilisateurConnecte'] ))) 
    {
		header("Location: formulaire1.php");
	}
	// Sinon on désactive la variable 'utilisateurConnecte' pour finaliser
      // la déconnexion
    else 
    {
		unset($_SESSION['utilisateurConnecte']);
        header("Location: formulaire1.php");
	}
?>

