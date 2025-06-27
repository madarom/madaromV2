@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Questions sur les produits</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Questions Produits</li>
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
                  <th scope="col">Pays</th>
                  <th scope="col">telephone</th>
                  <th scope="col">Produits</th>
                  <th scope="col">Date Questions</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($questions as $key => $question)
                <tr>
                  <th class="hidden id">{{$question->id}}</th>
                  <th class="hidden message">{{$question->message}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="email">{{$question->email}}</td>
                  <td class="nom">{{$question->name}}</td>
                  <td class="pays">{{$question->pays}}</td>
                  <td class="phone">{{$question->full_number}}</td>
                  <td class="lang hidden">{{$question->lang}}</td>
                  <td class="produit"> <a href="{{route('admin.product.update', [$question->product->id])}}">{{$question->product->ref}} - {{$question->product->nom}}</a></td>
                  <td class="date">{{$question->created_at}}</td>
                  <td>
                    <a  title="Voir message" class='view-message tb-action' href="javascript:"><i class="bi bi-question-circle"></i></a>
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
@include('admin.products.modal-questions')
@endsection