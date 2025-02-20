<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700">Inscription</h2>
        <form action="/signup" method="POST" class="mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">name</label>
                <input type="text" name="name" required class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mt-2">
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" name="email" required class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mt-2">
                <label class="block text-sm font-medium text-gray-600">password</label>
                <input type="password" name="password" required class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="mt-2">
                <label class="block text-sm font-medium text-gray-600">Confirm password</label>
                <input type="password" name="password" required class="w-full p-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" class="w-full mt-4 p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">S'inscrire</button>
        </form>
        <p class="mt-3 text-center text-sm text-gray-600">Déjà un compte ? <a href="/login" class="text-blue-500">Se connecter</a></p>
    </div>
</body>
</html>
