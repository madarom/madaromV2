@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <div class="section-heading devis">
          <h2>
            {!!i18n('order_detail.commande')!!} - {{$order->ref}}
            <span class="statut @if($order->statut == 1) en-attente @elseif($order->statut == 2) en-cours @elseif($order->statut == 3) en-cours-livraison @else traite @endif">
               @if($order->statut == 1) {!!i18n('order_detail.en_attente')!!} @elseif($order->statut == 2) {!!i18n('order_detail.en_cours')!!} @elseif($order->statut == 3) {!!i18n('order_detail.en_cours_livraison')!!} @else {!!i18n('order_detail.livre')!!} @endif
            </span>
          </h2>
        </div>

        @if($errors->any())
          <div class="alert alert-danger" role="alert">
            {!!i18n('demande_devis.error_complaint')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          @if (Session::has('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{!!i18n('demande_devis.complaint_success')!!}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

        <div class="center success-price detail-montant">                  
            <span class="cmd-price">{!!i18n('order_detail.total_paye')!!} {{format_money($order->devis->response->price)}} {{$order->devis->response->price_unit->symbol}}</span>
        </div>

        <div class="three-column">
           
            @foreach($order->devis->products as $key => $product)
            <div class="row devis-product @if($key==0) first @endif">
              <div class="devis-btn-content">
                <a href="{{url_product($product->product)}}" class="voir_message tip tooltipmenu">
                  <span class="message"><i class="fa fa-eye"></i></span>
                  <span class="tooltiptext">{!!i18n('order_detail.detail')!!}</span>
                </a>
              </div>
              <input type="hidden" name="products[]" value="{{$product->id}}">
              <div class="product-image col-3">
                 <div class="img-product devis">
                    <a class="devis-detail-product" href="javascript:">
                      @if(count($product->images)>0)
                      <img src="/assets/images/products/{{$product->product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                      @endif
                    </a>
                 </div>
              </div>

              <div class="product-infos devis col-9">
                 <p class="title-p font-comic"><span class="basket-ref">{{$product->product->ref}}</span> - <span id="basket-nom">{{i18n_product($product->product, 'nom')}}</span></p>
                 <p id="devis-subtitle" class="detail-p"></p>
                 <div class="">
                   <input class="ipt-qte-p ipt-qte ipt-qte-o"   disabled='' type="text" min="1" name="quantite[]" value="{{$product->quantite}} {{$product->unite->abr}}">
                  
                 </div>

                 <div class="qte-det">
                   <span class="pu">{!!i18n('order_detail.pu')!!} {{format_money($product->unit_price)}} {{$order->devis->response->price_unit->symbol}}</span>
                 </div>
              </div>
            </div>
            @endforeach

            <div class="load-more mt-lg-5 mt-md-3 center">
              
              <a class="btn btn-login commander" href="#">
                <i class="fa fa-file-pdf-o"></i> {!!i18n('order_detail.facture')!!}
              </a>
              <button class="btn btn-login complaint-order" data-id="{{$order->id}}" data-ref="{{$order->ref}}">
                <i class="fa fa-comments"></i> {!!i18n('demande_devis.complaint')!!}
              </button>
              <a class="btn btn-login" href="{{route('espace_client')}}?tab=order">
                <i class="fa fa-arrow-left"></i> {!!i18n('order_detail.retour')!!}
              </a>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@include('order.modal-complaint')