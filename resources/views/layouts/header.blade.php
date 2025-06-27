<header class="page-container-fluid px-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
      <img src="/assets/images/logo_madarom.png" alt="Whoomies" />
    </a>
    
    <div class="btn-mbl-menu">

    	<a href="{{route('product.panier.detail')}}" class="panier d-lg-none">
    		<i class="fa fa-shopping-basket"></i>
    		<span class="panier-nb-mbl panier-nb">{{nb_panier()}}</span>
    	</a>
      @if(Auth::check())
      <a class="menu-a compte d-lg-none" href="{{route('logout')}}">
      <i class="fa fa-sign-out"></i></a>
      @else
      <a class="menu-a compte d-lg-none" href="{{route('login')}}">
        <i class="fa fa-user"></i>
      </a>
      @endif
      <a href="" class="panier d-lg-none">
        <i class="fa fa-question-circle"></i>
      </a>
    	<a href="#" class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#menu"
          aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons md-menu"></i>
    	</a>
    </div>
    @include('layouts.search')
    <div class="collapse navbar-collapse" id="menu">
      
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0 ">
        
    	  <li class="menu "><a class="font-comic" href="/">{{i18n('menu.acceuil')}} &ensp;</a></li>
        <li class="menu deroulant"><a href="#">{!! i18n('menu.presentation') !!} &ensp;</a>
          <ul class="sous">
            <li><a class="menu-a" href="{{route('qui_sommes_nous')}}">{!!i18n('menu.qui_sommes_nous')!!}</a></li>
            <li><a class="menu-a" href="{{route('nos_activites')}}">{!!i18n('menu.activite')!!}</a></li>
            <li><a class="menu-a" href="{{route('partenaires')}}">{!!i18n('menu.nos_partenaires')!!}</a></li>
          </ul>
        </li>
    	  <li class="menu deroulant"><a href="#">{!!i18n('menu.nos_produits')!!} &ensp;</a>
    			<ul class="sous">
    			  <li><a class="menu-a" href="{{route('product.huile_essentiel.list')}}">{!!i18n('menu.huiles_essentielles')!!}</a></li>
    			  <li><a class="menu-a" href="{{route('product.epices.list')}}">{!!i18n('menu.epices')!!}</a></li>
    			</ul>
    	  </li>
        <li class="menu"><a class="menu-a" href="{{route('nous_joindre')}}">{!!i18n('menu.contact')!!} &ensp;</a></li>
    	  <li class="menu"><a title="{!!i18n('menu.panier')!!}" class="menu-a panier tooltipmenu" href="{{route('product.panier.detail')}}">
    		<i class="fa fa-shopping-basket"></i>
    		<span class="panier-nb">{{nb_panier()}}</span>
              <span class="tooltiptext">{!!i18n('menu.panier')!!}</span>
    	  </a></li>

    	  
    	  
          @if(Auth::check())
          <li class="menu">
            <a title="{!!i18n('menu.compte')!!}" class="menu-a compte tooltipmenu" href="#">
              <i class="fa fa-user"></i>
              <span class="txt-cpt tooltiptext">{!!i18n('menu.compte')!!}</span>
            </a>
            <ul class="sous sous-compte">
              <li>
                <a class="menu-a compte" href="{{route('espace_client')}}">
                  <i class="fa fa-list"></i>
                  <span class="txt-cpt">{!!i18n('menu.espace_client')!!}</span>
                </a>
              </li>
              <li>
                <a class="menu-a compte" href="{{route('mon_compte')}}">
                  <i class="fa fa-gear"></i>
                  <span class="txt-cpt">{!!i18n('menu.mon_compte')!!}</span>
                </a>
              </li>
              <li>
                <a class="menu-a compte" href="{{route('logout')}}">
                  <i class="fa fa-sign-out"></i>
                  <span class="txt-cpt">{!!i18n('menu.logout')!!}</span>
                </a>
              </li>

              
            </ul>
            
          </li>
          @else
          <li class="menu">
          <a title="{!!i18n('menu.compte')!!}" class="menu-a compte tooltipmenu" href="{{route('login')}}">
            <i class="fa fa-user"></i>
            <span class="txt-cpt tooltiptext">{!!i18n('menu.compte')!!}</span>
          </a>
          </li>
          @endif
          
          <li class="menu"><a title="Aide" class="menu-a compte tooltipmenu" href="javascript:">
        <i class="fa fa-question-circle"></i>
              <span class="tooltiptext">{!!i18n('menu.aide')!!}</span>
        </a></li>
        <li class="nav-item lang menu">
          @if(lang() == 'fr')
          <div class="btn-group">
            <a  class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" href="{{route('lang', ['fr'])}}">
              <img src="/assets/images/flag_fr.svg" alt="" />
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="language">
                <a href="{{route('lang', ['en'])}}" class="dropdown-item">
                  <img src="/assets/images/uk-flag.svg" alt="" />
                </a>
              </div>
            
          </div>
          @else
          <div class="btn-group">
            <a  class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" href="{{route('lang', ['fr'])}}">
              <img src="/assets/images/uk-flag.svg" alt="" />
            </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="language">
                <a href="{{route('lang', ['fr'])}}" class="dropdown-item">
                  <img src="/assets/images/flag_fr.svg" alt="" />
                </a>
              </div>
            
          </div>
          @endif
        </li>
    </ul>
  </div>
  </nav>
</header>