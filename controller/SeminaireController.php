<?php
class SeminaireController extends AbstractController{
    
    public function httpSeminaire(){
        $action = isset($_GET['action']) ? $_GET['action'] : null;

        if ($action === null) {
            // Si $action n'est pas défini dans $_GET, afficher la page index
            //include "views/index.php";
            return; // Arrêter l'exécution de la fonction après l'inclusion de la page index
        }
        // Si $action est défini, continuer le traitement
        $semiMdl= new SeminaireModel();
        $interMdl= new InterveantModel();

        switch($action){
            case "seminaire":
                $semis= $semiMdl->getAllSeminaire();
                $this->render("seminaire/index",[
                    "semis"=>$semis
                ]);
                break;
            case "addSeminaire":
                if( isset($_POST['valider']) ){
                    
                    $semi = new Seminaire($_POST);

                    $semiMdl->addSeminaire($semi);
                    

                    header("location: ?action=seminaire");
                    exit;
                }
                $inters = $interMdl->getAllIntervenant();
                $this->render("seminaire/ajouter",[
                    "inters"=>$inters
                ]);
                break;
            case "updateSeminaire":
                if( isset($_POST['valider']) ){
                    
                    $semi = new Seminaire($_POST);

                    $semiMdl->update($semi);
                    

                    header("location: ?action=seminaire");
                    exit;
                }
                $semi= $semiMdl->getSeminaireById($_GET["id"]);
                $this->render("seminaire/ajouter",[
                    "semi"=>$semi,
                ]);
                break;
            case "deleteSeminaire":
                $semiMdl->delete($_GET["id"]);
                header("location: ?action=seminaire");
                break;
        }
    }

}