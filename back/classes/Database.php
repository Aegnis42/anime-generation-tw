<?php

class Database {
    private $host = "localhost"; // ou l'adresse de votre serveur si différent
    private $dbname = "animedb";
    private $username = "root"; // votre nom d'utilisateur MySQL
    private $password = ""; // votre mot de passe MySQL

    public $conn;

    // obtenir la connexion à la base de données
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
    
     /**
     * Getter pour la connexion à la base de données
     */
    public function getConn() {
        return $this->conn;
    }

    /**
     * Setter pour la connexion à la base de données
     */
    public function setConn($conn) {
        $this->conn = $conn;
    }
}
?>