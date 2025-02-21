<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, rgba(30, 58, 138, 0.7), rgba(29, 9, 88, 0.5)), 
            url("{{ asset('images/book.png') }}") no-repeat center center;            background-size: cover; /* Couvrir toute la zone */
            background-position: center center; /* Centrer l'image */
            background-attachment: fixed; /* Fixer l'image en arrière-plan lors du défilement */
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color:rgb(255, 255, 255); /* Bleu marine */
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            height: 40px; /* Logo taille ajustée */
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .profile img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .btn-logout {
            background-color: rgb(25, 13, 86); /* Bouton déconnexion rouge */
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-logout:hover {
            background-color: rgb(45, 45, 87);
        }

        .alert {
            background-color: rgba(255, 255, 255, 0.75); /* Fond semi-transparent */
            color: #333;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;
        }

        .alert-danger {
            background-color: rgba(255, 99, 71, 0.75); /* Rouge clair pour erreur */
            color: white;
        }

        .alert-success {
            background-color: rgba(34, 139, 34, 0.75); /* Vert pour succès */
            color: white;
        }

        .alert button {
            background: none;
            border: none;
            color: inherit;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .alert button:hover {
            color: #ccc;
        }

        .book-card {
            background-color: rgb(255, 255, 255); /* Cadre transparent */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .book-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .book-card .p-4 {
            padding: 16px;
        }

        .book-card h3 {
            color:rgb(10, 28, 77) ;
        }

        .book-card p {
            color: #ddd;
            font-size: 0.875rem;
        }

        .btn {
            background-color: rgb(25, 13, 86); /* Jaune orangé */
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.875rem;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: rgb(45, 44, 57);
        }
    </style>
</head>
<body>
    <!-- En-tête -->
    <div class="header">
        <div class="logo">
        <a href="#" class="text-2xl font-playfair font-bold text-blue-900">Haven</a>
        </div>
        <div class="profile">
            <img src="{{ asset('images/profile.jpg') }}" alt="Profile Image">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Log out</button>
            </form>
        </div>
    </div>

    <!-- Affichage des alertes -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" aria-label="Close">&times;</button>
        </div>
    @elseif(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" aria-label="Close">&times;</button>
        </div>
    @endif

    <!-- Affichage des livres -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
        @foreach ($books as $book)
            <div class="book-card">
                @if ($book->photo)
                    <img src="{{ asset('storage/' . $book->photo) }}" alt="Couverture du livre">
                @else
                    <div class="w-full h-40 bg-gray-300 flex items-center justify-center text-gray-500">Pas d'image</div>
                @endif

                <div class="p-4">
                    <h3 class="text-lg font-semibold text-center">{{ $book->title }}</h3>
                    <div class="mt-4 text-center">
                        <!-- Formulaire pour emprunter un livre -->
                        <form action="{{ route('loans.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="btn">
                                Emprunter
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
