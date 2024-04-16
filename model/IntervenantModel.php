<?php

class InterveantModel extends AbstractModel {

    /**
     * Ajoute un intervenant à la base de données.
     *
     * @param Intervenant $intervenant L'objet intervenant à ajouter.
     * @return bool True si l'ajout est réussi, sinon false.
     */
    public function addIntervenant(Intervenant $intervenant){

        $query = "INSERT INTO intervenant VALUES(NULL, :nom, :prenom, :affectation, :url_page_perso)";

        // Exécute la requête SQL avec les valeurs fournies.
        $this->executerReq($query, [
            "nom"            => $intervenant->getNom(),
            "prenom"         => $intervenant->getPrenom(),
            "affectation"    => $intervenant->getAffectation(),
            "url_page_perso" => $intervenant->getUrlPagePerso(),
        ]);
        return true;
    }

    /**
     * Récupère tous les intervenants depuis la base de données.
     *
     * @return array Tableau contenant tous les objets d'intervenant.
     */
    public function getAllIntervenant(){
        $stmt = $this->executerReq("SELECT * FROM intervenant");

        $tab = [] ;

        while($res = $stmt->fetch()){
            extract($res);
            $inter = new Intervenant();
            $inter->setId($id);
            $inter->setNom($nom);
            $inter->setPrenom($prenom);
            $inter->setAffectation($affectation);
            $inter->setUrlPagePerso($url_page_perso);

            $tab[] = $inter;
        }

        return $tab;
    }
    
    /**
     * Récupère un intervenant par son identifiant depuis la base de données.
     *
     * @param int $id L'identifiant de l'intervenant à récupérer.
     * @return Intervenant L'objet intervenant correspondant à l'identifiant.
     */
    public function getIntervenantById($id){
        $stmt = $this->executerReq("SELECT * FROM intervenant WHERE id = :id", ["id" => $id]);

        $res = $stmt->fetch();
    if($res !== false) { // Vérifie si des données ont été récupérées
    extract($res);
    // Crée un objet Intervenant et attribue les valeurs extraites
    $inter = new Intervenant();
    $inter->setId($id);
    $inter->setNom($nom);
    $inter->setPrenom($prenom);
    $inter->setAffectation($affectation);
    $inter->setUrlPagePerso($url_page_perso);

    return $inter;
} else {
    // Gérer le cas où aucun intervenant n'est trouvé pour cet ID
    return null;
}

        extract($res);
        $inter = new Intervenant();
        $inter->setId($id);
        $inter->setNom($nom);
        $inter->setPrenom($prenom);
        $inter->setAffectation($affectation);
        $inter->setUrlPagePerso($url_page_perso);

        return $inter;
    }

    /**
     * Supprime un intervenant de la base de données par son identifiant.
     *
     * @param int $id L'identifiant de l'intervenant à supprimer.
     * @return bool True si la suppression est réussie, sinon false.
     */
    public function delete(int $id){
        $res = $this->executerReq("DELETE FROM intervenant WHERE id = :id", ["id" => $id]);

        return $res;
    }

    /**
     * Met à jour les informations d'un intervenant dans la base de données.
     *
     * @param Intervenant $intervenant L'objet intervenant contenant les nouvelles informations.
     * @return bool True si la mise à jour est réussie, sinon false.
     */
    public function update(Intervenant $intervenant){

        $query = "UPDATE intervenant SET nom = :nom, prenom = :prenom, affectation = :affectation, url_page_perso = :url_page_perso WHERE id = :id";

        // Exécute la requête de mise à jour avec les nouvelles valeurs.
        $this->executerReq($query, [
            "id"             => $intervenant->getId(),
            "nom"            => $intervenant->getNom(),
            "prenom"         => $intervenant->getPrenom(),
            "affectation"    => $intervenant->getAffectation(),
            "url_page_perso" => $intervenant->getUrlPagePerso(),
        ]);

        return true;

    }


}
