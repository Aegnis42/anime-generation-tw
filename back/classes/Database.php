<?php

// Définition d'une classe nommée "Database"
class Database {
    // Définition des propriétés privées de la classe. Elles détiennent les informations nécessaires pour se connecter à une base de données MySQL.
    private $host = "localhost"; 
    private $dbname = "animedb";
    private $username = "root"; 
    private $password = ""; 

    public $conn; // La propriété publique $conn sera utilisée pour garder une référence à la connexion de la base de données une fois qu'elle a été établie.

    // La méthode getConnection est utilisée pour établir une connexion à la base de données.
    public function getConnection() {
        $this->conn = null; // Assurez-vous que $conn est vide avant d'essayer de se connecter.

        try {
            // Création d'une nouvelle connexion PDO, qui est un moyen de se connecter à des bases de données dans PHP.
            // Le mot de passe et le nom d'utilisateur sont utilisés ici pour établir la connexion.
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8"); // Configurer l'encodage de caractères pour la connexion.
        } catch(PDOException $exception) { // Si une exception est levée lors de la tentative de connexion, elle est capturée ici.
            // Affiche un message d'erreur avec le message de l'exception.
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn; // La connexion établie (ou non en cas d'erreur) est retournée par la méthode.
    }
    
    // Getter pour la connexion à la base de données. C'est une méthode qui permet d'accéder à la valeur de $conn en dehors de la classe.
    public function getConn() {
        return $this->conn;
    }

    // Setter pour la connexion à la base de données. C'est une méthode qui permet de modifier la valeur de $conn en dehors de la classe.
    public function setConn($conn) {
        $this->conn = $conn;
    }
}
?>
