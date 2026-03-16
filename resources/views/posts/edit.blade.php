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
            <h1 class="text-3xl font-bold text-gray-800">Modifica il post {{ $post->id }}</h1>
            
        </div>

        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT') <!-- Fondamentale per l'aggiornamento -->

            <input type="text" name="title" value="{{ $post->title }}" required>
            <br><br>
            <textarea style="width:100%;height:400px" name="body" required>{{ $post->body }}</textarea>
            <br><br>
            <button type="submit">Aggiorna Post</button>
        </form>
    </div>

</body>
</html>
