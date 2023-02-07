@extends('empresa.profile.layout')

@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$postulacion->titulo}}</h5>

              <!-- Multi Columns Form -->
              <form id="postulacion" class="row g-3" method="POST" action="empresa/createPostulation">
                <div class="col-md-6">
                  <label for="" class="form-label">Fecha de inicio</label>
                  <p>
                    {{$postulacion->fecha_inicio}}
                  </p>
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Fecha de término</label>
                  <p>
                    {{$postulacion->fecha_termino}}
                  </p>
                </div>                


              </form><!-- End Multi Columns Form -->

            </div>
          </div>
          <div class="card">
            <div class="card-body m-4">
                <div class="col-md-12">
                  {!! $postulacion->descripcion !!}
                </div>              
            </div>
          </div>
          

        </div>


      </div>
    </section>
@endsection

@section('jsScripts')
  @include('js.js_getComunas')
  <script>
    $("#postulacion").on("submit",function() {
      $("#descripcion").val($(".ql-editor").html());
    })


  </script>
@endsection