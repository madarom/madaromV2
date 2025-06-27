$(document).ready(function () {
  $(document).on('click', '.plus', function() {
      $(this).parent().find('.ipt-qte').val(parseInt($(this).parent().find('.ipt-qte').val()) + 1);
  });

  $(document).on('click', '.moins', function() {
      if(parseInt($(this).parent().find('.ipt-qte').val()) > 1)
     $(this).parent().find('.ipt-qte').val(parseInt($(this).parent().find('.ipt-qte').val()) - 1);
  });

  $(document).on('keyup', '.ipt-qte', function() {
      if(parseInt($(this).val()) < 1)
      $(this).val(1);
  });
});


