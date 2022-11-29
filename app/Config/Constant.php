<?php

/*URL constant - to search for resources at the root of the site*/

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

/*database access constants */

define("HOST", "localhost");

define("DBNAME", "blog");

define("USERNAME", "root");

define("PASSWORD", "");

/* your ouwn mail adress */

define("MAILADRESS", "i.fouhal@hotmail.com");
