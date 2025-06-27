@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Contenu textuelles des pages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Gestion des contenus</li>
        <li class="breadcrumb-item active">Texte</li>
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
                  <div class="modal fade" id="addModal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Contenu Textuelle</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" id="form-save" action="{{route('save_text')}}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" id="id"  name="id">
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">Page</label>
                              <div class="col-sm-10">
                                <input placeholder="Page" type="text" id="page" name="page" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputText" class="col-sm-2 col-form-label">Key</label>
                              <div class="col-sm-10">
                                <input type="text" placeholder="Key" id="key" name="key" class="form-control">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputPassword" class="col-sm-2 col-form-label">Fr</label>
                              <div class="col-sm-10">
                                <textarea placeholder="Francais" class="form-control" id="fr" name="fr" style="height: 100px"></textarea>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <label for="inputPassword" class="col-sm-2 col-form-label">En</label>
                              <div class="col-sm-10">
                                <textarea placeholder="Anglais" class="form-control" id="en" name="en" style="height: 100px"></textarea>
                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                          <button type="submit" id="btn-enregistrer" class="btn btn-primary">Enregistrer</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-sm-4">
                <select class="form-select" id="selectPage">
                  <option value="all" @if(!$selectedPage) selected @endif>Tous les pages</option>
                  @foreach($pages as $key => $page)
                  <option value="{{$page->page}}" @if($selectedPage && $selectedPage==$page->page) selected @endif>{{$page->page}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Page</th>
                  <th scope="col">Key</th>
                  <th scope="col">Texte fr</th>
                  <th scope="col">Texte En</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($texts as $key => $text)
                <tr>
                  <th class="hidden id">{{$text->id}}</th>
                  <th scope="row">{{$key+1}}</th>
                  <td class="page">{{$text->page}}</td>
                  <td class="key">{{$text->key}}</td>
                  <td class="fr">{!! $text->fr !!}</td>
                  <td class="en">{!! $text->en !!}</td>
                  <td><a class='edit-text' href="javascript:"><i class="bi bi-pencil-square"></i></a></td>
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
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#btn-enregistrer').on('click', function(){
      $('#form-save').submit();
    });

    $('body').on('click', '.edit-text', function() {
        $('#id').val($(this).parent().parent().find('.id').text());
        $('#page').val($(this).parent().parent().find('.page').text());
        $('#key').val($(this).parent().parent().find('.key').text());
        $('#fr').val($(this).parent().parent().find('.fr').text());
        $('#en').val($(this).parent().parent().find('.en').text());
        $('#id').val($(this).parent().parent().find('.id').text());
        $('#addModal').modal('show');
    });

    $('#selectPage').on('change', function(){
      location.href="?page=" + $(this).val();
    });

  });
</script>
@endpush
@endsection