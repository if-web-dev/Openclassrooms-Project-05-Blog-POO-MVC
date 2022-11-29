<?php

namespace App\Controllers;
/**
 * Encapsulates the data home page et generate his page
 */
class HomeController extends MainController
{
    /**
     * Return home page
     */
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
