<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nouveau compte administrateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form-save" action="{{route('admin.compte.add')}}">
      {{ csrf_field() }}
      <div class="modal-body">
          <input type="hidden" id="id"  name="id">
          <div class="row mb-3">
            
            <div class="col-sm-12">
              <input placeholder="Nom*" type="text" id="page" name="name" class="form-control">
            </div>
          </div>
          <div class="row mb-3">
            
            <div class="col-sm-12">
              <input type="text" placeholder="Email*" id="key" name="email" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            
            <div class="col-sm-12">
              <input type="password" placeholder="Mot de passe*" name="password" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            
            <div class="col-sm-12">
              <input type="password" placeholder="Confirmer mot de passe*" name="password_confirmation" class="form-control">
            </div>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="btn-enregistrer" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>