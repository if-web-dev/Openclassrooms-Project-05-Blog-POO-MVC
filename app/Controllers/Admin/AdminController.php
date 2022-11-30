<?php

namespace App\Controllers\Admin;

use App\Controllers\MainController;
use App\Models\UsersManager;
use App\Models\PostsManager;
use App\Models\CommentsManager;
use App\Core\Securite;
use App\Core\Toolbox;
/**
 * Encapsulates the admin controller and returns
 * the admin page
 */
class AdminController extends MainController
{
    /**
     * Generates admin page with its data pages
     * if the admin is connected
     */
    public function admin()
    {
        $Users = new UsersManager(DBNAME, HOST, USERNAME, PASSWORD);
        $Posts = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
        $Comments = new CommentsManager(DBNAME, HOST, USERNAME, PASSWORD);


        $data_page = [
            "page_description" => "A page where the admin manage users, posts and comments",
            "page_title" => "Admin page",
            "view" => "../Views/admin.view.php",
            "users_list" => $Users->getUsersList(),
            "posts_list" => $Posts->getPostsList(),
            "pending_comments_list" => $Comments->getPendingCommentsList(),
            "page_css" => "admin.css",
            "page_js" => ["admin.js"],
            "template" => "../Views/Common/template.view.php",
        ];
        
        if (Securite::isAdminConnected()) {
            $this->generatePage($data_page);
        } else {
            Toolbox::addAlertMessage("You do not have the rights to access this page", Toolbox::RED_COLOR);
            header("Location: " . URL . "home");
        }
    }
}
