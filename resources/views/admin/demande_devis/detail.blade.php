@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Demande de devis</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Demande de devis</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">

              <div class="no-wrap register-container">
                <div class="section-heading title-detail">
                  <h2>
                    Demande de devis - {{$devis->ref}}
                  </h2>
                </div>

               
                <div class="btn-ct detail-devis-price">
                   @if($devis->statut == 3)
                  <a class="custom-btn devis-price" href="#">
                    <span>{{$devis->response->price}} {{$devis->response->price_unit->symbol}}</span>
                  </a>
                  @endif
                   <a class="custom-btn commander infos-client" href="#">
                    <i class="bi bi-person"></i> <span>Infos sur le client</span>
                  </a>

                  <a class="custom-btn commander infos-client" href="#">
                    <i class="bi bi-translate"></i> <span>Lang : {{$devis->user->lang}}</span>
                  </a>
                </div>
                
                <div class="three-column">
                 <form class="" novalidate method="POST" action="{{route('admin.devis.reply')}}">
                  {{ csrf_field() }}
                    <input type="hidden" name="demande_devis_id" value="{{$devis->id}}">
                    <div class="client-part">
                      @foreach($devis->products as $key => $product)
                      <div class="row devis-product @if($key==0) first @endif">
                        <div class="devis-btn-content">
                          <a href="{{url_product($product)}}" class="voir_message tip tooltipmenu">
                            <span class="message"><i class="fa fa-search"></i></span>
                            <span class="tooltiptext">Detail</span>
                          </a>
                          @if(count($devis->products) > 1)
                          <a href='javascript:' data-href="{{route('demande-devis.product.delete', [$product->id])}}" class="delete-product tip tooltipmenu">
                            <span class="message"><i class="fa fa-trash"></i></span>
                            <span class="tooltiptext">Supprimer</span>
                          </a>
                          @endif
                        </div>
                        <input type="hidden" value="{{$product->id}}">
                        <div class="product-image col-3">
                           <div class="img-product devis">
                              <a class="devis-detail-product" href="javascript:">
                                @if(count($product->product->images)>0)
                                <img src="/assets/images/products/{{$product->product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                                @endif
                              </a>
                           </div>
                        </div>

                        <div class="product-infos devis col-9">
                           <p class="title-p font-comic"><span class="basket-ref">{{$product->product->ref}}</span> - <span id="basket-nom">{{$product->product->nom}}</span></p>
                           <p id="devis-subtitle" class="detail-p"></p>
                           <div class="qte">
                             <input class="ipt-qte-p ipt-qte" disabled=""  type="text" min="1" value="Quantité : {{$product->quantite}} {{$product->unite->designation_fr}}">
                             <input class="product-qte" type="hidden" name="" value="{{$product->quantite}}">
                             <input class="ipt-qte-p ipt-qte unit_price" required="" name="unit_price{{$product->id}}" placeholder="Prix unitaire TTC"  type="number" min="1" value="{{$product->unit_price}}" value="">
                           </div>

                           
                        </div>
                      </div>
                      @endforeach
                      <div class="ipt-radio row type-price">
                        <div class="radio col-3">
                          <input type="radio" @if($devis->price_type==1) checked="" @endif id="prixLivre" name="price_type" value="1" />
                          <label for="prixLivre">Prix Livré</label>
                        </div>
                        <div class="radio col-3">
                          <input type="radio" id="prixFob" @if($devis->price_type==2) checked="" @endif name="price_type" value="2" />
                          <label for="prixFob">Prix FOB</label>
                          <a href="javascript:" class="voir_message price tip tooltipmenu">
                            <span class="message"><i class="fa fa fa-question-circle"></i></span>
                          </a>
                        </div>
                        <div class="radio col-3">
                          <input type="radio" @if($devis->price_type==3) checked="" @endif id="prixUsine" name="price_type" value="3" />
                          <label for="prixUsine">Prix usine</label>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-12">
                          <label for="summary_desc" class="col-sm-6 col-form-label">Message du client</label>
                          <textarea placeholder="Message du client" disabled="" class="form-control" style="height: 100px">{{$devis->message}}</textarea>
                        </div>
                      </div>
                    </div>
                    
                    <h3 class="title-section"> Partie Administrateur</h3>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-lg-3">
                          <label for="nom" class="col-sm-6 col-lg-12 col-form-label">Prix Total TTC</label>
                          <input id="total_price" name="price" type="number" required="" placeholder="Prix attribue*" @if($devis->response)value="{{$devis->response->price}}" @endif class="form-control">
                        </div>
                        <div class="col-sm-3 col-lg-3">
                          <label for="nom" class="col-sm-6 col-lg-12 col-form-label">Unité monetaire</label>
                          <select name="price_unit_id" class="form-select">
                            @foreach($currs as $key => $cur)
                            <option @if($devis->response && $devis->response->price_unit_id==$cur->id)selected @endif value="{{$cur->id}}">{{$cur->symbol}} ({{$cur->label}})</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                    <div class="row mb-3">
                      <div class="col-sm-12">
                        <label for="admin_message" class="col-sm-6 col-form-label">Message de l'administrateur</label>
                        <textarea placeholder="Message de l'administrateur" class="content-jqte" name="admin_message" style="height: 100px">@if($devis->response){{$devis->response->admin_message}}@endif</textarea>
                      </div>
                    </div>
                   
                    
                    <div class="col-lg-3">
                      <button type="submit" id="btn-save" class="btn btn-primary">Repondre demande de devis</button>
                    </div>
                  </form> 
                </div>
              </div>

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
<div class="modal fade" id="modal-infos" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="modal-title">
          
          <i class="bi bi-info-circle"></i> <span class="font-comic">Informations sur le Client</span>
      </h5>
      <div class="modal-body">
          <div class="row">
              <div>
                 <p><i class="bi bi-person"></i> <span>{{$devis->user->name}} {{$devis->user->prenom}}</span></p>
                 <p><i class="bi bi-envelope"></i> <span>{{$devis->user->email}}</span></p>
                 <p><i class="bi bi-telephone"></i> <span>{{$devis->user->full_number}}</span></p>
                 <p><i class="bi bi-globe-americas"></i> <span>{{$devis->user->pays}}</span></p>
                 <p><i class="bi bi-translate"></i> <span>Langue choisi : {{$devis->user->lang}}</span></p>
                 <p><i class="bi bi-geo-alt-fill"></i> <span>{{$devis->user->ville}}</span></p>
                 <p><i class="bi bi-geo-fill"></i> <span>Adresse : {{$devis->user->adresse}}</span></p>
              </div>
          </div>
          

      </div>
      <input type="hidden" id="btn-source">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-basket" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@push('styles')
<link rel="stylesheet" href="/assets/jquery-te/jquery-te-1.4.0.css" />
@endpush
@push('scripts')
<script src="/assets/jquery-te/jquery-te-1.4.0.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $('.infos-client').on('click', function(){
      
      $('#modal-infos').modal('show');
    });

    $('.unit_price').on('change', function(){
      var prix = 0;
      var elem = $(this);
      $('.unit_price').each(function(){
          if($(this).val() != '')
          prix = parseFloat(prix) + (parseFloat($(this).val()) * parseFloat(elem.parent().find('.product-qte').val()));

      });
      $("#total_price").val(prix);
    });
  });
</script>
<script type="text/javascript">
  $('.content-jqte').jqte();
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });
</script>
@endpush
@endsection
