<?php

namespace Models;

use PDO;
use PDOStatement;
use Config\Config; 

class BasePDODAO
{
    /**
     * @var PDO|null
     */
    private ?PDO $db = null;

    /**
     * Retourne l'instance PDO (la crée si elle n'existe pas encore)
     */
    protected function getDB(): PDO
    {
        if ($this->db === null) {
            $this->db = new PDO(
                Config::get('dsn'),
                Config::get('user'),
                Config::get('pass'),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        return $this->db;
    }

    /**
     * Exécute une requête SQL préparée
     *
     * @param string $sql
     * @param array|null $params
     * @return PDOStatement|false
     */
    protected function execRequest(string $sql, array $params = null): PDOStatement|false
    {
        $stmt = $this->getDB()->prepare($sql);

        if ($params !== null) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        return $stmt;
    }
}


?>