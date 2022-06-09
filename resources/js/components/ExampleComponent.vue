<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                     <label for='exampleFormControlTextarea1'>Nombre de la empresa</label>
                     <select v-model="selected">
                        <option disabled value="">Seleccione un elemento</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        </select>
                        <span>Seleccionado: {{ selected }}</span>
                     <button type='submit' class='btn btn-primary'>Crea comentario</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
