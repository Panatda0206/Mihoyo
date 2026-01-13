<?php
declare(strict_types=1);

namespace Controllers\Router\Route;
use Controllers\Router\Route;
use Controllers\PersoController;

class RouteEditPerso extends Route
{
    private PersoController $controller;
    public function __construct(string $actionName = 'edit-perso', PersoController $controller)
    {
        parent::__construct($actionName);
        $this->controller = $controller;
    }

    public function get(array $params = [])
    {
        try {
            $idPerso = $this->getParam($params, 'idPerso', false);
            $this->controller->displayEditPerso($idPerso);
        } catch (\Exception $e) {
            // si il y a pas id, on réaffiche le formulaire avec message
            $this->controller->displayAddPerso(null, "id not found");
        }
    }

    public function post(array $params = [])
    {
        $this->get($params);
    }
}
?>