<?php
class SeminaireController extends AbstractController{
    
    public function httpSeminaire(){
        $action = isset($_GET['actionSemi']) ? $_GET['actionSemi'] : null;

        if ($action === null) {
            // Si $action n'est pas défini dans $_GET, afficher la page index
            //include "views/index.php";
            return; // Arrêter l'exécution de la fonction après l'inclusion de la page index
        }

        // Si $action est défini, continuer le traitement
        $semiMdl= new SeminaireModel();

        switch($action){
            case "seminaire":
                $semis= $semiMdl->getAllSeminaire();
                $this->render("seminaire/index",[
                    "semis"=>$semis
                ]);
                break;

            // Ajoutez d'autres cas pour d'autres actions si nécessaire
        }
    }

}