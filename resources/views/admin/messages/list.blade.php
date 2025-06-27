@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Messages des clients</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Messages Clients</li>
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
                  <th scope="col">Date Message</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contacts as $key => $contact)
                <tr>
                  <th class="hidden id">{{$contact->id}}</th>
                  <th class="hidden message">{{$contact->message}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="email">{{$contact->email}}</td>
                  <td class="nom">{{$contact->prenom}} {{$contact->name}}</td>
                  <td class="adresse hidden">{{$contact->adresse}}</td>
                  <td class="ville">{{$contact->ville}}</td>
                  <td class="pays">{{$contact->pays}}</td>
                  <td class="phone hidden">{{$contact->full_number}}</td>
                  <td class="fb hidden">{{$contact->reseau_sociaux}}</td>
                  <td class="lang hidden">{{$contact->lang}}</td>
                  <td class="name">{{$contact->created_at}}</td>
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
@include('admin.messages.modal-message')
@endsection