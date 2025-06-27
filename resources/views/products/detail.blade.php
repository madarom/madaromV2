@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      <div class="product-detail">
      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        {!!i18n('detail_produit.error_question_saisie')!!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
      @if (Session::has('message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{!!i18n('detail_produit.question_success')!!}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="row">
          @if(count($product->images) > 0)
          <div class="col-lg-6">
            <div class="detail-img-product">
              @foreach($product->images as $key => $image)
              <div class="image">
                <img class="img-product" src="/assets/images/products/{{$image->filename}}" alt="{{$product->nom}}" />
              </div>
              @endforeach
            </div>
          </div>
          @endif
          
          <div class="@if(count($product->images) > 0) col-lg-6 @else col-lg-12 @endif">
            <div class="section-heading font-comic">
                <h2 id="product-name">
                  @if($product->stock)
                  <i class="material-icons md-cloud_download in-stock"></i>
                  @else
                  <i class="material-icons md-warning out-stock"></i>
                  @endif
                  {{$product->ref}} - {{i18n_product($product, 'nom')}}
                </h2>
            </div>
            <p class="card-subtitle detail">
              @if($product->pure) {!!i18n('detail_produit.pure_naturel')!!} @endif
            </p>

            <div class="row">
              @if(!$product->stock)
              <div class="stock-content warning">
                <i class="material-icons md-warning"></i>
                <span>{!!i18n('detail_produit.rupture_stock')!!}</span>
              </div>
              @endif
            </div>

            <p>
              {{i18n_product($product, 'subtitle')}}
            </p>

            <p>
              {{i18n_product($product, 'summary_desc')}}
            </p>

            <div class="row">
              <form method="POST" id="form-basket" action="{{route('product.panier.add')}}">
              {{ csrf_field() }}
                <div class="qte">
                   <input type="hidden" name="id_product" value="{{$product->id}}">
                   <a class="qte-btn moins" href="javascript:">-</a>
                   <input class="ipt-qte-p ipt-qte" type="number" min="1" name="quantite" @if(qte_added_to_basket($product->id) !=0) value="{{qte_added_to_basket($product->id)}}" @else value="1" @endif>
                   <a class="qte-btn plus" href="javascript:">+</a>
                </div>
                <div class="qte">
                   <select id="unit-qte" class="unit-qte" name="unite">
                      @foreach($product->unites as $unite)
                      <option value="{{$unite->unite->id}}" @if(qte_added_to_basket($product->id) && $unite->unite->id==unite_added_to_basket($product->id)['id']) selected='' @endif>
                        {{$unite->unite->abr}}({{i18n_unite($unite->unite, 'designation')}})
                      </option>
                      @endforeach
                   </select>
                 </div>
              </form>

              <!--@if($product->stock)
                <div class="stock">
                  <i class="material-icons md-cloud_download"></i>
                  <span>{!!i18n('detail_produit.en_stock')!!}</span>
                </div>
                @else
                <div class="stock warning">
                  <i class="material-icons md-warning"></i>
                  <span>{!!i18n('detail_produit.rupture_stock')!!}</span>
                </div>
                @endif-->
            </div>
            <div>
              <a class="btn-detail-panier" id="btn-detail-add-basket" href="javascript:">
                <i class="fa fa-shopping-basket"></i> <span>{!!i18n('detail_produit.add_cart')!!} </span>
              </a>

              <a class="btn-detail-question" id="btn-detail-question" href="javascript:">
                <i class="fa fa-question-circle"></i> <span>{!!i18n('detail_produit.ask_question')!!}</span>
              </a>
            </div>
            
          </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="description-heading">
              <h3 class="font-comic">
                {!!i18n('detail_produit.description')!!}
              </h3>
          </div>
          <div class="detail-desc-product">
            {!!i18n_product($product, 'detail_desc')!!}
          </div>
        </div>
        
      </div>

    </div>
  
    </div>
  </div>
<div id='div-sum-bskt'>
  
</div>
</section>
@include('products.modal-question')
@include('products.zoom-image')
@endsection

@push('styles')
<link rel="stylesheet" href="/assets/css/slick-theme.css" />
<link rel="stylesheet" href="/assets/css/slick.css" />
@endpush
@push('scripts')
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/qte.js"></script>
<script src="/assets/js/basket.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".detail-img-product").slick({
      slidesToShow: 1,
      autoplay:false,
      autoplaySpeed:1500,
      slidesToScroll: 1,
      centerMode: false,
      arrows: true,
      swipeToSlide: true,
      dots: false,
      infinite: true,
      prevArrow: `
        <button class='btn btn-rounded btn-prev'>
          <svg id="i-left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492">
            <path d="M198.608 246.104L382.664 62.04c5.068-5.056 7.856-11.816 7.856-19.024 0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12C361.476 2.792 354.712 0 347.504 0s-13.964 2.792-19.028 7.864L109.328 227.008c-5.084 5.08-7.868 11.868-7.848 19.084-.02 7.248 2.76 14.028 7.848 19.112l218.944 218.932c5.064 5.072 11.82 7.864 19.032 7.864 7.208 0 13.964-2.792 19.032-7.864l16.124-16.12c10.492-10.492 10.492-27.572 0-38.06L198.608 246.104z" />
          </svg>
        </button>`,
      nextArrow: `
        <button class='btn btn-rounded btn-next'>
          <svg id="i-left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492">
          <path d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z" />
          </svg>
        </button>`
    });

    $('#btn-detail-add-basket').on('click', function(){
        $('.btn-detail-panier').attr('id', '');
        $('.btn-detail-panier').addClass('btn-loader');
        addPanier(function(response){
          $('.panier-nb').text(response.nb_panier);

          showPanier(function(){
            $('.btn-detail-panier').attr('id', 'btn-detail-add-basket');
            $('.btn-detail-panier').removeClass('btn-loader');

          });
          
        });      
    });

    $('#btn-detail-question').on('click', function(){
        $('#question-ref').text($('#product-name').text());
        $('#modal-question').modal('show');     
    });

    function addPanier(callback)
    {
      $.ajax({

            type: "POST",

            url: $('#form-basket').attr('action'),

            dataType: "json",

            data: $('#form-basket').serialize()

        })

        .done(function (response, textStatus, jqXHR) {
             callback(response);

        })

        .fail(function (jqXHR, textStatus, errorThrown) {

            // le message est volontairement différent du précédent pour aider à cibler la cause de l'erreur

            afficherPopupErreur('Nous sommes désolés, il n\'est pas possible de compléter l\'opération pour l\'instant.');

        });
    }
});
</script>
@endpush