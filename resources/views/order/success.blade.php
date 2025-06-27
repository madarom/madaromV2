@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container commande-container">
        <div class="section-heading devis">
          <h2>
            {!!i18n('order.votre_commande')!!} ({{$order->ref}})
          </h2>
        </div>

        <div class="three-column">

            <div class="success-infos">
                <div class="success-icon">
                  <i class="fa fa-check-circle"></i>
                
                </div>

                <div class="center">
              
                  <span class="cmd-success">{!!i18n('order_success.order_submit_success')!!}</span>
                
                </div>

                <div class="center success-price div-montant">                  
                    <span class="cmd-price">{!!i18n('order_detail.total_paye')!!} {{$order->devis->response->price}} {{$order->devis->response->price_unit->symbol}}</span>
                </div>
                
                <div class="load-more mt-lg-5 mt-md-3 center">
                  <a href="{{route('order.invoice', ['id' => $order->id])}}" class="btn btn-login btn-cmd  btn-page" next="order-infos-produit">
                     <i class="fa fa-file-pdf-o"></i> {!!i18n('order_list.facture')!!}
                  </a>

                  <a class="btn btn-login btn-cmd" href="{{route('espace_client')}}?tab=order">
                     <i class="fa fa-shopping-bag"></i> {!!i18n('order_success.mes_commandes')!!} <i class="fa fa-caret-right"></i>
                  </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
