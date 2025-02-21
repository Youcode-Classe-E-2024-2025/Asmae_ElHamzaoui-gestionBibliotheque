<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haven</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Définition du background en plein écran */
        .hero {
    background: linear-gradient(to right, rgba(30, 58, 138, 0.7), rgba(29, 9, 88, 0.5)), 
                url("{{ asset('images/book.png') }}") no-repeat center center;
    background-size: cover;
    height: 100vh;
    position: relative;
}

        /* Overlay pour améliorer la lisibilité du texte */
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Assombrit l'image pour un meilleur contraste */
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="font-roboto">

    <!-- Header (Fixé en haut) -->
    <header class="bg-white shadow-lg fixed w-full z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-playfair font-bold text-blue-900">Haven</a>
            <nav class="space-x-6">
                <a href="/" class="text-blue-900 hover:text-indigo-400">Accueil</a>
                <a href="/login" class="text-blue-900 hover:text-indigo-600">Connexion</a>
                <a href="/signup" class="text-blue-900 hover:text-indigo-600">Inscription</a>
            </nav>
        </div>
    </header>

    <!-- Section Hero avec arrière-plan -->
    <section class="hero flex items-center justify-center text-white text-center">
        <div class="hero-content">
            <h1 class="text-6xl font-playfair font-bold mb-4">Bienvenue à la Bibliothèque</h1>
            <p class="text-xl mb-8">Découvrez un monde de connaissances et d'aventures.</p>
            <a href="#about" class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-all">
                Explorer
            </a>
        </div>
    </section>

    <!-- Section À Propos -->
    <section id="about" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('images/books.png') }}" alt="Bibliothèque" class="rounded-lg shadow-lg">
                </div>
                <div>
                    <h2 class="text-blue-900 text-4xl font-playfair font-bold mb-6">À propos de nous</h2>
                    <p class="text-gray-600 mb-6">
                        Notre bibliothèque offre une vaste collection de livres, magazines et ressources numériques pour tous les âges. Que vous soyez un passionné de littérature, un étudiant ou un chercheur, vous trouverez ici ce qu'il vous faut.
                    </p>
                    <a href="/signup" class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition-all">Rejoignez-nous</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-700 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="mb-4">&copy; {{ date('Y') }} Bibliothèque. Tous droits réservés.</p>
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-white">Mentions légales</a>
                <a href="#" class="text-gray-400 hover:text-white">Politique de confidentialité</a>
            </div>
        </div>
    </footer>

</body>
</html>
