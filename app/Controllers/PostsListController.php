<?php

namespace App\Controllers;

use App\Models\PostsManager;
use App\Core\GET;
/**
 * Encapsulates the post list controller
 * and generates the post list page
 */
class PostsListController extends MainController
{
    private $superglobalGetPageNbr;

    public function __construct()
    {
        $this->superglobalGetPageNbr = GET::key("page");
    }
    /**
    * Generates the post list page
    */
    public function postslist()
    {
        
        $posts = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);
        //$nbrOfElement = $posts->getNbrOfPosts();
       /* if($this->superglobalGetPageNbr==null){
            $this->superglobalGetPageNbr=1;
        }
        $nbrElementsByPage = 5;
        $nbrOfPages=ceil($nbrOfElement/$nbrElementsByPage);
        $begin = ($this->superglobalGetPageNbr-1)*$nbrElementsByPage;*/

        $data_page = [
            "page_description" => "PostsListPage",
            "page_title" => "PostsListPage",
            "view" => "../Views/postslist.view.php",
            "page_css" => "postsList.css",
            "posts_list" => $posts->getPostsList(),
           // "posts_list" => $posts->getPaginationPostsList($begin,$nbrElementsByPage),
            //"nbr_of_pages" => $nbrOfPages,
            "template" => "../Views/Common/template.view.php"
        ];

        $this->generatePage($data_page);

        /*if(count($posts->getPaginationPostsList($begin,$nbrElementsByPage))==0)
        {
            header("location: postlist");
        }*/
    }
}