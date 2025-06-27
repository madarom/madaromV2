<div class="form-check form-switch">
  <input class="form-check-input maintenance" type="checkbox" name="pure" id="pure" @if( $maintenance == 1)) data-id="{{route('admin.config.maintenance', ['value' => 0])}}" checked @else data-id="{{route('admin.config.maintenance', ['value' => 1])}}" @endif>
  <label class="form-check-label" for="pure">Activer/Desactiver</label>
</div>

@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
      var scats = [];
      $('.maintenance').on('change', function(){
      	var url = $(this).attr('data-id');
      	location.href = url;
      });
  });
</script>
@endpush