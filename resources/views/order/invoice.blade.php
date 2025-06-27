
<!DOCTYPE html>
<html lang="fr">

    <head>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta charset="UTF-8" />
      <title>Mad'Arom - Huiles essentielles de Madagascar</title>
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link rel="stylesheet" href="{{ asset('assets/css/invoice.css') }}" />

      <meta name="csrf-token" content="{{ csrf_token() }}">

     
    </head>

    <body>
        <section class="profil page-body-content">
          <div class="inner">
            <div class="">
              
              <div class="no-wrap invoice-container">        
                <div class="three-column header-invc">
                  <div class="row invoice-row-header">
                      <div class="col-5">
                        <div class="logo-invoice">
                          <a class="navbar-brand" href="/">
                            <img src="{{ asset('assets/images/logo_madarom.png') }}" alt="Mad'arom" />
                          </a>
                        </div>
                        <div>
                          <span>{!!i18n('footer.madarom_email')!!}</span>
                        </div>
                        <div>
                          <span>{!!i18n('footer.phone_number')!!}</span>
                        </div>
                        <div>
                          <span>{!!i18n('footer.lot')!!}</span><span>{!!i18n('footer.ville')!!}</span>
                        </div>
                      </div>

                      <div class="col-2">
                      </div>

                      <div class="col-5">
                        <div class="client-info">
                          {!!i18n('invoice.invoice_number')!!} {{$order->numero_facture}}
                        </div>
                        <div class="client-info">
                          {!!i18n('invoice.ref_order')!!} {{$order->ref}}
                        </div>
                        <div class="client-info">
                          {!!i18n('invoice.client_name')!!} {{$order->devis->user->name}} {{$order->devis->user->prenom}}
                        </div>
                        <div class="client-info">
                          <span>{{$order->devis->user->email}}</span>
                        </div>
                        <div class="client-info">
                          <span>{{$order->devis->user->full_number}}</span>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="three-column invoice-title">
                  <div class="title">
                    {!!i18n('invoice.invoice')!!}
                  </div>
                  <div class="date">
                    <span>{!!i18n('invoice.date')!!} @if(lang()=='en') {{date("m/d/Y")}} @else {{date("d/m/Y")}} @endif</span>
                  </div>
                </div>
                <div class="three-column">
                    @foreach($order->devis->products as $key => $product)
                    <div class="row invoice-product @if($key==0) first @endif">
                      <input type="hidden" name="products[]" value="{{$product->id}}">
                      <div class="product-image col-3">
                         <div class="img-product devis">
                            <a class="devis-detail-product" href="javascript:">
                              @if(count($product->product->images)>0)
                              <img src="{{ asset('/assets/images/products/' . $product->product->images[0]->filename) }}" alt="{{i18n_product($product, 'nom')}}" />
                              @endif
                            </a>
                         </div>
                      </div>

                      <div class="product-infos col-9">
                         <div class="title-p font-comic"><span class="basket-ref">{{$product->product->ref}}</span> - <span id="basket-nom">{{i18n_product($product->product, 'nom')}}</span></div>
                         <div class="">
                            <div>
                              <span>{!!i18n('invoice.quantite')!!} : {{$product->quantite}} {{i18n_unite($product->unite, 'designation')}}</span>
                            </div>                          
                         </div>

                         <div class="qte-det">
                           <span class="pu">{!!i18n('invoice.prix_unitaire')!!} : {{format_money($product->unit_price)}} {{$order->devis->response->price_unit->symbol}}</span>
                         </div>
                         <div class="qte-det">
                           <span class="pu">{!!i18n('invoice.total')!!} {{format_money($product->unit_price * $product->quantite)}} {{$order->devis->response->price_unit->symbol}}</span>
                         </div>
                      </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="center success-price detail-montant">                  
                    <span class="invoice-price">{!!i18n('order_detail.total_paye')!!} {{format_money($order->devis->response->price)}} {{$order->devis->response->price_unit->symbol}}</span>
                </div>
              </div>
            </div>
          </div>
        </section>
        
    </body>
</html>

