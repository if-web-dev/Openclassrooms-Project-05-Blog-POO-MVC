<?php

namespace App\Controllers;
/**
 * Encapsulates the main controller in order to generata pages
 * from page data
 */
abstract class MainController
{   /**
     * Returns the page with the data pages in parameters
     * @param array $data data pages
     * @param string $view view url
     * @param string $template template url
     */
    protected function generatePage(array $data)
    { 
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }
}
