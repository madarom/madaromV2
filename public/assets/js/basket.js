function showPanier(callback)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  $.ajax({

        type: "POST",

        url: '/show_panier'
    })

    .done(function (response, textStatus, jqXHR) {
         $('#div-sum-bskt').html(response);
         $('#modal-sum-bskt').modal('show');
         callback();
    })

    .fail(function (jqXHR, textStatus, errorThrown) {

        // le message est volontairement différent du précédent pour aider à cibler la cause de l'erreur

        afficherPopupErreur('Nous sommes désolés, il n\'est pas possible de compléter l\'opération pour l\'instant.');

    });
}

function deleteProductPanier(id)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  $.ajax({

        type: "POST",

        url: '/product/panier/delete',

        data : {'id' : id}
    })
    .done(function (response, textStatus, jqXHR) {
         $('#div-sum-bskt').find('#modal-sum-bskt').replaceWith(response);
         $('#modal-sum-bskt').modal('show');
    })
    .fail(function (jqXHR, textStatus, errorThrown) {

        // le message est volontairement différent du précédent pour aider à cibler la cause de l'erreur

        afficherPopupErreur('Nous sommes désolés, il n\'est pas possible de compléter l\'opération pour l\'instant.');

    });
}