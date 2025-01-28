<?php
session_start();

require_once('Modele/DAO/UtilisateurDAO.class.php');
require_once('Modele/DAO/mediaDAO.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/anime.style.css">
    <link rel="stylesheet" href="css/entete.style.css">
</head>
<body>
    <header>
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

    <div class="main">
        <h3>Films les plus populaires</h3>
        <h4>Populaire</h4>

        <div class="image-container">
            <?php
            $dao = new MediaDAO(); 
            $liste = $dao->findAllF(); // Trouver tous les médias
            foreach ($liste as $media)   
            {
                echo "<div>";
                echo  "<h5 class=<'title'>".$media->getTitre()."</h5>";
                echo "<a href='film.php?id=" .$media->getId(). "'><img class='catalogue-img' src='" . $media->getImage() . "'></a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>  

    <footer>
        <?php include_once("inc/footer.inc.php"); ?> 
    </footer> 
</body>
</html>
