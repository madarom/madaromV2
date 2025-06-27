@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      <div class="panier">
          <div class="row">
              <div class="description-heading heading ">
                  <h3 class="font-comic title-basket">
                    {!!i18n('panier.my_cart')!!} ({{count($products)}} {!!i18n('panier.products')!!})
                  </h3>
              </div>
            
          </div>
          @if(count($products) > 0)
          @foreach($products as $key => $product)
          <div class="row product-summary">
              <div class="product-image col-sm-5 col-md-4  col-lg-3 ">
                 <div class="img-product">
                    @if(count($product->images)>0)
                    <img src="/assets/images/products/{{$product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                    @endif
                 </div>
              </div>

              <div class="product-infos col-sm-7 col-md-8 col-lg-9">
                 <p class="title-p font-comic ov-hid">{{$product->ref}} - {{i18n_product($product, 'nom')}}</p>
                 <p class="detail-p">{{i18n_product($product, 'subtitle')}}</p>
                 <div class="row row-qte">
                  
                  <div class="qte ct-ipt-qte">
                     <a class="qte-btn moins" href="javascript:">-</a>
                     <input class="ipt-qte-p ipt-qte" type="number" min="1" name="" value="{{$product->quantite}}">
                     <a class="qte-btn plus" href="javascript:">+</a>
                  </div>

                  <div class="qte">
                     <select id="unit-qte" class="unit-qte" name="unite">
                        @foreach($product->unites as $unite)
                        <option value="{{$unite->unite->id}}" @if($unite->unite->id==$product->unite) selected='' @endif>
                          {{$unite->unite->abr}}({{i18n_unite($unite->unite, 'designation')}})
                        </option>
                        @endforeach
                     </select>
                   </div>

                  <div class="btn-ct">
                    <a class="custom-btn" href="{{url_product($product)}}">
                      <i class="fa fa-eye"></i> <span>{!!i18n('button.voir_detail')!!}</span>
                    </a>

                    <a class="custom-btn" href="{{route('product.panier.delete', [$product->id])}}">
                      <i class="fa fa-trash"></i> <span>{!!i18n('panier.enlever')!!}</span>
                    </a>
                  </div>
                </div>                 
              </div>
          </div>
          @endforeach

          
          
          <div class="row btn-devis">
             <div class="btn-ct">
                <a class="custom-btn-sub" href="{{route('demande-devis.new')}}">
                  <i class="fa fa-folder"></i> <span>{!!i18n('panier.demander_devis')!!}</span>
                </a>

                <a class="custom-btn-sub" href="{{route('product.panier.empty')}}">
                  <i class="fa fa-trash"></i> <span>{!!i18n('panier.vider_panier')!!}</span>
                </a>
              </div>
          </div>
          @else 
          <div class="devis">
            <div class="empty">
                 <span class=" empty-txt"><i class="fa fa-shopping-basket none"></i>{!!i18n('panier.panier_vide')!!}</span>
            </div>
          </div>
          @endif

      </div>
  
    </div>
  </div>
</section>
@endsection
@push('scripts')
<script src="/assets/js/qte.js"></script>
@endpush