<?php

class PhotoModel extends AbstractModel {

    /**
     * Ajoute une photo à la base de données.
     *
     * @param Photo $photo L'objet photo à ajouter.
     * @return bool True si l'ajout est réussi, sinon false.
     */
    public function addPhoto(Photo $photo) {
        $query = "INSERT INTO photo (intervenant_id, chemin) VALUES (:intervenant_id, :chemin)";

        // Exécute la requête SQL avec les valeurs fournies.
        $this->executerReq($query, [
            "intervenant_id" => $photo->getIntervenantId(),
            "chemin" => $photo->getChemin()
        ]);

        return true;
    }

    /**
     * Récupère toutes les photos associées à un intervenant donné.
     *
     * @param int $intervenantId L'identifiant de l'intervenant.
     * @return array Tableau contenant tous les objets photo associés à l'intervenant.
     */
    public function getPhotosByIntervenantId($intervenantId) {
        $stmt = $this->executerReq("SELECT * FROM photo WHERE intervenant_id = :intervenant_id", ["intervenant_id" => $intervenantId]);

        $tab = [];

        while ($res = $stmt->fetch()) {
            extract($res);
            $photo = new Photo();
            $photo->setId($id);
            $photo->setIntervenantId($intervenant_id);
            $photo->setChemin($chemin);

            $tab[] = $photo;
        }

        return $tab;
    }

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


}  
}



}
