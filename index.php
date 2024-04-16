<?php

session_start();

/* spl_autoload_register(function($class){
  $page = $class . '.php';
  if( file_exists("classes/".$page) ){
    require_once "classes/".$page;

  }elseif( file_exists("controller/".$page) ){
    require_once "controller/".$page;

  }elseif( file_exists("model/".$page) ){
    require_once "model/".$page;
  }
    
}); */
include "classes/Intervenant.php";
include "classes/Seminaire.php";
include "classes/Photo.php";

include "controller/AbstractController.php";
include "controller/IntervenantController.php";
include "controller/SeminaireController.php";
include "controller/PhotoController.php";

include "model/AbstractModel.php";
include "model/IntervenantModel.php";
include "model/SeminaireModel.php";
include "model/PhotoModel.php";



$interCtl= new IntervenantController();
$semiCtl= new SeminaireController();
$photo = new PhotoController();
// $photocontrl= new PhotoController();


$interCtl->httpIntervenant();
$semiCtl->httpSeminaire();
$photo->httpPhoto();
// $photocontrl->httpPhoto();

/* try{
    $interCtl->httpIntervenant();
}catch(Exception $e){
  $homeCtl->render("404/404", ["erreur" => $e->getMessage()]);
} */
