@extends('empresa.profile.layout')

@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">             
              <div class="col-lg-12 mt-2">
              <table class="table postulationList display compac" style="width:100%">
                  <thead>
                      <tr>
                          <th>Título</th>
                          <th>Forma de trabajo</th>
                          <th>Fecha de inicio</th>
                          <th>Fecha de Término</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>   
              </div>           
            </div>
          </div>        
        </div>
      </div>
    </section>
@endsection

@section('jsScripts')
  @include('js.js_getComunas')
  <script type="text/javascript">
    $(function () {

      var table = $('.postulationList').DataTable({
          processing: true,
          serverSide: true,
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
          },
          ajax: "{{ route('/empresa/viewPostulationListTable') }}",
          columns: [
              {data: 'titulo', name: 'titulo'},
              {data: 'forma_trabajo', name: 'forma_trabajo'},
              {data: 'fecha_inicio', name: 'fecha_inicio'},
              {data: 'fecha_termino', name: 'fecha_termino'},
              {
                  data: 'action', 
                  name: 'action', 
                  orderable: true, 
                  searchable: true
              },
          ]
      });

    });
  </script>
@endsection