 <div class="modal" id="zoom-image" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content notif">

     <div class="image">
	    <img id="img-zoom" class="zoom" src="/assets/images/products/170170358610.webp" alt="{{$product->nom}}" />
	  </div>
    </div>
  </div>
  <button type="button" onclick="$('#zoom-image').modal('hide');" class="btn-close" aria-label="Close"><i class="fa fa-remove"></i></button>
</div>
@push('scripts')
<script type="text/javascript">
   $(document).ready(function(){
      
      $('.img-product').on('click', function(){
      	$('#img-zoom').attr('src', $(this).attr('src'));
      	$('#zoom-image').modal('show');
      });
   });
</script>
@endpush