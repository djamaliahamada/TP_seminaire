<?php

class  InterveantModel extends AbstractModel{

    public function getAllIntervenant(){
        $stmt = $this->executerReq("SELECT * FROM intervenant");

        $tab = [] ;

        while($res = $stmt->fetch()){
            extract($res);
            $inter = new Intervenant();
            $inter->setId($id);
            $inter->setNom( $nom);
            $inter->setPrenom( $prenom);
            $inter->setAffectation( $affectation);
            $inter->setUrlPagePerso( $url_page_perso);

            $tab[] = $inter;
        }

        return $tab;
    }
}