@extends('layouts.app')

@section('content')
<section class="search">
  <div class="img1 mySlides ">
    {!! image('acceuil.image_slide_1') !!}
    <h1 class="font-comic">
    {!!i18n('acceuil.h1')!!}
    </h1>
  </div>

  <div class="img1 mySlides">
    {!!image('acceuil.image_slide_2')!!}
    <h2>
    {!!i18n('acceuil.h2_second_slide')!!}
    </h2>
  </div>

  <div class="img1 mySlides">
    {!!image('acceuil.image_slide_3')!!}
    <h2>
    {!!i18n('acceuil.h2_third_slide')!!}
    </h2>
  </div>

  <a class="btnCarousel" href="javascript:" id="prevSlide" onclick="plusDivs(-1)"><i class="material-icons md-keyboard_arrow_left"></i></a>
  <a class="btnCarousel" href="javascript:" id="nextSlide" onclick="plusDivs(+1)"><i class="material-icons md-keyboard_arrow_right"></i></a>
</section>

@if(count($huiles))
<section class="residences">
  <div class="inner">
    <div class="page-container">
      <div class="section-heading">
        <h3>
          {!!i18n('acceuil.huiles_essentiels_phares')!!}
        </h3>
      </div>
      <div class="@if(count($huiles) >= 4) listing @else listing-product @endif">
        @foreach($huiles as $key => $product)
        <div class="three-column product-summer">
           @include('products.summary')
        </div>
        @endforeach

      </div>
      <div class="load-more mt-lg-5 mt-md-3  text-center">
        <a href="{{route('product.huile_essentiel.list')}}" class="btn btn-primary">{!!i18n('acceuil.nos_huiles')!!}</a>
      </div>
    </div>
  </div>
</section>
@endif

@if(count($epices))
<section class="epices">
  <div class="inner">
    <div class="page-container">
      <div class="section-heading">
        <h3>
          {!!i18n('acceuil.epices_phares')!!}
        </h3>
      </div>
      <div class="@if(count($epices) >= 4) listing @else listing-product @endif">
        @foreach($epices as $key => $product)
        <div class="three-column product-summer">
           @include('products.summary')
        </div>
        @endforeach
      </div>
      <div class="load-more mt-lg-5 mt-md-3  text-center">
        <a href="{{route('product.epices.list')}}" class="btn btn-primary">{!!i18n('acceuil.nos_epices')!!}</a>
      </div>
    </div>
  </div>
</section>
@endif
<section class="profil">
  <div class="inner">
    <div class="page-container">

      <div class="listing listing-text no-wrap">

        <div class="three-column">
          <div class="common-card img-histo">
            <figure class="common-card-figure">
              {!!image('acceuil.historique')!!}
            </figure>
          </div>
        </div>
        <div class="three-column">
          <figcaption class="card-caption">
            <p class="histo-title">{!!i18n('acceuil.historique_title')!!}</p>
            <p class="histo-text">
              {!!i18n('acceuil.history')!!}
            </p>
          </figcaption>
          <div class="load-more mt-lg-5 mt-md-3  text-center">
            <a href="{{route('qui_sommes_nous')}}" class="btn btn-primary">{!!i18n('acceuil.savoir_plus')!!}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="profil">
  <div class="inner">
    <div class="page-container">

      <div class="listing no-wrap">
        <div class="three-column">
          <a class="block" href="{{route('qui_sommes_nous')}}">
              <div class="common-card img_common">
                <figure class="common-card-figure">
                  {!!image('acceuil.qualite')!!}
                </figure>
              </div>
              <figcaption class="card-caption">
                <p class="card-title">{!!i18n('acceuil.qualite')!!}</p>
                <p class="card-subtitle">
                  {!!i18n('acceuil.qualite_desc')!!}
                </p>
              </figcaption>
          </a>

        </div>
        <div class="three-column">
          <a class="block" href="{{route('qui_sommes_nous')}}">
            <div class="common-card img_common">
              <figure class="common-card-figure">
                {!!image('acceuil.filiere')!!}
              </figure>
            </div>
            <figcaption class="card-caption">
              <p class="card-title">{!!i18n('acceuil.filieres')!!}</p>
              <p class="card-subtitle">
                {!!i18n('acceuil.filieres_desc')!!}
              </p>
            </figcaption>
          </a>
        </div>
        <div class="three-column">
          <a class="block" href="{{route('qui_sommes_nous')}}">
            <div class="common-card img_common">
              <figure class="common-card-figure">
                {!!image('acceuil.approche')!!}
              </figure>
            </div>
            <figcaption class="card-caption">
              <p class="card-title">{!!i18n('acceuil.approche')!!}</p>
              <p class="card-subtitle">
                {!!i18n('acceuil.approche_desc')!!}
              </p>
            </figcaption>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="media inner">
  <div class="page-container">
    <div class="listing">
      <div class="media-item">
	<div><i class="fa fa-lock"></i></div>
	<p class="blck-title">{!!i18n('acceuil.secure_payment')!!}</p>
	<p class="blck-subtitle">{!!i18n('acceuil.secure_payment_desc')!!}</p>
      </div>
      <div class="media-item">
        <div><i class="fa fa-refresh"></i></div>
	<p class="blck-title">{!!i18n('acceuil.garantie_satis')!!}</p>
	<p class="blck-subtitle">{!!i18n('acceuil.garantie_satis_desc')!!}</p>
      </div>
      <div class="media-item">
        <div><i class="fa fa-mobile"></i></div>
	<p class="blck-title">{!!i18n('acceuil.client_service')!!}</p>
	<p class="blck-subtitle">{!!i18n('acceuil.client_service_desc')!!}</p>
      </div>
  <div class="media-item">
        <div><i class="fa fa-folder"></i></div>
	<p class="blck-title">{!!i18n('acceuil.demande_devis')!!}</p>
	<p class="blck-subtitle">{!!i18n('acceuil.demande_devis_desc')!!}</p>
      </div>
    </div>
  </div>
@include('products.modal-basket')
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="/assets/css/slick-theme.min.css" />
<link rel="stylesheet" href="/assets/css/slick.min.css" />
@endpush
@push('scripts')
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/script.min.js"></script>
@endpush
