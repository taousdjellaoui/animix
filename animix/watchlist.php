<?php
	session_start();

  if (!isset($_SESSION['utilisateurConnecte'])) { 
    // Si la variable 'utilisateurConnecte' n'existe pas, rediriger à la page de connexion
    header("Location: formulaire1.php");
  }
  
  require_once('Modele/DAO/UtilisateurDAO.class.php');
  require_once('Modele/DAO/watchlistDAO.class.php'); 
  
  $nomUtilisateur = $_SESSION['utilisateurConnecte'];
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/anime.style.css">

    <title>Document</title>
</head>
<body>
<header>
        <?php
        if (UtilisateurDAO::chercher($nomUtilisateur)->getStatus() == "admin"){
            include_once("inc/entete-connecterAdmin.inc.php");
        } else {
            include_once("inc/entete-connecterUser.inc.php");
        }
        require_once('Modele/DAO/watchlistDAO.class.php');
        ?>
    </header>
    <div class="main">
        <h1>Ma watchlist</h1>
        <div class="image-container">
        <?php
          $user_id=UtilisateurDAO::chercher($nomUtilisateur)->getId();

            $dao = new WatchlistDAO();
            $liste = $dao->findById($user_id); // Trouver tous les médias

            if  (count($liste) == 0) { echo "Aucun élément dans votre watchlist";
            } else {
            foreach ($liste as $media)   
            {
                echo "<div>";
                echo  "<h5 class=<'title'>".$media->getTitre()."</h5>";
                echo "<a href='film.php?id=" .$media->getMedId(). "'><img class='catalogue-img' src='" . $media->getImage() . "'></a>";
                echo "</div>";  
            }
          } 
    //On verifie s'il y a y une action qui a été exécutée par l'utilisateur
    //et si cette action est 'ajouter au panier'
    //On recupere l'id du produit et on l'ajoute au panier
    ?>
        </div>
        </div>

        <footer>
    <?php
        include_once("inc/footer.inc.php");
      ?> 
  </footer>
</body>

</html>