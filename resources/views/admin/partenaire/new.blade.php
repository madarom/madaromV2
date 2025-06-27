@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Partenaires</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Partenaires</li>
        <li class="breadcrumb-item active">Nouveau</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section product">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <form method="POST" id="form-save" class="form-images" action="{{route('admin.partenaire.save')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="infos-produits">
                <div>
                  <div class="row ">
                    <div class="col-lg-10">
                      <input type="hidden" name="id" @if(isset($partenaire)) value="{{$partenaire->id}}" @endif>
                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Nom du Partenaire</label>
                          <input type="text" placeholder="Nom du partenaire*" @if(isset($partenaire)) value="{{$partenaire->name}}" @endif id="name" name="name" class="form-control">
                        </div>
                      </div>  

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label"> description du partenaire en FR</label>
                          <textarea placeholder="Petite résumé de la description du produit" class="form-control" name="description_fr" style="height: 150px">@if(isset($partenaire)){{$partenaire->description_fr}}@endif</textarea>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label"> description du partenaire en EN</label>
                          <textarea placeholder="Petite résumé de la description du produit" class="form-control" name="description_en" style="height: 150px">@if(isset($partenaire)){{$partenaire->description_en}}@endif</textarea>
                        </div>
                      </div>

                      <div class="col-sm-6">
                          @if(isset($partenaire))
                          <input type="hidden" value="{{\URL::to('/assets/images/partenaires/')}}/{{$partenaire->logo}}" name="preview{{$partenaire->logo}}" class="preview">
                          @endif
                          <input name="logo" @if(isset($partenaire)) data-id="{{$partenaire->logo}}" @endif  type="file" class="file"
                    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                      </div>

                      <div class="row mb-3 div-btn">
                        <div class="col-lg-3">
                          <button type="submit" id="btn-save" class="btn btn-primary">Enregistrer</button>
                        </div>
                      </div>
                    </div>
                    <!---->
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
@push('styles')
<link rel="stylesheet" href="/assets/file-input/css/fileinput.min.css" />
@endpush

@push('scripts')
<script src="/assets/file-input/js/fileinput.min.js"></script>
<script type="text/javascript">
 
    $( ".preview" ).each(function(index) {
      if($(this).val() != '') {
          $(this).parent().find('.file').fileinput(
          {
              'previewFileType': 'any',
              initialPreview: [
                  "<img src='"+ $(this).val() +"' class='file-preview-image' alt='Desert' title='Desert'>"
              ]
            }
          );
      }     
    });


    $(document).ready(function () {
        $('.file').on('fileclear', function(event) {
          $('input[name="preview'+ $(this).attr('data-id') +'"]').val('delete');  
        });

        $('.file').on('change', function(event) {
             $('input[name="preview'+ $(this).attr('data-id') +'"]').val('delete'); 
        });
    });
</script>
@endpush
@endsection