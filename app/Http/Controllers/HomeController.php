<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth')
        ];
    }
    public function __invoke()
    {
        //Obetener a quieres seguimos
        //pluck retorna el dato que pides y el resto lo descarta
        $idDeSeguidores = Auth::user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $idDeSeguidores)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
