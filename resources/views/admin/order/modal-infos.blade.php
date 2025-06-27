<div class="modal fade" id="modal-infos" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="modal-title">
          
          <i class="bi bi-info-circle"></i> <span class="font-comic">Informations sur le Client</span>
      </h5>
      <div class="modal-body">
          <div class="row">
              <div>
                 <p><i class="bi bi-person"></i> <span>{{$order->devis->user->name}} {{$order->devis->user->prenom}}</span></p>
                 <p><i class="bi bi-envelope"></i> <span>{{$order->devis->user->email}}</span></p>
                 <p><i class="bi bi-telephone"></i> <span>{{$order->devis->user->full_number}}</span></p>
                 <p><i class="bi bi-globe-americas"></i> <span>{{$order->devis->user->pays}}</span></p>
                 <p><i class="bi bi-translate"></i> <span>Langue choisi : {{$order->devis->user->lang}}</span></p>
                 <p><i class="bi bi-geo-alt-fill"></i> <span>{{$order->devis->user->ville}}</span></p>
                 <p><i class="bi bi-geo-fill"></i> <span>Adresse : {{$order->devis->user->adresse}}</span></p>
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
    $('.infos-client').on('click', function(){
      
      $('#modal-infos').modal('show');
    });
  });
</script>
@endpush