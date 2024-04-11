<?php
class IntervenantController extends AbstractController{

    public function httpIntervenant(){
        $action = isset($_GET['actionInter']) ? $_GET['actionInter'] : null;

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

            // Ajoutez d'autres cas pour d'autres actions si nécessaire
        }
    }

}