<?php
declare(strict_types=1);

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';
require_once __DIR__ . '/Vendor/Plates/src/Engine.php';
require_once __DIR__ . '/Controllers/MainController.php';
require_once __DIR__ . '/Controllers/PersoController.php';
require_once __DIR__ . '/Controllers/Router/Route.php';
require_once __DIR__ . '/Controllers/Router/Route/RouteAddPerso.php';



//charger le namespace
use League\Plates\Engine;
use Controllers\MainController;
use Controllers\Router\Router;
//création l'autoloader
$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();  //Cela permet de faire comprendre à PhP que cest cette classe qui va gérer l'autoload.
//ajouter namespace
$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');
$loader->addNamespace('Controllers', '/Controllers');
$loader->addNamespace('Config', '/Config');
$loader->addNamespace('Models', '/Models');
$loader->addNamespace('Controllers\Router', '/Controllers/Router');


// Initialisation de l'engine avec le dossier Views qui se trouve les fichiers home.php et template.php
//$engine = new Engine(__DIR__ . '/Views');

// Appel du contrôleur principal
//$controller = new MainController($engine);
// Appel de la méthode index pour afficher la page
//$controller->index();
//Instancier le routeur
$router = new Router('action');
$router->routing($_GET, $_POST);


?>