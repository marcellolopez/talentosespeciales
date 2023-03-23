@extends('usuario.profile.layout')
@section('titulo', 'Educación')
@section('item-raiz', 'Experiencia')
@section('item-titulo', 'Laboral')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title">
                  <div class="float-start m-2">
                    Experiencia laboral
                  </div>
                  <div class="float-end mr-2">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalAgregarExperiencia">Agregar experiencia</button>
                  </div>
                </h5>
                @if(session()->has('warning'))
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong> <i class="bi bi-exclamation-triangle"></i> </strong>  {{ session()->get('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
              </div>
              <div class="row">
                @forelse ($laboral as $l)
                <div class="alert" role="alert">
                  <h4 class="alert-heading">{{$l->cargo}}</h4>
                  <h5 class="text-muted">{{$l->empresa}}</h5>
                  <p>{{$l->fechaInicio()}} - {{$l->trabajo_actual == 0 ? $l->fechaTermino() : 'Trabajo aquí actualmente'}}</p>
                  
                  <p class="mb-0">{{$l->descripcion}}</p>
                  <hr>
                </div>
                @empty
                    <p class="bg-danger text-white p-3 ">No tiene experiencias laborales creadas.</p>
                @endforelse
              </div>


            </div>
          </div>

        </div>

      </div>
    </section>
    @include('modals/agregarExperienciaLaboral')
@endsection

@section('jsScripts')
<script>
  $('#trabajo_actual').change(function() {
    $('#fecha_termino').prop("disabled", this.checked);
  });
</script>
@endsection