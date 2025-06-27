<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Infos Compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form-update" action="{{route('admin.compte.update')}}">
      {{ csrf_field() }}
      <div class="modal-body">
          <input type="hidden" id="id_update"  name="id">
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nom*</label>
            <div class="col-sm-10">
              <input placeholder="Nom" type="text" id="name" name="name" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Email*</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Email" id="email" name="email" class="form-control">
            </div>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="btn-update" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>