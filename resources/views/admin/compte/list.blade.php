@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Compte Administrateur</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Compte Admin</li>
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
                  <button type="button" class="btn btn-info themes btn-action" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-plus-circle"></i></button>
                  
              </div>
            </div>
            <!-- Table with stripped rows -->
            @if(\Session::has('error'))
            <div class="alert alert-danger" role="alert">
              Veuillez verifier les informations saisies
            </div>
            @endif

             @if(\Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Modification avec succès</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($admins as $key => $admin)
                <tr>
                  <th class="hidden id">{{$admin->id}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="email">{{$admin->email}}</td>
                  <td class="name">{{$admin->name}}</td>
                  <td>
                    <a  title="Modifier" class='edit-cpt tb-action' href="javascript:"><i class="bi bi-pencil-square"></i></a>
                    <a  title="Mot de passe" class='edit-pswd-cpt tb-action' href="javascript:"><i class="bi bi-key-fill"></i></a>
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
@include('admin.compte.modals.add')
@include('admin.compte.modals.edit')
@include('admin.compte.modals.delete')
@include('admin.compte.modals.edit-password')


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