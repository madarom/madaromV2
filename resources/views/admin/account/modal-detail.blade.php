<div class="modal fade" id="modal-infos" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="modal-title">
          <i class="bi bi-question-circle"></i> <span class="font-comic">Compe Client</span>
      </h5>
      <div class="modal-body">
          <div class="row">
              <div>
                 <p><i class="bi bi-person"></i> <span id="nom"></span></p>
                 <p><i class="bi bi-envelope"></i> <span id="email"></span></p>
                 <p><i class="bi bi-telephone"></i> <span id="phone"></span></p>
                 <p><i class="bi bi-translate"></i> <span>Langue choisi : <span id="lang"></span></span></p>
                 <p><i class="bi bi-geo-fill"></i> <span id="adresse"></span></p>
                 <p><i class="bi bi-geo-alt-fill"></i> <span id="ville"></span></p>
                 <p><i class="bi bi-globe-americas"></i> <span id="pays"></span></p>
                
              </div>
          </div>
          

      </div>
      <input type="hidden" id="btn-source">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">

  $(document).ready(function(){
      $('.view-infos').on('click', function(){
        $('#nom').text($(this).parent().parent().find('.name').text());
        $('#email').text($(this).parent().parent().find('.email').text());
        $('#phone').text($(this).parent().parent().find('.phone').text());
        $('#adresse').text($(this).parent().parent().find('.adresse').text());
        $('#ville').text($(this).parent().parent().find('.ville').text());
        $('#pays').text($(this).parent().parent().find('.pays').text());
        $('#lang').text($(this).parent().parent().find('.lang').text());
        $('#modal-infos').modal('show');
      });
  });
</script>
@endpush