<div class="modal fade" id="editPasswordModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modifier mot de passe du compte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form-update-pass" action="{{route('admin.compte.update-password')}}">
      {{ csrf_field() }}
      <div class="modal-body">
          <input type="hidden" id="id_update_psswd"  name="id">
          <div class="row mb-3">
            
            <div class="col-sm-10">
              <input type="password" placeholder="Nouveau mot de passe*" name="password" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-sm-10">
              <input type="password" placeholder="Confirmer mot de passe*" name="password_confirmation" class="form-control">
            </div>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="btn-update-pass" class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>