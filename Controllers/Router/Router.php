<?php
declare(strict_types=1);

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\PersoController;
use Controllers\Router\Route;

class Router
{
    private array $routeList = []; // [string => Route]
    private array $ctrlList  = []; // [string => Controller]
    private string $action_key;

    public function __construct(string $name_of_action_key = 'action')
    {
        $this->action_key = $name_of_action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList(): void
    {
        $this->ctrlList['main'] = new MainController();
        $this->ctrlList['perso'] = new PersoController();
    }

    private function createRouteList(): void
    {
        $this->routeList['index'] = new Route\RouteIndex('index', $this->ctrlList['main']);
        $this->routeList['add-perso'] = new Route\RouteAddPerso('add-perso', $this->ctrlList['perso']);

    }

    public function routing(array $get, array $post): void
    {
        $action = $get[$this->action_key] ?? 'index';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        $route = $this->routeList[$action] ?? $this->routeList['index'];
        $params = ($method === 'POST') ? $post : $get;

        $route->action($params, $method);
    }
}

?>