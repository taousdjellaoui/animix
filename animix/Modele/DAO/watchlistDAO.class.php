<?php
include_once('connexionBD.class.php'); 
include_once('Modele/watchlist.class.php');
 
class WatchlistDAO{
    public function insert($userId,$mediaId) {
      try
      {
        $db = ConnexionBD::getInstance();
        $pstmt = $db->prepare('INSERT INTO watchlist (utilisateur_id, media_id) VALUES (:u, :m)');
        return $pstmt->execute(array(':u' => $userId, ':m' => $mediaId));
      } catch(PDOException $e)
      {
        throw $e;
      }
    }

    public static function find($id)
        {
            $db = ConnexionBD::getInstance();
    
            $pstmt = $db->query("SELECT * FROM watchlist WHERE utilisateur_id = '$id'");
            $resultat = $pstmt->fetch(PDO::FETCH_OBJ);

        if ($resultat)
        {
            $w = new Watchlist($resultat->watchlist_id , $resultat->utilisateur_id, $resultat->media_id);
            $pstmt->closeCursor();
            return $w;

        }
        $pstmt->closeCursor();
        return NULL;
    }

    public static function findById($userId)
    {
            $liste = array();
            $cnx = ConnexionBD::getInstance();
            $res = $cnx->query("SELECT watchlist.utilisateur_id,media.id, media.titre, media.image
                                FROM watchlist
                                JOIN media
                                ON watchlist.media_id = media.id
                                WHERE watchlist.utilisateur_id = '$userId';");
            $res->setFetchMode(PDO::FETCH_OBJ);
            foreach($res as $row) {
              $w = new Watchlist($row->utilisateur_id,$row->id,$row->titre, $row->image);
              array_push($liste,$w);
            }
            $res->closeCursor();
            ConnexionBD::close();
            return $liste;    
    } 
   
     
    public function delFromList($media) {
      try
      {
        $db = ConnexionBD::getInstance();
        $pstm = $db->prepare("DELETE FROM watchlist WHERE media_id = :m");
        $m = $media->getMedia();
        $pstm->bindParam(':m',$m);
        return $pstm->execute();
      }
      catch(PDOException $e)
      {
        throw $e;
      }
    }
}
