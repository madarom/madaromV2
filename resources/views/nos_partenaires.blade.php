@extends('layouts.app')

@section('content') 
<main class="page-body-content">
  <section class="search">
    <div class="img1 static-page">
      {!!image('nos_partenaires.background')!!}
    </div>
  </section>
  <section class="profil partenaires">
    <div class="inner">
    <div class="page-container">
      <div class="section-heading">
        <h2>
          {!!i18n('nos_partenaires.title')!!}
        </h2>
      </div>
      <div class="">
        @foreach($partenaires as $key => $partenaire)
        <div class="list-partenaires">
          <div class="img">
            <img src="/assets/images/partenaires/{{$partenaire->logo}}" alt="Résidence" />
          </div>
          <figcaption class="card-caption">
            <p class="card-title">
              {{$partenaire->name}}
            </p>
            <p class="description-partenaires">
              {{i18n_partenaire($partenaire, 'description')}}
            </p>
          </figcaption>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </section>
    
</main>  

@endsection