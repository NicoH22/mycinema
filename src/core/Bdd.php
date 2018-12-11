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
            $this->pdo = new PDO("mysql:host=localhost;dbname=wac_exam;charset=utf8", "phpmyadmin", "alohastitch");
        } catch (Exception $e) {
            die("Erreur " . $e->getMessage());
        }
    }
}