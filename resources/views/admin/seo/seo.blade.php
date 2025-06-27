@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>SEO</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item active">SEO</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section static-page">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <form method="POST" id="form-save" action="{{route('admin.seo.save')}}">
              {{ csrf_field() }}
              <div class="div-entete">
                  <div class="row mb-3 div-btn">
                   <label for="inputText" class="col-sm-12 col-form-label">Selectionner une page</label>
                  </div>
                  <div class="row mb-3 div-btn">
                    
                    <div class="col-sm-4">
                      <select name="url" class="form-select" id="selectPage">
                        @foreach($pages as $key => $page)
                        <option value="{{$page->url}}" @if($selectedPage && $selectedPage==$page->url) selected @endif>{{$page->url}}</option>
                        @endforeach
                      </select>

                    </div>
                    <div class="col-sm-2">
                      <button id="btn-save" type="button" class="btn btn-info themes btn-action">Enregistrer</button>
                    </div>
                    <div class="col-sm-2">
                      <button id="new-url" type="button" class="btn btn-info themes btn-action">Nouvel Url</button>
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
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Titre de la page</label>
                          <input type="text" placeholder="Titre de la page*" @if(isset($seo)) value="{{$seo->title_fr}}" @endif id="title" name="title_fr" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Keywords</label>
                          <input type="text" placeholder="Keywords*" @if(isset($seo)) value="{{$seo->keywords_fr}}" @endif name="keywords_fr" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label">Description</label>
                          <textarea placeholder="Description" class="form-control" name="description_fr" style="height: 100px">@if(isset($seo)){{$seo->description_fr}}@endif</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Titre de la page</label>
                          <input type="text" placeholder="Titre de la page*" @if(isset($seo)) value="{{$seo->title_en}}" @endif id="title" name="title_en" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Keywords</label>
                          <input type="text" placeholder="Keywords*" @if(isset($seo)) value="{{$seo->keywords_en}}" @endif name="keywords_en" class="form-control">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label">Description</label>
                          <textarea placeholder="Description" class="form-control" name="description_en" style="height: 100px">@if(isset($seo)){{$seo->description_en}}@endif</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@include('admin.seo.modal-new')
@push('styles')
<link rel="stylesheet" href="/assets/jquery-te/jquery-te-1.4.0.css" />
@endpush
@push('scripts')
<script src="/assets/jquery-te/jquery-te-1.4.0.min.js"></script>
<script type="text/javascript">

  $('#btn-save').on('click', function(){
    $('#form-save').submit();
  });

  $('#selectPage').on('change', function(){
    location.href="?page=" + $(this).val();
  });
</script>
@endpush
@endsection