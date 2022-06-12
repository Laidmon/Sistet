@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="display-4">{{ __('Buscador avanzado') }}</h1>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="pricing-header text-center">
                        <p class="lead">Busca por nombre o filtra tú búsqueda para encontrar los resultados más exactos</p>
                        </div> 
                        <div class="row">
                            <aside class="col-lg-4 col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <h6>Opciones de búsqueda:</h6>
                                        <form action="/buscador" method="GET">                                         
                                            @csrf
                                            <input class="form-control mb-2" type="text" placeholder="Buscar" name="buscar">
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </form>
                                    </li>
                                    <li class="list-group-item"><h6>Filtrar por provincia:</h6>                                
                                        <form action="/buscador" method="GET">  
                                        @csrf   
                                        <select class="form-control form-control-lg  mb-1" name="buscar" id="prov">
                                            <option selected>Elija una provincia.</option>
                                            @foreach($provinces as $prov)
                                            <option value="{{$prov->title}}">{{$prov->title}}</option>
                                            @endforeach
                                        </select>                                
                                        <button class="btn btn-primary" type="submit">Filtrar por provincia</button>
                                    </form>    
                                    </li>  
                                    <li class="list-group-item"><h6>Filtrar por localidad:</h6>                                
                                        <form action="/buscador" method="GET">  
                                        @csrf                                           
                                        <select class="form-control form-control-lg  mb-1" name="buscar" id="locat">
                                        </select>                                 
                                        <button class="btn btn-primary" type="submit">Filtrar por localidad</button>
                                    </form>   
                                    </li> 
                                    <li class="list-group-item">
                                    <h6>Filtrar por valoración</h6> 
                                    <div class="list-group-item">
                                            <div class="row">
                                                <a href="/buscador/valoracion/0">
                                                    <span class="fa fa-star "></span>
                                                </a> 
                                                <a href="/buscador/valoracion/1">
                                                    <span class="fa fa-star checked"></span>
                                                </a>
                                                <a href="/buscador/valoracion/2">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </a>
                                                <a href="/buscador/valoracion/3">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </a>
                                                <a href="/buscador/valoracion/4">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </a>
                                                <a href="/buscador/valoracion/5">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </a>
                                            </div>  
                                        </div>
                                    </li>
                                </ul>
                            </aside> 
                            <section class="col-lg-8 col-md-6">                                
                                <label>Resultados:</label>
                                @if (!$companies->count())
                                    <label for='exampleFormControlTextarea1'>No existen empresas que coincidan con la busqueda</label>
                                @else    
                                    <form action ="/buscador/ordenas/{{$search}}" method="get">
                                        <button type="submit" class="btn btn-outline-dark btn-sm m-1">Orden ascendente.</button>
                                    </form>           
                                    <form action ="/buscador/ordendes/{{$search}}" method="get">
                                        <button type="submit" class="btn btn-outline-dark btn-sm m-1">Orden descendente.</button>
                                    </form> 
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
                                {{$companies -> render()}} 
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
