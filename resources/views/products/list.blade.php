@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      <div class="section-heading">
          <h2>
            @if(isHuilesList())
            {!!i18n('menu.huiles_essentielles')!!}
            @else
            {!!i18n('menu.epices')!!}
            @endif
          </h2>
      </div>
      @include('products.results')
    </div>
  </div>
</section>
@include('products.modal-basket')
@endsection
