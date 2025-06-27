<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link @if(str_contains(\Route::currentRouteName(),'dashboard')) active @endif " href="{{route('admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->


    <li class="nav-item">
      <a class="nav-link  @if(str_contains(\Route::currentRouteName(),'client')) active @endif " href="{{route('admin.client.list')}}">
        <i class="bi bi-people-fill"></i>
        <span>Comptes Clients</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if(str_contains(\Route::currentRouteName(),'devis')) active @endif " href="{{route('admin.devis.list')}}">
        <i class="bi bi-wallet2"></i>
        <span>Demande de Devis</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link @if(str_contains(\Route::currentRouteName(),'order')) active @endif" href="{{route('admin.order.list')}}">
        <i class="bi bi-cart4"></i>
        <span>Commandes</span>
      </a>
    </li>



    <li class="nav-item">
      <a class="nav-link  @if(str_contains(\Route::currentRouteName(),'product')) active @else collapsed @endif" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#"  @if(str_contains(\Route::currentRouteName(),'product')) aria-expanded="true" @endif>
        <i class="bi bi-clipboard-pulse"></i><span>Produits</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="product-nav" class="nav-content @if(!str_contains(\Route::currentRouteName(),'product')) collapse @endif " data-bs-parent="#sidebar-nav">
        <li>
          <a class="@if(isset($type) && $type==1) active @endif" href="{{route('admin.product.list', [1])}}">
            <i class="bi bi-circle"></i><span>Huiles essentielles</span>
          </a>
        </li>
        
        <li>
          <a class="@if(isset($type) && $type==2) active @endif" href="{{route('admin.product.list', [2])}}">
            <i class="bi bi-circle"></i><span>Epices</span>
          </a>
        </li>

        <li>
          <a class="@if(isset($type) && $type==2) active @endif" href="{{route('admin.product.questions')}}">
            <i class="bi bi-circle"></i><span>Questions</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link @if(str_contains(\Route::currentRouteName(),'partenaire')) active @endif"" href="{{route('admin.partenaire.list')}}">
        <i class="bi bi-people"></i>
        <span>Partenaires</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link  @if(str_contains(\Route::currentRouteName(),'cms')) active @else collapsed @endif" data-bs-target="#cms-nav" data-bs-toggle="collapse" href="#"  @if(str_contains(\Route::currentRouteName(),'cms')) aria-expanded="true" @endif>
        <i class="bi bi-clipboard-pulse"></i><span>Gestion des contenu</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="cms-nav" class="nav-content @if(!str_contains(\Route::currentRouteName(),'cms')) collapse @endif " data-bs-parent="#sidebar-nav">
        <li>
          <a class="@if(str_contains(\Route::currentRouteName(),'cms.text')) active @endif" href="{{route('admin.cms.text')}}">
            <i class="bi bi-circle"></i><span>Texte</span>
          </a>
        </li>
        
        <li>
          <a class="@if(str_contains(\Route::currentRouteName(),'cms.static-page')) active @endif" href="{{route('admin.cms.static-page')}}">
            <i class="bi bi-circle"></i><span>Pages statics</span>
          </a>
        </li>

        <li>
           <a class="@if(str_contains(\Route::currentRouteName(),'cms.images')) active @endif" href="{{route('admin.cms.images')}}">
            <i class="bi bi-circle"></i><span>Images</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.seo')}}">
        <i class="bi bi-google"></i>
        <span>SEO</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('messages.list')}}">
        <i class="bi bi-chat-dots-fill"></i>
        <span>Messages</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link  @if(str_contains(\Route::currentRouteName(),'plainte')) active @else collapsed @endif" data-bs-target="#plainte-nav" data-bs-toggle="collapse" href="#"  @if(str_contains(\Route::currentRouteName(),'plainte')) aria-expanded="true" @endif>
        <i class="bi bi-chat-dots-fill"></i><span>Plaintes</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="plainte-nav" class="nav-content @if(!str_contains(\Route::currentRouteName(),'plainte')) collapse @endif " data-bs-parent="#sidebar-nav">
        <li>
          <a class="@if(isset($type) && $type==1) active @endif" href="{{route('plainte.demande_devis.list')}}">
            <i class="bi bi-circle"></i><span>Demande de devis</span>
          </a>
        </li>

        <li>
          <a class="@if(isset($type) && $type==1) active @endif" href="{{route('plainte.commande.list')}}">
            <i class="bi bi-circle"></i><span>Commandes</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item  @if(str_contains(\Route::currentRouteName(),'admin.compte')) active @endif ">
      <a class="nav-link" href="{{route('admin.compte.list')}}">
        <i class="bi bi-person-fill"></i>
        <span>Comptes Admin</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.config')}}">
        <i class="bi bi-gear-fill"></i>
        <span>Paramètres</span>
      </a>
    </li>


  </ul>

</aside><!-- End Sidebar-->
