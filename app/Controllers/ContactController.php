<?php

namespace App\Controllers;

use App\Core\POST;
use App\Core\Securite;
use App\Core\Toolbox;
use App\Services\Mail;
/**
 * Encapsulates the data contact page et generate his page
 */
class ContactController extends MainController
{
    /**
    * Returns contact page
    */
    public function contacts()
    {

        $data_page = [
            "page_description" => "Page de contacts",
            "page_title" => "Contacts",
            "view" => "../Views/contact.view.php",
            "page_css" => "contact.css",
            "template" => "../Views/Common/template.view.php"
        ];

        $post = POST::all();

        if($post){
            $data_input_filtered = Securite::formValidator($post);
            if(POST::key("submit")){
                if(is_array($data_input_filtered)){
                    Mail::sendContactMail($data_input_filtered["name"], $data_input_filtered["tel"], $data_input_filtered["email"], $data_input_filtered["message"]);
                    Toolbox::addAlertMessage("Message send succesfully", Toolbox::GREEN_COLOR);
                }else{
                    Toolbox::addAlertMessage($data_input_filtered, Toolbox::RED_COLOR);
                }
            }
        }
       
        $this->generatePage($data_page);
    }
}
