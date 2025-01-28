<?php
class Media{
    //Attributs  
    private $id;   
    private $type;
    private $titre;
    private $auteur;
    private $categorie;
    private $likes = 0;
    private $dislikes = 0;
    private $image;



    //Constructeur
    public function __construct($id,$type,$titre,$auteur,$categorie,$likes,$dislikes,$image){
    $this->id = $id;
    $this->type=$type;
    $this->titre=$titre;
    $this->auteur=$auteur;
    $this->categorie=$categorie;
    $this->likes=$likes;
    $this->dislikes=$dislikes;
    $this->image=$image;


    }


    // Acesseur 
    public function getId(){return $this->id;}
    public function getType(){return $this->type;}
    public function getTitre(){return $this->titre;}
    public function getAuteur(){return $this->auteur;}
    public function getCategorie(){return $this->categorie;}
    public function getLikes(){return $this->likes;}
    public function getDislikes(){return $this->dislikes;}
    public function getImage(){return $this->image;}
    public function getDescription(){return $this->description;}

    public function setType($valeur){return $this->type=$valeur;}
    public function setTitre($valeur){return $this->titre=$valeur;}
    public function setAuteur($valeur){return $this->auteur=$valeur;}
    public function setCategorie($valeur){return $this->categore=$valeur;}
    public function setLikes($valeur){return $this->likes=$valeur;}
    public function setDislikes($valeur){return $this->dislikes=$valeur;}
    public function setImage($valeur){return $this->image=$valeur;}
    public function setDescription($valeur){return $this->description=$valeur;}

    public function __toString()
{
    $message = "Type: " . $this->type . ", Auteur: " . $this->auteur . ", Categorie: " . $this->categorie . ", Image: " . $this->image . ", Description: " . $this->description;
    return $message;
}


}