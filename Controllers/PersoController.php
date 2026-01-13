<?php
declare(strict_types=1);

namespace Controllers;

use League\Plates\Engine;

class PersoController
{
    private Engine $engine;

    public function __construct()
    {
        $this->engine = new Engine(__DIR__ . '/../Views');
    }

    public function displayAddPerso(): void
    {
        echo $this->engine->render('add-perso', [
            'title' => 'Ajouter un personnage'
        ]);
    }

    public function displayAddElementPerso(): void
    {
        echo $this->engine->render('add-element', [
            'title' => 'Ajouter élément du personnage'
        ]);
    }

}
?>