@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selecciona la empresa') }}</div>
                <div class="card-body">
            <form action="seleccionar">             
                    <div class='form-group mb-2'>
                    @if (!$companies->count())
                        <label for='exampleFormControlTextarea1'>No existen empresas</label>
                    @else
                        <label for='exampleFormControlTextarea1'>Nombre de la empresa</label>
                        <select class='form-control form-control-lg mb-1' id="prov">
                        @foreach ($companies as $com)
                            <option value="{{$com->id}}">{{$com->name}}</option>        
                        @endforeach    
                        </select>
                        <label for='exampleFormControlTextarea1 mb-1'>Descripción</label>
                        <textarea id="descrip" class='form-control' id='exampleFormControlTextarea1' rows='3' readonly></textarea>
                        </div>                
                        <button type='submit' class='btn btn-primary'>Crea comentario</button>
                    @endif  
            </form>
            <form action="nuevaemp">
            <button type="submit" class="btn btn-primary mt-2">Crea empresa</button>
            </form>  
            </div>
        </div>
    </div>
</div>
</div>

@endsection
