<?php 

abstract class AbstractController{    

    public function __construct(){
    }

    public function render($view, $data = []){
        ob_start();

        extract($data);

        $page = "views/". $view .".php";

        $page = str_replace("../", "protect", $page);
        $page = str_replace(";", "protect", $page);
        $page = str_replace("%", "protect", $page);


        if( !file_exists($page) ){
            throw new Exception("Cette page n'existe pas");
        }

        include $page;

        $content = ob_get_clean();

        include "views/template.php";
    }

    
}