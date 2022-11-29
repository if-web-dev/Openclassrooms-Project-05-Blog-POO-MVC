<?php

/*constante URL - pour chercher les ressources a la racine du site */

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

/*constante d'acces à la DB */

define("HOST", "localhost");

define("DBNAME", "blog");

define("USERNAME", "root");

define("PASSWORD", "");
