<?php

namespace App\Controllers;
/**
 * Encapsulates the data signin page et generates its page
 */
class SigninController extends MainController
{
    /**
     * Returns signin page
     */
    public function signin()
    {
        $data_page = [
            "page_description" => "Description de la page Signin",
            "page_title" => "Signin",
            "view" => "../Views/signin.view.php",
            "template" => "../Views/Common/template.view.php",
            "page_css" => "signin.css",
            "page_js" => ["signin.js"]
        ];

        $this->generatePage($data_page);
    }
   
}