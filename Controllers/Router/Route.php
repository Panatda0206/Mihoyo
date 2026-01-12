<?php

namespace Controllers\Router;

use Exception;

abstract class Route
{
    protected string $actionName;

    public function __construct(string $actionName = '')
    {
        $this->actionName = $actionName;
    }

    /**
     * Appelle get() ou post() selon $method
     */
    public function action(array $params = [], string $method = 'GET')
    {
        $method = strtoupper($method);

        if ($method === 'POST') {
            return $this->post($params);
        }
        return $this->get($params);
    }

    /**
     * Récupère un paramètre dans un tableau (GET/POST), avec gestion erreur
     */
    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
    {
        //vérifier si il existe parametre demandé
        if (!isset($array[$paramName])) {
            throw new Exception("Paramètre '$paramName' absent");
        }
        if (!$canBeEmpty && empty($array[$paramName])) {
            throw new Exception("Paramètre '$paramName' vide");
        }

        return $array[$paramName];
    }

    // Méthodes à implémenter dans les routes concrètes
    abstract public function get(array $params = []);
    abstract public function post(array $params = []);
}


?>