<?php

class Intervenant {

    private $id;
    private $nom;
    private $prenom;
    private $affectation;
    private $url_page_perso;

    public function __construct(array $data = []){

		foreach($data as $key => $value){
			//création des set...
			$methode = "set" . ucfirst($key);

			//test si le setter existe
			if( method_exists($this, $methode) ){
				//appel du setter et on passe le '$value' en paramètre
				$this->$methode($value);
			}
		}
	}
	
    public function getId() {return $this->id;}

	public function getNom() {return $this->nom;}

	public function getPrenom() {return $this->prenom;}

	public function getAffectation() {return $this->affectation;}

	public function getUrlPagePerso() {return $this->url_page_perso;}

    
	public function setId( $id): void {$this->id = $id;}

	public function setNom( $nom): void {$this->nom = $nom;}

	public function setPrenom( $prenom): void {$this->prenom = $prenom;}

	public function setAffectation( $affectation): void {$this->affectation = $affectation;}

	public function setUrlPagePerso( $url_page_perso): void {$this->url_page_perso = $url_page_perso;}
}
