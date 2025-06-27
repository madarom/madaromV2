@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <div class="section-heading">
          <h2>
            {!!i18n('contactez-nous.title')!!}
           
          </h2>
        </div>
        <div class="three-column">
              <form class="" novalidate method="POST" action="{{route('save_contact')}}">
              {{ csrf_field() }}
              @if($errors->any())
              <div class="alert alert-danger" role="alert">
                {!!i18n('contactez-nous.error_saisie')!!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif

              @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{!!i18n('contactez-nous.message_success')!!}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @endif

              <div class="ipt-rgstr">
                <input required="" type="text" name="name" class="ipt" placeholder="{!!i18n('contactez-nous.nom')!!}*" @if($errors->any())  value="{{old('name')}}" @endif/>
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <input required="" type="text" name="prenom" class="ipt" placeholder="{!!i18n('contactez-nous.prenom')!!}*" @if($errors->any())  value="{{old('prenom')}}" @endif/>
                @error('prenom')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <input type="email" required="" name="email" class="ipt" placeholder="{!!i18n('contactez-nous.email')!!}*" @if($errors->any())  value="{{old('email')}}" @endif />
                @error('email')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <input required="" type="text" name="adresse" class="ipt" placeholder="{!!i18n('contactez-nous.adresse')!!}*" @if($errors->any())  value="{{old('adresse')}}" @endif/>
                @error('adresse')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <input type="text" required="" name="ville" class="ipt" placeholder="{!!i18n('contactez-nous.ville')!!}*" @if($errors->any())  value="{{old('ville')}}" @endif />
                @error('ville')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <label>{!!i18n('contactez-nous.pays')!!}*</label>
                <input type="text" id='country_selector' required="" name="pays" class="ipt country"placeholder="{!!i18n('contactez-nous.pays')!!}*" @if($errors->any())  value="{{old('pays')}}" @endif />
                @error('pays')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <label>{!!i18n('contactez-nous.telephone')!!}*</label>
                <input type="text" id='phone' type="tel" required="" name="telephone" class="ipt" placeholder="" @if($errors->any())  value="{{old('full_number')}}" @endif />
                @error('telephone')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <input required="" type="text" name="reseau_sociaux" class="ipt" placeholder="Contact Réseaux sociaux" @if($errors->any())  value="{{old('reseau_sociaux')}}" @endif/>
                @error('adresse')
                <p class="error">{{$message}}</p>
                @enderror
              </div>
              <div class="ipt-rgstr">
                <textarea name="message" placeholder="{!!i18n('contactez-nous.message')!!}">@if($errors->any())  {{old('message')}} @endif</textarea>
              </div>
              <div class="load-more">
                <button class="btn btn-login">
                  {!!i18n('contactez-nous.envoyer')!!}
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