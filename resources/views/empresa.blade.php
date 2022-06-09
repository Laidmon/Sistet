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
                <?php
                    foreach ($comments as $comt){
                        echo "<div class='card m-2'><div class='card-header'><h5 class='card-title'>";
                        echo $comt->title;
                        echo "</h5>";     
                        echo "<h6 class='card-subtitle mb-2 text-muted'>";     
                        echo $comt->comments;     
                        echo "</h6></div> ";                                 
                        echo "<div class='card-body'><h6 class='card-subtitle mb-2 text-muted'>";   
                        echo "Sueldo:";
                        if ($comt->salarie == 0){ 
                            echo "<span class='fa fa-star'></span>";
                        }
                        else{
                            for ($i=0; $i<$comt->salarie ;$i++){
                                echo "<span class='fa fa-star checked'></span>";
                            }
                        }   
                        echo "Equidad:";
                        if ($comt->equality == 0){ 
                            echo "<span class='fa fa-star'></span>";
                        }
                        else{
                            for ($i=0; $i<$comt->equality ;$i++){
                                echo "<span class='fa fa-star checked'></span>";
                            }
                        }    
                        echo "Valoracion:";
                        if ($comt->value == 0){ 
                            echo "<span class='fa fa-star'></span>";
                        }
                        else{
                            for ($i=0; $i<$comt->value ;$i++){
                                echo "<span class='fa fa-star checked'></span>";
                            }
                        }                            
                        echo "<p class='card-text mb-auto'>";                              
                        echo $comt->comdes;                  
                        echo "</p></div></div>";   
                    } 
                ?>
                <div class="d-flex justify-content-center">                    
                {{ $comments->links() }}  
                </div>          
            <a type="button" href="{{ url('/') }}" class="btn btn-primary"> Volver a la portada</a>
        </div>
    </div>
</div>
</div>
@endsection
