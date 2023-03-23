<div class="modal fade" id="modalAgregarExperiencia" tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar experiencia laboral</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="formAgregarExperiencia" name="formAgregarExperiencia" action="{{ url('usuario/work') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="card-body">
              <div class="row mb-3">
                <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                <div class="col-sm-10">
                  <input id="cargo" name="cargo" type="text" class="form-control" minlength="3" maxlength="50" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="empresa" class="col-sm-2 col-form-label">Empresa</label>
                <div class="col-sm-10">
                  <input id="empresa" name="empresa" type="text" class="form-control" minlength="3" maxlength="50" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                  <textarea id="descripcion" name="descripcion" class="form-control" style="height: 100px" minlength="10" maxlength="500"></textarea>
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
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="trabajo_actual" name="trabajo_actual" value="1">
                <label class="form-check-label" for="trabo_actual">
                  Trabajo aquí actualmente
                </label>
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

