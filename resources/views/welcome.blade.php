<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
        .checked {
        color: orange;
        }
        </style>

    </head>
    <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">     
                 <div class="fixed top-0 left-0">
                    <h1>Sistet</h1>
                </div>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </nav>
        
        <main class="container">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                    <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">¿Qué tal te ha ido con la empresa?</h1>
                    <p class="lead my-3">Esta es la pregunta que muchas veces nos hacen y que nos dá miedo contestar. Ahora podrás dar tu opinión completamente anónima acerca de esa empresa que te trató mal en algún momento o con la que hayas tenido la mejor experiencia de tu vida.</p>                    
                    <h2 class="display-4 fst-italic">¿Empezamos?</h2>
                    <form action="select">
                        <button type="submit" class="btn btn-primary">Escribe tu comentario</button>
                    </form>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            
                             <h2 class="mb-0">Las mejores empresas del pais</h2>
                            <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">Puntuación</strong>
                            <h3 class="mb-0">Empresa 1</h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">blablabla...</p>
                            <a href="#" class="stretched-link">Leer el comentario completo</a>
                            </div>
                            
                            
                            <h2 class="mb-0">Las Peores empresas del pais</h2>
                            <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">Puntuación</strong>
                            <h3 class="mb-0">Empresa 1</h3>
                            <div class="mb-1 text-muted">Nov 12</div>
                            <p class="card-text mb-auto">blablabla...</p>
                            <a href="#" class="stretched-link">Leer el comentario completo</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                            <h2 class="mb-0">Busca la empresa</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
