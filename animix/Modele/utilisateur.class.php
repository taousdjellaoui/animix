
<?php

class Utilisateur {
	private $user_id;
	private $nom_utilisateur = "AAAAA";
	private $mot_de_passe = "XXXXX";
	private $adresse_email = "aaabbb@cc.com";
	private $status="utilisateur";

	public function __construct($n="XXX000")	
	{
		$this->nom_utilisateur = $n;
	}	

		public function setId($value)
	{
			$this->user_id = $value;
	}
	
	public function setNU($value)
	{
			$this->nom_utilisateur = $value;
	}
	
	public function setMP($value)
	{
			$this->mot_de_passe = $value;
	}

	public function setEmail($value)
	{
			$this->adresse_email = $value;
	}
	public function setStatus($value)
	{
			$this->status = $value;
	}
	public function getId(){
		return $this->user_id;
	}
	public function getNU(){
		return $this->nom_utilisateur;
	}
	public function getMP(){
		return $this->mot_de_passe;
	}
	public function getEmail(){
		return $this->adresse_email;
	}
	public function getStatus(){
		return $this->status;
	}
	
	public function verifierMotPasse($value)
	{
		$valide=false;
		if (($this->mot_de_passe)==$value)
		{
			$valide=true;
		}

		return $valide;
	}
}
?>