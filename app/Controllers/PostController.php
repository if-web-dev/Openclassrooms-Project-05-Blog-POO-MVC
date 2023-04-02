<?php

namespace App\Controllers;

use App\Models\PostsManager;
use App\Models\CommentsManager;
use App\Core\SESSION;
use App\Core\GET;
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
        $this->superglobalGet = GET::all();
        $this->superglobalGetId = GET::key("id");
    }
    /**
     * generates post page
     */
    public function post()
    {
        if($this->superglobalGet){
        $post = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
        $comments = new CommentsManager(DBNAME, HOST, USERNAME, PASSWORD);


        $data_page = [
            "page_description" => "Post page",
            "page_title" => "Post page",
            "view" => "../Views/post.view.php",
            "page_css" => "post.css",
            "post" => $post->getPost($this->superglobalGetId),
            "comments" => $comments->getPostsCommentsAllowed($this->superglobalGetId),
            "template" => "../Views/Common/template.view.php"
        ];

        $session = new SESSION();
        if (!$session->existsAttribute("profile")) {
            Toolbox::addAlertMessage("Go to login to post a comment !", Toolbox::RED_COLOR);
        }
            $this->generatePage($data_page);
        }else{
            header("location: 404");
        }
    }
}