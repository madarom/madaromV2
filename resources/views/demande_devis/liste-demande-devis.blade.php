@if($demandeDevis->total()==0)
<div class="devis">
  <div class="empty-tete">
    
  </div>
  <div class="empty">
       <span class=" empty-txt"><i class="fa fa-ban"></i> {!!i18n('demande_devis.no_quote')!!}</span>
  </div>
</div>
@else
@foreach($demandeDevis as $key => $devis)
@if(!$devis->commande_id)
<div class="devis">
  <div class="tete">
    <div class="ref">Ref : {{$devis->ref}}</div>
  </div>
  <div class="d-body">
    <div class="ct">
      <div class="date-ct">
        <div class="right-elmt">
            <a href="javascript:" class="voir_message"><span class="message"><i class="fa fa-user"></i></span></a>
            <a href="javascript:" class="voir_message"><span class="message"><i class="fa fa-trash"></i></span></a>

            <span class="statut @if($devis->statut == 1) en-attente @elseif($devis->statut == 2) en-cours @else traite @endif">@if($devis->statut == 1) {!!i18n('demande_devis.en_attente')!!}  @else {!!i18n('demande_devis.traite')!!} @endif</span>
        </div>
         
         <span class="date-update">{!!i18n('demande_devis.soumis_par')!!} {{$devis->user->name}} {{$devis->user->prenom}} - {{format_date($devis->updated_at)}}</span>
      </div>
      <div class="detail-ct">
        @foreach($devis->products as $key => $product)
        <div class="product">
            <div class="img-prd">
              @if(count($product->product->images)>0)
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
        @if($devis->statut == 3)
        <a class="custom-btn devis-price" href="#">
          <span>{{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
        </a>

        <a class="custom-btn commander" href="{{route('demande-devis.order', ['ref' => $devis->ref])}}">
          <i class="fa fa-shopping-bag"></i> <span>{!!i18n('demande_devis.order')!!}</span>
        </a>
        @endif
        <a class="custom-btn" href="{{route('demande-devis.detail', ['id' => $devis->id])}}">
          <i class="fa fa-eye"></i> <span>{!!i18n('demande_devis.view_detail')!!}</span>
        </a>

        <a class="custom-btn complaint" data-id="{{$devis->id}}" data-ref="{{$devis->ref}}" href="javascript:">
          <i class="fa fa-comments"></i> <span>{!!i18n('demande_devis.plainte')!!}</span>
        </a>
      </div>
    </div>
  </div>

  
</div>
@endif
@endforeach
<div class="pagination-ct">
  {{ $demandeDevis->links() }}
</div>
@endif
@include('demande_devis.modal-complaint')



