@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Selecciona la empresa') }}</div>

                <div class="card-body">
                <div id="app">sfdsdfg
                   <example-component></example-component>
                </div>
            <form action="seleccionar">
                <?php                
                    echo "<div class='form-group mb-2'>";
                    if (!$companies->count()){
                        echo "<label for='exampleFormControlTextarea1'>No existen empresas</label>";
                    }else{
                        echo "<label for='exampleFormControlTextarea1'>Nombre de la empresa</label>";
                        echo "<select class='form-control form-control-lg mb-1'>";
                        foreach ($companies as $com){
                            echo "<option>";
                            echo $com->name;
                            echo "</option>";        
                        }    
                        echo "</select>";
                        echo "<label for='exampleFormControlTextarea1 mb-1'>Descripción</label>";
                        echo "<textarea class='form-control' id='exampleFormControlTextarea1' rows='3' readonly></textarea>";
                        echo "</div>";                
                        echo "<button type='submit' class='btn btn-primary'>Crea comentario</button>";  
                    }                                          
                ?>
            </form>    
            <form action="crearem">
            <button type="submit" class="btn btn-primary mt-2">Crea empresa</button>
            </form>  
            </div>
        </div>
    </div>
</div>
</div>

@endsection
