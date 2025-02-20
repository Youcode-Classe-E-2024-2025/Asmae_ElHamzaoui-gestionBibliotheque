<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Connexion</h2>
        <form action="/login" method="POST" class="mt-4">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-600">Email</label>
        <input type="email" name="email" required class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <div class="mt-2">
        <label class="block text-sm font-medium text-gray-600">Mot de passe</label>
        <input type="password" name="password" required class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>
    <button type="submit" class="w-full mt-4 p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Se connecter</button>
</form>

        <p class="mt-3 text-center text-sm text-gray-600">Pas encore inscrit ? <a href="/signup" class="text-blue-500">Créer un compte</a></p>
    </div>
</body>
</html>
