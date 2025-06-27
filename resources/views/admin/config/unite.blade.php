<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      


      <div class="row button-cont">
        <div class="col-md-2 mr-button mr-btn">
          <a href="javascript:">
            <button id="btn-nouv" class="btn btn-primary w-100" type="button" data-bs-toggle="modal" data-bs-target="#modal-unite"><i class="ri-add-box-fill"></i> Nouveau</button>
          </a>
        </div>

        <div class="col-md-2 mr-btn">
                  <button class="btn btn-danger w-100" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete-unite"><i class="ri-delete-bin-2-fill"></i> Supprimer</button>
                  <div class="modal fade" id="modal-delete-unite" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Confirmation suppression</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          
                          Voulez vous vraiment supprimer? 
                          <br>Attention : Cette action est irreversible
                        </div>
                        <div class="modal-footer">
                          
                          <form method="post" id="formDelete" action="{{route('admin.config.unite.delete')}}">
                            {{ csrf_field() }}
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <input class="selectedUnites" type="hidden" name="unites" value="[]">
                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-2-fill"></i> Supprimer</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
      </div>

      <!-- Table with hoverable rows -->
      <div class="row">
          <div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Designation Fr</th>
                  <th scope="col">Designation EN</th>
                  <th scope="col">Abreviation</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($unites as $key => $unite)
                <tr id-tr="{{$unite->id}}" class="tr-unite">
                  <th scope="row"> 
                    <input type="checkbox" class="check-select" name="">
                  </th>
                  <td class="designation_fr">{{$unite->designation_fr}}</td>
                  <td class="designation_en">{{$unite->designation_en}}</td>
                  <td class="abr">{{$unite->abr}}</td>
                  <td>
                    <a href="javascript:" data-id="{{$unite->id}}" class="action-btn edit-unite"><i class="ri-edit-2-fill"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="modal fade modal-create" id="modal-unite" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Unites</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    <form method="POST" action="{{route('admin.config.unite.save')}}">
                    {{ csrf_field() }}
                    
                    <input type="hidden" id="id_unite" name="id" value="">
                    
                    <div class="row mb-3">
                      <label for="inputText"  class="col-sm-2 col-form-label">Fr</label>
                      <div class="col-sm-10">
                        <input type="text" required id="designation_fr" name="designation_fr" class="form-control"
                        value="">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText"  class="col-sm-2 col-form-label">En</label>
                      <div class="col-sm-10">
                        <input type="text" required id="designation_en" name="designation_en" class="form-control"
                        value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputText"  class="col-sm-2 col-form-label">Abreviation</label>
                      <div class="col-sm-10">
                        <input type="text" required id="abr" name="abr" class="form-control"
                        value="">
                      </div>
                    </div>

                    
                    <div class="row">
                      <div class="col-md-4 mr-button mr-btn">
                            <button class="btn btn-primary w-100" type="submit"><i class="ri-save-2-fill"></i> Enregistrer</button>
                      </div>
                       <div class="col-md-4 mr-button mr-btn">
                            <button class="btn btn-secondary w-100" data-bs-dismiss="modal" type="button"><i class="ri-close-circle-line"></i> Annuler</button>
                      </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
      </div>
      
      

    </div>
  </div>

</div>
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
      var unites = [];
      $('.tr-unite').on('click', function(){

        if($(this).hasClass("active")) {
          $(this).removeClass('active');
          $(this).find(".check-select").prop("checked", false);
          var index = unites.indexOf($(this).attr("id-tr"));

          unites.splice(index, 1);
        } else {
          
          $(this).addClass('active');
          $(this).find(".check-select").prop("checked", true);
          unites.push($(this).attr("id-tr"));

        }
        $('.selectedUnites').val(JSON.stringify(unites));
      });
     
      $('#btn-nouv-unite').on('click', function(){
        $('#id_unite').val('');
        $('#designation_fr').val('');
        $('#designation_en').val('');
        $('#abr').val('');
      });

      $('.edit-unite').on('click', function(){
        
        $('#designation_fr').val($(this).parent().parent().children('.designation_fr').text());
        $('#designation_en').val($(this).parent().parent().children('.designation_en').text());
        $('#abr').val($(this).parent().parent().children('.abr').text());
        $('#id_unite').val($(this).parent().parent().attr('id-tr'));
        $('#modal-unite').modal('show');
      })
  });
</script>
@endpush