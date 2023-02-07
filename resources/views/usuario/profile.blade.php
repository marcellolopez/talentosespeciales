@extends('usuario.profile.layout')
@section('titulo', 'Mis datos')
@section('item-raiz', 'Perfil')
@section('item-titulo', 'Mis datos')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mis datos</h5>

              @if(session()->has('warning'))
                  <div class="alert alert-warning alert-dismissible fade show">
                      <strong> <i class="bi bi-exclamation-triangle"></i> </strong>  {{ session()->get('warning') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
              <!-- Multi Columns Form -->
              <form method="POST" action="/usuario/profile" class="row g-3">
                @csrf
                <div class="col-md-6">
                  <label for="" class="form-label">Nombres</label>

                  {{ Form::text('nombres', $user->nombres, ['id' => 'nombres', 'class' => ($errors->has('nombres') ? 'form-control is-invalid' : 'form-control'), 'regexp' => "^[^0-9]+$"]) }}
                  @if($errors->first('nombres'))
                  <div class="invalid-feedback">
                    {{$errors->first('nombres')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-3">
                  <label for="" class="form-label">Apellido Paterno</label>
                  {{ Form::text('apellido_paterno', $user->apellido_paterno, ['id' => 'apellido_paterno', 'class' => ($errors->has('apellido_paterno') ? 'form-control is-invalid' : 'form-control'), 'regexp' => "^[^0-9]+$"]) }}
                  @if($errors->first('apellido_paterno'))
                  <div class="invalid-feedback">
                    {{$errors->first('apellido_paterno')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-3">
                  <label for="" class="form-label">Apellido Paterno</label>
                  {{ Form::text('apellido_materno', $user->apellido_materno, ['id' => 'apellido_materno', 'class' => ($errors->has('apellido_materno') ? 'form-control is-invalid' : 'form-control'), 'regexp' => "^[^0-9]+$"]) }}
                  @if($errors->first('apellido_materno'))
                  <div class="invalid-feedback">
                    {{$errors->first('apellido_materno')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Fecha de nacimiento</label>
                  {{ Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['id' => 'fecha_nacimiento', 'class' => ($errors->has('fecha_nacimiento') ? 'form-control is-invalid' : 'form-control')]) }}
                  @if($errors->first('fecha_nacimiento'))
                  <div class="invalid-feedback">
                    {{$errors->first('fecha_nacimiento')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Email</label>
                  {{ Form::email('email', $user->email, ['id' => 'email', 'class' => ($errors->has('email') ? 'form-control is-invalid' : 'form-control'), 'readonly' => 'true']) }}
                  @if($errors->first('email'))
                  <div class="invalid-feedback">
                    {{$errors->first('email')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-4">
                  <label for="inputAddress5" class="form-label">Número de contacto</label>
                  <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">+56</span>
                      {{ Form::text('telefono', $user->telefono, ['id' => 'telefono', 'class' => ($errors->has('telefono') ? 'form-control is-invalid' : 'form-control'), 'regexp' => "^[^0-9]+$", 'regexp' => "[0-9]{0,9}"]) }}
                      @if($errors->first('telefono'))
                      <div class="invalid-feedback">
                        {{$errors->first('telefono')}}
                      </div>
                      @endif                      
                    </div>
                </div>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label">Dirección</label>
                  {{ Form::text('direccion', $user->direccion, ['id' => 'direccion', 'class' => ($errors->has('direccion') ? 'form-control is-invalid' : 'form-control')]) }}
                  @if($errors->first('direccion'))
                  <div class="invalid-feedback">
                    {{$errors->first('direccion')}}
                  </div>
                  @endif
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Región</label>
                  {{ Form::select('region', $regiones, $user->region_id,['id' => 'region', 'class' => ($errors->has('region') ? 'form-control is-invalid regiones' : 'form-control regiones'), 'regexp' => "^[^0-9]+$", 'placeholder' => 'Seleccione una región']) }}
                  @if($errors->first('region'))
                  <div class="invalid-feedback">
                    {{$errors->first('region')}}
                  </div>
                  @endif                    
 
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Comúna</label>
                  @if(isset($comunas))
                    {{ Form::select('comuna', $comunas, $user->comuna_id,['id' => 'comuna', 'class' => ($errors->has('comuna') ? 'comunas form-control is-invalid' : 'comunas form-control'), 'regexp' => "^[^0-9]+$", 'placeholder' => 'Seleccione una región', 'disabled' => 'disabled']) }}
                    @if($errors->first('comuna'))
                    <div class="invalid-feedback">
                      {{$errors->first('comuna')}}
                    </div>
                    @endif 
                  @else
                    {{ Form::select('comuna', $comunas, $user->comuna_id,['id' => 'comuna', 'class' => ($errors->has('comuna') ? 'comunas form-control is-invalid' : 'comunas form-control'), 'regexp' => "^[^0-9]+$", 'placeholder' => 'Seleccione una región', 'disabled' => 'disabled']) }}
                    @if($errors->first('comuna'))
                    <div class="invalid-feedback">
                      {{$errors->first('comuna')}}
                    </div>
                    @endif                   
                  @endif
                </div>
                <div class="col-10 offset-1 center-block mt-4">
                  <div class="form-check text-center">
                    <input class="form-check-input " type="checkbox" id="gridCheck">
                    <label class="form-check-label " for="gridCheck">
                      Deseo compartir mis datos con <a href="">talentosespeciales.cl</a> para que las empresas me encuentren
                    </label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>


      </div>
    </section>
@endsection

@section('jsScripts')
  @include('js.js_getComunas')
@endsection