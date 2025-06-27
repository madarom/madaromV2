@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap">
        <div class="three-column">
              @if($errors->any())
              <div class="alert alert-danger" role="alert">
                {!!i18n('demande_devis.error_complaint')!!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif
              @if (Session::has('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{!!i18n('demande_devis.complaint_success')!!}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link @if($tab=='quote') active @endif tab" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-folder"></i> <span>{!!i18n('espace_clients.my_quote_requests')!!}<span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($tab=='order') active @endif tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa fa-shopping-bag"></i> <span>{!!i18n('espace_clients.mes_commandes')!!}<span></a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade   @if($tab=='quote') show active @endif " id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('demande_devis.liste-demande-devis')
                </div>
                <div class="tab-pane @if($tab=='order') show active @endif fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('order.liste')
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
