<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I miei Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Elenco dei Post</h1>
            <a href="/posts/create" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                + Nuovo Post
            </a>
        </div>

        @if($posts->isEmpty())
            <p class="text-gray-500">Non ci sono ancora post. Creane uno!</p>
        @else
            <div class="space-y-4">
                @foreach ($posts as $post)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold text-blue-600">{{ $post->title }}</h2>
                        <p class="text-gray-700 mt-2">{{ $post->body }}</p>
                        <div class="text-sm text-gray-400 mt-4">
                            Creato il: {{ $post->created_at->format('d/m/Y H:i') }}
                        </div>
                        <div class="text-end"><a href="/posts/{{ $post->id }}/edit">✏️ Modifica</a></div>
                    </div>
                    <form action="/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Sicuro?')">
                        @csrf
                        @method('DELETE') <!-- Questo "finge" una richiesta DELETE che il browser non supporterebbe -->
                        <button type="submit" class="text-red-500 underline">Elimina</button>
                    </form>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
