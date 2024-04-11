<?php

class SeminaireModel extends AbstractModel{

    public function getAllSeminaire(){
        $stmt = $this->executerReq("SELECT * FROM seminaire");

        $tab = [] ;

        while($res = $stmt->fetch()){
            extract($res);
            $semi = new Seminaire();
            $semi->setId($id);
            $semi->setTitre( $titre);
            $semi->setResumer( $resumer);
            $semi->setLieu( $lieu);
            $semi->setDate( $date);
            $semi->setIdInterveant( $id_interveant);

            $tab[] = $semi;
        }

        return $tab;
    }
}

