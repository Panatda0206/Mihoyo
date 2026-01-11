<?php
declare(strict_types=1);

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';
require_once __DIR__ . '/Vendor/Plates/src/Engine.php';


$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();  //Cela permet de faire comprendre à PhP que cest cette classe qui va gérer l'autoload.
//ajouter namespace
$loader->addNamespace('\Helpers', '/Helpers');
$loader->addNamespace('\League\Plates', '/Vendor/Plates/src');

use League\Plates\Engine;
$templates = new Engine(__DIR__ . '/Views');

echo $templates->render('home', [
    'gameName' => 'Genshin Impact'
]);


?>