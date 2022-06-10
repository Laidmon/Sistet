@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h1 class="display-4">{{ __('Buscador avanzado') }}</h1></div>

                <div class="card-body">
                <div class="container"><div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                     <p class="lead">
                        Busca por nombre o filtra tú búsqueda para encontrar los resultados más exactos</p>
                    </div> 
                    <div class="row">
                        <aside class="col-lg-4 col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h6>Opciones de búsqueda:</h6> 
                                    <form action="busqueda" method="POST" class="fom-inline mt-2 mt-md-0">
                                        <input type="hidden" name="_token" value=""> 
                                        <input type="text" placeholder="Buscar" aria-label="Search" name="search" class="form-control mr-sm-2"> 
                                        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Buscar por Nombre</button>
                                    </form>
                                </li>
                                <li class="list-group-item"><a href="/resources/">Limpiar todos los filtros</a></li> 
                                <li class="list-group-item"><h6>Filtrar por provincia:</h6>  
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Elige Una...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </li>  
                                <li class="list-group-item"><h6>Filtrar por Municipio:</h6>  
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Elige Uno...</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </li> 
                                <li class="list-group-item">
                                            <h6>Filtrar por valoraciones</h6> 
                                            <div class="list-group-item">
                                                    <label>Sueldo:</label>
                                                    <div class="row">
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star "></span>
                                                        </a> 
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                    </div>  
                                                </div>
                                                <div class="list-group-item">
                                                    <label>Inclusiva:</label>
                                                    <div class="row">
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star "></span>
                                                        </a> 
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                    </div>  
                                                </div>
                                                <div class="list-group-item">
                                                    <label>Recomendada:</label>
                                                    <div class="row">
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star "></span>
                                                        </a> 
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                        </a>
                                                        <a href="/search/filter/XX/0">
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
                                                 <div class="d-flex justify-content-center">

                                                 </div> 
                                                 <div class="row">
                                                     <div role="alert" class="col-md-12 alert alert-dark">
                                                Filtrado por Provincia: <strong>Murcia</strong>. <a href="/resources/">Limpiar el filtro</a></div> 
                                                <div role="alert" class="col-md-12 alert alert-dark">
                                                Filtrado por Sueldo: 
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span><a href="/resources/">Limpiar el filtro</a></div> 
                                                        </div>
                                             
                                                        <div class="row">        
                                                    @if (!$companies)
                                                        <label for='exampleFormControlTextarea1'>No existen empresas</label>
                                                    @else
                                                        @foreach ($companies as $com)
                                                            <div class='card mb-2'><div class='card-header'>
                                                                <h5 class='card-title'>{{$com->comname}}</h5>     
                                                                <h6 class='card-subtitle mb-2 text-muted'>{{$com->comtot}}</h6>
                                                            </div>                               
                                                            <div class='card-body'>
                                                                <h6 class='card-subtitle mb-2 text-muted'>{{$com->comtot}} </h6>                         
                                                            <p class='card-text mb-auto'>{{ $com->comdes }}</p>
                                                            <a href="/empresa/{{$com->comid}}" class='card-link'>Leer los comentarios de la empresa</a></div></div>   
                                                        @endforeach    
                                                        {{$companies -> render()}}                                                    
                                                    @endif

                                                    </div>
                                                    </section>
        </div>
    </div>
</div>
</div>

@endsection
