@extends('admin.layouts.app')

@section('content') 
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Produits</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item">Produits</li>
        <li class="breadcrumb-item active">Nouveau</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section product">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <form method="POST" id="form-save" class="form-images" action="{{route('admin.product.save')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Francais</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Anglais</a>
                </li>
              </ul>
              <div class="tab-content infos-produits" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row ">
                    <div class="col-lg-10">
                      <h2>Infos Produits</h2>
                      <div class="row mb-3">
                        @if(isset($product)) 
                        
                        <input type="hidden" name="id" value="{{$product->id}}"> 
                        @endif
                        <div class="col-sm-10">
                          <label for="product_type_id" class="col-sm-6 col-form-label">Type du produit</label>
                          <select name="product_type_id" class="form-select">
                            <option @if($type==1 || (isset($product) && $product->product_type_id==1)) selected="" @endif value="1">Huiles essentielles</option>
                            <option @if($type==2 || (isset($product) && $product->product_type_id==2)) selected="" @endif value="2">Epices</option>
                        </select>
                        </div>
                      </div> 

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Nom du produit</label>
                          <input type="text" placeholder="Nom du produits*" @if(isset($product)) value="{{$product->nom}}" @endif id="nom" name="nom" class="form-control">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="subtitle" class="col-sm-6 col-form-label">Sous-titre</label>
                          <input type="text" placeholder="Sous-titre*" @if(isset($product)) value="{{$product->subtitle}}" @endif  name="subtitle" class="form-control">
                        </div>
                      </div> 

                      <div class="row mb-3">
                        <label for="inputText"  class="col-sm-6 col-form-label">Unités</label>
                        <div class="pick-joueurs">
                         <select multiple="" id="selectpickerUnite" class="form-control rounded" aria-label="Selectionner Unité" name="unites[]">
                              @foreach($unites as $key => $unite)
                              <option value="{{$unite->id}}" @if(isset($product) && in_array($unite->id, $product->unites->pluck('unite_id')->toArray())) selected="" @endif>{{$unite->designation_fr}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div> 

                      <div class="row mb-3">
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="pure" id="pure" @if(!(isset($product) && $product->pure == 2)) checked @endif>
                              <label class="form-check-label" for="pure">100% Pure et Naturelle</label>
                            </div>
                        </div>
                      </div> 

                      <div class="row mb-3">
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" name="stock" id="stock" @if(!(isset($product) && $product->stock == 2)) checked @endif>
                              <label class="form-check-label" for="stock">Disponible en stock</label>
                            </div>
                        </div>
                      </div> 

                      <div class="row mb-3">
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                              <input class="form-check-input" name="home_page" type="checkbox" id="home_page" @if(!(isset($product) && $product->home_page == 2)) checked @endif>
                              <label class="form-check-label" for="home_page">Afficher sur la page d'acceuil</label>
                            </div>
                        </div>
                      </div> 

                      

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label">Résumé de la description du produit</label>
                          <textarea placeholder="Petite résumé de la description du produit" class="form-control" name="summary_desc" style="height: 100px">@if(isset($product)){{$product->summary_desc}}@endif</textarea>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label">Mot cles</label>
                          <textarea placeholder="Quelques mot cles permettant la recherche du produit. Separe par point virgule" class="form-control" name="keywords" style="height: 100px">@if(isset($product)){{$product->keywords}}@endif</textarea>
                        </div>
                      </div>

                      <div id="detail_desc" class="row mb-3">
                        <label for="detail_desc" class="col-sm-6 col-form-label">Description detailles</label>
                        <div class="col-sm-10">
                             <textarea name="detail_desc" class="content-jqte">@if(isset($product)){{$product->detail_desc}}@endif</textarea>
                        </div>
                      </div>
                    </div>
                    <!---->
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="row infos-produits">
                    <div class="col-lg-10">
                      <h2>Infos Produits Anglais</h2>

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="nom" class="col-sm-6 col-form-label">Nom du produit</label>
                          <input type="text" placeholder="Nom du produits*" @if(isset($product)) value="{{$product->nom_en}}" @endif" id="nom_en" name="nom_en"  class="form-control">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="subtitle" class="col-sm-6 col-form-label">Sous-titre</label>
                          <input type="text" placeholder="Sous-titre*" @if(isset($product)) value="{{$product->subtitle_en}}" @endif  name="subtitle_en" class="form-control">
                        </div>
                      </div> 

                      

                      <div class="row mb-3">
                        <div class="col-sm-10">
                          <label for="summary_desc" class="col-sm-6 col-form-label">Résumé de la description du produit</label>
                          <textarea placeholder="Petite résumé de la description du produit" class="form-control" name="summary_desc_en" style="height: 100px">@if(isset($product)){{$product->summary_desc_en}}@endif</textarea>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="detail_desc" class="col-sm-6 col-form-label">Description detailles</label>
                        <div id="detail_desc_en" class="col-sm-10">
                             <textarea name="detail_desc_en" class="content-jqte">@if(isset($product)){{$product->detail_desc_en}}@endif</textarea>
                        </div>
                      </div>
                    </div>
                    <!---->
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <button id="btn-next" class="btn btn-primary">Suivant</button>
                  </div>
                  
                </div>
              </div>
              
              <div class="row img-produits">
                <div class="col-lg-10">
                    <div class="col-lg-12">
                      <h2>Images du Produits</h2>
                      <div class="row mb-3">
                        
                        <div class="col-sm-6">
                          @if(isset($product) && count($product->images)>=1)
                          <input type="hidden" value="{{\URL::to('/assets/images/products/')}}/{{$product->images[0]->filename}}" name="preview{{$product->images[0]->id}}" class="preview">
                          @endif
                          <input name="images[]" @if(isset($product) && count($product->images)>=1) data-id="{{$product->images[0]->id}}" @endif  type="file" class="file"
                    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                        </div>

                        <div class="col-sm-6">
                           @if(isset($product) && count($product->images)>=2) 
                           <input type="hidden" value="{{\URL::to('/assets/images/products/')}}/{{$product->images[1]->filename}}" name="preview{{$product->images[1]->id}}" class="preview">
                           @endif
                          <input name="images[]" @if(isset($product) && count($product->images)>=2) data-id="{{$product->images[1]->id}}" @endif type="file" class="file"
                    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                        </div>

                        
                      </div>
                      <div class="row mb-3">
                        <div class="col-sm-6">
                           @if(isset($product) && count($product->images)==3)
                           <input type="hidden" value="{{\URL::to('/assets/images/products/')}}/{{$product->images[2]->filename}}" name="preview{{$product->images[2]->id}}" class="preview">
                           @endif
                          <input name="images[]" @if(isset($product) && count($product->images)>=3) data-id="{{$product->images[2]->id}}" @endif type="file" class="file"
                    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <button id="btn-prec" class="btn btn-primary">Precedent</button>
                        </div>
                        <div class="col-lg-6">
                          
                        </div>
                        <div class="col-lg-3">
                          <button type="submit" id="btn-save" class="btn btn-primary">Enregistrer</button>
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
@push('styles')
<link rel="stylesheet" href="/assets/file-input/css/fileinput.min.css" />
<link rel="stylesheet" href="/assets/jquery-te/jquery-te-1.4.0.css" />
<link href="/assets/css/choices.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="/assets/file-input/js/fileinput.min.js"></script>
<script src="/assets/js/choices.min.js"></script>
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

        $('#btn-next').on('click', function(e){
            e.preventDefault();
            $('.infos-produits').hide();
            $('.img-produits').show();
        });

        $('#btn-prec').on('click', function(e){
            e.preventDefault();
            $('.infos-produits').show();
            $('.img-produits').hide();
        });
    });
</script>

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

  const sorting = document.querySelector('#selectpickerUnite');
  const commentSorting = document.querySelector('#selectpickerUnite');
  const sortingchoices = new Choices(sorting, {
    placeholder: false,
    itemSelectText: ''
  });
</script>
@endpush
@endsection