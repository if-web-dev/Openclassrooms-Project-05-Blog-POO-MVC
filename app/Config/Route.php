<?php

//Pages
$routes["/home"] = ["App\Controllers\HomeController", "home"];
$routes["/postslist"] = ["App\Controllers\PostsListController", "postslist"];
$routes["/admin"] = ["App\Controllers\Admin\AdminController", "admin"];
$routes["/post"] = ["App\Controllers\PostController", "post"];
$routes["/contact"] = ["App\Controllers\ContactController", "contacts"];
$routes["/login"] = ["App\Controllers\LoginController", "login"];
$routes["/signin"] = ["App\Controllers\SigninController", "signin"];
$routes["/"] = ["App\Controllers\HomeController", "home"];
$routes["/404"] = ["App\Controllers\ErrorPageController", "errorPage"] ;
//Post processing
$routes["/updatePost"] = ["App\Controllers\Admin\PostController", "updatePost"];
$routes["/addPost"] = ["App\Controllers\Admin\PostController", "addPost"];
$routes["/deletePost"] = ["App\Controllers\Admin\PostController", "deletePost"];
$routes["/postProcessing"] = ["App\Controllers\Admin\PostController", "postProcessing"];
//User Processing
$routes["/deleteUser"] = ["App\Controllers\Admin\UserController", "deleteUser"];
$routes["/addUser"] = ["App\Controllers\Admin\UserController", "addUser"];
//Comment Processing
$routes["/validateComment"] = ["App\Controllers\Admin\CommentController", "validateComment"];
$routes["/deleteComment"] = ["App\Controllers\Admin\CommentController", "deleteComment"];
$routes["/recordComment"] = ["App\Controllers\CommentController", "recordComment"];
//Category Processing
$routes["/category"] = ["App\Controllers\CategoryController", "getCategoryPostList"];
//Login/Logout processing
$routes["/logout"] = ["App\Controllers\LogoutController", "logout"];
$routes["/validationLogin"] = ["App\Controllers\ValidationLoginController", "validationLogin"] ;


