@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo empresa') }}</div>

                <div class="card-body">
            <form>
                <input class="form-control form-control-lg mb-2" type="text" placeholder="Nombre de la empresa" >
                <input class="form-control form-control-lg mb-1" type="text" placeholder="Ciudad">
                <input class="form-control form-control-lg mb-1" type="text" placeholder="Localidad">
                <div class="form-group mb-2">
                    <label for="exampleFormControlTextarea1">Tipo de empresa</label>
                    <select class="form-control form-control-lg mb-2">
                         <option>Carnica de mierda</option>
                         <option>Carnica de mierda2</option>
                    </select>
                    <input class="form-control form-control-lg" type="text" placeholder="Otro...">
                </div>
                <div class="form-group mb-2">
                    <label for="exampleFormControlTextarea1">Describe esa empresa</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Nueva empresa</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
