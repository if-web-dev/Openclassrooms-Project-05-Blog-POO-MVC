<?php

namespace App\Controllers;

use App\Core\GET;
use App\Models\UsersManager;
use App\Models\CategoriesManager;
use App\Core\Session;
use App\Core\Toolbox;
/**
 * Encapsulates the data home page et generate his page
 */
class HomeController extends MainController
{
    private $superglobalGetValidationKey;
    private $superglobalGetEmail;

    public function __construct()
    {
        $this->superglobalGetValidationKey = Get::key("validation_key");
        $this->superglobalGetEmail = Get::key("email");
    }
    /**
     * Returns home page
     */
    public function home()
    {
        $user = new UsersManager(DBNAME, HOST, USERNAME, PASSWORD);
        $categoryManager = new CategoriesManager(DBNAME, HOST, USERNAME, PASSWORD);


        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Accueil",
            "view" => "../Views/home.view.php",
            "categories" => $categoryManager->getAllCategories(),
            "template" => "../Views/Common/template.view.php"
        ];

        if(isset($this->superglobalGetEmail) and isset($this->superglobalGetValidationKey)){

            $dataDB = $user->getUserInformation($this->superglobalGetEmail);

            if($dataDB["validation_key"]==$this->superglobalGetValidationKey){
                
                $user->activateUserAccount($this->superglobalGetEmail);
                new Session();
                Session::setAttribute("profile", ["email" => $dataDB["email"]]);
                Session::setAttribute("profile", ["is_admin" => $dataDB["is_admin"]]);
                Toolbox::addAlertMessage("Welcome to our site, your account is actived", Toolbox::GREEN_COLOR);
            }
        }

        $this->generatePage($data_page);
    }
}
