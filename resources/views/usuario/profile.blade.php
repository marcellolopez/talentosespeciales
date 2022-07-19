@extends('usuario.profile.layout')

@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mis datos</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-6">
                  <label for="" class="form-label">Nombres</label>
                  <input type="text" class="form-control" id="nombres" name="nombres" value="{{old('nombres', $user->nombres)}}">
                </div>
                <div class="col-md-3">
                  <label for="" class="form-label">Apellido Paterno</label>
                  <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{old('apellido_paterno', $user->apellido_paterno)}}">
                </div>
                <div class="col-md-3">
                  <label for="" class="form-label">Apellido Paterno</label>
                  <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno', $user->apellido_materno)}}">
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Fecha de nacimiento</label>
                  <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" value="{{old('fecha_nacimiento', $user->fechaNacimiento())}}">
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
                </div>
                <div class="col-md-4">
                  <label for="inputAddress5" class="form-label">Número de contacto</label>
                  <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">+56</span>
                      <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="telefono" name="telefono" value="{{old('telefono', $user->telefono)}}">
                    </div>
                </div>
                <div class="col-12">
                  <label for="inputAddress2" class="form-label">Dirección</label>
                  <input type="text" class="form-control"  placeholder="" id="direccion" name="direccion"value="{{old('direccion', $user->direccion)}}">
                </div>
                <div class="col-md-6">
                  <label for="inputCity" class="form-label">Región</label>
                  <select id="region" name="region" class="form-select regiones">
                    @foreach($regiones as $region)
                    <option value="{{$region->region_id}}">{{$region->region_nombre}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="inputState" class="form-label">Comúna</label>
                  <select id="comuna" name="comuna" class="form-select comunas">
                    <option selected></option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
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