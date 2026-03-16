<x-app-layout>
    {{-- Questo slot name="header" mette il titolo nella barra grigia di Breeze --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Elenco dei Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Qui inizia il tuo codice originale, ma pulito --}}
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800 italic">I miei Post</h1>
                    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                        + Nuovo Post
                    </a>
                </div>

                @if($posts->isEmpty())
                    <p class="text-gray-500 text-center">Non ci sono ancora post. Creane uno!</p>
                @else
                    <div class="space-y-4">
                        @foreach ($posts as $post)
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h2 class="text-xl font-semibold text-blue-600">{{ $post->title }}</h2>
                                <p class="text-gray-700 mt-2">{{ $post->body }}</p>
                                
                                <div class="flex justify-between items-center mt-4">
                                    <span class="text-xs text-gray-400">
                                        Creato il: {{ $post->created_at->format('d/m/Y H:i') }}
                                    </span>
                                    <span class="text-gray-400 italic">Scritto da: {{ $post->user->name }}</span>
                                    
                                    <div class="flex space-x-4 items-center">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-600 hover:underline">✏️ Modifica</a>
                                        
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Sicuro?')">
                                            @csrf
                                            @method('DELETE')
                                             <button type="submit" class="text-red-500 hover:underline ms-4">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- Fine del tuo codice --}}

            </div>
        </div>
    </div>
</x-app-layout>
