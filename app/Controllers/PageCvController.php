<?php

namespace App\Controllers;
/**
 * Encapsulates the data cv page et generate its page
 */
class PageCvController extends MainController
{
    /**
     * Returns cv page
     */
    public function PageCv()
    {
        $data_page = [
            "page_description" => "Description de la page Cv",
            "page_title" => "Cv Page",
            "page_css" => "pageCv.css",
            "view" => "../Views/PageCv.view.php",
            "template" => "../Views/Common/template.view.php"
        ];


        $this->generatePage($data_page);
    }
}
