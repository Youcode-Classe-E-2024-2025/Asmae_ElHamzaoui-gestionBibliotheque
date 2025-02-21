<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestion des Livres</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white">

    <!-- Barre de navigation -->
    <nav class="bg-gray-800 shadow-md p-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-playfair font-bold text-blue-900">Haven</a>
            <div class="flex space-x-6">
                <a href="#livres" class="text-gray-300 hover:text-white transition">Livres</a>
                <a href="#utilisateurs" class="text-gray-300 hover:text-white transition">Utilisateurs</a>
                <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition">
                    + Ajouter un Livre
                </button>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="max-w-6xl mx-auto mt-6">

        <!-- Section des Livres -->
        <section id="livres">
            <!-- Affichage des livres -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    @if ($book->photo)
                    <img src="{{ asset('storage/' . $book->photo) }}" alt="Couverture du livre" class="w-full h-40 object-cover">
                    @else
                    <div class="w-full h-40 bg-gray-600 flex items-center justify-center text-gray-300">Pas d'image</div>
                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-white">{{ $book->title }}</h3>
                        <p class="text-gray-400 text-sm">Auteur: <span class="font-medium">{{ $book->author }}</span></p>
                        <p class="text-gray-400 text-sm">Genre: <span class="font-medium">{{ $book->genre }}</span></p>
                        <p class="text-gray-400 text-sm">Stock: <span class="font-medium">{{ $book->stock }}</span></p>

                        <div class="mt-4 flex space-x-2">
                            <a href="#"onclick="openEditModal({{ $book->id }}, '{{ $book->title }}', '{{ $book->author }}', '{{ $book->genre }}', '{{ $book->stock }}', '{{ asset('storage/' . $book->photo) }}')" 
                                class="bg-blue-500 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-300 transition">
                                Modifier
                            </a>

                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-900 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-300 transition">Supprimer</button>
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
        </section>       
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-gray-800 p-6 rounded-2xl shadow-lg w-96">
            <h2 id="modal-title" class="text-xl font-semibold mb-4">Ajouter un livre</h2>
            <form id="book-form" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" id="method-field">
                <input type="hidden" name="book_id" id="book-id">

                <input type="text" name="title" id="book-title" placeholder="Titre" class="w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required />
                <input type="text" name="author" id="book-author" placeholder="Auteur" class="w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required />
                <input type="text" name="genre" id="book-genre" placeholder="Genre" class="w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required />
                <input type="file" name="photo" id="book-photo" class="w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white" />
                <input type="number" name="stock" id="book-stock" placeholder="Stock" class="w-full p-2 bg-gray-700 border border-gray-600 rounded-lg text-white" required />

               

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Annuler</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script pour le modal -->
    <script>
        function openModal() {
            document.getElementById("modal-title").innerText = "Ajouter un livre";
            document.getElementById("book-form").action = "/books";
            document.getElementById("method-field").value = "";
            document.getElementById("book-id").value = "";
            document.getElementById("book-title").value = "";
            document.getElementById("book-author").value = "";
            document.getElementById("book-genre").value = "";
            document.getElementById("book-stock").value = "";
            document.getElementById("book-photo").required = true;

            document.getElementById("preview-container").classList.add("hidden");

            document.getElementById("modal").classList.remove("hidden");
        }

        function openEditModal(id, title, author, genre, stock, photoUrl) {
            document.getElementById("modal-title").innerText = "Modifier un livre";
            document.getElementById("book-form").action = "/books/" + id;
            document.getElementById("method-field").value = "PUT";
            document.getElementById("book-id").value = id;

            document.getElementById("book-title").value = title;
            document.getElementById("book-author").value = author;
            document.getElementById("book-genre").value = genre;
            document.getElementById("book-stock").value = stock;
            document.getElementById("book-photo").required = false;
            document.getElementById("modal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
        }
    </script>
</body>

</html>
