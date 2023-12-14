<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title>Veterinaria Luspy @yield('titulo')</title>
</head>
<body class="bg-grayWhite">
    <header class="p-5 border-b bg-white shadow ">
        
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{route('home')}}" class="text-3xl font-black"> Veterinaria Luspy</a>
            @auth
            <nav class="flex gap-2 items-center">
                <p class="font-bold uppercase text-gray-600 text-sm">Bienvenido: {{auth()->user()->name}}</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold
                    w-full p-3 text-white rounded-lg"> Logout</button>
                </form>
            </nav>
            @endauth
            @guest
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Registrar nuevo empleado</a>
                    <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                </nav>
            @endguest
        </div>
    </header>

    
    <main>
        <h2 class="flex justify-center font-bold uppercase text-gray-600 text-4xl mt-10">@yield('titulo')</h2>
        @yield('contenido')

    </main>
    

</body>
</html>