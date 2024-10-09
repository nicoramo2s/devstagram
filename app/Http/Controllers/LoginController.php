<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // request->remember crea una token cokie y lo guarda en la base de datos del usuario
        if (!Auth::attempt($request->only('email','password'), $request->remember)) {
            return back()->with('mensaje', 'Email o password incorrectos');
        }

        return redirect()->route('posts.index');
    }
}
