<?php

namespace App\Controllers\Admin;

use App\Core\GET;
use App\Core\Securite;
use App\Core\Toolbox;
use App\Controllers\MainController;
use App\Models\UsersManager;
/**
 * Class which manage user in data base
 */
class UserController extends MainController
{
    /**
     * deletes user in data base from admin dashbord
     */
    public function deleteUser()
    {
        if (Securite::isAdminConnected()) {

            $id = GET::key("id");
            $userManager = new UsersManager(DBNAME, HOST, USERNAME, PASSWORD);
            $userManager->deleteUser($id);
            Toolbox::addAlertMessage("The user was deleted with success", Toolbox::GREEN_COLOR);
            header("Location: " . URL . "admin");

        } else {
            
            Toolbox::addAlertMessage("You do not have the rights to access this page", Toolbox::RED_COLOR);
            header("Location: " . URL . "home"); 
        }
    }
}