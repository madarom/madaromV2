@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Commandes</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Commandes</li>
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
                @foreach($orders as $key => $order)
                <tr>
                  <th scope="row">
                      <div class="devis">
                        <div class="tete">
                          <div class="ref">Ref : {{$order->ref}}</div>
                        </div>
                        <div class="d-body">
                          <div class="ct">
                            <div class="date-ct">
                              <div class="right-elmt">
                                  <a href="javascript:" class="voir_message infos-client"><span class="message"><i class="bi bi-person"></i></span></a>
                                  <a href="javascript:" class="voir_message"><span class="message"><i class="bi bi-chat"></i></span></a>
                                  <span class="statut @if($order->statut == 1) en-attente @elseif($order->statut == 2) en-cours @elseif($order->statut == 3) en-cours-livraison @else traite @endif">@if($order->statut == 1) En attente @elseif($order->statut == 2) En cours @elseif($order->statut == 3) En cours de Livraison @else Livrée @endif</span>
                              </div>
                               
                               <span class="date-update">Soumis par {{$order->devis->user->name}} {{$order->devis->user->prenom}} le {{format_date($order->updated_at)}}</span>
                            </div>
                            <div class="detail-ct">
                              @foreach($order->devis->products as $key => $product)
                              <div class="product">
                                  <div class="img-prd">
                                    @if($product->product && count($product->product->images)>0)
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
                              <a class="custom-btn devis-price" href="#">
                                <span>{{format_money($order->devis->response->price)}}  {{$order->devis->response->price_unit->symbol}}</span>
                              </a>
                              <a class="custom-btn btn-change-statut" data-id="{{$order->id}}" data-statut="{{$order->statut}}" href="javascript:">
                                <i class="bi bi-info-circle"></i> <span>Changer statut</span>
                              </a>
                              <a class="custom-btn" href="{{route('admin.order.detail', ['id' => $order->id])}}">
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
@include('admin.order.modal-infos')
@include('admin.order.modal-statut')
@endsection