@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Partenaires</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Partenaires</li>
        <li class="breadcrumb-item active">Liste</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row mb-3 div-btn div-entete">
              
              <div  class="col-sm-1">
                  <button type="button" class="btn btn-info themes btn-action" ><a href="{{route('admin.partenaire.new')}}"><i class="bi bi-plus-circle"></i></a></button>
                  
              </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Logo</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Description FR</th>
                  <th scope="col">Description EN</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($partenaires as $key => $partenaire)
                <tr>
                  <th class="hidden id">{{$partenaire->id}}</th>
                  <th class="td-img" scope="row">{{$key+1}}</th>
                  <td class="nom td-img"><img class="part-logo" src="/assets/images/partenaires/{{$partenaire->logo}}"></td>
                  <td class="nom td-img">{{$partenaire->name}}</td>
                  <td class="fr td-img">{{$partenaire->description_fr}}</td>
                  <td class="en td-img">{{$partenaire->description_en}}</td>
                  <td class="td-img">
                    <a  title="Voir message" class='view-message tb-action' href="{{route('admin.partenaire.update', ['id' => $partenaire->id])}}"><i class="bi bi-pencil-square"></i></a>
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
@endsection