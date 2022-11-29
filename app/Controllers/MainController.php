<?php

namespace App\Controllers;

class MainController
{

    public function home()
    {

        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Accueil",
            "view" => "../Views/home.view.php",
            "template" => "../Views/Common/template.view.php"
        ];
        $this->generatePage($data_page);
    }

    public function contacts()
    {

        $data_page = [
            "page_description" => "Description de la page de contact",
            "page_title" => "Contact",
            "view" => "../Views/contact.view.php",
            "template" => "../Views/Common/template.view.php"
        ];
        $this->generatePage($data_page);
    }

    public function errorPage()
    {

        $data_page = [
            "page_description" => "Description de la page Error",
            "page_title" => "Error Page",
            "view" => "../Views/errorPage.view.php",
            "template" => "../Views/Common/template.view.php"
        ];
        $this->generatePage($data_page);
    }

    //Propriété "page_css" : tableau permettant d'ajouter des fichiers CSS spécifiques
    //Propriété "page_javascript" : tableau permettant d'ajouter des fichiers JavaScript spécifiques



    private function generatePage($data)
    {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }
}
