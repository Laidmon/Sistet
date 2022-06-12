@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Nueva empresa') }}</div>

                <div class="card-body">
            <form action ="insertaremp" method="get">
                <h3>Nombre de la empresa</h3>
                <input class="form-control form-control-lg mb-3" type="text" name='namep'  id='namep' placeholder="Nombre de la empresa" >
                <h3 for="exampleFormControlTextarea1">Provincia</h3>                
                <select class="form-control form-control-lg mb-3" name="prov" id="prov">
                    <option selected>Elija una provincia.</option>
                    @foreach($provinces as $prov)
                    <option value="{{$prov->title}}">{{$prov->title}}</option>
                    @endforeach
                </select>
                <h3>Localidad</h3>  
                <select class="form-control form-control-lg  mb-1" name="locat" id="locat">
                </select>     

                <h4 for="exampleFormControlTextarea1">Nueva Localidad</h4> 
                <input class="form-control form-control-lg mb-3" name="newlocat" id="newlocat" type="text" placeholder="Escribe aquí la nueva Localidad">

                <h3>Tipo de empresa</h3>       
                <select class="form-control form-control-lg mb-1" name="type" id="type" >  
                    <option value="" disabled selected>Elija un tipo de empresa existente</option>
                    @foreach($types as $typ)
                    <option value="{{$typ->type}}">{{$typ->type}}</option>
                    @endforeach
                </select>                    
                <h4 for="exampleFormControlTextarea1">Nuevo tipo</h4> 
                <input class="form-control form-control-lg mb-3" name="newtype" id="newtype" type="text" placeholder="Escribe aquí el nuevo tipo de empresa">
                <div class="form-group mb-3">
                <h3>Describe esa empresa</h3>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="descrip" id="descrip" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Da de alta la empresa y publica su primer comentario.</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
