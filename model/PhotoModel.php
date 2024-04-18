<?php
class PhotoModel extends AbstractModel {

    /**
     * Insère une photo dans la base de données.
     *
     * @param Photo $photo L'objet photo à insérer.
     * @return bool True si l'insertion est réussie, sinon false.
     */
    public function insertPhoto(Photo $photo) {
        // Récupérer le dossier de destination
        $query = "INSERT INTO photo (intervenant_id, chemin) VALUES (:intervenant_id, :chemin)";

        // Exécute la requête SQL avec les valeurs fournies.
        $this->executerReq($query, [
            "intervenant_id" => $photo->getIntervenantId(),
            "chemin" => $photo->getChemin()
        ]);;

        return true;
    }

    /**
     * Récupère toutes les photos d'un intervenant depuis la base de données.
     *
     * @param int $intervenant_id L'identifiant de l'intervenant.
     * @return array Tableau contenant tous les objets de photos de l'intervenant.
     */
    public function getAllPhotosByIntervenantId($intervenant_id) {
        $stmt = $this->executerReq("SELECT * FROM photo WHERE intervenant_id = :intervenant_id", ["intervenant_id" => $intervenant_id]);

        $photos = [];

        while ($res = $stmt->fetch()) {
            $photo = new Photo($res);
            $photos[] = $photo;
        }

        return $photos;
    }
}
