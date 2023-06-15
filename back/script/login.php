<?php

// On inclut les fichiers de classe nécessaires
require_once '../classes/Database.php';
require_once '../classes/User.php';

// On vérifie si le pseudo et le mot de passe ont bien été envoyés par l'utilisateur
if (isset($_POST['pseudo'], $_POST['password'])) {
    // On crée une nouvelle connexion à la base de données
    $db = new Database();
    $connection = $db->getConnection();

    // On crée une nouvelle instance d'utilisateur
    $user = new User($connection);

    // On utilise les setters pour définir les valeurs de l'utilisateur
    try {
        $user->setPseudo($_POST['pseudo']);
        $user->setPassword($_POST['password']);

        // On vérifie si l'utilisateur existe et que le mot de passe est correct
        $query = 'SELECT * FROM utilisateur WHERE pseudo = ?';
        $stmt = $connection->prepare($query);
        $stmt->execute([$user->getPseudo()]);
        $existingUser = $stmt->fetch();

        // Si l'utilisateur existe et que le mot de passe est correct
        if ($existingUser && password_verify($user->getPassword(), $existingUser['password'])) {
            echo "Connexion réussie!";
            // On démarre une nouvelle session et on stocke le pseudo de l'utilisateur dans la session
            session_start();
            $_SESSION['pseudo'] = $user->getPseudo();  
        } else {
            // Si l'utilisateur n'existe pas ou que le mot de passe est incorrect, on génère une exception
            throw new Exception('Pseudo ou mot de passe incorrect.');
        }
    } catch (Exception $e) {
        // Si une erreur se produit (par exemple, si le pseudo ou le mot de passe sont invalides), on arrête le script et on affiche l'erreur
        die('Erreur lors de la connexion : ' . $e->getMessage());
    }
} else {
    // Si le pseudo ou le mot de passe ne sont pas envoyés, on affiche un message indiquant que tous les champs sont obligatoires
    echo "Tous les champs sont obligatoires.";
}
?>
