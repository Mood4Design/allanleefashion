<?php
session_start();
  

// force PHP interpreter to display runtime errors
// this may be required for some hostings
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('PAGE_NOT_FOUND', 'page-not-found');

define('PROJECT', '/allanlee/');

define('PROJECT_URL', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

define('IMAGE_URL', PROJECT_URL . 'images/');
define('CSS_URL', PROJECT_URL . 'css/');
define('JS_URL', PROJECT_URL . 'js/');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('INCLUDES', ROOT . PROJECT . 'php/includes/');
define('NEWSLETTER', ROOT . PROJECT . 'newsletter/');

// load our __autoload function 
require_once(INCLUDES . "autoloader.php");

// register the our  __autoload function with the autoload registry
spl_autoload_register('__autoload');
// load the Composer autoloader
require_once(ROOT . PROJECT . "vendor/autoload.php");
$url = $_GET['url'];
// create an array from the value in the url
$controllerData = explode('/', $url);

$controllerName = $controllerData[0];

$map = require __DIR__ . "/class_map.php";
// $variable = (condition)?if true : if false;
$controllerName = (isset($map[$controllerName])) ? $controllerName : PAGE_NOT_FOUND;

$className = $map[$controllerName];

$className = "allanlee\\controller\\" . $className;
// instantiate the Categories Controller
$controller = new $className($controllerData);
// execute the action method in the controller
$controller->viewAction();
?>