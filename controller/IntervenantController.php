<?php
class IntervenantController extends AbstractController{

    public function httpIntervenant(){
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        if ($action === null) {
            // Si $action n'est pas défini dans $_GET, afficher la page index
            include "views/index.php";
            return; // Arrêter l'exécution de la fonction après l'inclusion de la page index
        }

        // Si $action est défini, continuer le traitement
        $interMdl= new InterveantModel();
        $photoMdl = new PhotoModel();

        switch($action){
            case "intervenant":
                $inters= $interMdl->getAllIntervenant();
                
                $this->render("intervenant/index",[
                    "inters"=>$inters
                ]);
                break;
            case "addIntervenant":
                // RECUP DONNEES DU FORMULAIRE
                if( isset($_POST['valider']) ){
                    $nom= $_POST["nom"];
                    $prenom= $_POST["prenom"];
                    $affectation= $_POST["affectation"];
                    $url= $_POST["url_page_perso"];
                    $inter = new Intervenant();
                    $inter->setNom($nom);
                    $inter->setPrenom($prenom);
                    $inter->setAffectation($affectation);
                    $inter->setUrlPagePerso($url);

                    $interMdl->addIntervenant($inter);
                    

                    header("location: ?action=intervenant");
                    exit;
                }
                $this->render("intervenant/ajouter",[]);
                break;
            case "updateIntervenant":
                if( isset($_POST['valider']) ){
                    
                    $id = $_POST["id"]; // Récupérer l'ID de l'intervenant
                    $nom= $_POST["nom"];
                    $prenom= $_POST["prenom"];
                    $affectation= $_POST["affectation"];
                    $url= $_POST["url_page_perso"];
                    
                    // Créer un objet Intervenant et définir ses propriétés
                    $inter = new Intervenant();
                    $inter->setId($id); // Définir l'ID récupéré
                    $inter->setNom($nom);
                    $inter->setPrenom($prenom);
                    $inter->setAffectation($affectation);
                    $inter->setUrlPagePerso($url);

                    // Appeler la méthode de mise à jour dans le modèle
                    $interMdl->update($inter);

                    // Rediriger vers la page des intervenants après la mise à jour
                    header("location: ?action=intervenant");
                    exit;
                }
                $inter= $interMdl->getIntervenantById($_GET["id"]);
                $this->render("intervenant/ajouter",[
                    "inter"=>$inter
                ]);
                break;
            case "deleteIntervenant":
                $interMdl->delete($_GET["id"]);
                header("location: ?action=intervenant");
                break;
            case "detailsIntervenant":
                
                if (!empty($_FILES['photo']['tmp_name'])) {
                    $inter_id = $_POST['id']; // Récupérer l'ID de l'intervenant associé aux photos
                    
                    $tmpName = $_FILES['photo']['tmp_name'];
                    $nomFichier = basename($_FILES['photo']['name']);
                    $cheminDestination = "public/photo/$nomFichier"; // Chemin où enregistrer la photo
                    
                    // Déplacer le fichier vers son emplacement final
                    if (move_uploaded_file($tmpName, $cheminDestination)) {
                        // Créer un objet Photo et l'ajouter à la base de données
                        $photo = new Photo();
                        $photo->setIntervenantId($inter_id);
                        $photo->setChemin($nomFichier);
                        
                        $photoMdl->insertPhoto($photo);
                    }
                }

                $inter= $interMdl->getIntervenantById($_GET["id"]);
                $photos= $photoMdl->getAllPhotosByIntervenantId($_GET["id"]);
                $this->render("intervenant/details",[
                    "inter"=>$inter,
                    "photos"=>$photos
                ]);
                
                break;
        }
    }

}