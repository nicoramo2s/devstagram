<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user,Post $post)
    {
        // validar
        $request->validate([
            'comentario'=> 'required|max:150'
        ]);
        // almacenar resultado
        Comentario::create([
            'user_id'=> Auth::user()->id,
            'post_id'=> $post->id,
            'comentario'=> $request->comentario
        ]);
        // imprimir un mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente');
    }
}
