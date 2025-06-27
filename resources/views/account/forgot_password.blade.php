@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="listing no-wrap">
        
        
        <div class="three-column lgn-ctt">
             @if($status = \Session::get('message'))
              <div class="alert alert-success" role="alert">
               {{i18n('mot-de-passe-oublie.sent_mail')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if($status = \Session::get('message_error'))
              <div class="alert alert-danger" role="alert">
               {{i18n('mot-de-passe-oublie.uknown_mail')}} {{app_name()}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if($errors->any())
              <div class="alert alert-danger" role="alert">
               {!!i18n('messages.error_saisie')!!}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
             <h3 class="text-2xl font-medium mb:3 md:mb-6">{!!i18n('mot-de-passe-oublie.title')!!}</h3>
              <form class="" novalidate method="POST" action="{{route('reinit-password')}}">
              {{ csrf_field() }}
              <div class="ipt-frm">
                <input type="text" name="email" class="ipt" id="yourUsername" placeholder="{!!i18n('mot-de-passe-oublie.email')!!}*" />
              </div>
              <div class="ipt-frm">
                <a class="pass-forgot" href="{{route('login')}}">{!!i18n('mot-de-passe-oublie.connect_with_account')!!}</a>
              </div>
              <div class="load-more">
                <button class="btn btn-login">
                  {!!i18n('mot-de-passe-oublie.send_link')!!}
                </button>
              </div>
              </form>
        </div>

        @include('account.new_client')
      </div>
    </div>
  </div>
</section>
@endsection