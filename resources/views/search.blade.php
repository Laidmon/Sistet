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
                        Filtra búsqueda para encontrar los resultados más exactos</p>
                    </div> 
                    <div class="row">
                        <aside class="col-lg-4 col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h6>Opciones de búsqueda:</h6> 
                                    <form action="busqueda" method="POST" class="fom-inline mt-2 mt-md-0">
                                        <input type="hidden" name="_token" value=""> 
                                        <input type="text" placeholder="Buscar" aria-label="Search" name="search" class="form-control mr-sm-2"> 
                                        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Buscar</button></form></li>
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
                                            <div class="form-group">
                    <label>Sueldo:</label>
                    <div class="inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="salarie" id="salarie" value="0">
                            <label class="form-check-label" for="salarie">
                                <span class="fa fa-star "></span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="salarie" id="salarie" value="1">
                            <label class="form-check-label" for="salarie">
                                <span class="fa fa-star checked"></span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="salarie" id="salarie" value="2">
                            <label class="form-check-label" for="salarie">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="salarie" id="salarie" value="3">
                            <label class="form-check-label" for="salarie">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="salarie" id="salarie" value="4">
                            <label class="form-check-label" for="salarie">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </label>
                        </div> 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="salarie" id="salarie" value="5">
                            <label class="form-check-label" for="salarie">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </label>
                        </div>  
                    </div>  
                </div>
                <div class="form-group">
                    <label>Inclusiva:</label>
                    <div class="inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="equal" id="equal" value="0">
                            <label class="form-check-label" for="equal">
                                <span class="fa fa-star "></span>
                            </label>
                        </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="equal" id="equal" value="1">
                        <label class="form-check-label" for="equal">
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="equal" id="equal" value="2">
                        <label class="form-check-label" for="equal">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="equal" id="equal" value="3">
                        <label class="form-check-label" for="equal">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="equal" id="equal" value="4">
                        <label class="form-check-label" for="equal">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="equal" id="equal" value="5">
                        <label class="form-check-label" for="equal">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Recomendada:</label>
                    <div class="inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="values" id="values" value="0">
                            <label class="form-check-label" for="values">
                                <span class="fa fa-star "></span>
                            </label>
                        </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="values" id="values" value="1">
                        <label class="form-check-label" for="values">
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="values" id="values" value="2">
                        <label class="form-check-label" for="values">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="values" id="values" value="3">
                        <label class="form-check-label" for="values">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="values" id="values" value="4">
                        <label class="form-check-label" for="values">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="values" id="values" value="5">
                        <label class="form-check-label" for="values">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </label>
                    </div>
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
                                <span class="fa fa-star checked"></span>. <<a href="/resources/">Limpiar el filtro</a></div> 
        </div>
    </div>
</div>
</div>

@endsection
