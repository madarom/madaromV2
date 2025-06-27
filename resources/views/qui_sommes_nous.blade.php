@extends('layouts.app')

@section('content') 
<main class="page-body-content">
  <section class="search">
    <div class="img1 static-page">
      {!!image('qui_sommes_nous.background')!!}
    </div>
  </section>
  <section class="profil">
    <div class="inner">
      <div class="page-container">
        <div class="section-heading">
          <h2>
            {!!i18n('qui_sommes_nous.title')!!}
          </h2>
        </div>
        <div class="listing listing-text no-wrap">
          
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('qui_sommes_nous.historique')!!}
              </figure>
            </div>
          </div>
          <div class="three-column">
            <figcaption class="card-caption">
              <p class="histo-title">{!!i18n('qui_sommes_nous.historique')!!}</p>
              <p class="histo-text">
                {!!i18n('qui_sommes_nous.historique_desc')!!}
              </p>
            </figcaption>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="profil">
    <div class="inner">
      <div class="page-container">
        
        <div class="listing listing-text no-wrap">
          <div class="three-column">
            <figcaption class="card-caption">
              <p class="histo-title">{!!i18n('qui_sommes_nous.qualite')!!}</p>
              <p class="histo-text">
                {!!i18n('qui_sommes_nous.qualite_desc')!!}
              </p>
            </figcaption>
          </div>
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('qui_sommes_nous.qualite')!!}
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="profil">
    <div class="inner">
      <div class="page-container">
        
        <div class="listing listing-text no-wrap">
          
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('qui_sommes_nous.filiere')!!}
              </figure>
            </div>
          </div>
          <div class="three-column">
            <figcaption class="card-caption">
              <p class="histo-title">{!!i18n('qui_sommes_nous.filiere')!!}</p>
              <p class="histo-text">
                {!!i18n('qui_sommes_nous.filiere_desc')!!}
              </p>
            </figcaption>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="profil">
    <div class="inner">
      <div class="page-container">
        
        <div class="listing listing-text no-wrap">
          <div class="three-column">
            <figcaption class="card-caption">
              <p class="histo-title">{!!i18n('qui_sommes_nous.approche')!!}</p>
              <p class="histo-text">
                {!!i18n('qui_sommes_nous.approche_desc')!!}
              </p>
            </figcaption>
          </div>
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('qui_sommes_nous.approche')!!}
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>  

@endsection