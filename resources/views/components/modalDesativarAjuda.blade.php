<div class="modal fade" id="desativar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header" >
          <h1 class="modal-title text-center w-100 fs-5" id="exampleModalLabel">  Desativar:  "{{$ajuda->tituloAjuda}}" ?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center gap-3 align-items-center justify-content-center d-flex mt-2">
            <form action="{{route('ajuda.status.update', $ajuda->id)}}" method="post">
                @csrf
                @method('PUT')
            <input type="hidden" name="statusAjuda" value="Inativa">
            <button type="submit" class="btn btn-danger">Sim</button>
            <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-primary">Não</button>
            </form>
        </div>
        <div class="modal-footer">
          <small class="text-center">Ao desativar, todas as funcionalidades relacionadas serão desativadas.
          </small>
        </div>
      </div>
    </div>
  </div>