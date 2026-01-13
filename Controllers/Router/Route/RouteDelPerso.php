<?php
declare(strict_types=1);

namespace Controllers\Router\Route;
use Controllers\Router\Route;
use Controllers\MainController;

class RouteDelPerso extends Route
{
    private MainController $controller;
    public function __construct(string $actionName = 'del-perso', MainController $controller)
    {
        parent::__construct($actionName);
        $this->controller = $controller;
    }

    public function get(array $params = [])
    {
        // Plus tard : suppression en base avec $params['id']
        $message = 'Personnage supprimé avec succès!';

        header('Location: index.php?action=index&message=' . urlencode($message));
        exit;
    }

    public function post(array $params = [])
    {
        $this->get($params);
    }
}
?>