<?php

class Bdd
{
    private $pdo;

    function __construct()
    {
        $this->connect();
    }

    public function getPDO() {
        return $this->pdo;
    }

    private function connect()
    {
        try {
            // Connexion à la bdd
            $this->pdo = new PDO("mysql:host=mysql;dbname=epitech_tp;charset=utf8", "root", "root");
        } catch (Exception $e) {
            die("Erreur " . $e->getMessage());
        }
    }
}