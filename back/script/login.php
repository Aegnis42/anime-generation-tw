<?php
require_once '../classes/Database.php';
require_once '../classes/User.php';

// Assurez-vous que toutes les valeurs nécessaires ont été envoyées
if (isset($_POST['pseudo'], $_POST['password'])) {
    // Créez une nouvelle connexion à la base de données
    $db = new Database();
    $connection = $db->getConnection();

    // Créez une nouvelle instance d'utilisateur
    $user = new User($connection);

    // Utilisez les setters pour définir les valeurs de l'utilisateur
    try {
        $user->setPseudo($_POST['pseudo']);
        $user->setPassword($_POST['password']);

        // Vérifiez si l'utilisateur existe et que le mot de passe est correct
        $query = 'SELECT * FROM utilisateur WHERE pseudo = ?';
        $stmt = $connection->prepare($query);
        $stmt->execute([$user->getPseudo()]);
        $existingUser = $stmt->fetch();

        if ($existingUser && password_verify($user->getPassword(), $existingUser['password'])) {
            // L'utilisateur existe et le mot de passe est correct
            echo "Connexion réussie!";
            session_start();
            $_SESSION['pseudo'] = $user->getPseudo();  // Stocke le pseudo dans la session
        } else {
            // L'utilisateur n'existe pas ou le mot de passe est incorrect
            throw new Exception('Pseudo ou mot de passe incorrect.');
        }
    } catch (Exception $e) {
        // Si une erreur se produit (par exemple, si les valeurs sont invalides), arrêtez le script et affichez l'erreur
        die('Erreur lors de la connexion : ' . $e->getMessage());
    }
} else {
    echo "Tous les champs sont obligatoires.";
}
?>
