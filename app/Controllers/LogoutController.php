<?php

namespace App\Controllers;

use App\Core\SESSION;
use App\Core\Toolbox;
/**
 * Encapsulates the logout action, return
 * an alert message and redirects to home page
 */
class LogoutController extends MainController
{   
    /**
     * disconnects and redirects to home page
     */
    public function logout()
    {
        SESSION::unset("profile");
        SESSION::unset("admin");
        Toolbox::addAlertMessage("You are successfully logged out", Toolbox::GREEN_COLOR);
        header("Location: " . URL . "home");
    }
}
