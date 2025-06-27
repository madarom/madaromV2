<div class="badge">
  <div>
    <p class="badge-label font-comic"><span class="ref-product">{{$product->ref}}</span> - <span class="nom-product"> {{i18n_product($product, 'nom')}} </span></p>
    <p class="card-subtitle">
    @if($product->pure) {!!i18n('detail_produit.pure_naturel')!!} @endif
    </p>
  </div>
</div>
<a href="{{url_product($product)}}" class="common-card">
  <figure class="common-card-figure">
    @if(count($product->images)>0)
    <img class="img-product-summ" src="/assets/images/products/{{$product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
    @endif
  </figure>
  <div>
    @if($product->stock)
    <div class="candidature">
      <i class="material-icons md-cloud_download"></i>
      <span>{!!i18n('detail_produit.en_stock')!!}</span>
    </div>
    @else
    <div class="candidature warning">
      <i class="material-icons md-warning"></i>
      <span>{!!i18n('detail_produit.rupture_stock')!!}</span>
    </div>
    @endif
  </div>
</a>

<select class="product-unite" name="unite">
  @foreach($product->unites as $unite)
  <option value="{{$unite->unite->id}}">
    {{$unite->unite->abr}}({{i18n_unite($unite->unite, 'designation')}})
  </option>
  @endforeach  
</select>
<figcaption class="card-caption">
  <p class="card-title sub-product">
    {{i18n_product($product, 'subtitle')}}
  </p>
</figcaption>
 <div class='btn-content'>
  <div class='right'> 
    <a id="basket-product-{{$product->id}}" data-id="{{$product->id}}" class='btn-product-summer btn-panier add-basket' href="javascript:"><span><i class="fa fa-shopping-basket"></i></span>@if(qte_added_to_basket($product->id) !=0)<span class="panier-full">{{qte_added_to_basket($product->id)}}</span>@endif</a>
    <a data-id="{{$product->id}}" class='btn-product-summer detail-product' href="{{url_product($product)}}"><span><i class="fa fa-eye"></i></span></a>
    <span class="panier-unit">@if(unite_added_to_basket($product->id)){{unite_added_to_basket($product->id)['id']}}@endif</span> 
  </div>
     
 </div>