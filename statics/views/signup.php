<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-indigo-950 items-center h-screen text-white flex flex-col">
    <header class="flex flex-col mb-8">
        <img src="../assets/icone/logo.webp" alt="logo" class="w-1/3 md:w-2/3 lg:w-3/5 mx-auto mt-5 md:mt-10">
        <h1 class="text-gray-200 text-4xl md:text-5xl lg:text-6xl text-center mt-6">Anime Generation</h1>
        <p class="text-gray-200 text-2xl md:text-3xl lg:text-4xl text-center mt-2">Rejoignez-nous</p>
    </header>
    <img src="../assets/image/lex2.png" alt="lex2.png" class="absolute hidden md:block bottom-0 left-10 w-[25%]">
    <div class="bg-gray-800 p-10 rounded-lg shadow-2xl w-80 mx-auto">
        <h2 class="text-3xl">Inscrivez-vous</h2>
        <form id="signup-form" action="../../back/script/register.php" method="post" class="flex flex-col mt-6">
            <input type="text" placeholder="Pseudo" name="pseudo" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <input type="email" placeholder="Email" name="email" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <input type="password" placeholder="Mot de passe" name="password" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <input type="password" placeholder="Confirmez le mot de passe" name="confirm_password" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg mt-2 hover:bg-indigo-600">Inscription</button>
        </form>
        <div id="message" class="mt-3 text-red-500"></div>
        <div class="mt-3">
            Vous avez déjà un compte ? <a href="../../index.php" class="text-indigo-500 hover:underline">Connectez-vous</a>
        </div>
    </div>
    <img src="../assets/image/rem.webp" alt="rem.webp" class="absolute hidden md:block bottom-0 right-10 w-[25%]">
    <script src="../../back/js/signup.js"></script>
</body>
</html>
