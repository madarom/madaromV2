@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container commande-container">
        <div class="section-heading devis">
          <h2>
            {!!i18n('order_error.votre_commande')!!} ({{$devis->ref}})
          </h2>
        </div>

        <div class="three-column">

            <div class="success-infos">
                <div class="error-icon">
                  <i class="fa fa-exclamation-circle"></i>
                
                </div>

                <div class="center">
              
                  <span class="cmd-success">{!!i18n('order_error.error_text')!!}</span>
                
                </div>

                <div class="center success-price">                  
                    <span class="cmd-price">{!!i18n('order_error.total_a_payer')!!} {{$devis->response->price}} {{$devis->response->price_unit->symbol}}</span>
                </div>
                
                <div class="load-more mt-lg-5 mt-md-3 center">
                  <a class="btn btn-login btn-cmd" href="{{route('demande-devis.order', ['ref' => $devis->ref])}}">
                     <i class="fa fa-shopping-bag"></i> {!!i18n('order_error.commander')!!}<i class="fa fa-caret-right"></i>
                  </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
