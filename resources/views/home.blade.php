@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Usuario:') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="{{ Auth::user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Nombre</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="{{ Auth::user()->name }}" readonly>
                    </div>               
                    
                    <a class="btn btn-primary mt-2" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                        
                    @if (Auth::user()->rol == 'admin')
                    <form action ="administrar">
                        <button type="submit" class="btn btn-primary mt-2">Administrar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
