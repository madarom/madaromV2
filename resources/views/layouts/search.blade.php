<div class="div-search">
  <form method="GET" id="form-search" action="{{route('product.search')}}">
  {{ csrf_field() }}
  <input type="text" required="" placeholder="{!!i18n('search.search_product')!!}" id="ipt-search" class="ipt-search font-comic" name="keyword" @if(isset($keyword)) value="{{$keyword}}" @endif>
  <span id="btn-search"><i class="fa fa-search"></i></span>
  </form>
</div>
@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){

    $('#btn-search').on('click', function(){
      $('#form-search').submit();
    });


   });
</script>
@endpush