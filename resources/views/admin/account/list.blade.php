@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Compte Clients</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Compte Clients</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Ville</th>
                  <th scope="col">Pays</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Date de creation</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clients as $key => $client)
                <tr>
                  <th class="hidden id">{{$client->id}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="email">{{$client->email}}</td>
                  <td class="name">{{$client->prenom}} {{$client->name}}</td>
                  <td class="adresse hidden">{{$client->adresse}}</td>
                  <td class="ville">{{$client->ville}}</td>
                  <td class="pays">{{$client->pays}}</td>
                  <td class="phone">{{$client->full_number}}</td>
                  <td class="lang hidden">{{$client->lang}}</td>
                  <td class="date">{{$client->created_at}}</td>
                  <td>
                    <a  title="Details compte" class='edit-text tb-action view-infos' href="javascript:"><i class="bi bi-eye-fill"></i></a>
                  </td>
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
@include('admin.account.modal-detail')
@endsection