<?php
// On inclut les fichiers de classe nécessaires
require_once '../classes/Database.php';
require_once '../classes/User.php';

// On vérifie si toutes les informations nécessaires ont été fournies par l'utilisateur
if (isset($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {

    // On vérifie que les deux mots de passe sont identiques
    if ($_POST['password'] !== $_POST['confirm_password']) {
        die('Les mots de passe ne sont pas identiques.');
    }

    // On crée une nouvelle connexion à la base de données
    $db = new Database();
    $connection = $db->getConnection();

    // On crée une nouvelle instance d'utilisateur
    $user = new User($connection);

    // On utilise les setters pour définir les valeurs de l'utilisateur
    try {
        $user->setPseudo($_POST['pseudo']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);

        // On vérifie si le pseudo ou l'e-mail existent déjà dans la base de données
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

        // On crypte le mot de passe de l'utilisateur pour plus de sécurité
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

        // On insère le nouvel utilisateur dans la base de données
        $query = 'INSERT INTO utilisateur (pseudo, avatar, email, password, description, date_inscription) VALUES (?, ?, ?, ?, ?, NOW())';
        $stmt = $connection->prepare($query);
        $stmt->execute([$user->getPseudo(), $user->getAvatar(), $user->getEmail(), $hashedPassword, $user->getDescription()]);

        // On redirige vers index.php après une inscription réussie
        die('Inscription réussie!');
    } catch (Exception $e) {
        // Si une erreur se produit (par exemple, si les valeurs sont invalides), on arrête le script et on affiche l'erreur
        die('Erreur lors de l\'inscription : ' . $e->getMessage());
    }
} else {
    // Si toutes les informations nécessaires ne sont pas fournies, on affiche un message indiquant que tous les champs sont obligatoires
    echo "Tous les champs sont obligatoires.";
}
?>
