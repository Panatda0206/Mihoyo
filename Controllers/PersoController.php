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

    public function displayAddPerso(?string $message = ''): void
    {
        echo $this->engine->render('add-perso', [
            'title' => 'Ajouter un personnage',
            'message' => $message
        ]);
    }

    public function displayAddElementPerso(): void
    {
        echo $this->engine->render('add-element', [
            'title' => 'Ajouter élément du personnage'
        ]);
    }

    public function addPerso(array $data):void
    {
        try {
        $data['id'] = uniqid('p');
        $personnage = new Personnage($data);
        $this->personnageDAO->createPersonnage($personnage);
        $message = "Personnage créé avec succès !";

        } catch (\Exception $e) {
            $message = "Erreur lors de la création du personnage";
        }
        $this->displayAddPerso($message);
    }

    public function deletePersoAndIndex(?string $idPerso = null): void
    {
        $message = "";

        if ($idPerso === null) {
            $message = "Erreur : id introuvable";
            return;
        }
        else {
            $rowCount = $this->personnageDAO->deletePerso($idPerso);

            if ($rowCount > 0) {
                $message = "Suppression réussie";
            } else {
                $message = "Suppression impossible (id introuvable)";
            }
        }

        $main = new MainController();
        $main->index($message);
    }

    public function displayEditPerso(string $idPerso): void
    {
        $perso = $this->personnageDAO->getByID($idPerso);

        if ($perso === null) {
            $this->displayAddPerso( "Personnage introuvable");
            return;
        }

        echo $this->engine->render('add-perso', [
            'perso' => $perso,
            'message' => null
        ]);
    }


}
?>