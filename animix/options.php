<?php
	session_start();
  if (!isset($_SESSION['utilisateurConnecte'])) { 
    // Si la variable 'utilisateurConnecte' n'existe pas, rediriger à la page de connexion
    header("Location: formulaire1.php");
  }
  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    
    <title>options</title>
</head>
<body>
    <header>
        <!-- ici on replace le code avec  le "include_once pour l'entête" (code php)
        pour le moment sans php les styles dans le fichier css de l'entete affectent aussi les autre fichier-->
           
        <?php
        require_once('Modele/DAO/utilisateurDAO.class.php');
        require_once("Modele\DAO\mediaDAO.php");
        
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
       
    

        <div class="conteneur_principal">
        <div class="zone_gauche">
            <ul >
             <li ><a href="?action=voiruser">voir les utulisateurs</a></li>
             <li ><a href="?action=adduser">ajouter un utilisateur</a></li>
             <li ><a href="?action=deluser">supprimer un utilisateur</a></li>
             <li><a href="?action=addmedia">ajouter des films et anime</a></li>
             <li><a href="?action=delmedia">supprimer des films et anime</a></li>
            </ul>
        
        </div>

        <div class="zone_centre">
          <div>
         <?php
        
         include_once("Modele\DAO\mediaDAO.php");
         	if (ISSET($_REQUEST["action"])) {
              if($_REQUEST["action"] == "voiruser")
              {
             
                 
                 $dao=new UtilisateurDAO();
                 $list=$dao->findAll();
                 echo "<table>";
	               echo "<thead>";
	               echo "<tr>";
	               echo "<th>nom utilisateur</th>";
	               echo "<th>adresse email</th>";
	               echo "<th>statut</th>";
	               echo "</tr>";
	               echo "</thead>";
                 echo "<tbody>";
	               foreach ($list as $user) 
	                 {
	                 	echo "<tr>";
		                echo "<td>".$user->getNU()."</td>";	
		                echo "<td>".$user->getEmail()."</td>";	
		                echo "<td>".$user->getStatus()."</td>";
	                	echo "</tr>";	
	                }
	                echo "</body>";
         }
         elseif($_REQUEST["action"] == "adduser")
        
         {
         
          ?>
           <head>
               <link rel="stylesheet" href="css\formulaire.style.css">   
          </head>
          <div>
          <!--------------- Le formulaire d'ajout--------------->
          <form  method="POST">
            <label for="user">Nom d'utilisateur :</label> <br>
            <input type="text" id="user" name="user" required><br>
            <label for="password">Mot de passe :</label><br>
            <input type="text" id="password" name="password" required><br>
            <label for="statut">status :</label>
            <select name="statut">
              <option value="admin">admin</option><br>
              <option value="utilisateur">utilisateur</option><br>
		    	</select><br>
            <input type="submit" value="ajouter"><br><br>

      </div>
      <?php
         if (ISSET($_POST["user"]) && ISSET($_POST["password"] ) && ISSET($_POST["statut"])) {
       
      
              $username= $_POST["user"];
              
              $ps= $_POST["password"];
              $stat= $_POST["statut"];
              $dao= new UtilisateurDAO();
              $Newuser= new Utilisateur($_POST["user"],$_POST["password"],$_POST["statut"]);
          
              if (!$dao->createUser($Newuser)) {
                 echo "<br />L'utilisateur ".$Newuser->getNU()." existe deja ou la creation n'a pas était faite. <br />";//aprés l'affichage ce fait avec javascript (des alerts !!)
                } else{
               echo "<br />L'utilisateur a été bien ajouter. <br />  ";
             }
         }
        }
         elseif($_REQUEST["action"] == "deluser")
         {
          ?>
           <head>
               <link rel="stylesheet" href="css\formulaire.style.css">   
          </head>
          <div>
          <!--------------- Le formulaire de suppression--------------->
          <form  method="POST">
            <label for="user">Nom d'utilisateur a supprimer :</label> <br>
            <input type="text" id="user" name="user" required><br>
            <input type="submit" value="supprimer"><br><br>
        
         <?php
           if (ISSET($_POST["user"]) ) {
       
      
            $username= $_POST["user"];
            
            $dao= new UtilisateurDAO();
            $dao->delete($username);
            if (!$dao->chercher($username)) {
             echo "<br />L'utilisateur ".$username." n'existe pas. <br />";//aprés l'affichage ce fait avec javascript (des alerts !!)
            } else{
                echo "<br />L'utilisateur a été bien supprimer. <br />  ";
           }
            }

          }
          elseif($_REQUEST["action"] == "addmedia")
          {
           ?>
            <head>
                <link rel="stylesheet" href="css\formulaire.style.css">   
           </head>
           <div>
           <!--------------- Le formulaire d'ajout--------------->
           <form method="post" >
           
			     <select name="type">
              <option value="anime">anime</option>
              <option value="film">film</option>
		    	</select>
          <label for="id">id</label>
			     <input type="text" name="id">
          <label for="titre">titre</label>
			     <input type="text" name="titre">
           <label for="auteur">auteur</label>
			     <input type="text" name="auteur">
           <label for="categorie">categorie</label>
			     <input type="text" name="categorie">
           <label for="image">image URL</label>
			     <input type="text" name="image">
			     <input type="submit" value="ajouter" >
         
          <?php
            if (ISSET($_POST["id"]) && ISSET($_POST["type"]) && ISSET($_POST["titre"] ) && ISSET($_POST["auteur"])&& ISSET($_POST["categorie"])&& ISSET($_POST["image"])) {
            $dao= new MediaDAO();
            $media=new Media($_POST["id"],$_POST["type"],$_POST["titre"],$_POST["auteur"],$_POST["categorie"],0,0,$_POST["image"]);
            if (!$dao->create($media)) {
             echo "<br />Le film/anime ".$media->getTitre()." existe deja. <br />";//aprés l'affichage ce fait avec javascript (des alerts !!)
            } else{
                echo "<br />Le film/anime a été bien ajouter. <br />  ";
           }
            }
 
           }elseif($_REQUEST["action"] == "delmedia")
           {
            ?>
             <head>
                 <link rel="stylesheet" href="css\formulaire.style.css">   
            </head>
            <div>
            <!--------------- Le formulaire de suppression--------------->
            <form  method="POST">
              <label for="user">id de fil/anime a supprimer :</label> <br>
              <input type="text" id="id" name="id" required><br>
              <input type="submit" value="supprimer"><br><br>
          
           <?php
             if (ISSET($_POST["id"]) ) {
         
        
              $id= $_POST["id"];
              
              $dao= new mediaDAO();
              if (!$dao->delete($id)) {
               echo "<br />Le film/anime avec l'ID ".$id." n'existe pas. <br />";//aprés l'affichage ce fait avec javascript (des alerts !!)
              } else{
                  echo "<br />Le film/anime a été bien supprimer. <br />  ";
             }
              }
  
        }
      }
         ?>   
           </div>
            
      </div>
        
    </div>
   
       


   
</body>

</html>