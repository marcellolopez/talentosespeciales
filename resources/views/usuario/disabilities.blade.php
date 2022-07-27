@extends('usuario.profile.layout')
@section('titulo', 'Mis capacidades')
@section('item-raiz', 'Perfil')
@section('item-titulo', 'Capacidades')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                @foreach($tipo_discapacidad as $tipo)
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading{{$tipo->id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$tipo->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                      <h5 >{{$tipo->tipo}}</h5>
                    </button>
                    </h2>
                    <div id="flush-collapse{{$tipo->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$tipo->id}}" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">                      
                          @foreach($array_preguntas[$tipo->id] as $pregunta)
                            <p>{{$pregunta['pregunta']}}</p>
                            <div class="col-sm-10 mb-2">
                              @foreach($array_respuestas[$pregunta['tipo_respuesta_id']] as $respuestas)
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$pregunta['pregunta']}}" id="{{$pregunta['pregunta']}}" value="{{$respuestas['id']}}">
                                <label class="form-check-label" for="1">
                                  {{$respuestas['respuesta']}}
                                </label>
                              </div>
                              @endforeach
                            </div>
                          @endforeach
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>  
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection