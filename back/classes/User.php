<?php

// Il faut inclure le fichier Database.php pour utiliser la classe Database.
require_once 'Database.php';

// Définition de la classe User
class User {
    private $conn; // Variable pour stocker la connexion à la base de données
    private $table_name = "utilisateur"; // Le nom de la table dans la base de données

    // Déclaration des propriétés de l'utilisateur
    private $id;
    private $pseudo;
    private $avatar;
    private $email;
    private $password;
    private $description;
    private $date_inscription;

    // Le constructeur de la classe, qui est appelé lors de la création d'un nouvel objet User
    public function __construct($db) {
        $this->conn = $db; // Stocke la connexion à la base de données
    }

    // Des getters et des setters pour chaque propriété sont définis.
    // Les getters sont des méthodes qui retournent la valeur actuelle de la propriété.
    // Les setters sont des méthodes qui permettent de définir la valeur de la propriété. Ils peuvent également inclure une logique de validation pour s'assurer que les données sont valides.

    // Getter pour l'ID de l'utilisateur
    public function getId() {
        return $this->id;
    }

    // Getter pour le pseudo de l'utilisateur
    public function getPseudo() {
        return $this->pseudo;
    }

    // Setter pour le pseudo de l'utilisateur. Il comprend une validation pour s'assurer que le pseudo est valide.
    public function setPseudo($pseudo) {
        // Validation du pseudo
        if (empty($pseudo) || strlen($pseudo) > 75) {
            throw new InvalidArgumentException("Le pseudo ne peut pas être vide et doit être inférieur à 76 caractères.");
        }

        $this->pseudo = $pseudo;
    }

    // Getter pour l'avatar de l'utilisateur
    public function getAvatar() {
        return $this->avatar;
    }

    // Setter pour l'avatar de l'utilisateur. Il comprend une validation pour s'assurer que l'avatar est valide.
    public function setAvatar($avatar) {
        // Validation de l'avatar
        if (!is_string($avatar) || !(substr($avatar, -5) == ".webp" || substr($avatar, -4) == ".jpg")) {
            throw new InvalidArgumentException("Le chemin vers l'avatar doit être une chaîne de caractères se terminant par .webp ou .jpg.");
        }

        $this->avatar = $avatar;
    }

    // Getter pour l'e-mail de l'utilisateur
    public function getEmail() {
        return $this->email;
    }

    // Setter pour l'e-mail de l'utilisateur. Il comprend une validation pour s'assurer que l'e-mail est valide.
    public function setEmail($email) {
        // Validation de l'e-mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("L'e-mail n'est pas valide.");
        }

        $this->email = $email;
    }

    // Getter pour le mot de passe de l'utilisateur
    public function getPassword() {
        return $this->password;
    }

    // Setter pour le mot de passe de l'utilisateur. Il comprend une validation pour s'assurer que le mot de passe est fort.
    public function setPassword($password) {
        // Validation du mot de passe
        if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/\d/", $password) || !preg_match("/[\W]/", $password)) {
            throw new InvalidArgumentException("Le mot de passe doit contenir au moins 8 caractères, dont un chiffre, une majuscule et un caractère spécial.");
        }

        $this->password = $password;
    }

    // Getter pour la description de l'utilisateur
    public function getDescription() {
        return $this->description;
    }

    // Setter pour la description de l'utilisateur. Il comprend une validation pour s'assurer que la description est une chaîne de caractères.
    public function setDescription($description) {
        // Validation de la description
        if (!is_string($description)) {
            throw new InvalidArgumentException("La description doit être une chaîne de caractères.");
        }

        $this->description = $description;
    }

    // Getter pour la date d'inscription de l'utilisateur
    public function getDateInscription() {
        return $this->date_inscription;
    }

    // Note : Il n'y a pas de setters pour l'id et la date d'inscription car ils sont supposés être définis automatiquement par la base de données et ne devraient pas être modifiés.
}
?>