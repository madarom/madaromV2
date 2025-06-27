@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <div class="section-heading devis">
          <h2>
            {!!i18n('demande_devis.demande_devis')!!} 
          </h2>
        </div>

        
        <div class="three-column">
          <form method="POST" id="form-devis" action="{{route('demande-devis.submit')}}">
          {{ csrf_field() }}
          @foreach($products as $key => $product)
          <input type="hidden" name="product_id[]" value="{{$product->id}}">
          <div class="row devis-product @if($key==0) first @endif">
            <div class="devis-btn-content">
              <a href="{{url_product($product)}}" class="voir_message tip tooltipmenu">
                <span class="message"><i class="fa fa-eye"></i></span>
                <span class="tooltiptext">{!!i18n('demande_devis.detail')!!}</span>
              </a>
            </div>
            <input type="hidden" name="products[]" value="{{$product->id}}">
            <div class="product-image col-3">
               <div class="img-product devis">
                  <a class="devis-detail-product" href="javascript:">
                    @if(count($product->images)>0)
                    <img src="/assets/images/products/{{$product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                    @endif
                  </a>
               </div>
            </div>

            <div class="product-infos devis col-9">
               <p class="title-p font-comic"><span class="basket-ref">{{$product->ref}}</span> - <span id="basket-nom">{{i18n_product($product, 'nom')}}</span></p>
               <p id="devis-subtitle" class="detail-p"></p>
               <div class="qte">
                 <a class="qte-btn moins" href="javascript:">-</a>
                 <input class="ipt-qte-p ipt-qte" type="number" min="1" name="quantite[]" value="{{$product->quantite}}">
                 <a class="qte-btn plus" href="javascript:">+</a>
               </div>

               <div class="qte">
                 <select id="unit-qte" class="unite-qte" name="unite[]">
                    @foreach($product->unites as $unite)
                    <option value="{{$unite->unite->id}}" @if($unite->unite->id==$product->unite) selected='' @endif>
                      {{$unite->unite->abr}}({{i18n_unite($unite->unite, 'designation')}})
                    </option>
                    @endforeach
                 </select>
               </div>
            </div>
          </div>
          @endforeach
          <div class="ipt-radio row">
            <div class="radio col-sm-4 col-md-3 col-lg-4">
              <input type="radio" checked="" id="prixLivre" name="price_type" value="1" />
              <label for="prixLivre">{!!i18n('demande_devis.prix_livre')!!}</label>
            </div>
            <div class="radio col-sm-4 col-md-3 col-lg-4">
              <input type="radio" id="prixFob" name="price_type" value="2" />
              <label for="prixFob">{!!i18n('demande_devis.prix_fob')!!}</label>
              <a href="javascript:" class="voir_message price tip tooltipmenu">
                <span class="message"><i class="fa fa fa-question-circle"></i></span>
                <span class="tooltiptext">{!!i18n('demande_devis.help_prix_fob')!!}</span>
              </a>
            </div>
            <div class="radio col-sm-4 col-md-3 col-lg-4">
              <input type="radio" id="prixUsine" name="price_type" value="3" />
              <label for="prixUsine">{!!i18n('demande_devis.prix_usine')!!}</label>
            </div>
          </div>
          <div class="ipt-rgstr">
            <textarea name="message" placeholder="{!!i18n('demande_devis.message')!!}">@if($errors->any())  {{old('message')}} @endif</textarea>
          </div>
          <input type="hidden" id="btn-source">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" id="btn-add-basket" class="btn btn-primary">{!!i18n('demande_devis.send_demande')!!}</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="/assets/js/qte.js"></script>
@endpush