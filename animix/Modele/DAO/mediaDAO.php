<?php
include_once('connexionBD.class.php'); 
include_once('Modele/media.class.php'); 

class mediaDAO
{	
	//Add
	public static function create($x) {
		try
		{
			$db = ConnexionBD::getInstance();
			$pstm = $db->prepare("INSERT INTO media (typee, titre , auteur , categorie , image)"
								." VALUES (:t,:ti,:a,:c,:im)");
			return $pstm->execute(array(':t'=>$x->getType(),
                                        ':ti'=>$x->getTitre(),
										':a'=>$x->getAuteur(),
                                        ':c'=>$x->getCategorie(),
                                        ':im'=>$x->getImage()));
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
    
    //afficher les animes
    public static function findAllA()
    {
        try
        {
            //code...
            $cnx = ConnexionBD::getInstance();
            $liste = array();
            $requete = 'SELECT * FROM media WHERE typee = "anime" ';
            $res= $cnx->query($requete);
            foreach($res as $row){
                $m = new Media($row["id"], $row["typee"],$row["titre"], $row["auteur"], $row["categorie"], $row["likes"], $row["dislikes"], $row["image"]);
                array_push($liste,$m);
            }
            $res->closeCursor();
            ConnexionBD::close();

            //retourner une liste
            return $liste;
        } catch (PDOException $e) {
            print "error :".$e;
            return $liste;
        }
    }
    //afficher les filmes
    public static function findAllF()
    {
        try
        {
            //code...
            $cnx = ConnexionBD::getInstance();
            $liste = array();
            $requete = 'SELECT * FROM media WHERE typee = "film" ';
            $res= $cnx->query($requete);
            foreach($res as $row){
                $m = new Media($row["id"], $row["typee"],$row["titre"], $row["auteur"], $row["categorie"], $row["likes"], $row["dislikes"], $row["image"]);
                array_push($liste,$m);
            }
            $res->closeCursor();
            ConnexionBD::close();

            //retourner une liste
            return $liste;
        } catch (PDOException $e) {
            print "error :".$e;
            return $liste;
        }
    }
    public static function find($id)
    {
        $db = ConnexionBD::getInstance();
        $pstmt = $db->query("SELECT * FROM media WHERE id = '$id'");
        $resultat = $pstmt->fetch(PDO::FETCH_OBJ);

        if ($resultat)
        {
            $m = new Media($resultat->id, $resultat->typee, $resultat->titre, $resultat->auteur, $resultat->categorie, $resultat->likes, $resultat->dislikes, $resultat->image );
            $pstmt->closeCursor();
            return $m;

        }
        $pstmt->closeCursor();
        return NULL;
    }


      public function delete($id) {
          try
          {
              $db = ConnexionBD::getInstance();
              $pstm = $db->prepare("DELETE FROM media WHERE id = :i");
              $pstm->bindParam(':i',$id);
              return $pstm->execute();
          }
          catch(PDOException $e)
          {
              throw $e;
          }
    }



}
