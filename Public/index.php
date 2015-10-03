<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_NOTICE);

use GF\App;
use Routers\Router;

include '../../PHP-GF-Framework-MVC/App.php';
include '../Routers/Router.php';

$app = App::getInstance();

$app->run();