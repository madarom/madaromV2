<div class="modal fade" id="modal-seo" tabindex="-1">
  <div class="modal-dialog">
    <form method="post" action="{{route('admin.seo.new')}}">
    {{ csrf_field() }}
    <div class="modal-content">
      <h5 class="modal-title">
          <i class="bi bi-info-circle"></i> <span class="font-comic">SEO</span>
      </h5>
      <div class="modal-body">
          <div class="row">
              <div class="row mb-3">
                <div class="col-sm-10">
                  <label for="nom" class="col-sm-6 col-form-label">url</label>
                  <input type="text" placeholder="Saisissez l'url*"  id="url" name="url" class="form-control">
                  </div>
                </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Ajouter</button>
        <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
    </form>
  </div>
</div>
@push('scripts')
<script type="text/javascript">

  $(document).ready(function(){
      $('#new-url').on('click', function(){
          $('#modal-seo').modal('show');
      });
  });
</script>
@endpush