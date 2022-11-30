<?php

namespace App\Controllers;

use App\Core\Get;
use App\Models\UsersManager;
use App\Models\CategoriesManager;
use App\Core\Session;
use App\Core\Toolbox;
/**
 * Encapsulates the data home page et generate his page
 */
class HomeController extends MainController
{
    /**
     * Returns home page
     */
    public function home()
    {
        $user = new UsersManager(DBNAME, HOST, USERNAME, PASSWORD);
        $getEmail = Get::key('email');
        $getValidationKey = Get::key('validation_key');

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Accueil",
            "view" => "../Views/home.view.php",
            "template" => "../Views/common/template.view.php"
        ];

        if(isset($getEmail) and isset($getValidationKey)){

            $dataDB = $user->getUserInformation(Get::key('email'));

            if($dataDB["validation_key"]==Get::key('validation_key')){
                
                $user->activateUserAccount($getEmail);
                new Session();
                Session::setAttribute("profile", ["email" => $dataDB["email"]]);
                Session::setAttribute("profile", ["is_admin" => $dataDB["is_admin"]]);
                Toolbox::addAlertMessage("Welcome to our site, your account is actived", Toolbox::GREEN_COLOR);
            }
        }

        $this->generatePage($data_page);
    }
}
