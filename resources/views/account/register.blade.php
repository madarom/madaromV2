@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <div class="three-column">
              <h3 class="text-2xl font-medium mb:3 md:mb-6">{!!i18n('creation-compte.creer_compte')!!}</h3>
              <form class="" novalidate method="POST" action="{{route('process_register')}}">
              {{ csrf_field() }}
              @if($errors->any())
                <div class="alert alert-danger" role="alert">
                  {!!i18n('messages.error_saisie')!!}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                <div class="ipt-rgstr">
                  <input required="" type="text" name="name" class="ipt" placeholder="{!!i18n('creation-compte.nom')!!}*" @if($errors->any())  value="{{old('name')}}" @endif/>
                  @error('name')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <input required="" type="text" name="prenom" class="ipt" placeholder="{!!i18n('creation-compte.prenom')!!}*" @if($errors->any())  value="{{old('prenom')}}" @endif/>
                  @error('prenom')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <input type="email" required="" name="email" class="ipt" placeholder="{!!i18n('creation-compte.email')!!}*" @if($errors->any())  value="{{old('email')}}" @endif />
                  @error('email')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <input required="" type="text" name="adresse" class="ipt" placeholder="{!!i18n('creation-compte.adresse')!!}*" @if($errors->any())  value="{{old('adresse')}}" @endif/>
                  @error('adresse')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <input type="text" required="" name="ville" class="ipt" placeholder="{!!i18n('creation-compte.ville')!!}*" @if($errors->any())  value="{{old('ville')}}" @endif />
                  @error('ville')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <label>{!!i18n('creation-compte.pays')!!}*</label>
                  <input type="text" id='country_selector' required="" name="pays" class="ipt country"placeholder="{!!i18n('creation-compte.pays')!!}*" @if($errors->any())  value="{{old('pays')}}" @endif />
                  @error('pays')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <label>{!!i18n('creation-compte.telephone')!!}*</label>
                  <input type="text" id='phone' type="tel" required="" name="telephone" class="ipt" placeholder="" @if($errors->any())  value="{{old('telephone')}}" @endif />
                  @error('telephone')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <input type="password" required="" name="password" class="ipt" placeholder="{!!i18n('creation-compte.password')!!}*" />
                  @error('password')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <input type="password" required="" name="password_confirmation" class="ipt" placeholder="{!!i18n('creation-compte.confirm_password')!!}*" />
                </div>
                <div class="ipt-frm">
                  <a class="pass-forgot" href="{{route('login')}}">{!!i18n('creation-compte.connexion')!!}</a>
                </div>
                <div class="load-more mt-lg-5 mt-md-3">
                  <button class="btn btn-login">
                    {!!i18n('creation-compte.enregistrer')!!}
                  </button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</section>
@push('styles')
<link rel="stylesheet" href="/assets/inttelput/css/intlTelInput.css" />
<link rel="stylesheet" href="/assets/country-select/css/countrySelect.min.css" />
@endpush
@push('scripts')
<script src="/assets/inttelput/js/intlTelInput.js"></script>
<script src="/assets/country-select/js/countrySelect.min.js"></script>
<script src="/assets/js/countryPhoneSelect.js"></script>
@endpush
@endsection