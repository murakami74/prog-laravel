<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Scrivi un nuovo post</h1>

        <form action="/posts" method="POST" class="space-y-4">
            @csrf <!-- Fondamentale per la sicurezza! -->

            <div>
                <label class="block text-sm font-medium text-gray-700">Titolo</label>
                <input type="text" name="title" required 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Contenuto</label>
                <textarea name="body" rows="4" required 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="/posts" class="text-gray-600 hover:underline text-sm">Indietro</a>
                <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                    Pubblica Post
                </button>
            </div>
        </form>
    </div>

</body>
</html>
