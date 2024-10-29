@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection
@section('contenido')
    <x-listar-post :posts="$posts">
        <x-slot:columnas>2</x-slot:columnas>
    </x-listar-post>
@endsection
