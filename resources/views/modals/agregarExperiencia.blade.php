<div class="modal fade" id="modalAgregarExperiencia" tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar experiencia educacional</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formAgregarExperiencia" name="formAgregarExperiencia" action="{{ url('usuario/education') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="card-body">
              <div class="row mb-3">
                <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                  <input id="titulo" name="titulo" type="text" class="form-control" minlength="3" maxlength="20" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="grado" class="col-sm-2 col-form-label">Grado</label>
                <div class="col-sm-10">
                  <select id="grado" name="grado" class="form-control" required>
                    <option value="0">Selecciona un grado</option>
                    @foreach($grados as $grado)
                      <option value="{{$grado->id}}">{{$grado->grado}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="institucion_educativa" class="col-sm-2 col-form-label">Institucion educativa</label>
                <div class="col-sm-10">
                  <input id="institucion_educativa" name="institucion_educativa" type="text" class="form-control" minlength="3" maxlength="50" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea id="descripcion" name="descripcion" class="form-control" style="height: 100px" minlength="10" maxlength="200" required></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha de inicio</label>
                <div class="col-sm-10">
                  <input id="fecha_inicio" name="fecha_inicio" type="date" class="form-control" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="fecha_termino" class="col-sm-2 col-form-label">Fecha de termino</label>
                <div class="col-sm-10">
                  <input id="fecha_termino" name="fecha_termino" type="date" class="form-control" required>
                </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form><!-- End General Form Elements -->
    </div>
  </div>
</div>

