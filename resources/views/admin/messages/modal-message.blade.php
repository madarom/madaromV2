<div class="modal fade" id="modal-infos" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="modal-title">
          <i class="bi bi-info-circle"></i> <span class="font-comic">Message du Client</span>
      </h5>
      <div class="modal-body">
          <div class="row">
              <div>
                 <p><i class="bi bi-person"></i> <span id="nom"></span></p>
                 <p><i class="bi bi-envelope"></i> <span id="email"></span></p>
                 <p><i class="bi bi-telephone"></i> <span id="phone"></span></p>
                 <p id="pays"><i class="bi bi-globe-americas"></i> <span id="pays"></span></p>
                 <p><i class="bi bi-translate"></i> <span>Langue choisi : <span id="lang"></span></span></p>
                 <p><i class="bi bi-geo-alt-fill"></i> <span id="ville"></span></p>
                 <p><i class="bi bi-geo-fill"></i> <span>Adresse : <span id="adresse"></span></span></p>
                 <p>
                   <textarea id="message" disabled="" placeholder="Message" class="form-control" name="summary_desc" style="height: 150px"></textarea>
                 </p>
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
@push('styles')
<link rel="stylesheet" href="/assets/jquery-te/jquery-te-1.4.0.css" />
@endpush
@push('scripts')
<script src="/assets/jquery-te/jquery-te-1.4.0.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
      $('.view-message').on('click', function(){
        $('#nom').text($(this).parent().parent().find('.nom').text());
        $('#email').text($(this).parent().parent().find('.email').text());
        $('#phone').text($(this).parent().parent().find('.phone').text());
        $('#pays').text($(this).parent().parent().find('.pays').text());
        $('#lang').text($(this).parent().parent().find('.lang').text());
        $('#ville').text($(this).parent().parent().find('.ville').text());
        $('#adresse').text($(this).parent().parent().find('.adresse').text());
        $('#message').val($(this).parent().parent().find('.message').text());
        $('#modal-infos').modal('show');
      });
  });
</script>
@endpush