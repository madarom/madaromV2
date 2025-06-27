<div class="modal fade" id="modal-question" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="basket-modal-title">
          
          <i class="fa fa-question-circle"></i> <span class="font-comic">{!!i18n('detail_produit.ask_question_about')!!} <span id="question-ref"></span></span>
      </h5>
      <form id="question-form" novalidate class="question-form" method="POST" action="{{route('product.question')}}">
      {{ csrf_field() }}

        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="ipt-rgstr">
          <input required="" type="text" name="name" class="ipt" placeholder="{!!i18n('contactez-nous.nom')!!}*" value="@if($errors->any()) {{old('name')}} @elseif(\Auth::check()) {{\Auth::user()->name}} {{\Auth::user()->prenom}} @endif"/>
          @error('name')
          <p class="error">{{$message}}</p>
          @enderror
        </div>
        <div class="ipt-rgstr">
          <input type="email" required="" name="email" class="ipt" placeholder="{!!i18n('contactez-nous.email')!!}*" value="@if($errors->any()) {{old('email')}} @elseif(\Auth::check()) {{\Auth::user()->email}} @endif" />
          @error('email')
          <p class="error">{{$message}}</p>
          @enderror
        </div>

        <div class="ipt-rgstr">
          <label>{!!i18n('contactez-nous.pays')!!}*</label>
          <input type="text" id='country_selector' required="" name="pays" class="ipt country"placeholder="{!!i18n('contactez-nous.pays')!!}*" value="@if($errors->any()) {{old('pays')}} @elseif(\Auth::check()) {{\Auth::user()->pays}} @endif" />
          @error('pays')
          <p class="error">{{$message}}</p>
          @enderror
        </div>

        <div class="ipt-rgstr">
          <label>{!!i18n('contactez-nous.telephone')!!}*</label>
          <input type="text" id='phone' type="tel" required="" name="telephone" class="ipt" placeholder="" value="@if($errors->any()) {{old('telephone')}} @elseif(\Auth::check()) {{\Auth::user()->telephone}} @endif" />
          @error('telephone')
          <p class="error">{{$message}}</p>
          @enderror
        </div>
        <div class="ipt-rgstr">
          <textarea name="message" placeholder="{!!i18n('contactez-nous.message')!!}">@if($errors->any())  {{old('message')}} @endif</textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancel-basket" onclick="$('#modal-question').modal('hide');" data-bs-dismiss="modal">{!!i18n('button.cancel')!!}</button>
          <button type="submit" id="btn-send-question" class="btn btn-primary">{!!i18n('button.send')!!}</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('styles')
<link rel="stylesheet" href="/assets/inttelput/css/intlTelInput.css" />
<link rel="stylesheet" href="/assets/country-select/css/countrySelect.min.css" />
@endpush
@push('scripts')
<script src="/assets/inttelput/js/intlTelInput.js"></script>
<script src="/assets/country-select/js/countrySelect.min.js"></script>
<script src="/assets/js/countryPhoneSelect.js"></script>
@endpush