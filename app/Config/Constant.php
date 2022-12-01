<?php

namespace App\Config;

use App\Core\Server;

/*URL constant - to search for resources at the root of the site*/

define("URL", str_replace("index.php", "", (Server::key("HTTPS")) ? "https" : "http") .
    "://" . Server::key('HTTP_HOST') . Server::key("PHP_SELF"));

/*database access constants */

define("HOST", "localhost");

define("DBNAME", "blog");

define("USERNAME", "root");

define("PASSWORD", "");

/* your ouwn mail adress */

define("MAILADRESS", "i.fouhal@hotmail.com");
