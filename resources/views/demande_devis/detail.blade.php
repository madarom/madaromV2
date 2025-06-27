@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <div class="section-heading devis">
          <h2>
            {!!i18n('demande_devis.demande_devis')!!} - {{$devis->ref}}
            <span class="statut @if($devis->statut == 1) en-attente @elseif($devis->statut == 2) en-cours @else traite @endif">@if($devis->statut == 1) {!!i18n('demande_devis.en_attente')!!}  @else  {!!i18n('demande_devis.traite')!!} @endif</span>
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

        @if($devis->statut == 3)
        <div class="btn-ct detail-devis-price">
          
          <a class="custom-btn devis-price" href="#">
            <span>{{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
          </a>

          <a class="custom-btn commander" href="{{route('demande-devis.order', ['ref' => $devis->ref])}}">
            <i class="fa fa-shopping-bag"></i> <span>{!!i18n('demande_devis.commander')!!}</span>
          </a>
        </div>
        @endif
        <div class="three-column">
         <form class="" novalidate method="POST" action="{{route('demande-devis.update')}}">
          {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$devis->id}}">
            @foreach($devis->products as $key => $product)
            <div class="row devis-product @if($key==0) first @endif">
              <div class="devis-btn-content">
                <a href="{{url_product($product->product)}}" class="voir_message tip tooltipmenu">
                  <span class="message"><i class="fa fa-eye"></i></span>
                  <span class="tooltiptext">{!!i18n('demande_devis.detail')!!}</span>
                </a>
                @if(count($devis->products) > 1 && $devis->statut != 3)
                <a href='javascript:' data-href="{{route('demande-devis.product.delete', [$product->id])}}" class="delete-devis tip tooltipmenu">
                  <span class="message"><i class="fa fa-trash"></i></span>
                  <span class="tooltiptext">{!!i18n('demande_devis.supprimer')!!}</span>
                </a>
                @endif
              </div>
              <input type="hidden" name="products[]" value="{{$product->id}}">
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
                 <p class="title-p font-comic"><span class="basket-ref">{{$product->product->ref}}</span> - <span id="basket-nom">{{i18n_product($product->product, 'nom')}}</span></p>
                 <p id="devis-subtitle" class="detail-p"></p>
                 <div class="qte">
                   @if($devis->statut != 3)
                   <a class="qte-btn moins" href="javascript:">-</a>
                   @endif
                   <input class="ipt-qte-p ipt-qte"  @if($devis->statut == 3) disabled='' @endif  type="number" min="1" name="quantite[]" value="{{$product->quantite}}">
                   @if($devis->statut != 3)
                   <a class="qte-btn plus" href="javascript:">+</a>
                   @endif
                 </div>

                 <div class="qte">
                   <select id="unit-qte" class="unite-qte" name="unite[]">
                      @foreach($product->product->unites as $unite)
                      <option value="{{$unite->unite->id}}" @if($unite->unite->id==$product->unite_id) selected='' @endif>
                        {{$unite->unite->abr}}({{i18n_unite($unite->unite, 'designation')}})
                      </option>
                      @endforeach
                   </select>
                 </div>
                 @if($devis->statut == 3)
                 <div class="qte-det">
                   <span class="pu">{!!i18n('order_detail.pu')!!} {{format_money($product->unit_price)}} {{$devis->response->price_unit->symbol}}</span>
                 </div>
                 @endif
              </div>
            </div>
            @endforeach
            <div class="ipt-radio row">
              <div class="radio col-sm-4 col-md-3 col-lg-4">
                <input type="radio" @if($devis->price_type==1) checked="" @endif id="prixLivre" name="price_type" value="1" />
                <label for="prixLivre">{!!i18n('demande_devis.prix_livre')!!}</label>
              </div>
              <div class="radio col-sm-4 col-md-3 col-lg-4">
                <input type="radio" id="prixFob" @if($devis->price_type==2) checked="" @endif name="price_type" value="2" />
                <label for="prixFob">{!!i18n('demande_devis.prix_fob')!!}</label>
                <a href="javascript:" class="voir_message price tip tooltipmenu">
                  <span class="message"><i class="fa fa fa-question-circle"></i></span>
                  <span class="tooltiptext">{!!i18n('demande_devis.help_prix_fob')!!}</span>
                </a>
              </div>
              <div class="radio col-sm-4 col-md-3 col-lg-4">
                <input type="radio" @if($devis->price_type==3) checked="" @endif id="prixUsine" name="price_type" value="3" />
                <label for="prixUsine">{!!i18n('demande_devis.prix_usine')!!}</label>
              </div>
            </div>
            <div class="ipt-rgstr">
            <textarea name="message" @if($devis->statut == 3) disabled='' @endif placeholder="{!!i18n('contactez-nous.message')!!}">{{$devis->message}}</textarea>
            </div>

            @if($devis->statut==3)
            <div class="ipt-rgstr">
            <label for="admin_message" class="col-sm-6 col-form-label">{!!i18n('demande_devis.admin_response')!!}</label>
            <div class="admin_message">@if($devis->response){!!$devis->response->admin_message!!}@endif</div>
            </div>
            @endif
            
            <div class="load-more mt-lg-5 mt-md-3 center">
              @if($devis->statut!=3)
              <button class="btn btn-login">
                {!!i18n('demande_devis.save')!!}
              </button>
              @else
              <a class="btn btn-login commander" href="{{route('demande-devis.order', ['ref' => $devis->ref])}}">
                <i class="fa fa-shopping-bag"></i> {!!i18n('demande_devis.commander')!!}
              </a>
              @endif
              <button class="btn btn-login complaint" data-id="{{$devis->id}}" data-ref="{{$devis->ref}}">
                <i class="fa fa-comments"></i> {!!i18n('demande_devis.complaint')!!}
              </button>
              <button class="btn btn-login delete-devis" data-href="{{route('demande-devis.delete', ['id' => $devis->id])}}">
                <i class="fa fa-trash"></i> {!!i18n('demande_devis.supprimer')!!}
              </button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>
</section>
@include('demande_devis.modal-delete')
@include('demande_devis.modal-complaint')
@endsection


@push('scripts')
<script src="/assets/js/qte.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.delete-devis').on('click', function(event){
      event.preventDefault();
      $('#modal-delete').modal('show');
      $('#btn-delete-devis a').attr('href', $(this).attr('data-href'));
    });
  });
</script>
@endpush