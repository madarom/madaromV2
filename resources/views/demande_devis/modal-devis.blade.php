
<div class="modal fade" id="modal-devis" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="basket-modal-title">
          <i class="fa fa-folder"></i><span class="font-comic"> {!!i18n('demande_devis.demande_devis')!!}</span>
      </h5>
      
      <div class="modal-body">
          <div class="row">
            <div class="product-image col-lg-12">
               <span class="font-comic devis-text"> {!!i18n('demande_devis.demande_devis_connexion_message')!!}</span>
               <div class="btn-ct devis-btn">
                <a class="custom-btn" href="{{route('login')}}">
                  <i class="fa fa-sign-in"></i> <span>{!!i18n('demande_devis.login')!!}</span>
                </a>

                <a class="custom-btn" href="{{route('register')}}">
                  <i class="fa fa-user-plus"></i> <span>{!!i18n('demande_devis.register')!!}</span>
                </a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>