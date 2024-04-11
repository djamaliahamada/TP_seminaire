<?php

class Seminaire{

    private $id;
    private $titre;
    private $resumer;
    private $lieu;
    private $date;
    private $id_interveant;

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

	public function getTitre() {return $this->titre;}

	public function getResumer() {return $this->resumer;}

	public function getLieu() {return $this->lieu;}

	public function getDate() {return $this->date;}

	public function getIdInterveant() {return $this->id_interveant;}

    
	public function setId( $id): void {$this->id = $id;}

	public function setTitre( $titre): void {$this->titre = $titre;}

	public function setResumer( $resumer): void {$this->resumer = $resumer;}

	public function setLieu( $lieu): void {$this->lieu = $lieu;}

	public function setDate( $date): void {$this->date = $date;}

	public function setIdInterveant( $id_interveant): void {$this->id_interveant = $id_interveant;}

	


}