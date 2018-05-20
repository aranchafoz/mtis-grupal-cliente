<div class="modal fade" id="evaluarModal" tabindex="-1" role="dialog" aria-labelledby="evaluarModalLabel" aria-hidden="true"  data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="display: flex;">
        <h5 class="modal-title" id="exampleModalLabel">Evaluar Perfil Solicitante</h5>
        <span style="flex-grow: 1;"></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nota:</label>
            <input type="number" min="0" max="10" class="form-control" id="evaluar-mark" name="evaluar-mark" placeholder="Ej.: 6">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario:</label>
            <textarea class="form-control" id="evaluar-comment" name="evaluar-comment"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Evaluar</button>
      </div>
    </div>
  </div>
</div>
