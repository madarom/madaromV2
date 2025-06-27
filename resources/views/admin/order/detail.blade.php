@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Commandes</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Commandes</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

              <div class="no-wrap register-container">
                <div class="section-heading title-detail">
                  <h2>
                    Commande - {{$order->ref}} <span class="statut @if($order->statut == 1) en-attente @elseif($order->statut == 2) en-cours @elseif($order->statut == 3) en-cours-livraison @else traite @endif">
                      @if($order->statut == 1) En attente @elseif($order->statut == 2) En cours @elseif($order->statut == 3) En cours de Livraison @else Livrée @endif
                    </span>
                  </h2>
                </div>

               
                <div class="btn-ct detail-devis-price">
                  <a class="custom-btn devis-price" href="#">
                    <span>{{format_money($order->devis->response->price)}} {{$order->devis->response->price_unit->symbol}}</span>
                  </a>
                   <a class="custom-btn commander infos-client" href="#">
                    <i class="bi bi-person"></i> <span>Infos sur le client</span>
                  </a>

                  <a class="custom-btn commander infos-client" href="#">
                    <i class="bi bi-translate"></i> <span>Lang : {{$order->devis->user->lang}}</span>
                  </a>
                </div>
                
                <div class="three-column">
                  <div class="client-part">
                    @foreach($order->devis->products as $key => $product)
                    <div class="row devis-product @if($key==0) first @endif">
                      <div class="devis-btn-content">
                        <a href="{{url_product($product)}}" class="voir_message tip tooltipmenu">
                          <span class="message"><i class="fa fa-search"></i></span>
                          <span class="tooltiptext">Detail</span>
                        </a>
                        
                      </div>
                      <input type="hidden" value="{{$product->id}}">
                      <div class="product-image col-3">
                         <div class="img-product devis">
                            <a class="devis-detail-product" href="javascript:">
                              @if(count($product->product->images)>0)
                              <img src="/assets/images/products/{{$product->product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                              @endif
                            </a>
                         </div>
                      </div>

                      <div class="product-infos devis col-9">
                         <p class="title-p font-comic"><span class="basket-ref">{{$product->product->ref}}</span> - <span id="basket-nom">{{$product->product->nom}}</span></p>
                         <p id="devis-subtitle" class="detail-p"></p>
                         <div class="qte">
                           <input class="ipt-qte-p ipt-qte" disabled=""  type="text" min="1" value="Quantité : {{$product->quantite}} {{$product->unite->designation_fr}}">
                           <input disabled class="ipt-qte-p ipt-qte unit_price" required="" name="unit_price{{$product->id}}" placeholder="Prix unitaire TTC"  type="text" min="1" value="{{$product->unit_price}}{{$order->devis->response->price_unit->symbol}}" value="">
                         </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="col-lg-3">
                    <button type="submit" data-id="{{$order->id}}" data-statut="{{$order->statut}}" class="btn btn-primary btn-change-statut">Changer Statut</button>
                  </div>
                </div>
              </div>

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->

@include('admin.order.modal-infos')
@include('admin.order.modal-statut')

@endsection