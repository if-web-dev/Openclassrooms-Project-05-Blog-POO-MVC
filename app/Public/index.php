<?php

use App\Controllers\Test;
use App\Controllers\MainController;

require "../../vendor/autoload.php";

$mainController = new MainController();

try {

        if(empty($_GET['page'])){
            $page = 'accueil';
            
        } else {
            $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
            $page = $url[0];/*un seul niveau de page sera traité dans l'arborescence des page*/ 
        }

    switch($page){
        case 'accueil' : $mainController->home();
            break;
        case 'contacts': $mainController->contacts();
            break;
            default : 
                throw new Exception('La page n\'existe pas');
        }
} catch (Exception $e){
    $mainController->errorPage($e->getMessage()); /*gere l'erreur 404: page inexistante */
}