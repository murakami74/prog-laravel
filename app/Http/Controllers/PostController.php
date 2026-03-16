<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 

class PostController extends Controller
{
    public function index(){
        // 1. Recupera tutti i post dal database usando il Model
        $posts = \App\Models\Post::all();

        // 2. Passa i dati alla View 'posts.index' (il file resources/views/posts/index.blade.php)
        return view('posts.index', compact('posts'));
    }
    public function create() {
        return view('posts.create');
    }
    public function store(Request $request)  {
        // Se la validazione fallisce, Laravel reindirizza al form con gli errori
        $request->validate([
            'title' => 'required|min:5|max:100',
            'body'  => 'required|min:10',
        ], [
            'title.required' => 'Ehi, hai dimenticato il titolo!',
            'title.min' => 'Il titolo deve avere almeno 5 caratteri.',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'body'  => $request->body,
        ]);

        return redirect('/posts')->with('success', 'Post creato con successo!');
    }
    public function destroy($id) {
        $post = \App\Models\Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');
    }

    

}
