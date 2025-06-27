<div class="modal fade" id="modal-statut" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="modal-title">
          
          <i class="bi bi-info-circle"></i> <span class="font-comic">Changer Statut</span>
      </h5>
      <form class="" novalidate method="POST" action="{{route('admin.order.statut.change')}}">
      {{ csrf_field() }}
      <input type="hidden" id="id" name="id">
      <div class="modal-body">
          
           <div class="row mb-3">
              
              <div class="col-lg-12">
                <label for="nom" class="col-sm-6 col-form-label">Statut</label>
                <select name="statut" id="current-statut" class="form-select">
                  <option @if($order->statut==1)selected @endif value="1">En attente</option>
                  <option @if($order->statut==2)selected @endif value="2">En cours</option>
                  <option @if($order->statut==3)selected @endif value="3">En cours de livraison</option>
                  <option @if($order->statut==4)selected @endif value="4">Livrée</option>
                </select>
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-sm-10">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="notif" checked="">
                    <label class="form-check-label" for="notif">Notifier le client</label>
                  </div>
              </div>
            </div> 

            <div class="row mb-3">
              <div class="col-sm-12">
                <label for="admin_message" class="col-sm-6 col-form-label">Message de l'administrateur</label>
                <textarea placeholder="Message de l'administrateur" class="content-jqte" name="message" style="height: 100px"></textarea>
              </div>
            </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
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
    $('.btn-change-statut').on('click', function(){
      $('#id').val($(this).attr('data-id'));
      $('#current-statut').val($(this).attr('data-statut'));
      $('#modal-statut').modal('show');
    });
  });
</script>


<script type="text/javascript">
  $('.content-jqte').jqte();
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });
</script>
@endpush