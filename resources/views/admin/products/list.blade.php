@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Produits</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Produits</li>
        <li class="breadcrumb-item">
          @if($type==1)
          Huiles essentielles
          @else
          Epices
          @endif
        </li>
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
                  <button type="button" class="btn btn-info themes btn-action" data-bs-toggle="modal" data-bs-target="#addModal"><a href="{{route('admin.product.add', [$type])}}"><i class="bi bi-plus-circle"></i></a></button>
                  
              </div>
            </div>

            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Reference</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Sous-titre</th>
                  <th scope="col">Stock</th>
                  <th scope="col">Page d'acceuil</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $key => $product)
                <tr>
                  <th class="hidden id">{{$product->id}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="reference">{{$product->ref}}</td>
                 <td class="reference">{{$product->nom}}</td>
                 <td class="reference">{{$product->subtitle}}</td>
                 <td class="reference">@if($product->stock)<i class="bi bi-check2-all"></i>@else<i class="bi bi-x-circle"></i>@endif</td>
                 <td class="reference">@if($product->home_page) Oui @else Non @endif</td>
                  <td>
                    <!--<a  title="Details compte" class='edit-text tb-action' href="javascript:"><i class="bi bi-eye-fill"></i></a>-->
                    <a  title="Modifier" class='edit-cpt tb-action' href="{{route('admin.product.update', [$product->id])}}"><i class="bi bi-pencil-square"></i></a>
                    <a  title="Supprimer" class='delete-cpt tb-action' href="javascript:"><i class="bi bi-trash3-fill"></i></a>
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
<div class="modal fade" id="deleteModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form-delete" action="{{route('admin.product.delete')}}">
      {{ csrf_field() }}
      <div class="modal-body">
          <input type="hidden" id="id_delete"  name="id">
          <p>Voulez-vous vraiement supprimer ce Produit? </p>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="btn-delete" class="btn btn-primary">Supprimer</button>
      </div>
    </div>
  </div>
</div>


</main><!-- End #main -->
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#btn-enregistrer').on('click', function(){
      $('#form-save').submit();
    });

    $('#btn-update').on('click', function(){
      $('#form-update').submit();
    });

    $('#btn-update-pass').on('click', function(){
      $('#form-update-pass').submit();
    });

    $('#btn-delete').on('click', function(){
      $('#form-delete').submit();
    });

    $('body').on('click', '.edit-cpt', function() {
        $('#id_update').val($(this).parent().parent().find('.id').text());
        $('#name').val($(this).parent().parent().find('.name').text());
        $('#email').val($(this).parent().parent().find('.email').text());
        $('#editModal').modal('show');
    });

    $('body').on('click', '.delete-cpt', function() {
        $('#id_delete').val($(this).parent().parent().find('.id').text());
        $('#deleteModal').modal('show');
    });

    $('body').on('click', '.edit-pswd-cpt', function() {
        $('#id_update_psswd').val($(this).parent().parent().find('.id').text());
        $('#editPasswordModal').modal('show');
    });

  });
</script>
@endpush
@endsection