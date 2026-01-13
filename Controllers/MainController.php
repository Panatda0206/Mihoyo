<?php
declare(strict_types=1);
namespace Controllers;

use League\Plates\Engine;
use Models;

class MainController{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function index() : void
    {
        $dao = new Models\PersonnageDAO();

        // récupérer tous les personnages
        $listPersonnage = $dao->getAll();

        // Un ID qui existe dans BDD
        //$first = $dao->getByID('P001');

        //Un ID qui existe pas dans BDD
        //$other = $dao->getByID('P002');

        echo $this->templates->render('home', ['gameName' => 'Genshin Impact','listPersonnage' => $listPersonnage]);
    }

    public function displayLogs() : void{
        echo $this->engine->render('logs', [
        'title' => 'Logs'
    ]);
    }
}

?>