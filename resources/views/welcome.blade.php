<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ mix('/js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
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
                        <h2 class="m-2">Las mejores empresas del pais</h2> 
                    @if (!$companies){
                        <label for='exampleFormControlTextarea1'>No existen empresas</label>
                    @else
                        @foreach ($companies as $com)
                            <div class='card mb-2'>
                                <div class='card-header'>
                                <h5 class='card-title'>{{$com->comname}}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Puntuación empresarial : {{$com->comtot}} de 5</h6>
                                </div>                                 
                                <div class='card-body'>                         
                                <p class='card-text mb-auto'>{{$com->comdes}}</p>
                                <a href='/empresa/{{$com->comid}}'; class='card-link'>Leer los comentarios de la empresa</a>
                                </div>
                            </div>
                         @endforeach   
                    @endif
                    <h2 class="m-2">Las Peores empresas del pais</h2> 
                    @if (!$companiesbad){
                        <label for='exampleFormControlTextarea1'>No existen empresas</label>
                    @else
                        @foreach ($companiesbad as $combad)
                            <div class='card mb-2'>
                                <div class='card-header'>
                                <h5 class='card-title'>{{$combad->comname}}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Puntuación empresarial : {{$combad->comtot}} de 5</h6>
                                </div>                                 
                                <div class='card-body'>                         
                                <p class='card-text mb-auto'>{{$combad->comdes}}</p>
                                <a href='/empresa/{{$combad->comid}}'; class='card-link'>Leer los comentarios de la empresa</a>
                                </div>
                            </div>
                         @endforeach   
                    @endif
                    </div>
                    <div class="col-md-6">
                        <h2 class="m-2">Buscador</h2>
                            <form action="/buscador" method="POST">                                         
                                 @csrf
                                <input class="form-control mb-2" type="text" placeholder="Buscar" name="buscar">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>
                            </p> O prueba la busqueda avanzada por filtros</p>
                            <a href="/buscador" class="btn btn-primary mb-3">Filtros de búsqueda</a>
                     
                        @if (!$companieslast){
                            <label for='exampleFormControlTextarea1'>No existen empresas</label>
                        @else
                            @foreach ($companieslast as $comlast)
                                <div class='card mb-2'>
                                    <div class='card-header'>
                                    <h5 class='card-title'>{{$comlast->comname}}</h5>
                                    <h6 class='card-subtitle mb-2 text-muted'>Puntuación empresarial : {{$comlast->comtot}} de 5</h6>
                                    </div>                                 
                                    <div class='card-body'>                         
                                    <p class='card-text mb-auto'>{{$comlast->comdes}}</p>
                                    <a href='/empresa/{{$comlast->comid}}'; class='card-link'>Leer los comentarios de la empresa</a>
                                    </div>
                                </div>
                                @endforeach   
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <h1>Sistet Project</h1>
            <small class="d-block mb-3 text-muted">© 2022</small>
          </div>
          <div class="col-12 col-md">
            <h5>About Sistet Project</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="https://www.um.es/aroseproject/objetives/">Objectives</a></li>
              <li><a class="text-muted" href="https://www.um.es/aroseproject/partners/">Partners</a></li>
              <li><a class="text-muted" href="https://www.um.es/aroseproject/contact/">Contact</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    </body>
</html>
