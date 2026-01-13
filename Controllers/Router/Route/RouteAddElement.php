<?php
declare(strict_types=1);

namespace Controllers\Router\Route;
use Controllers\Router\Route;
use Controllers\PersoController;

class RouteAddElement extends Route
{
    private PersoController $controller;

    public function __construct(string $name, PersoController $controller)
    {
        parent::__construct($name);
        $this->controller = $controller;
    }

    public function get(array $params = []): void
    {
        $this->controller->displayAddElementPerso();
    }

    public function post(array $params = []): void
    {
        // vide pour l’instant 
    }
}
?>