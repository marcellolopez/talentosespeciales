@extends('empresa.profile.layout')

@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Crear postulación</h5>

              <!-- Multi Columns Form -->
              <form id="postulacion" class="row g-3" method="POST" action="/empresa/createPostulation">
                @csrf
                <input id="descripcion" name="descripcion" type="hidden">
                <div class="col-md-6">
                  <label for="" class="form-label">Título</label>
                  <input type="text" class="form-control {{($errors->first('titulo') ? ' is-invalid' : '')}} {{(old('titulo') ? ' is-valid' : '')}}" id="titulo" name="titulo" value="{{old('titulo')}}">
                  @if($errors->first('titulo'))
                  <div class="invalid-feedback">
                    {{$errors->first('titulo')}}
                  </div>
                  @endif
                </div>

                <div class="col-md-6">
                  <label for="" class="form-label">Tipo de contrato</label>
                  <select id="tipo_contrato_id" name="tipo_contrato_id" class="form-select {{($errors->first('tipo_contrato_id') ? ' is-invalid' : '')}} {{(old('tipo_contrato_id') ? ' is-valid' : '')}}">
                    <option value="">Seleccione</option>
                    @foreach($tipos_contrato as $tipo_contrato)   
                      <option value="{{$tipo_contrato->id}}" {{$tipo_contrato->id == old('tipo_contrato_id') ? 'selected' : ''}}>{{$tipo_contrato->tipo_contrato}}</option>
                    @endforeach
                  </select>
                  @if($errors->first('tipo_contrato_id'))
                  <div class="invalid-feedback">
                    {{$errors->first('tipo_contrato_id')}}
                  </div>
                  @endif                  
                </div> 

                <div class="col-md-6">
                  <label for="" class="form-label">Tipo de jornada</label>
                  <select id="tipo_jornada_id" name="tipo_jornada_id" class="form-select {{($errors->first('tipo_jornada_id') ? ' is-invalid' : '')}} {{(old('tipo_jornada_id') ? ' is-valid' : '')}}">
                    <option value="">Seleccione</option>
                    @foreach($tipos_jornada as $tipo_jornada)   
                      <option value="{{$tipo_jornada->id}}" {{$tipo_jornada->id == old('tipo_jornada_id') ? 'selected' : ''}}>{{$tipo_jornada->tipo_jornada}}</option>
                    @endforeach
                  </select>
                  @if($errors->first('tipo_jornada_id'))
                  <div class="invalid-feedback">
                    {{$errors->first('tipo_jornada_id')}}
                  </div>
                  @endif                  
                </div> 
                <div class="col-md-6">
                  <label for="" class="form-label">Forma de trabajo</label>
                  <select id="forma_trabajo_id" name="forma_trabajo_id" class="form-select {{($errors->first('forma_trabajo_id') ? ' is-invalid' : '')}} {{(old('forma_trabajo_id') ? ' is-valid' : '')}}">
                    <option value="">Seleccione</option>
                    @foreach($formas_trabajo as $forma_trabajo)   
                      <option value="{{$forma_trabajo->id}}" {{$forma_trabajo->id == old('forma_trabajo_id') ? 'selected' : ''}}>{{$forma_trabajo->forma_trabajo}}</option>
                    @endforeach
                  </select>
                  @if($errors->first('forma_trabajo_id'))
                  <div class="invalid-feedback">
                    {{$errors->first('forma_trabajo_id')}}
                  </div>
                  @endif                  
                </div>                
                <div class="col-md-12" >
                  <label for="" class="form-label">Descripción</label>
                  <div class="card-body">
                    <!-- Quill Editor Default -->
                    <div  class="quill-editor-default form-control descripcion {{($errors->first('descripcion') ? ' is-invalid' : '')}} {{(old('descripcion') ? ' is-valid' : '')}}" style="height: 300px;" >
                      {!!old('descripcion')!!}
                    </div>
                    @if($errors->first('descripcion'))
                    <div class="invalid-feedback">
                      {{$errors->first('descripcion')}}
                    </div>
                    @endif                      
                    <!-- End Quill Editor Default -->
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Fecha de inicio</label>
                  <input type="date" class="form-control {{($errors->first('fecha_inicio') ? ' is-invalid' : '')}} {{(old('fecha_inicio') ? ' is-valid' : '')}}" id="fecha_inicio" name="fecha_inicio" value="{{old('fecha_inicio')}}">
                  @if($errors->first('fecha_inicio'))
                    <div class="invalid-feedback">
                      {{$errors->first('fecha_inicio')}}
                    </div>
                  @endif 
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Fecha de término</label>
                  <input type="date" class="form-control {{($errors->first('fecha_termino') ? ' is-invalid' : '')}} {{(old('fecha_termino') ? ' is-valid' : '')}}" id="fecha_termino" name="fecha_termino" value="{{old('fecha_termino')}}">
                  @if($errors->first('fecha_termino'))
                    <div class="invalid-feedback">
                      {{$errors->first('fecha_termino')}}
                    </div>
                  @endif 
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
  <script>
    $("#postulacion").on("submit",function() {
      $("#descripcion").val($(".ql-editor").html());
    })
  </script>
@endsection