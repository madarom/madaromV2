@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <div class="section-heading">
          <h2>
            {!!i18n('mon_comptes.manage_account')!!}
          </h2>
        </div>
        <div class="three-column">
             <form class="" novalidate method="POST" action="{{route('update_account')}}">
              {{ csrf_field() }}
              @if($errors->any())
                <div class="alert alert-danger" role="alert">
                  @if($errors->has('password') || $errors->has('old_password'))
                      <ul class="error">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  @else
                  {!!i18n('messages.error_saisie')!!}
                  @endif
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if (\Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{!! Session::get('message') !!}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

                <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.nom')!!}*</label>
                  <input type="text" required="" name="name" class="ipt" placeholder="Nom" @if($errors->any())  value="{{old('name')}}" @else value="{{$user->name}}" @endif/>
                  @error('name')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                 <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.prenom')!!}*</label>
                  <input type="text" required="" name="prenom" class="ipt" placeholder="Prénom" @if($errors->any())  value="{{old('prenom')}}" @else value="{{$user->prenom}}" @endif/>
                  @error('prenom')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.email')!!}*</label>
                  <input type="email" required="" name="email" class="ipt" placeholder="Adresse Email" @if($errors->any())  value="{{old('email')}}" @else value="{{$user->email}}" @endif />
                  @error('email')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                 <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.adresse')!!}*</label>
                  <input type="text" required="" name="adresse" class="ipt" placeholder="Adresse" @if($errors->any())  value="{{old('name')}}" @else value="{{$user->adresse}}" @endif/>
                  @error('adresse')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.ville')!!}*</label>
                  <input type="text" required="" name="ville" class="ipt" placeholder="Ville" @if($errors->any())  value="{{old('ville')}}" @else value="{{$user->ville}}" @endif />
                  @error('ville')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.pays')!!}*</label>
                  <input type="text" id='country_selector' required="" name="pays" class="ipt"placeholder="Pays" @if($errors->any())  value="{{old('pays')}}" @else value="{{$user->pays}}" @endif />
                  @error('pays')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-rgstr">
                  <label>{!!i18n('mon_comptes.telephone')!!}*</label>
                  <input type="text" id="phone" type="tel" required="" name="telephone" class="ipt"  @if($errors->any())  value="{{old('telephone')}}" @else value="{{$user->full_number}}" @endif />
                  @error('telephone')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-frm">
                  <a id="change-psswrd" data-bs-toggle="modal" data-bs-target="#mdpModal" class="pass-forgot chgt-mdp-account" href="javascript:">{!!i18n('mon_comptes.update_password')!!}</a>

                  <a id="annuler-psswrd" class="pass-forgot mdp-account" href="javascript:">{!!i18n('mon_comptes.cancel')!!}</a>
                </div>
                
                
                <div class="load-more mt-lg-5 mt-md-3">
                  <button class="btn btn-login">
                    {!!i18n('mon_comptes.Save')!!}
                  </button>
                </div>
              </form> 
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="mdpModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{!!i18n('mon_comptes.change_password_title')!!}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" id="formDelete" action="{{route('update_mdp')}}">
        {{ csrf_field() }}
        <div class="modal-body">
          
            <div class="ipt-rgstr">
                <input type="password" required="" name="old_password" class="ipt" placeholder="{!!i18n('mon_comptes.current_password')!!}" />
                
            </div>
            <div class="ipt-rgstr ">
              <input type="password" required="" name="password" class="ipt" placeholder="{!!i18n('mon_comptes.new_password')!!}" />
              @error('password')
              <p class="error">{{$message}}</p>
              @enderror
            </div>
            <div class="ipt-rgstr ">
              <input type="password" required="" name="password_confirmation" class="ipt" placeholder="{!!i18n('mon_comptes.confirm_password')!!}" />
              @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="btn-annuler" data-bs-dismiss="modal">{!!i18n('mon_comptes.cancel')!!}</button>
            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-2-fill"></i> {!!i18n('mon_comptes.update')!!}</button>
          
        </div>
        </form>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#change-psswrd').on('click', function(){
        $('#mdpModal').modal('show');
    });

    $('#btn-annuler').on('click', function(){
        $('.modal').modal('hide');
    });

    
  });
</script>
@endpush
@endsection