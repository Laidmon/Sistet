@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php
                    $usuario = Auth::user();
var_dump ($usuario);

                    ?>

                    <div class="form-row">
                        <div class="form-group">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="{{ Auth::user()->name }}" readonly>
                    </div>

                    <div class="card m-4"> 
                        <div class="card-header">{{ __('Cambiar contraseña') }}</div>                      
                        <div class="card-body">  
                            <form>
                                <div class="form-row">                            
                                    <div class="form-group">
                                        <label for="inputPassword4">Contraseña actual</label>
                                        <input type="password" class="form-control" id="inputPassword4">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4">Nueva contraseña</label>
                                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4">Confirma la nueva contraseña</label>
                                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Actualizar contraseña</button>
                            </form>
                        </div>                            
                    </div>                    
                    <button type="submit" class="btn btn-primary mt-2">Log out</button>
                                        
                    <button type="submit" class="btn btn-primary mt-2">Administrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
