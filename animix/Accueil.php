git<?php
	session_start();

	
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/description.style.css">
    <link rel="stylesheet" href="css/accueil.style.css">
    <link rel="stylesheet" href="css/anime.style.css">
  
    <title>Accueil</title>
</head>
<body>
    <header>
      <?php
        require_once('Modele/DAO/UtilisateurDAO.class.php');
        require_once('Modele/DAO/mediaDAO.php'); 
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

    <main class="main">
        
        <h1>A venir </h1>
      
        <img class="img-nouv" src="img/CityHunter.jpg">

        

        
        <h2>Top anime de la semaine</h2>

    
        <div class="image-container">
            <?php
            $dao = new MediaDAO(); 
            $liste = $dao->findAllA(); // Trouver tous les médias
            foreach ($liste as $media)   
            {
                echo "<div>";
                echo "<a href='film.php?id=" .$media->getId(). "'><img class='catalogue-img' src='" . $media->getImage() . "'></a>";  
                echo  "<h5 class=<'title'>".$media->getTitre()."</h5>";
                echo "</div>";
            }
            ?>
        </div>

        <h2>Top serie de la semaine</h2>

    
        <div class="image-container">
            <?php
            $dao = new MediaDAO(); 
            $liste = $dao->findAllF(); // Trouver tous les médias
            foreach ($liste as $media)   
            {
                echo "<div>";
                echo "<a href='film.php?id=" .$media->getId(). "'><img class='catalogue-img' src='" . $media->getImage() . "'></a>";  
                echo  "<h5 class=<'title'>".$media->getTitre()."</h5>";
                echo "</div>";
            }
            ?>
        </div>

    </main>
    <footer>
    <?php
        include_once("inc/footer.inc.php");
      ?> 
    </footer>
    
</body>
</html>