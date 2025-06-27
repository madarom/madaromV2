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

            

            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($demandeDevis as $key => $devis)
                <tr>
                  <th scope="row">
                      <div class="devis">
                        <div class="tete">
                          <div class="ref">Ref : {{$devis->ref}}</div>
                        </div>
                        <div class="d-body">
                          <div class="ct">
                            <div class="date-ct">
                              <div class="right-elmt">
                                  <a href="javascript:" class="voir_message"><span class="message"><i class="bi bi-person"></i></span></a>
                                  <a href="javascript:" class="voir_message"><span class="message"><i class="bi bi-chat"></i></span></a>
                                  <span class="statut @if($devis->statut == 1) en-attente @else traite @endif">@if($devis->statut == 1) En attente  @else Traité @endif</span>
                              </div>
                               
                               <span class="date-update">Soumis par {{$devis->user->name}} {{$devis->user->prenom}} le {{format_date($devis->updated_at)}}</span>
                            </div>
                            <div class="detail-ct">
                              @foreach($devis->products as $key => $product)
                              <div class="product">
                                  <div class="img-prd">
                                    @if(count($product->product->images)>0)
                                    <img src="/assets/images/products/{{$product->product->images[0]->filename}}" alt="{{i18n_product($product->product, 'nom')}}" />
                                    @endif
                                    <div class="qte-prd">{{$product->quantite}} {{$product->unite->abr}}</div>
                                  </div>
                                  
                                  <div class="label-product">
                                    {{$product->product->ref}}
                                  </div>
                                  
                               </div>
                               @endforeach
                            </div>
                          </div>
                          <div class="pied">

                            <div class="btn-ct">
                              @if($devis->statut == 3)
                              <a class="custom-btn devis-price" href="#">
                                <span>{{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
                              </a>
                              @endif
                              <a class="custom-btn" href="{{route('admin.devis.detail', ['id' => $devis->id])}}">
                                <i class="bi bi-search"></i> <span>Voir detail</span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                  </th>
                </tr>
                @endforeach
              </tbody>
            
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection