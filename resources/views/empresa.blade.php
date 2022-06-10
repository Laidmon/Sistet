@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>                    
                    <?php
                        foreach ($companies as $com){
                        echo $com->name;  
                        }                 
                    ?>        
                    </h1>
                </div>
                <div class="card-body">                                        
                <?php
                    foreach ($companies as $com){                        
                    echo "<h5 class='card-title'>";
                    echo $com->type;  
                    echo "</h5>";     
                    echo "<h6 class='card-subtitle mb-2'>";  
                    echo $com->city;     
                    echo "</h6>";     
                    echo "<h6 class='card-subtitle mb-2'>";  
                    echo $com->location;     
                    echo "</h6>";       
                    echo "<p class='card-subtitle mb-2'>";                      
                    echo $com->description;                         
                    echo "</p>"; 
                    }                 
                ?>  
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
                        </p></div></div>   
                    @endforeach
                <div class="d-flex justify-content-center">                    
                {{ $comments->render() }}  
                </div>          
            <a type="button" href="{{ url('/') }}" class="btn btn-primary"> Volver a la portada</a>
        </div>
    </div>
</div>
</div>
@endsection
