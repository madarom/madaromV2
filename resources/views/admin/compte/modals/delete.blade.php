<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form-delete" action="{{route('admin.compte.delete')}}">
      {{ csrf_field() }}
      <div class="modal-body">
          <input type="hidden" id="id_delete"  name="id">
          <p>Voulez-vous vraiement supprimer ce compte? </p>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="btn-delete" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>