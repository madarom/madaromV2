
$('form').on('submit', function(e){
  $( ".jqte" ).each(function(index) {
      var html = $(this).find('.jqte_editor').html();
      $(this).find('textarea').val(html);
  });      
});