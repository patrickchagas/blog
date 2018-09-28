<?php

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);


//Arquivos do Front End
require_once("site.php");
require_once("site-profile.php");
require_once("site-users.php");
require_once("site-posts.php");
require_once("site-categories.php");

//Funções
require_once("functions.php");

//Arquivos da parte administrativa
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-posts.php");
require_once("admin-notices.php");

$app->run();

?>