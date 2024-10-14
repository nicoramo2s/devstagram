<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // leemos la Imagen subida y la convertimos a 1000x1000px
        $imagenServidor = ImageManager::gd()->read($imagen);;
        $imagenServidor->cover(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json([
            'imagen' => $nombreImagen,
        ]);
    }
}
