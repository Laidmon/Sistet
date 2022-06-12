@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if (Auth::user()->rol == 'admin')
                <div class="card-header">
                    <h1>ADMINISTRACION</h1>
                </div>
                @foreach ($comments as $comt)
                    <div class='card m-2'><div class='card-header'><h5 class='card-title'>
                    {{$comt->title}}
                    </h5>     
                    <h6 class='card-subtitle mb-2 text-muted'>   
                    {{$comt->comments }}    
                    </h6></div>                                 
                    <div class='card-body'><h6 class='card-subtitle mb-2 text-muted'>  
                    Sueldo:
                    @if ($comt->salarie == 0)
                        <span class='fa fa-star'></span>
                    @else
                        @for ($i=0; $i<$comt->salarie ;$i++)
                        <span class='fa fa-star checked'></span>
                        @endfor
                    @endif   
                    Equidad:
                    @if ($comt->equality == 0)
                    <span class='fa fa-star'></span>
                    @else
                        @for ($i=0; $i<$comt->equality ;$i++)
                        <span class='fa fa-star checked'></span>
                        @endfor
                    @endif   
                    Valoracion:
                    @if ($comt->value == 0){ 
                        <span class='fa fa-star'></span>
                    @else
                        @for ($i=0; $i<$comt->value ;$i++)
                        <span class='fa fa-star checked'></span> 
                        @endfor                           
                    <p class='card-text mb-auto'>      
                    @endif                        
                    {{ $comt->comdes}}
                    </p></div>   
                    <a class="btn btn-danger mt-2" href="/borrar/{{$comt->id}}">Borrar</a>
                    <a class="btn btn-success mt-2" href="/validar/{{$comt->id}}/{{$comt->idcomp}}">Validar</a>
                </div>
                @endforeach        
                
                <div class="d-flex justify-content-center">                    
                {{ $comments->render() }}  
                </div>  
            @else
            <div class="card-header">
                    <h1>ADMINISTRACION</h1>
                    <h2>NO DEBERÍAS ESTAR AQUÍ</h2>
            </div>
            @endif
            <a type="button" href="{{ url('/') }}" class="btn btn-primary"> Volver a la portada</a>
        </div>
    </div>
</div>
</div>
@endsection
