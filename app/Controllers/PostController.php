<?php

namespace App\Controllers;

use App\Models\PostsManager;
use App\Core\Session;
use App\Core\Get;
use App\Core\Toolbox;
/**
 * Encaplsulates post controller and generates post page
 */
class PostController extends MainController
{
    private $superglobalGet;
    private $superglobalGetId;

    public function __construct()
    {
        $this->superglobalGet = Get::all();
        $this->superglobalGetId = Get::key("id");
    }
    /**
     * generates post page
     */
    public function post()
    {
        if($this->superglobalGet){
        $post = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);

        $data_page = [
            "page_description" => "Post page",
            "page_title" => "Post page",
            "view" => "../Views/post.view.php",
            "page_css" => "post.css",
            "post" => $post->getPost($this->superglobalGetId),
            "template" => "../Views/Common/template.view.php"
        ];

        $session = new Session();
        if (!$session->existsAttribute("profile")) {
            Toolbox::addAlertMessage("Go to login to post a comment !", Toolbox::RED_COLOR);
        }
            $this->generatePage($data_page);
        }else{
            header("location: 404");
        }
    }
}