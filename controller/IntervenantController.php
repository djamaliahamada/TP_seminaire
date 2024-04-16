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
                    
                    $inter = new Intervenant($_POST);

                    $interMdl->addIntervenant($inter);
                    

                    header("location: ?action=intervenant");
                    exit;
                }
                $this->render("intervenant/ajouter",[]);
                break;
            case "updateIntervenant":
                if( isset($_POST['valider']) ){
                    
                    $inter = new Intervenant($_POST);

                    $interMdl->update($inter);
                    

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
                
        }
        
    }

    

}