<?php
require_once('media.class.php');
class Watchlist {
	private $user_id;
	private $media_id;
	private $titre;
	private $image;


	public function __construct($user_id,$media_id,$titre,$img)	
	{
		$this->user_id = $user_id;
		$this->media_id = $media_id;
		$this->titre = $titre;
		$this->image=$img;
	}
	
	public function getUserId()
	{
            return $this->user_id;
	}
	
	public function setUserId($value)
	{
			$this->user_id = $value;
	}
	public function getMedId()
	{
            return $this->media_id;
	}
	
	public function setMedId($value)
	{
			$this->media_id = $value;
	}

		public function getTitre()
	{
            return $this->titre;
	}

	public function setTitre($value)
	{
			$this->titre = $value;
	}
	public function getImage()
	{
            return $this->image;
	}

	public function setImage($value)
	{
			$this->image = $value;
	}

    public function __toString()
	{
		$message= "MedId: " .$this->id. "Image: " .$this->image. ", Titre: " .$this->titre;
		
		return $message;
	}
}
?>                           