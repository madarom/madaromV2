<div class="modal fade" id="modal-delete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="basket-modal-title">
          <i class="fa fa-trash"></i> <span class="font-comic">{!!i18n('demande_devis.confirm_delete')!!}</span>
      </h5>
      
      <div class="modal-body">
          <div class="row">
            <div class="product-image col-lg-12">
               <span class="font-comic devis-text">{!!i18n('demande_devis.confirm_delete_text')!!}</span>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">{!!i18n('demande_devis.cancel')!!}</button>
        <button type="submit" id="btn-delete-devis" class="btn btn-primary btn-link"><a href="">{!!i18n('demande_devis.delete')!!}</a></button>
      </div>
    </div>
  </div>
</div>