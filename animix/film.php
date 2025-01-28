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
	//$nomUtilisateur=$_SESSION['utilisateurConnecte'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/description.style.css">
    <link rel="stylesheet" href="css/entete.style.css"> <!-- à enlever aprés-->
    <title>Document</title>
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
       
        require_once('Modele/media.class.php');
        require_once('Modele/DAO/mediaDAO.php');
        require_once('Modele/DAO/watchlistDAO.class.php');

        $nomUtilisateur = $_SESSION['utilisateurConnecte'];

        ?>
      
    </header>
 
  <h1>Détails</h1>
  <section >
    
    <div class="image">

<?php 
    // Récupérer l'identifiant de l'image
    $id = $_GET['id'];

    // Utiliser  imageDAO pour récupérer les données de l'image
    $dao = new mediaDao();
    $media = $dao->find ($id);

    if ($media !== null) {
        // Afficher l'image
        echo "<img src='" . $media->getImage()."'>";
        echo '<div class="rating img"><a title="ajouter à la watchlist" href="?action=add&id=' . $id . '"><img src="img/add.jpg" alt=""><span class="rating"></span></a></div>';


    } else {
        echo "L'objet Media n'a pas été trouvé pour l'ID $id.";
    }
?>
 <div class="rating img">
      
      <a title="ajouter like" href="?action=add&id="><img class='rating img' src="img/like.png"></a>
      <a title="ajouter dislike" href="?action=add&id="><img class='rating img' src="img/dislike.png"></a>
      
    </div>


    </div>
    <div class="description">
      <?php echo "<h2>" .$media->getTitre(). "</h2>"; ?>
      <p>Description du Film Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vestibulum, massa id ullamcorper accumsan, tortor nisl bibendum nulla, nec bibendum justo eros eu purus. Nullam a pharetra velit. Donec bibendum turpis at tristique scelerisque. Vestibulum varius quam vel gravida tempor. Ut ut finibus velit. Sed fringilla, turpis at sagittis ullamcorper, justo ligula facilisis arcu, ut placerat libero enim id odio. Integer nec ante velit. Ut vehicula auctor augue, in blandit mauris malesuada eu. Sed bibendum, nulla eget venenatis fringilla, turpis urna pellentesque odio, a ultricies nunc arcu nec est. Sed sit amet tincidunt nisl.</p>
      <form action="" method="post">
        <label for="comment">Commentaire :</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Envoyer">
      </form>
    </div>
  </section>
  <footer>
    <?php
        include_once("inc/footer.inc.php");
      ?> 
  </footer>
  <?php

  //S'il y a  une action qui a été exécutée par l'utilisateur
    if (ISSET($_REQUEST["action"])) 
    {
	    //et si cette action est ajouter à la watchlist
        if ($_REQUEST["action"] == "add") 
        {
    //  //Si la watchlist n'existe pas encore
    //         if (!ISSET($_SESSION['panier'])) 
	  //       {
    //             $_SESSION['panier'] = Array(); //on crée le panier (vide)
    //         }
          $user_id=UtilisateurDAO::chercher($nomUtilisateur)->getId();
          $daow = new watchlistDAO();
          $media = $daow->insert($user_id,$id);

        }
    }
  
    ?>
</body>

</html>