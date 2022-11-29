<?php

namespace App\Controllers;

abstract class MainController
{
    protected function generatePage(array $data)
    { 
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }
}
