<?php

namespace App\Controllers\Admin;

use App\Core\GET;
use App\Core\POST;
use App\Core\Securite;
use App\Core\Toolbox;
use App\Controllers\MainController;
use App\Models\CategoriesManager;
use App\Models\PostsManager;
/**
 * Encapsulates the PostController and generates posts and posts processing
 */
class PostController extends MainController
{
    private $superglobalPost;
    private $superglobalGetId;

    public function __construct()
    {
        $this->superglobalPost = POST::all();
        $this->superglobalGetId = GET::key("id");
    }
    /**
    * deletes Post
    */
    public function deletePost()
    {
        $postManager = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
        $postManager->deletePost($this->superglobalGetId);
        Toolbox::addAlertMessage("The Post was deleted with success", Toolbox::GREEN_COLOR);
        header("Location: " . URL . "admin");
    }
    /**
     * generates updates Posts page
     */
    public function updatePost()
    {
        $data_page = [
            "page_description" => "Description de la page d'édition d'un article",
            "page_title" => "Post Edit page",
            "view" => "../Views/postEditPage.view.php",
            "template" => "../Views/common/template.view.php",
        ];

        if (Securite::isAdminConnected()){

            $postManager = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
            $categoryManager = new CategoriesManager(DBNAME, HOST, USERNAME, PASSWORD);
            $dataPostDB =  $postManager->getPost($this->superglobalGetId);
            $dataCategoryDB =  $categoryManager->getAllCategories();
            $data_page["dataPostDB"] = $dataPostDB;
            $data_page["dataCategoryDB"] = $dataCategoryDB;
            $this->generatePage($data_page);

        } else {

            Toolbox::addAlertMessage("You do not have the rights to access this page", Toolbox::RED_COLOR);
            header("Location: " . URL . "home"); //404 a coder
        }
    }
    /**
     * generates add Posts page
     */
    public function addPost()
    {
        
        $data_page = [
            "page_description" => "Description de la page d'ajout d'un article",
            "page_title" => "Add a post",
            "view" => "../Views/addPostPage.view.php",
            "template" => "../Views/common/template.view.php",
            "page_css" => "admin.css"
        ];  

        if (Securite::isAdminConnected()) {

            $this->generatePage($data_page);

        } else {

            Toolbox::addAlertMessage("You do not have the rights to access this page", Toolbox::RED_COLOR);
            header("Location: " . URL . "home"); //404 a coder
        }
    }
    /**
     * posts processing; adds posts or modifies there.
     */
    public function postProcessing()
    {
        if (Securite::isAdminConnected()){

            if(POST::key("submitAddPost")){

                $data_filtered = Securite::formValidator($this->superglobalPost);

                if(is_array($data_filtered)){

                    var_dump("mimp");
                    $posts = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
                    $posts->addPost($data_filtered);
                    Toolbox::addAlertMessage("Post added successfully", Toolbox::GREEN_COLOR);
                    header("Location: " . URL . "admin"); //404 a coder

                } else {
                    
                    Toolbox::addAlertMessage($data_filtered, Toolbox::GREEN_COLOR);
                    header("Location: " . URL . "addPost");
                }

            }

            if(POST::key("submitEditPost")){

                if($this->superglobalPost){
                    $data_filtered = Securite::formValidator($this->superglobalPost);
                    $postManager = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
                    $postManager->editPost($this->superglobalGetId, $data_filtered);
                    Toolbox::addAlertMessage("this Post was modified successfully", Toolbox::GREEN_COLOR);
                    header("Location: " . URL . "admin"); //404 a coder
                } 
            }
        }
    }
}