<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-indigo-950 items-center h-screen text-white flex flex-col relative">
    <div class="absolute top-4 right-4">
        <a href="../../index.php" class="text-white bg-indigo-500 px-4 py-2 rounded-lg hover:bg-indigo-600">Déconnexion</a>
    </div>
    <header class="flex flex-col w-3/12 mb-8">
        <img src="../assets/icone/logo.webp" alt="logo" class="w-1/3 md:w-2/3 lg:w-3/5 mx-auto mt-10">
        <p class="text-gray-200 text-2xl md:text-3xl lg:text-4xl text-center mt-2">Modifier le profil</p>
    </header>
    <img src="../assets/image/lex.png" alt="lex.png" class="absolute hidden md:block bottom-0 left-10 w-[25%]">
    <div class="bg-gray-800 p-5 rounded-lg shadow-2xl w-80 mx-auto">
        <div class="flex justify-center mb-4">
            <img src="../assets/image/rectangle1.png" alt="avatar" class="w-44 h-44">
        </div>
        <form action="/update_profile" method="post" class="flex flex-col" enctype="multipart/form-data">
            <label for="avatar">Avatar :</label>
            <input type="file" id="avatar" name="avatar" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" class="px-4 py-2 bg-gray-700 rounded-lg mt-2" value="Pseudo">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="px-4 py-2 bg-gray-700 rounded-lg mt-2" value="email@example.com">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="px-4 py-2 bg-gray-700 rounded-lg mt-2">Description actuelle...</textarea>
            <button type="submit" class="px-4 py-2 bg-indigo-500 rounded-lg mt-2 hover:bg-indigo-600">Enregistrer les modifications</button>
        </form>
    </div>
    <img src="../assets/image/rem.webp" alt="rem.webp" class="absolute hidden md:block bottom-0 right-10 w-[25%]">
</body>
</html>
