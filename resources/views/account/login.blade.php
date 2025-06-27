@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="listing listing-text log no-wrap register-container">
        
        
        <div class="three-column lgn-ctt">
              @if($status = \Session::get('quote'))
              <div class="alert alert-success" role="alert">
               {{i18n('demande_devis.demande_devis_connexion_message')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              @if($status = \Session::get('message_create_password'))
              <div class="alert alert-success" role="alert">
               {{i18n('login.password-reinit-success')}}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <h3 class="text-2xl font-medium mb:3 md:mb-6">{!!i18n('connexion.sidentifier')!!}</h3>
              <form class="" novalidate method="POST" action="{{route('process_login')}}">
              {{ csrf_field() }}
              
              
              @if($errors->any())
              <div class="alert alert-danger" role="alert">
               {!!i18n('messages.error_connexion')!!}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif
              <div class="ipt-frm">
                <input type="text" name="email" class="ipt" placeholder="{!!i18n('connexion.mail')!!}" @if($errors->any())  value="{{old('email')}}" @endif />
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-frm">
                <input type="password" name="password" class="ipt" placeholder="{!!i18n('connexion.password')!!}" />
              </div>
              <div class="ipt-frm">
                <a class="pass-forgot" href="{{route('passwordforgot')}}">{!!i18n('connexion.forgot_password')!!}</a>
              </div>
              <div class="load-more">
                <button class="btn btn-login">
                  {!!i18n('connexion.connexion')!!}
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