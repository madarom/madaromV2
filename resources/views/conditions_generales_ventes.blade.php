@extends('layouts.app')

@section('content') 
<main class="page-body-content static-content">
  <section class="search">
    <div class="img1 static-page">
      <img src="/assets/images/partenaires.jpg" alt="madarom"/>
    </div>
  </section>
  <section class="profil partenaires">
    <div class="inner">
    <div class="page-container">
      <div class="section-heading">
        <h2>
          Conditions générales de ventes
        </h2>
      </div>
      <div class="conditions_ventes">
          {!!$content!!}
      </div>
    </div>
  </div>
  </section>
    
</main>  

@endsection