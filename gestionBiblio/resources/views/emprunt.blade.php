<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Affichage des alertes -->
     @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

 
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
                       <!-- Formulaire pour emprunter un livre -->
                       <form action="{{ route('loans.store') }}" method="POST">
                           @csrf
                           <input type="hidden" name="book_id" value="{{ $book->id }}">
                           <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded-md text-sm hover:bg-yellow-600 transition">
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
