<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        // Creando la publicacion en la base de datos
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => Auth::user()->id
        ]);

        // Otra forma de crear registros
        // $post = new Post();
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = Auth::user()->id;
        // $post->save();

        // Otra forma de crear una publicacion atravez de la relacion creada con el metodo
        // $request->user()->posts()->create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => Auth::user()->id
        // ]);



        return redirect()->route('posts.index', Auth::user()->username);
    }
}
