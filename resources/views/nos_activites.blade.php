@extends('layouts.app')

@section('content') 
<main class="page-body-content">
  <section class="search">
    <div class="img1 static-page">
      {!!image('nos_activite.background')!!}
    </div>
  </section>
  <section class="profil">
    <div class="inner">
      <div class="page-container">
        <div class="section-heading">
          <h2>
            {!!i18n('nos_activite.title')!!}
          </h2>
        </div>
        <div class="listing listing-text no-wrap">
          
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('nos_activite.historique')!!}
              </figure>
            </div>
          </div>
          <div class="three-column">
            <figcaption class="card-caption">
              <p class="histo-title">{!!i18n('nos_activite.historique')!!}</p>
              <p class="histo-text">
                {!!i18n('nos_activite.historique_desc')!!}
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
              <p class="histo-title">{!!i18n('nos_activite.qualite')!!}</p>
              <p class="histo-text">
                {!!i18n('nos_activite.qualite_desc')!!}
              </p>
            </figcaption>
          </div>
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('nos_activite.qualite')!!}
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
                {!!image('nos_activite.filiere')!!}
              </figure>
            </div>
          </div>
          <div class="three-column">
            <figcaption class="card-caption">
              <p class="histo-title">{!!i18n('nos_activite.filiere')!!}</p>
              <p class="histo-text">
                {!!i18n('nos_activite.filiere_desc')!!}
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
              <p class="histo-title">{!!i18n('nos_activite.approche')!!}</p>
              <p class="histo-text">
                {!!i18n('nos_activite.approche_desc')!!}
              </p>
            </figcaption>
          </div>
          <div class="three-column">
            <div class="common-card img-histo">
              <figure class="common-card-figure">
                {!!image('nos_activite.approche')!!}
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>  

@endsection