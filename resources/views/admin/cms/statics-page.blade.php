@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Contenu textuelles des pages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Gestion des contenus</li>
        <li class="breadcrumb-item active">Statics-Page</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section static-page">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <form method="POST" id="form-save" action="{{route('save_static')}}">
              {{ csrf_field() }}
              <div class="div-entete">
                  <div class="row mb-3 div-btn">
                   <label for="inputText" class="col-sm-12 col-form-label">Selectionner une page</label>
                  </div>
                  <div class="row mb-3 div-btn">
                    
                    <div class="col-sm-4">
                      <select name="page" class="form-select" id="selectPage">
                        @foreach($pages as $key => $page)
                        <option value="{{$page->page}}" @if($selectedPage && $selectedPage==$page->page) selected @endif>{{$page->page}}</option>
                        @endforeach
                      </select>

                    </div>
                    <div class="col-sm-4">
                      <button id="btn-save" type="button" class="btn btn-info themes btn-action">Enregistrer</button>
                    </div>
                  </div>
              </div>
              
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Francais</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Anglais</a>
                </li>
              </ul>
              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <textarea name="fr" class="content-jqte">@if($currentPage){{$currentPage->fr}}@endif</textarea>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <textarea name="en" class="content-jqte">@if($currentPage){{$currentPage->en}}@endif</textarea>
                </div>
              </div>
            </form>
            

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@push('styles')
<link rel="stylesheet" href="/assets/jquery-te/jquery-te-1.4.0.css" />
@endpush
@push('scripts')
<script src="/assets/jquery-te/jquery-te-1.4.0.min.js"></script>
<script src="/assets/js/jqte-custom.js"></script>
<script type="text/javascript">
  $('.content-jqte').jqte();
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });

  $('#btn-save').on('click', function(){
    $('#form-save').submit();
  });

  $('#selectPage').on('change', function(){
    location.href="?page=" + $(this).val();
  });
</script>
@endpush
@endsection