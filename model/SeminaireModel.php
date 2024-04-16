<?php

class SeminaireModel extends AbstractModel {

    /**
     * Ajoute un séminaire à la base de données.
     *
     * @param Seminaire $seminaire L'objet séminaire à ajouter.
     * @return bool True si l'ajout est réussi, sinon false.
     */
    public function addSeminaire(Seminaire $seminaire){

        $query = "INSERT INTO seminaire (id_intervenant, titre, resumer, lieu, date) VALUES (:intervenant, :titre, :resumer, :lieu, :date)";

        // Exécute la requête SQL avec les valeurs fournies.
        $this->executerReq($query, [
            "intervenant" => $seminaire->getIntervenant(),
            "titre"       => $seminaire->getTitre(),
            "resumer"     => $seminaire->getResumer(),
            "lieu"        => $seminaire->getLieu(),
            "date"        => $seminaire->getDate(),
        ]);
        return true;
    }

    /**
     * Récupère tous les séminaires depuis la base de données.
     *
     * @return array Tableau contenant tous les objets de séminaire.
     */
    public function getAllSeminaire(){

        $stmt = $this->executerReq("SELECT * FROM seminaire");

        $tab = [] ;
        $interMdl= new InterveantModel();
        while($res = $stmt->fetch()){
            //$res['intervenant']= $interMdl->getIntervenantById($res['id']);
            $semi = new Seminaire($res);
            $tab[] = $semi;
        }
        
        return $tab;
    }

    /**
     * Récupère un séminaire par son identifiant depuis la base de données.
     *
     * @param int $id L'identifiant du séminaire à récupérer.
     * @return Seminaire L'objet séminaire correspondant à l'identifiant.
     */
    public function getSeminaireById($id){
        $stmt = $this->executerReq("SELECT * FROM seminaire WHERE id = :id", ["id" => $id]);

        $res = $stmt->fetch();
        extract($res);
        $semi = new Seminaire();
        $semi->setId($id);
        $semi->setTitre($titre);
        $semi->setResumer($resumer);
        $semi->setLieu($lieu);
        $semi->setDate($date);
        //$semi->setIntervenant($intervenant);
        return $semi;
    }

    /**
     * Supprime un séminaire de la base de données par son identifiant.
     *
     * @param int $id L'identifiant du séminaire à supprimer.
     * @return bool True si la suppression est réussie, sinon false.
     */
    public function delete(int $id){
        $res = $this->executerReq("DELETE FROM seminaire WHERE id = :id", ["id" => $id]);

        return $res;
    }

    /**
     * Met à jour les informations d'un séminaire dans la base de données.
     *
     * @param Seminaire $seminaire L'objet séminaire contenant les nouvelles informations.
     * @return bool True si la mise à jour est réussie, sinon false.
     */
    public function update(Seminaire $seminaire){

        $query = "UPDATE seminaire SET id_intervenant = :intervenant, titre = :titre, resumer = :resumer, lieu = :lieu, date = :date WHERE id = :id";

        // Exécute la requête de mise à jour avec les nouvelles valeurs.
        $this->executerReq($query, [
            "id"           => $seminaire->getId(),
            "intervenant"  => $seminaire->getIntervenant(),
            "titre"        => $seminaire->getTitre(),
            "resumer"      => $seminaire->getResumer(),
            "lieu"         => $seminaire->getLieu(),
            "date"         => $seminaire->getDate(),
        ]);

        return true;

    }
}
