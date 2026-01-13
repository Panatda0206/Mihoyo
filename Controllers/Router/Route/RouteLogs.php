<?php
declare(strict_types=1);

namespace Controllers\Router\Route;
use Controllers\Router\Route;
use Controllers\MainController;

class RouteLogs extends Route
{
    private MainController $controller;

    public function __construct(string $name, MainController $controller)
    {
        parent::__construct($name);
        $this->controller = $controller;
    }

    public function get(array $params = []): void
    {
        $this->controller->displayLogs();
    }

    public function post(array $params = []): void
    {
        // vide pour l’instant 
    }
}
?>