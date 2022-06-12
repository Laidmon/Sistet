@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Comentario') }}</div>

                <div class="card-body">
            <form action ="insertar" method="get">
                @foreach ($companies as $com)
                <input class="form-control form-control-lg mb-2" type="text" name='comname' id='conmame' placeholder="{{$com->name}}" readonly>
                <input class="d-none" type="number" name='comid'  id='comid' value="{{$com->id}}" readonly>
                @endforeach                
                <input class="d-none" type="number" name='usid'  id='usid' value="{{ Auth::user()->id }}" readonly>
                <h3>Título del comentario</h3> 
                <input class="form-control form-control-lg mb-1" type="text" name='comTitle'  id='comTitle' placeholder="Escribe el título">
                <div class="form-group">
                    <label>¿Qué tal es el sueldo?</label>
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
                    <label>¿Es una empresa inclusiva?</label>
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
                    <label>¿Recomendarías esa empresa?</label>
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
                <div class="form-group">
                    <h3>Comenta qué tal la empresa</h3>
                    <textarea class="form-control" name="comment" id="comment" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Publica el comentario</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
