@extends('layout.layout')
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
                <div class="col-md-8 overflow-auto viewPostulacion" style="max-height: 400px;">
                  <div class="row">
                  <div class=" col-md-2 text-center m-4">
                    <i class="bi bi-clock"></i> <label class="verTipoJornada" for=""></label>
                  </div>
                  <div class=" col-md-2 text-center m-4">
                    <i class="bi bi-file-text"></i> <label class="verTipoContrato" for=""></label>
                  </div>
                  <div class=" col-md-2 text-center m-4">
                    <i class="bi bi-person-workspace"></i> <label class="verFormaTrabajo" for=""></label>
                  </div>                  
                  </div>
                  <div class="verDescripcion m-4"></div>                
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
        url: "{{'/usuario/ajaxViewPostulation'}}",
        method: "POST",
        data: {'id': $id, "_token": "{{ csrf_token() }}"},
        dataType: 'JSON',
        beforeSend: function() {
        // setting a timeout
        $('.verDescripcion').html('');
        $('.verTipoContrato').html('');
        $('.verTipoJornada').html('');
        $('.loading').removeClass('d-none');
        $('.viewPostulacion').hide();
        },
        success: function(data){
            if(data.status == '200'){
                $('.loading').addClass('d-none');

                $('.verDescripcion').html(data.postulacion.descripcion);
                $('.verTipoContrato').html(data.postulacion.tipo_contrato);
                $('.verTipoJornada').html(data.postulacion.tipo_jornada);
                $('.verFormaTrabajo').html(data.postulacion.forma_trabajo);
                $('.viewPostulacion').show();
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