<div class="row sorting">
    <div class="col-lg-3">
      <span class="nb-product lgd-product">
          {!!i18n('search.il_y_a')!!} {{$products->total()}} {!!i18n('search.products')!!}
      </span>
    </div>

    <div class="col-lg-4"></div>

    <div class="col-lg-5 sort">
      <label for="product_type_id" class="col-form-label lgd-product">{!!i18n('search.trier_par')!!} : </label>
      <select @if(\Route::currentRouteName() != 'product.search') id='order' @else id='orderSearch' @endif  class="select-sorting form-select">
          <option @if($order == 'asc') selected="" @endif value="asc">{!!i18n('search.nom_a_z')!!}</option>
          <option @if($order == 'desc') selected="" @endif value="desc">{!!i18n('search.nom_z_a')!!}</option>
      </select>
    </div>
</div>
<div class="no-wrap">
  <div class="listing-product">
    <div class="product-container">
      @foreach($products as $key => $product)
      <div class="product product-summer">
        @include('products.summary')
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="pagination-ct">
    {{ $products->links() }}
</div>

@push('scripts')
<script>
  $(document).ready(function(){
    $('#order').on('change', function(){
      location.href = '?order=' + $(this).val();
    });

    $('#orderSearch').on('change', function(){
      $('#form-search').append('<input type="hidden" name="order" value="'+ $(this).val() +'">');
      $('#form-search').submit();
    });
  });
</script>

@endpush