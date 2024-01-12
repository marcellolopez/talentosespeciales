<script>
// Cargar cuando la página se cargó completamente

$(document).ready(function() {
    
    @if(isset($user->comuna_id))
        ajaxCargarComunas({{$user->comuna_id}});
    @endif

    $("#region").change(function(){
        ajaxCargarComunas();
    })
});


 
 


// Función ajax cargar comúnas 
function ajaxCargarComunas(idComuna = null) {
    $.ajax({
        type: "GET",
        url:'{{ url("getComunas") }}',
        data: {'region': $("#region").val()},
        success: function (response) {
            $('.comunas').empty();
            $('.comunas').append('<option value="x">Seleccione su comuna</option>')
            console.log(response);
            $.each(response,function(id, data) {
                if(data['comuna_id'] != idComuna){
                    $('.comunas').append($("<option></option>").attr("value",data['comuna_id']).text(data['comuna_nombre'])).prop( "disabled", false );
                }else{
                    $('.comunas').append($("<option></option>").attr("value",data['comuna_id']).attr("selected","selected").text(data['comuna_nombre'])).prop( "disabled", false );
                }
            });
            

        },
        error: function (data) {
            console.log('Error:', data);
            $('.comunas').empty();
            $('.comunas').append('<option value="x">Seleccione su comuna</option>')
        }
    });    
}
</script>