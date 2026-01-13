<?php
declare(strict_types=1);

namespace Controllers\Router\Route;
use Controllers\Router\Route;
use Controllers\PersoController;

class RouteDelPerso extends Route
{
    private PersoController $controller;
    public function __construct(string $actionName = 'del-perso', PersoController $controller)
    {
        parent::__construct($actionName);
        $this->controller = $controller;
    }

    public function get(array $params = [])
    {
        try {
            $idPerso = $this->getParam($params, 'idPerso', false);

            $this->controller->deletePersoAndIndex($idPerso);

        } catch (\Exception $e) {
            $this->controller->deletePersoAndIndex(null);
        }
    }

    public function post(array $params = [])
    {
        $this->get($params);
    }
}
?>