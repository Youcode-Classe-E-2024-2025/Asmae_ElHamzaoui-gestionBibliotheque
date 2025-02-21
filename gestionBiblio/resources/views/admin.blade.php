<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestion des Livres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Barre de navigation -->
    <nav class="bg-white shadow-md p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-700">📚 Book Dashboard</h1>
            <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">
                + Ajouter un Livre
            </button>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="max-w-6xl mx-auto mt-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">📖 Liste des Livres</h2>

        <!-- Affichage des livres -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($books as $book)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if ($book->photo)
                        <img src="{{ asset('storage/' . $book->photo) }}" alt="Couverture du livre" class="w-full h-40 object-cover">
                    @else
                        <div class="w-full h-40 bg-gray-300 flex items-center justify-center text-gray-500">Pas d'image</div>
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h3>
                        <p class="text-gray-600 text-sm">Auteur: <span class="font-medium">{{ $book->author }}</span></p>
                        <p class="text-gray-600 text-sm">Genre: <span class="font-medium">{{ $book->genre }}</span></p>
                        <p class="text-gray-600 text-sm">Stock: <span class="font-medium">{{ $book->stock }}</span></p>

                        <div class="mt-4 flex space-x-2">
                        <a href="#" onclick="openEditModal({{ $book->id }}, '{{ $book->title }}', '{{ $book->author }}', '{{ $book->genre }}', '{{ $book->stock }}', '{{ asset('storage/' . $book->photo) }}')" 
                             class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm hover:bg-yellow-600 transition">
                             Modifier
                        </a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600 transition">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Message si aucun livre -->
        @if ($books->isEmpty())
            <p class="text-center text-gray-500 mt-6">Aucun livre trouvé. Ajoutez un nouveau livre !</p>
        @endif
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-2xl shadow-lg w-96">
            <h2 id="modal-title" class="text-xl font-semibold mb-4">Ajouter un livre</h2>
            <form id="book-form" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" id="method-field">
                <input type="hidden" name="book_id" id="book-id">
                
                <input type="text" name="title" id="book-title" placeholder="Titre" class="w-full p-2 border rounded-lg" required />
                <input type="text" name="author" id="book-author" placeholder="Auteur" class="w-full p-2 border rounded-lg" required />
                <input type="text" name="genre" id="book-genre" placeholder="Genre" class="w-full p-2 border rounded-lg" required />
                <input type="file" name="photo" id="book-photo" class="w-full p-2 border rounded-lg" />
                <input type="number" name="stock" id="book-stock" placeholder="Stock" class="w-full p-2 border rounded-lg" required />
                
                <div id="preview-container" class="hidden">
                    <img id="preview-image" class="w-full h-40 object-cover mt-2">
                </div>
                
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded-lg">Annuler</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>

   


</body>


</html>
