<?php
class PhotoController extends AbstractController {

    public function httpPhoto() {
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        if ($action === null) {
            // Si $action n'est pas défini dans $_GET, afficher une erreur ou rediriger vers une page par défaut
            return;
        }

        // Si $action est défini, continuer le traitement
        $photoMdl = new PhotoModel();

        switch ($action) {
            case "addPhoto":
                // Vérifie si des fichiers ont été uploadés
                if (!empty($_FILES['photos'])) {
                    $idIntervenant = $_POST['intervenant_id']; // Récupérer l'ID de l'intervenant associé aux photos

                    // Parcourir chaque fichier
                    foreach ($_FILES['photos']['tmp_name'] as $index => $tmpName) {
                        $nomFichier = basename($_FILES['photos']['name'][$index]);
                        $cheminDestination = "photos/$nomFichier"; // Chemin où enregistrer la photo

                        // Déplacer le fichier vers son emplacement final
                        if (move_uploaded_file($tmpName, $cheminDestination)) {
                            // Créer un objet Photo et l'ajouter à la base de données
                            $photo = new Photo(null, $idIntervenant, $cheminDestination);
                            $photoMdl->addPhoto($photo);
                        }
                    }
                }
                
                // Rediriger vers une autre page après l'ajout des photos
                header("location: ?action=intervenant");
                exit;

             case "detailsIntervenant":
                $inter = $photoMdl->getIntervenantById($_GET["id"]);
                $photos = $photoMdl->getPhotosByIntervenantId($_GET["id"]); // Récupérer les photos associées à l'intervenant

                $this->render("intervenant/details", [
                "inter" => $inter,
                "photos" => $photos // Passer les photos à la vue
    ]);
    break;

        
        }
    }
}
