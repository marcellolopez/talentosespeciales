@extends('usuario.profile.layout')
@section('titulo', 'Lista de empleos')
@section('item-raiz', 'Postulaciones')
@section('item-titulo', 'Empleos')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body" style="max-height: 470px">
              <div class="row mt-2 mb-2">
              <div class="col-md-4 overflow-auto " style="max-height: 400px">
                <div class="list-group">
                  @foreach ($postulaciones as $key => $postulacion)
                  
                  <a class="list-group-item list-group-item-action postulacion" href="javascript:void(0)" onclick="ajaxViewPostulation({{$postulacion->id}})">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{ $postulacion->titulo }}</h5>
                      <small class="text-muted">{{$postulacion->fechaPublicacion()}}</small>
                    </div>  
                    <p class="mb-1">Some placeholder content in a paragraph.</p>
                    <small>And some small print.</small>
                  </a>
                  @endforeach
                </div>
                <div class="text-center mt-4">
                  {{ $postulaciones->links() }}
                </div>
              </div>
              <div class="col-md-8  align-self-center loading d-none" style="max-height: 400px;">
                <div class="d-flex justify-content-center  ">
                  <div class="spinner-border" style="width: 6rem; height: 6rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                </div>                
              </div>
              <div class="col-md-8 overflow-auto " style="max-height: 400px;">

                <div class="verPostulacion m-4">
                </div>                
              </div>  
              </div>
              <div class="col-md-12">
        
              
      
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@section('jsScripts')
<script>
    $( document ).ready(function() {
        $('body').addClass('toggle-sidebar');
        $('.postulacion:first').click();
    });
  function ajaxViewPostulation($id){
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{asset('/usuario/ajaxViewPostulation')}}",
        method: "POST",
        data: {'id': $id, "_token": "{{ csrf_token() }}"},
        dataType: 'JSON',
        beforeSend: function() {
        // setting a timeout
        $('.verPostulacion').html('');
        $('.loading').removeClass('d-none');
        },
        success: function(data){
            if(data.status == '200'){
                $('.loading').addClass('d-none');
                $('.verPostulacion').html(data.descripcion);
            }
            else{
            }
        }
    })
  };

  $('.postulacion').click(function(){
    $('.postulacion').removeClass('active');
    $(this).addClass('active');
  });

</script>
@endsection