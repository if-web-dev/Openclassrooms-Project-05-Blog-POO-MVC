<?php

namespace App\Controllers;
/**
 * Encapsulates the data login page et generate its page
 */
class LoginController extends MainController
{
    /**
     * Returns login page
     */
    public function login()
    {
        $data_page = [
            "page_description" => "Description de la page login",
            "page_title" => "Login",
            "view" => "../Views/login.view.php",
            "template" => "../Views/Common/template.view.php",
            "page_css" => "login.css",
            "page_js" => ["login.js"]
        ];

        $this->generatePage($data_page);
    }
   
}
