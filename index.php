<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-indigo-950 items-center h-screen text-white flex flex-col">
    <header class="flex flex-col mb-8">
        <img src="statics/assets/icone/logo.webp" alt="logo" class="w-1/3 md:w-2/3 lg:w-3/5 mx-auto mt-5 md:mt-10">
        <h1 class="text-gray-200 text-4xl md:text-5xl lg:text-6xl text-center mt-6">Anime Generation</h1>
        <p class="text-gray-200 text-2xl md:text-3xl lg:text-4xl text-center mt-2">Bienvenue</p>
    </header>
    <img src="statics/assets/image/lex.png" alt="lex.png" class="absolute hidden md:block bottom-0 left-10 w-[25%]">
    <div class="bg-gray-800 p-10 rounded-lg shadow-2xl w-80 mx-auto">
        <h2 class="text-3xl">Connectez-vous</h2>
        <form id="login-form" action="back/script/login.php" method="post" class="flex flex-col mt-6">
            <input type="text" placeholder="Pseudo" name="pseudo" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <input type="password" placeholder="Mot de passe" name="password" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg mt-2 hover:bg-indigo-600">Connexion</button>
        </form>
        <div id="message" class="mt-3 text-red-500"></div>
        <div class="mt-3">
            Pas encore de compte ? <a href="statics/views/signup.php" class="text-indigo-500 hover:underline">Inscrivez-vous</a>
        </div>
    </div>
    <img src="statics/assets/image/holow.png" alt="holow.png" class="absolute hidden md:block bottom-0 right-0 w-[25%]">
</body>
</html>
<script>
const form = document.getElementById('login-form');
form.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = new FormData(form);
    fetch(form.action, {
        method: 'POST',
        body: data,
    })
    .then(response => response.text())
    .then(text => {
        if (text.includes('Connexion réussie!')) {
            window.location.href = "statics/views/profile.php";
        }
    });
});
</script>
