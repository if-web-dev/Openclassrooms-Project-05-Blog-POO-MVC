<?php

namespace App\Controllers;
/**
 * Encapsulates the ErrorPageController and generates its page
 */
class ErrorPageController extends MainController
{
    /**
     * generates the errorpage
     */
    public function errorPage()
    {

        $data_page = [
            "page_description" => "Error Page",
            "page_title" => "Error Page",
            "view" => "../Views/errorPage.view.php",
            "page_css" => "error.css",
            "template" => "../Views/Common/template.view.php"
        ];
       
        $this->generatePage($data_page);
    }
}
