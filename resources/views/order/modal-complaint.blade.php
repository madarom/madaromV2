<div class="modal fade" id="modal-complaint-order" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="basket-modal-title">
          
          <i class="fa fa-question-circle"></i> <span class="font-comic">{!!i18n('demande_devis.complaint')!!} - <span id="complaint-ref"></span></span>
      </h5>
      <form class="complaint-form" novalidate method="POST" action="{{route('order.complaint')}}">
      {{ csrf_field() }}
      <div class="modal-body">
      <input type="hidden" id="commande_id" name="commande_id">
      <div class="ipt-rgstr">
        <textarea name="message" placeholder="{!!i18n('contactez-nous.message')!!}">@if($errors->any())  {{old('message')}} @endif</textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-basket" onclick="$('#modal-question').modal('hide');" data-bs-dismiss="modal">{!!i18n('button.cancel')!!}</button>
        <button type="submit" id="btn-add-basket" class="btn btn-primary">{!!i18n('button.send')!!}</button>
      </div>
      </form>
    </div>
  </div>
</div>
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('.complaint-order').on('click', function(event){
      event.preventDefault();
      $('#complaint-ref').text($(this).attr('data-ref'));
      $('#commande_id').val($(this).attr('data-id'));
      $('#modal-complaint-order').modal('show');
    });
  });
</script>
@endpush