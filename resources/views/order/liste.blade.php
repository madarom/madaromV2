@if($orders->total()==0)
<div class="devis">
  <div class="empty-tete">
    
  </div>
  <div class="empty">
       <span class=" empty-txt"><i class="fa fa-ban"></i> {!!i18n('order_list.no_order')!!}</span>
  </div>
</div>
@else
@foreach($orders as $key => $order)
<div class="devis">
  <div class="tete">
    <div class="ref">Ref : {{$order->ref}}</div>
  </div>
  <div class="d-body">
    <div class="ct">
      <div class="date-ct">
        <div class="right-elmt">
            <a href="javascript:" class="voir_message"><span class="message"><i class="fa fa-user"></i></span></a>
            <a href="{{route('order.invoice', ['id' => $order->id])}}" class="voir_message"><span class="message"><i class="fa fa-file-pdf-o"></i></span></a>
            <span class="statut @if($order->statut == 1) en-attente @elseif($order->statut == 2) en-cours @elseif($order->statut == 3) en-cours-livraison @else traite @endif">
               @if($order->statut == 1) {!!i18n('order_detail.en_attente')!!} @elseif($order->statut == 2) {!!i18n('order_detail.en_cours')!!} @elseif($order->statut == 3) {!!i18n('order_detail.en_cours_livraison')!!} @else {!!i18n('order_detail.livre')!!} @endif
            </span>
        </div>
         
         <span class="date-update">{!!i18n('order_list.soumis_par')!!} {{$order->devis->user->name}} {{$order->devis->user->prenom}} {!!i18n('order_list.le')!!} {{format_date($order->updated_at)}}</span>
      </div>
      <div class="detail-ct">
        @foreach($order->devis->products as $key => $product)
        <div class="product">
            <div class="img-prd">
              @if($product->product && count($product->product->images)>0)
              <img src="/assets/images/products/{{$product->product->images[0]->filename}}" alt="{{i18n_product($product->product, 'nom')}}" />
              @endif
              <div class="qte-prd">{{$product->quantite}} {{$product->unite->abr}}</div>

            </div>
            
            <div class="label-product">
              {{$product->product->ref}}
            </div>
            
         </div>
         @endforeach
      </div>
    </div>
    <div class="pied">

      <div class="btn-ct">
        <a class="custom-btn devis-price" href="#">
          <span>{{format_money($order->devis->response->price)}} {{$order->devis->response->price_unit->symbol}}</span>
        </a>
        <a class="custom-btn" href="{{route('order.invoice', ['id' => $order->id])}}">
          <i class="fa fa-file-pdf-o"></i> <span>{!!i18n('order_list.facture')!!}</span>
        </a>
        <a class="custom-btn complaint-order"  data-id="{{$order->id}}" data-ref="{{$order->ref}}" href="javascript:">
          <i class="fa fa-comments"></i> <span>{!!i18n('demande_devis.plainte')!!}</span>
        </a>
        <a class="custom-btn" href="{{route('order.detail', ['id' => $order->id])}}">
          <i class="fa fa-search"></i> <span>{!!i18n('order_list.voir_detail')!!}</span>
        </a>
      </div>
    </div>
  </div>

  
</div>
@endforeach

<div class="pagination-ct">
  {{ $orders->links() }}
</div>
@endif
@include('order.modal-complaint')
