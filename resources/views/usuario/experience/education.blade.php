@extends('usuario.profile.layout')
@section('titulo', 'Educación')
@section('item-raiz', 'Experiencia')
@section('item-titulo', 'Educación')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <h5 class="card-title">
                  <div class="float-start m-2">
                    Experiencia educacional
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
                @forelse ($educacion as $e)
                <div class="alert border-dark" role="alert">
                  <h4 class="alert-heading">{{$e->titulo}}</h4>
                  @if($e->grado != null)
                  <h6>Grado {{$e->grado->grado}}</h6>
                  @endif
                  <h5 class="text-muted">{{$e->institucion_educativa}}</h5>
                  <p>{{$e->fechaInicio()}} - {{$e->fechaTermino()}}</p>
                  <hr>
                  <p class="mb-0">{{$e->descripcion}}</p>
                  
                </div>
                @empty
                    <p class="bg-danger text-white p-3 ">No tiene experiencias educacionales creadas.</p>
                @endforelse
              </div>


            </div>
          </div>

        </div>

      </div>
    </section>
    @include('modals/agregarExperiencia')
@endsection

@section('jsScripts')

@endsection