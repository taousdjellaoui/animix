<?php
include_once('connexionBD.class.php'); 
include_once('Modele/utilisateur.class.php'); 

class UtilisateurDAO
{	public static function createUser($x) {
	try
	{
		$db = ConnexionBD::getInstance();
		$pstm = $db->prepare("INSERT INTO utilisateur (nom_utilisateur, mot_de_passe , adresse_email , statut )"
							." VALUES (:nu,:mp,:ae,:st)");
		return $pstm->execute(array(':nu'=>$x->getNU(),
									':mp'=>$x->getMP(),
									':ae'=>$x->getEmail(),
									':st'=>$x->getStatus()));
	}
	catch(PDOException $e)
	{
		throw $e;
	}
}
	

	public static function findAll()
    {
        try
        {
            //code...
            $cnx = ConnexionBD::getInstance();
            $liste = array();
            $requete = 'SELECT * FROM utilisateur';
            $res= $cnx->query($requete);
            foreach($res as $row){
                $m = new Utilisateur($row["nom_utilisateur"], $row["mot_de_passe"], $row["statut"]);
				$m->setEmail($row["adresse_email"]);
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

	public static function chercher($nomUtil)
	{
		$db = ConnexionBD::getInstance();

		$pstmt = $db->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = :x");
		$pstmt->execute(array(':x' => $nomUtil));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		
		if ($result)
		{
			$u = new Utilisateur();
			$u->setId($result->user_id);
			$u->setNU($result->nom_utilisateur);
			$u->setMP($result->mot_de_passe);
			$u->setEmail($result->adresse_email);
			$u->setStatus($result->statut);
			$pstmt->closeCursor();
			return $u;
		}
		$pstmt->closeCursor();
		return NULL;
	}
	
	public function delete($nom) {
		try
		{
			$db = ConnexionBD::getInstance();
			$pstm = $db->prepare("DELETE FROM utilisateur WHERE nom_utilisateur = :n");
			$pstm->bindParam(':n',$nom);
			return $pstm->execute();
		}
		catch(PDOException $e)
		{
			throw $e;
		}
  }
}
?>