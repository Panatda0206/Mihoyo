<?php
declare(strict_types=1);

namespace Controllers\Router\Route;
use Controllers\Router\Route;
use Controllers\PersoController;

class RouteAddPerso extends Route
{
    private PersoController $controller;

    public function __construct(string $name, PersoController $controller)
    {
        parent::__construct($name);
        $this->controller = $controller;
    }

    public function get(array $params = []): void
    {
        $this->controller->displayAddPerso();
    }

    public function post(array $params = []): void
    {
        try {
            //Récupérer les données du formulaire
            $data = [
                'id'        => $this->getParam($params, 'id', false),
                'name'      => $this->getParam($params, 'name', false),
                'element'   => $this->getParam($params, 'element', false),
                'unitclass' => $this->getParam($params, 'unitclass', false),
                'origin'    => $this->getParam($params, 'origin', false),
                'rarity'    => $this->getParam($params, 'rarity', false),
                'urlImg'   => $this->getParam($params, 'urlImg', false),
            ];

            $this->controller->savePerso($data);

        } catch (\Exception $e) {
            $this->controller->displayAddPerso(
                $params['id'] ?? null,
                $e->getMessage()
            );
        }
    }

}

?>