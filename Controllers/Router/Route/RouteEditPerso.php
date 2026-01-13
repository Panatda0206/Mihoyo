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
        $id = $params['id'] ?? null;

        if ($id !== null && $id !== '') {
            header('Location: index.php?action=add-perso&id=' . urlencode((string)$id));
        } else {
            header('Location: index.php?action=add-perso');
        }
        exit;
    }

    public function post(array $params = [])
    {
        $this->get($params);
    }
}
?>