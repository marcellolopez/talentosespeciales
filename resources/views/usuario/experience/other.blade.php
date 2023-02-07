@extends('usuario.profile.layout')
@section('titulo', 'Otras experiencias')
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
                    Otras experiencias
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
                @forelse ($otras as $o)
                <div class="alert border-dark {{$o->trabajo_actual == 1 ? '' : 'border-0'}}" role="alert">
                  <h4 class="alert-heading">{{$o->nombre}}</h4>
                  <h5 class="text-muted">{{$o->institucion}}</h5>
                  <p>{{$o->fechaInicio()}} - {{$o->fechaTermino()}}</p>
                  <hr>
                  <p class="mb-0">{{$o->descripcion}}</p>
                  
                </div>
                @empty
                    <p class="bg-danger text-white p-3 ">No tiene experiencias creadas.</p>
                @endforelse
              </div>


            </div>
          </div>

        </div>

      </div>
    </section>
    @include('modals/agregarOtrasExperiencias')
@endsection

@section('jsScripts')
@endsection