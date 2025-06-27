<footer>
    <div>
      <div class="page-container">
        <div class="listing mb-lg-4 cnt-ft">
          <div class="ft-three-column">
            <div>
              <a href="#"><i class="material-icons m-ic md-phone_android"></i><span>{!!i18n('footer.phone_number')!!}</span></a>
            </div>
            <div>
              <a href="#"><i class="material-icons m-ic md-mail"></i><span>{!!i18n('footer.madarom_email')!!}</span></a>
            </div>

            
          </div>
		<div class="lang-foot">
              <a href="{{route('lang', ['fr'])}}">
				<img src="/assets/images//flag_fr.svg" alt="" />
              </a>
			 <a href="{{route('lang', ['en'])}}">
				<img src="/assets/images//uk-flag.svg" alt="" />
              </a>
              
            </div>
          
          <div class="ft-three-column">
            <div>
              <a href="#"><i class="material-icons m-ic md-location_on"></i><span>{!!i18n('footer.lot')!!}</span></a>
              <a class="twn" href="#"><span>{!!i18n('footer.ville')!!}</span></a>
            </div>
          </div>
        </div>
        <div class="rgpd">
          <a href="{{route('mentions_legales')}}"><span>{!!i18n('footer.mentions_legales')!!}</span></a>
          <a href="{{route('conditions_generales_ventes')}}"><span>{!!i18n('footer.conditions_ventes')!!}</span></a>
          <a href="{{route('donnees_personnelles')}}"><span>{!!i18n('footer.data_perso')!!}</span></a>
        </div>
      </div>
    </div>
  </footer>