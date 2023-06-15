<?php
require_once '../classes/Database.php';
require_once '../classes/User.php';

// Assurez-vous que toutes les valeurs nécessaires ont été envoyées
if (isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
    // Vérifiez si les mots de passe sont identiques
    if ($_POST['password'] !== $_POST['confirm_password']) {
        die('Les mots de passe ne sont pas identiques.');
    }

    // Créez une nouvelle connexion à la base de données
    $db = new Database();
    $connection = $db->getConnection();

    // Créez une nouvelle instance d'utilisateur
    $user = new User($connection);

    // Utilisez les setters pour définir les valeurs de l'utilisateur
    try {
        $user->setPseudo($_POST['pseudo']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        // Vérifiez si le pseudo ou l'email existent déjà
        $query = 'SELECT * FROM utilisateur WHERE pseudo = ? OR email = ?';
        $stmt = $connection->prepare($query);
        $stmt->execute([$user->getPseudo(), $user->getEmail()]);
        $existingUser = $stmt->fetch();

        if ($existingUser) {
            if ($existingUser['pseudo'] == $user->getPseudo()) {
                throw new Exception('Ce pseudo est déjà utilisé.');
            }
            if ($existingUser['email'] == $user->getEmail()) {
                throw new Exception('Cet email est déjà utilisé.');
            }
        }

        // Hash the user's password
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        // Insérez l'utilisateur dans la base de données
        $query = 'INSERT INTO utilisateur (pseudo, avatar, email, password, description, date_inscription) VALUES (?, ?, ?, ?, ?, NOW())';
        $stmt = $connection->prepare($query);
        $stmt->execute([$user->getPseudo(), $user->getAvatar(), $user->getEmail(), $hashedPassword, $user->getDescription()]);

        // Redirection vers index.php après une inscription réussie
        die('Inscription réussie!');
    } catch (Exception $e) {
        // Si une erreur se produit (par exemple, si les valeurs sont invalides), arrêtez le script et affichez l'erreur
        die('Erreur lors de l\'inscription : ' . $e->getMessage());
    }
} else {
    echo "Tous les champs sont obligatoires.";
}
?>
