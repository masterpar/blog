                                           {{-- modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action=" {{ route('admin.posts.store') }}">
    @csrf
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
        <div class="form-group {{ $errors->has('titulo') ?  'has-error' : '' }}">

            <label>Titulo de la Publicación</label>
              <input value=" {{old('titulo') }}"
                name="titulo" class="form-control"
                placeholder="Ingresa aquí el título de la publicación" required>              
              </input>
                {!! $errors->first('titulo','<span class="help-block">:message</span>')!!}
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Crear publicación</button>
      </div>
    </div>
  </div>
</form>
</div>