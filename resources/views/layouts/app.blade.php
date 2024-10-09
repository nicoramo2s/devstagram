<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Devstagram - @yield('titulo')</title>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/">
                <h1 class="text-3xl font-black">Devstagram</h1>
            </a>

            @auth
                <nav class="flex items-center space-x-4">
                    <a class="font-bold text-gray-600 text-sm">Hola: <span
                            class="font-normal">{{ auth()->user()->username }}</span></a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm"
                            href="{{ route('register') }}">
                            Cerrar Sesion
                        </button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="space-x-4">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login') }}">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('register') }}">Crear Cuenta</a>
                </nav>
            @endguest
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center items-center text-3xl mb-10">@yield('titulo')</h2>

        @yield('contenido')
    </main>

    <footer class="p-5 text-center text-gray-500 font-bold uppercase">Todos los derechos reservados {{ now()->year }}
    </footer>
</body>

</html>
