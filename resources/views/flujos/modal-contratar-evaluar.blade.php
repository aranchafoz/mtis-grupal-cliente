<div class="modal fade" id="evaluarModal{{ $solicitante->id }}" tabindex="-1" role="dialog" aria-labelledby="evaluarModalLabel" aria-hidden="true"  data-backdrop="false">
  {!! Form::open(['action' => ['ContratarController@evaluarPerfil', $solicitante->id], 'method' => 'post']) !!}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="display: flex;">
        <h5 class="modal-title" id="exampleModalLabel">Evaluar Perfil Solicitante</h5>
        <span style="flex-grow: 1;"></span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {!! Form::token() !!}
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nota:</label>
            {{ Form::number('evaluar-mark', null, ['class' => 'form-control', 'required' => 'true', 'id' => 'evaluar_mark', 'min' => 0, 'max' => 10]) }}
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Comentario:</label>
            {{ Form::textarea('evaluar-comment', null, ['class' => 'form-control', 'required' => 'true', 'rows' => '5', 'id' => 'evaluar-comment']) }}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        {{ Form::submit('Evaluar',['class' => 'btn btn-primary']) }}
      </div>

    </div>
  </div>
  {!! Form::close() !!}
</div>
