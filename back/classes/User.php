<?php

require_once 'Database.php';

/**
 * Classe représentant un utilisateur.
 */
class User {
    private $conn;
    private $table_name = "utilisateur";

    private $id;
    private $pseudo;
    private $avatar;
    private $email;
    private $password;
    private $description;
    private $date_inscription;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Getter pour l'ID de l'utilisateur.
     */
    public function getId() {
        return $this->id;
    }

    // Pas de setter pour l'ID car il est auto-incrémenté par la base de données

    /**
     * Getter pour le pseudo de l'utilisateur.
     */
    public function getPseudo() {
        return $this->pseudo;
    }

    /**
     * Setter pour le pseudo de l'utilisateur.
     * Assure que le pseudo n'est pas vide et ne dépasse pas 75 caractères.
     */
    public function setPseudo($pseudo) {
        if (empty($pseudo) || strlen($pseudo) > 75) {
            throw new InvalidArgumentException("Le pseudo ne peut pas être vide et doit être inférieur à 76 caractères.");
        }

        $this->pseudo = $pseudo;
    }

    /**
     * Getter pour l'avatar de l'utilisateur.
     */
    public function getAvatar() {
        return $this->avatar;
    }

    /**
     * Setter pour l'avatar de l'utilisateur.
     * Assure que l'avatar est une chaîne de caractères se terminant par .webp ou .jpg.
     */
    public function setAvatar($avatar) {
        if (!is_string($avatar) || !(substr($avatar, -5) == ".webp" || substr($avatar, -4) == ".jpg")) {
            throw new InvalidArgumentException("Le chemin vers l'avatar doit être une chaîne de caractères se terminant par .webp ou .jpg.");
        }

        $this->avatar = $avatar;
    }

    /**
     * Getter pour l'e-mail de l'utilisateur.
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Setter pour l'e-mail de l'utilisateur.
     * Assure que l'e-mail est valide.
     */
    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("L'e-mail n'est pas valide.");
        }

        $this->email = $email;
    }

    /**
     * Getter pour le mot de passe de l'utilisateur.
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Setter pour le mot de passe de l'utilisateur.
     * Assure que le mot de passe est suffisamment fort et crypte le mot de passe.
     */
    public function setPassword($password) {
        if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/\d/", $password) || !preg_match("/[\W]/", $password)) {
            throw new InvalidArgumentException("Le mot de passe doit contenir au moins 8 caractères, dont un chiffre, une majuscule et un caractère spécial.");
        }
    
        $this->password = $password;
    }

    /**
     * Getter pour la description de l'utilisateur.
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Setter pour la description de l'utilisateur.
     * Assure que la description est une chaîne de caractères.
     */
    public function setDescription($description) {
        if (!is_string($description)) {
            throw new InvalidArgumentException("La description doit être une chaîne de caractères.");
        }

        $this->description = $description;
    }

    /**
     * Getter pour la date d'inscription de l'utilisateur.
     */
    public function getDateInscription() {
        return $this->date_inscription;
    }

    // Pas de setter pour la date d'inscription car elle est automatiquement définie lors de la création de l'utilisateur
}

?>

