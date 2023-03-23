@extends('empresa.profile.layout')

@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mis datos</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-4">
                  <label for="" class="form-label">Rut de la empresa</label>
                  <input type="text" class="form-control" id="rut" name="rut" value="{{old('rut', $user->rut)}}">
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Razón social</label>
                  <input type="text" class="form-control" id="contacto" name="contacto" value="{{old('contacto', $user->contacto)}}">
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Nombre de contacto</label>
                  <input type="text" class="form-control" id="contacto" name="contacto" value="{{old('contacto', $user->contacto)}}">
                </div>                
                <div class="col-12">
                  <label for="" class="form-label">Descripción</label>
                  <textarea class="form-control" id="message" type="text" id="descripcion" name="descripcion"value="{{old('descripcion', $user->descripcion)}}" style="height: 10rem" data-sb-validations="required"></textarea>
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
                <div class="col-md-4">
                  <label for="inputAddress5" class="form-label">Número de contacto</label>
                  <div class="input-group mb-3">
                      <span class="input-group-text" id="basic-addon1">+569</span>
                      <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" id="celular" name="celular" value="{{old('celular', $user->celular)}}">
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