<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://unpkg.com/tailwindcss@1.0.4/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon -->

    <!-- style -->

</head>
<body>
    <div class="w-full h-screen">
        <header class="bg-teal-400">
          <nav class="flex justify-between w-full bg-purple-500 text-white p-4">
            <a href="/dashboard"><span class="font-semibold text-xl tracking-tight">Menu principal</span></a>
              <div class="md:items-center md:w-auto flex">
                <div class="md:flex hidden">
                  
                </div>
                <div class="flex text-sm" v-else>
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ route('usuarios.index') }}" class="text-sm text-gray-700 underline">usuarios</a>
                                <a href="{{ route('documentos.index') }}" class="text-sm text-gray-700 underline">documentos</a>
                            @else
                                <a href="{{ route('login') }}" class="p-2 ml-2 bg-white text-teal-500 font-semibold leading-none border border-gray-100 rounded hover:border-transparent hover:bg-gray-100">Iniciar sesión</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="p-2 ml-2 bg-teal-500 text-gray-100 font-semibold leading-none border border-teal-600 rounded hover:border-transparent hover:bg-teal-600">Registrarse</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
              </div>
          </nav>
        </header>
        <main class="flex justify-center items-center">

          @yield('content')

        </main>
        <div class="bottomNav fixed bottom-0 w-full">
          <nav style="border:1px solid blue" class="md:hidden bottom-0 w-full bg-gray-700 text-xs">
            <ul class="flex justify-around items-center text-white text-center opacity-75 text-lg font-bold">
              <li class="p-4 hover:bg-gray-500">
                
              </li>
            </ul>
          </nav>
        </div>
      </div>
      @include('sweetalert::alert')
</body>
</html>