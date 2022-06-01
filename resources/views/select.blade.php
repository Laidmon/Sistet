@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selecciona la empresa') }}</div>

                <div class="card-body">
            <form>
                <div class="form-group mb-2">
                    <label for="exampleFormControlTextarea1">Nombre de la empresa</label>
                    <select class="form-control form-control-lg mb-1">
                         <option>Carnica de mierda</option>
                         <option>Carnica de mierda2</option>
                    </select>
                    <label for="exampleFormControlTextarea1 mb-1">Descripción</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem harum qui eos consequuntur modi id sed quia excepturi esse omnis, expedita repellendus aliquid incidunt, natus dolores doloribus corporis nam mollitia.</textarea>
                </div>                
                <button type="submit" class="btn btn-primary">Crea comentario</button>
            </form>    
            <button type="submit" class="btn btn-primary mt-2">Crea empresa</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
