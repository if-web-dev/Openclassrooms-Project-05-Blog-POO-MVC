<?php

namespace App\Controllers;

class HomeController extends MainController
{
    public function home()
    {
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Accueil",
            "view" => "../Views/home.view.php",
            "template" => "../Views/common/template.view.php"
        ];

        $this->generatePage($data_page);
    }
}
