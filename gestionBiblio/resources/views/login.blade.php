<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, rgba(19, 41, 95, 0.63), rgba(29, 9, 88, 0.43)), 
            url("{{ asset('images/book.png') }}") no-repeat center center;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }

        .water-droplets {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://www.transparenttextures.com/patterns/nautical.png'); /* Texture gouttes d'eau */
            pointer-events: none;
            opacity: 0.5;
        }

        .form-container {
            background-color: rgba(17, 7, 62, 0.44); /* Cadre transparent */
        }

        .input-field {
            background-color: rgba(225, 206, 206, 0.49); /* Champ transparent bleu marine */
            color: white;
            border: 1px solid rgba(0, 0, 128, 0.5); /* Bordure bleu marine semi-transparente */
        }

        .input-field:focus {
            border-color: rgba(0, 0, 128, 1); /* Bordure plus marquée au focus */
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 128, 0.7);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 rounded-lg shadow-md z-10 relative form-container">
        <h2 class="text-2xl font-semibold text-center text-white">Connexion</h2>
        <form action="/login" method="POST" class="mt-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-white">Email</label>
                <input type="email" name="email" required class="w-full p-2 mt-1 rounded-lg input-field">
            </div>
            <div class="mt-2">
                <label class="block text-sm font-medium text-white">Mot de passe</label>
                <input type="password" name="password" required class="w-full p-2 mt-1 rounded-lg input-field">
            </div>
            <button type="submit" class="w-full mt-4 p-2 text-white rounded-lg" style="background-color:rgba(225, 206, 206, 0.81);">Se connecter</button>
        </form>

        <p class="mt-3 text-center text-sm text-white">Pas encore inscrit ? <a href="/signup" class="text-orange-400">Créer un compte</a></p>
    </div>

    <!-- Gouttes d'eau -->
    <div class="water-droplets"></div>
</body>
</html>
