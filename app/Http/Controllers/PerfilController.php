<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class PerfilController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required', "unique:users,username," . Auth::user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil,instagram,devstagram,meta,microsoft']
        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            // leemos la Imagen subida y la convertimos a 1000x1000px
            $imagenServidor = ImageManager::gd()->read($imagen);;
            $imagenServidor->cover(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        // guardar cambios
        $usuario = User::find(Auth::user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? Auth::user()->imagen ?? null;

        $usuario->save();

        //redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }
}
