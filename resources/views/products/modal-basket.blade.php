<div class="modal fade" id="modal-basket" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="basket-modal-title">
          
          <span class="font-comic">{!!i18n('add_to_cart.add_product_basket')!!} </span><i class="fa fa-shopping-basket"></i>
      </h5>
      <form method="POST" id="form-basket" action="{{route('product.panier.add')}}">
      {{ csrf_field() }}
      <div class="modal-body">
          <div class="row">
            <input type="hidden" name="id_product" id="basket-id-product">
            <div class="product-image col-lg-4">
               <div class="img-product">
                  <a class="basket-detail-product" href="javascript:">
                    <img id='basket-img-product' src="/assets/images/canelle.jpeg" alt="Résidence" />
                  </a>
                  <a class="detail-bskt basket-detail-product">
                    <i class="fa fa-eye"></i>
                  </a>
               </div>
            </div>

            <div class="product-infos col-lg-8">
               <p class="title-p font-comic"><span class="basket-ref">PH008</span> - <span id="basket-nom">CANELLE</span></p>
               <p id="basket-subtitle" class="detail-p"></p>
               <div class="qte ct-ipt-qte">
                 <a class="qte-btn moins" href="javascript:">-</a>
                 <input class="ipt-qte-p ipt-qte" id="basket-qte" type="number" min="1" name="quantite" value="1">
                 <a class="qte-btn plus" href="javascript:">+</a>
               </div>
                <div class="qte">
                 <select id="unit-qte" class="unit-qte" name="unite">
                   
                 </select>
               </div>
            </div>
          </div>
          

      </div>
      </form>
      <input type="hidden" id="btn-source">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">{!!i18n('button.cancel')!!}</button>
        <button type="submit" id="btn-add-basket" class="btn btn-primary">{!!i18n('button.add')!!}</button>
      </div>
    </div>
  </div>
</div>
<div id='div-sum-bskt'>
  
</div>


@push('scripts')
<script src="/assets/js/qte.min.js"></script>
<script src="/assets/js/basket.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.cancel-basket').on('click', function(){
      $('#modal-basket').modal('hide');
    });

    $('.add-basket').on('click', function(){
      var parent = $(this).parent().parent().parent();
      $('.basket-ref').text(parent.find('.ref-product').text());
      $('#unit-qte').html(parent.find('.product-unite').html());
      $('#basket-nom').text(parent.find('.nom-product').text());
      $('#basket-subtitle').text(parent.find('.sub-product').text());
      $('#basket-img-product').attr('src', parent.find('.img-product-summ').attr('src'));
      $('#basket-id-product').val($(this).attr('data-id'));
      $('.basket-detail-product').attr('href', parent.find('.detail-product').attr('href'));
      $('#btn-source').val($(this).attr('id'));

      if($(this).find('.panier-full').length > 0) {
        $('#basket-qte').val($(this).find('.panier-full').text());
        $('#unit-qte').val(parent.find('.panier-unit').text());
      }
      $('#modal-basket').modal('show');
    });

    $('#btn-add-basket').on('click', function(){
        $('#modal-basket').modal('hide');
        $('#' + $('#btn-source').val()).addClass('loader');
        $('.add-basket').removeClass('add-basket');
        addPanier(function(response){
          $('.panier-nb').text(response.nb_panier);
          if ($('#' + $('#btn-source').val()).find('.panier-full').length > 0) {
              $('#' + $('#btn-source').val()).find('.panier-full').text(response.quantite);
              $('#' + $('#btn-source').val()).parent().find('.panier-unit').text(response.unite);
          } else {
            $('#' + $('#btn-source').val()).append('<span class="panier-full">'+ response.quantite +'</span>');
          }
          
           showPanier(function(){
              $('.btn-panier').addClass('add-basket');
              $('#' + $('#btn-source').val()).removeClass('loader');
           });
          
        });      
    });

    function addPanier(callback)
    {
      $.ajax({

            type: "POST",

            url: $('#form-basket').attr('action'),

            dataType: "json",

            data: $('#form-basket').serialize()

        })

        .done(function (response, textStatus, jqXHR) {
             callback(response);

        })

        .fail(function (jqXHR, textStatus, errorThrown) {

            // le message est volontairement différent du précédent pour aider à cibler la cause de l'erreur

            afficherPopupErreur('Nous sommes désolés, il n\'est pas possible de compléter l\'opération pour l\'instant.');

        });
    }
  });
</script>
@endpush