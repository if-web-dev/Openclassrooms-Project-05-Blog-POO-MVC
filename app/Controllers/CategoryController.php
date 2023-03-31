<?php

namespace App\Controllers;

use App\Core\GET;
use App\Models\PostsManager;
use App\Models\CategoriesManager;
/**
 * Encapsulates the category controller and return
 * Posts lists by category
 */
class CategoryController extends MainController
{
    /**
     * generates posts list by category
     */
    private $superglobalGetPageNbr;
    private $superglobalGetId;

    public function __construct()
    {
       $this->superglobalGetPageNbr = GET::key("page");
       $this->superglobalGetId = GET::key("id");
    }

    public function getCategoryPostList()
    {
        $postsCategories = new CategoriesManager(DBNAME, HOST, USERNAME, PASSWORD);
        $posts = new PostsManager(DBNAME, HOST, USERNAME, PASSWORD);

    
        $nbrOfElement = $postsCategories->getNbrOfPostsbyCategory($this->superglobalGetId);
        if($this->superglobalGetPageNbr==null){
            $this->superglobalGetPageNbr=1;
        }
        $nbrElementsByPage = 5;
        $nbrOfPages=ceil($nbrOfElement/$nbrElementsByPage);
        $begin = ($this->superglobalGetPageNbr-1)*$nbrElementsByPage;
        $postsList = $postsCategories->getPostsbyCategory($this->superglobalGetId, $begin,$nbrElementsByPage);


        $data_page = [
            "page_description" => "PostsListPage",
            "page_title" => "PostsListPage",
            "view" => "../Views/categoryPostslist.view.php",
            "page_css" => "postsList.css",
            "posts_list" => $postsList,
            "nbr_of_pages" => $nbrOfPages,
            "template" => "../Views/Common/template.view.php"
        ];
       

        $this->generatePage($data_page);

        if(count($posts->getPaginationPostsList($begin,$nbrElementsByPage))==0)
        {
            header("location: postlist");
        }
    }
}
