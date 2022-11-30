<?php

namespace App\Controllers;

use App\Core\GET;
use App\Core\POST;
use App\Core\Session;
use App\Core\Securite;
use App\Core\Toolbox;
use App\Controllers\MainController;
use App\Models\CommentsManager;
/**
 * Encapsulates Comment Controller and allows to record a comment by users
 */
class CommentController extends MainController
{
    private $superglobalPost;
    private $superglobalPostComment;
    private $superglobalGetId;

    public function __construct()
    {
        $this->superglobalPost = Post::all();
        $this->superglobalPostComment = POST::key('comment');
        $this->superglobalGetId = GET::key("id");
    }
    /**
     * add a comment in the database
     */
    public function recordComment(){
        
        $data_input_filtered = Securite::formValidator($this->superglobalPost);
        if(Post::all()){
            if(is_array($data_input_filtered)){
                $commentManager = new CommentsManager(DBNAME, HOST, USERNAME, PASSWORD);
                $commentManager->addComment($this->superglobalPostComment, Session::getAttribute("profile")["id"], $this->superglobalGetId);
                Toolbox::addAlertMessage("Comment send successfully", Toolbox::GREEN_COLOR);
                header("Location: " . URL . "post?id=" . GET::key('id'));
            } else {
                Toolbox::addAlertMessage($data_input_filtered, Toolbox::RED_COLOR);
                header("Location: " . URL . "post?id=" . GET::key('id'));
            }
        }    
    }
}

