<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-indigo-950 items-center h-screen text-white flex flex-col relative">
    <div class="absolute top-4 right-4">
        <a href="../../index.php" class="text-white bg-indigo-500 px-4 py-2 rounded-lg hover:bg-indigo-600">Déconnexion</a>
    </div>
    <header class="flex flex-col w-3/12 mb-8">
        <img src="../assets/icone/logo.webp" alt="logo" class="w-1/3 md:w-2/3 lg:w-3/5 mx-auto mt-10">
        <p class="text-gray-200 text-2xl md:text-3xl lg:text-4xl text-center mt-2">Profil</p>
    </header>
    <img src="../assets/image/lex.png" alt="lex.png" class="absolute hidden md:block bottom-0 left-10 w-[25%]">
    <div class="bg-gray-800 p-5 rounded-lg shadow-2xl w-80 mx-auto">
        <div class="flex justify-center">
            <img src="../assets/image/rectangle1.png" alt="avatar" class="w-44 h-44">
        </div>
        <h2 class="text-3xl text-center mt-1">Pseudo</h2>
        <p class="text-center mt-1">email@example.com</p>
        <p class="text-center mt-1">Inscrit depuis le 14 Juin 2023</p>
        <p class="text-center mt-2 bg-gray-700 p-4 rounded-lg">Description: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam malesuada eros dolor, nec consectetur massa dapibus sit amet. Suspendisse potenti.</p>
        <div class="mt-3">
            <a href="edit_profile.php" class="text-indigo-500 hover:underline">Modifier le profil</a>
        </div>
    </div>
    <img src="../assets/image/rem.webp" alt="rem.webp" class="absolute hidden md:block bottom-0 right-10 w-[25%]">
</body>
</html>
