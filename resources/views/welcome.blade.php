<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistet</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ mix('/js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


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
                <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                            </a>
                            <a href="{{ url('/home') }}" class="dropdown-item">Home</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                            </form>
                            </div>
                            </div>
                        @endguest
                    </ul>
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
                        <h2 class="m-2">Las mejores empresas del país</h2> 
                    @if (!$companies)
                        <label for='exampleFormControlTextarea1'>No existen empresas</label>
                    @else
                        @foreach ($companies as $com)
                            <div class='card mb-2'>
                                <div class='card-header'>
                                <h5 class='card-title'>{{$com->name}}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Puntuación empresarial : {{$com->total}} de 5</h6>
                                </div>                                 
                                <div class='card-body'>                         
                                <p class='card-text mb-auto'>{{$com->description}}</p>
                                <a href='/empresa/{{$com->id}}'; class='card-link'>Leer los comentarios de la empresa</a>
                                </div>
                            </div>
                         @endforeach   
                    @endif
                    <h2 class="m-2">Las peores empresas del país</h2> 
                    @if (!$companiesbad)
                        <label for='exampleFormControlTextarea1'>No existen empresas</label>
                    @else
                        @foreach ($companiesbad as $combad)
                            <div class='card mb-2'>
                                <div class='card-header'>
                                <h5 class='card-title'>{{$combad->name}}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Puntuación empresarial : {{$combad->total}} de 5</h6>
                                </div>                                 
                                <div class='card-body'>                         
                                <p class='card-text mb-auto'>{{$combad->description}}</p>
                                <a href='/empresa/{{$combad->id}}'; class='card-link'>Leer los comentarios de la empresa</a>
                                </div>
                            </div>
                         @endforeach   
                    @endif
                    </div>
                    <div class="col-md-6">
                        <h2 class="m-2">Buscador</h2>
                            <form action="/buscador" method="GET">                                         
                                 @csrf
                                <input class="form-control mb-2" type="text" placeholder="Buscar" name="buscar">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </form>
                            </p> O prueba la busqueda avanzada por filtros</p>
                            <form action="/buscador" method="GET">                                           
                                    @csrf
                                <input class="d-none" type="text" placeholder="Buscar" name="buscar">
                                <button class="btn btn-primary mb-4" type="submit">Filtros de búsqueda</button>
                            </form>
                        
                        <h2 class="m-2">Últimas empresas dadas de alta</h2> 
                        @if (!$companieslast)
                            <label for='exampleFormControlTextarea1'>No existen empresas</label>
                        @else
                            @foreach ($companieslast as $comlast)
                            <div class='card mb-2'>
                                <div class='card-header'>
                                <h5 class='card-title'>{{$comlast->name}}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>Puntuación empresarial : {{$comlast->total}} de 5</h6>
                                </div>                                 
                                <div class='card-body'>                         
                                <p class='card-text mb-auto'>{{$comlast->description}}</p>
                                <a href='/empresa/{{$comlast->id}}'; class='card-link'>Leer los comentarios de la empresa</a>
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
            <h5>Sobre Sistet</h5>
            <small class="d-block mb-3">Trabajo Fin de Grado Realizado por José Moreno Navarro</small>
          </div>
        </div>
      </footer>
    </div>
    </body>
</html>
