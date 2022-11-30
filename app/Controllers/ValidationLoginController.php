<?php

namespace App\Controllers;

use App\Core\POST;
use App\Models\UsersManager;
use App\Core\Securite;
use App\Core\Toolbox;
use App\Core\Session;
use App\Services\Mail;
/**
 * Encapsulates the login processing
 */
class ValidationLoginController extends MainController
{
    /**
     * Validates the login or return a error message
     */
    public function ValidationLogin()
    {
       
        $post = POST::all();
        $data_input_filtered = Securite::formValidator($post);
        $UserManager = new UsersManager(DBNAME, HOST, USERNAME, PASSWORD);

        if (is_array($data_input_filtered)) {
            $userDB = $UserManager->getUserInformation($data_input_filtered["email"]);
        }

        if ($post) {

            if (POST::key("login_submit")) { 

                if (!empty(POST::key("email")) and !empty(POST::key("password"))) { 

                    if (is_array($data_input_filtered)) {
                       
                        if ($UserManager->isCombinaisonValide($data_input_filtered["email"], $data_input_filtered["password"])) {

                            if ($UserManager->hasAnActivedAccount($data_input_filtered["email"])) {

                                new Session();
                                Session::setAttribute("profile", ["id" => $userDB["id"], "is_admin" => $userDB["is_admin"]]);
                            
                                if (Securite::isAdminConnected()) {
                                    Toolbox::addAlertMessage("Welcome back to our site", Toolbox::GREEN_COLOR);
                                    header("Location: " . URL . "admin");
                                } else {
                                    Toolbox::addAlertMessage("Welcome back to our site", Toolbox::GREEN_COLOR);
                                    header("Location: " . URL . "home");
                                }
                            } else {
                                Toolbox::addAlertMessage("The account has not been activated, an activation email has been returned", Toolbox::RED_COLOR);
                                Mail::sendAccountActivationMail($userDB["name"], $userDB["firstname"], $userDB["email"], $userDB["validation_key"]); 
                                header("Location: " . URL . "login");
                            }
                        } else {
                            Toolbox::addAlertMessage("Invalid Email/Password Combination", Toolbox::RED_COLOR);
                            header("Location: " . URL . "login");
                        }
                    } else {
                        Toolbox::addAlertMessage($data_input_filtered, Toolbox::RED_COLOR);
                        header("Location: " . URL . "login");
                    }
                } else {
                    Toolbox::addAlertMessage("Please complete all fields", Toolbox::RED_COLOR);
                    header("Location: " . URL . "login");
                }
            } else { 

                if (is_array($data_input_filtered)) {

                    if ($userDB) {
                        Toolbox::addAlertMessage("Email address already present in the database", Toolbox::RED_COLOR);
                        header("Location: " . URL . "signin");
                    } else {
                        $validation_key = rand(0, 9999);
                        $data_insert = Securite::passwordHash($data_input_filtered);
                        $UserManager->addUser($data_insert, $validation_key);
                        Mail::sendAccountActivationmail($data_insert["name"], $data_insert["firstname"], $data_insert["email"], $validation_key);
                        Toolbox::addAlertMessage("Account created, please activate it by clicking on the validation link received in your email box", Toolbox::GREEN_COLOR);
                        header("Location: " . URL . "home");
                    }
                } else {
                    Toolbox::addAlertMessage($data_input_filtered, Toolbox::RED_COLOR);
                    header("Location: " . URL . "signin");
                }
            }
        }
    }
}
