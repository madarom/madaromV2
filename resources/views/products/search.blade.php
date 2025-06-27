@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      <div class="section-heading">
          <h2>
            {!!i18n('search.result_search')!!} «{{$keyword}}»
          </h2>
      </div>
      @include('products.results')
    </div>
  </div>
</section>
@include('products.modal-basket')
@endsection
