<form action="{{route('persona.store')}} " method="post" id="crear_persona">
  @csrf
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Crear nuevo rol</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="x_panel">
          <div class="x_title">
            <span>Nuevo Rol</span>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">
          <span class="fa fa-save"></span>
          Guardar
        </button>
      </div>

    </div>
  </div>
    </div>
</form>
