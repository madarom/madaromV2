@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Images des pages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Gestion des contenus</li>
        <li class="breadcrumb-item active">Images</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section static-page">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
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
            
            <form method="POST" id="form-save" class="form-images" action="{{route('save_images')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              @if(isset($imagesPages))
              @foreach($imagesPages as $key => $image) 
              <input type="hidden" name="id[]" value="{{$image->id}}">
              <div class="row mb-3">

                <div class="col-sm-6">
                  <input type="hidden" class="preview" value="{{\URL::to('/assets/images/')}}/{{$image->filename}}">
                  <input id="image" name="image{{$image->id}}" type="file" class="file" value="http://madaromsite.test/assets/images/background.jpeg" 
                  data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                </div>

                <div class="col-sm-6">
                  <label for="inputText" class="col-sm-2 col-form-label">Key</label>
                  <div class="col-sm-10">
                    <input type="text" value="{{$image->key}}" readonly placeholder="Key" id="key" name="key[]" class="form-control">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">Alt</label>
                  <div class="col-sm-10">
                    <input type="text" placeholder="Alt" value="{{$image->alt}}" id="Alt" name="alt[]" class="form-control">
                  </div>
                </div>
              </div>  
              @endforeach
              @endif           
            </form>
            

          </div>
        </div>

      </div>
    </div>
  </section>

</main>
@push('styles')
<link rel="stylesheet" href="/assets/file-input/css/fileinput.min.css" />
@endpush
@push('scripts')
<script src="/assets/file-input/js/fileinput.min.js"></script>
<script type="text/javascript">
  $( ".preview" ).each(function(index) {
      $(this).parent().find('.file').fileinput(
      {
          'previewFileType': 'any',
          initialPreview: [
              "<img src='"+ $(this).val() +"' class='file-preview-image' alt='Desert' title='Desert'>"
          ]
        }
      );    
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