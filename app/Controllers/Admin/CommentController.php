<?php

namespace App\Controllers\Admin;

use App\Core\GET;
use App\Core\Securite;
use App\Core\Toolbox;
use App\Controllers\MainController;
use App\Models\CommentsManager;
/**
 * Encapsulates Comment Controller and manage controller
 */
class CommentController extends MainController
{
    private $superglobalGetId;

    public function __construct()
    {
        $this->superglobalGetId = GET::key("id");
    }
    /**
     * deletes comment from admin dashboard
     */
    public function deleteComment()
    {
        if (Securite::isAdminConnected()) {
            $commentManager = new CommentsManager(DBNAME, HOST, USERNAME, PASSWORD);
            $commentManager->deleteComment($this->superglobalGetId);
            Toolbox::addAlertMessage("The comment was deleted with success", Toolbox::GREEN_COLOR);
            header("Location: " . URL . "admin");
        } else {
            Toolbox::addAlertMessage("You do not have the rights to access this page", Toolbox::RED_COLOR);
            header("Location: " . URL . "home");
        }
    }
    /**
     * validate Comment from admin dashboard
     */
    public function validateComment()
    {
        if (Securite::isAdminConnected()) {
            $commentManager = new CommentsManager(DBNAME, HOST, USERNAME, PASSWORD);
            $commentManager->validateComment($this->superglobalGetId);
            Toolbox::addAlertMessage("The comment was allowed with success", Toolbox::GREEN_COLOR);
            header("Location: " . URL . "admin");
        } else {
            Toolbox::addAlertMessage("You do not have the rights to access this page", Toolbox::RED_COLOR);
            header("Location: " . URL . "home");
        }
    }
}

