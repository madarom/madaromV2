<div id="modal-sum-bskt" class="modal fade right">
  <div class="modal-dialog basket-detail">
    <div class="modal-content basket-content">
        <div id='contenu-summary-basket' class="panier bskt-sum">
            <div class="header-basket-summ">
                <div class="description-heading heading ">
                    <h3 class="font-comic title-basket-summary">
                      {!!i18n('panier.my_cart')!!} ({{count($products)}} {!!i18n('panier.products')!!})
                    </h3>
                </div>
              
            </div>
           
              @if(count($products) > 0)
              <div class="ct-prdct-bskt-summ">
              @foreach($products as $key => $product)
              <div class="product-summary bskt-summ-pd">
                  <div class="product-image prdct-img">
                     <div class="img-product">
                        @if(count($product->images)>0)
                        <img src="/assets/images/products/{{$product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                        @endif
                     </div>
                  </div>

                  <div class="product-infos">
                     <p class="title-p font-comic ov-hid">{{$product->ref}} - {{i18n_product($product, 'nom')}}</p>
                     <p class="detail-p ov-hid">{{i18n_product($product, 'subtitle')}}</p>
                     <div class="bskt-row-qte">
                      
                      <div class="qte ct-ipt-qte">
                         <a class="qte-btn moins" href="javascript:">-</a>
                         <input class="ipt-qte-p ipt-qte" type="number" min="1" name="" value="{{$product->quantite}}">
                         <a class="qte-btn plus" href="javascript:">+</a>
                      </div>

                      <div class="bskt-qte">
                         <select id="unit-qte" class="unite-qte" name="unite">
                            @foreach($product->unites as $unite)
                            <option value="{{$unite->unite->id}}" @if($unite->unite->id==$product->unite) selected='' @endif>
                              {{$unite->unite->abr}}
                            </option>
                            @endforeach
                         </select>
                       </div>
                      </div>
                        

                                       
                  </div>
                  <a class="dlt-bskt" data-id='{{$product->id}}' href="javascript:">
                    <i class="fa fa-remove"></i>
                  </a>
              </div>
              @endforeach
              </div>
            
            
            <div class="ct-btn">
               <div class="">
                  <a class="custom-btn-sub"  href="{{route('demande-devis.new')}}">
                    <i class="fa fa-folder"></i> <span>{!!i18n('panier.demander_devis')!!}</span>
                  </a>

                  <a class="custom-btn-sub" href="{{route('product.panier.empty')}}">
                    <i class="fa fa-trash"></i> <span>{!!i18n('panier.vider_panier')!!}</span>
                  </a>
                </div>
            </div>
            @else 
            <div class="devis">
              <div class="empty-summ">
                   <span class=" empty-txt"><i class="fa fa-shopping-basket none"></i>{!!i18n('panier.panier_vide')!!}</span>
              </div>
            </div>
            @endif
        </div>
        <a class="cls-bskt" href="javascript:">
          <i class="fa fa-remove"></i>
        </a>
    </div>
  </div>
  @include('demande_devis.modal-devis')
  <script type="text/javascript">
        
        $('.cls-bskt').on('click', function(){
          $('#modal-sum-bskt').modal('hide');
          $('.modal-backdrop').remove();
        });
        $('#btn-devis').on('click', function(){
          $("#modal-devis").modal("show");
        });

        $('.dlt-bskt').on('click', function(){
          $('.panier-nb').text($('.bskt-summ-pd').length-1);
          if($('#basket-product-' + $(this).attr('data-id')).find('.panier-full')) {
            $('#basket-product-' + $(this).attr('data-id')).find('.panier-full').remove();
          }
          deleteProductPanier($(this).attr('data-id'));
        });
  </script>
</div>

  