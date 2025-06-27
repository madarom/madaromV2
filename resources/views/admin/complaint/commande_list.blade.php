@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Plaintes</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Commandes</li>
        <li class="breadcrumb-item active">Plaintes</li>
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
                  <th scope="col">Pays</th>
                  <th scope="col">telephone</th>
                  <th scope="col">Commande</th>
                  <th scope="col">Date Plaintes</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($complaints as $key => $complaint)
                <tr>
                  <th class="hidden id">{{$complaint->id}}</th>
                  <th class="hidden message">{{$complaint->message}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="email">{{$complaint->commande->devis->user->email}}</td>
                  <td class="nom">{{$complaint->commande->devis->user->name}}</td>
                  <td class="pays">{{$complaint->commande->devis->user->pays}}</td>
                  <td class="phone">{{$complaint->commande->devis->user->full_number}}</td>
                  <td class="lang hidden">{{$complaint->commande->devis->user->lang}}</td>
                  <td class="devis"> <a href="{{route('admin.order.detail', ['id' => $complaint->commande->id])}}">{{$complaint->commande->ref}}</a></td>
                  <td class="date">{{$complaint->created_at}}</td>
                  <td>
                    <a  title="Voir message" class='view-message tb-action' href="javascript:"><i class="bi bi-chat-dots-fill"></i></a>
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
@include('admin.complaint.modal-complaint')
@endsection