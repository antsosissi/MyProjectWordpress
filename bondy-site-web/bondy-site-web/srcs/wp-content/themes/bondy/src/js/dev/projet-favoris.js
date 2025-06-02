$(function() {
  add_fav();
  rm_favoris();

    //////// lien externe > nouvel onglet /////////

    var a = document.getElementsByTagName("a");
    for(var i = 0; i < a.length; i++){

        var _href = a[i].getAttribute("href");

        if (_href != null) {
            _href = _href.toLowerCase();

            // var origin_host = window.location.origin;
            var server_host = window.location.host;
            server_host = server_host.toLowerCase();

            if( (_href.indexOf(server_host) < 0) && (_href.indexOf("#") < 0) && (_href.indexOf("javascript:") < 0) ) {
                a[i].setAttribute("target", "_blank");
            }
        }
    }
    
    ///////////////////////////////////////////////

  $(document).on('favorites-updated-single', function(event, favorites, post_id, site_id, status) {
    var elt_cnt_fav    = $('#nb-count-favori');
    var count_fav      = elt_cnt_fav.text();
    var elt_add_fav_ok = $('input[name=textSuccessAddFavorite]');
    var txt_add_fav_ok = elt_add_fav_ok.val() !== '' ? elt_add_fav_ok.val() : 'PROJET AJOUTÉ AVEC SUCCÈS DANS LA LISTE DES FAVORIS!';

    if ( status === 'active' ) {
      $.ajax({
        url: ajaxurl,
        data: {
          action      : 'add_post_to_favorite_list',
          type        : 'POST',
          post_id_fav : post_id,
        },
        success: function( res ) {
          $("#layer-loader").hide();
          $("body").removeClass('page-loading');
       
          empty_fav();

          $( '.ul-projet-fav' ).append(res);
          count_fav++;
          elt_cnt_fav.text(count_fav);
          //POPIN succès ajout favoris!
          $('.info-modal-fav').text(txt_add_fav_ok);
          $('#add-rm-fav-modal').modal('show');

          rm_favoris();
        },
        error: function () {
            console.log("AJOUT FAVORIS ERROR")
            ("#layer-loader").hide();
            $("body").removeClass('page-loading');
        }
      });

    }
  });
  
});
function empty_fav() {
  var empty_elt = $('.empty-favoris');
  if ( empty_elt.length>0 ) {
    empty_elt.remove();
  }
}

function add_fav() {
  $('.add-fav').on('click', function (e) {
    var post_id = $(this).attr('data-id');
    var remove_add = $('.simplefavorite-remove-add-' + post_id);

    if (remove_add.hasClass('active')) {
      //POPIN demande confirmation suppression favoris
      update_rm_modal(post_id);
    } else {
      //ajout favoris
      $("#layer-loader").show();
      $("body").addClass('page-loading');
      remove_add.trigger('click');
      $(this).find('i:first-child').addClass('icobnd-star');
      //$(this).find('i.icobnd-star-outline').attr('class', 'icobnd-star');
      empty_fav();
    }
  });
}

function rm_favoris() {
  $(".rm-favoris").on('click', function() {
    var post_id = $(this).attr('data-id');
    update_rm_modal(post_id);
  });
}


function update_rm_modal(post_id) {
  var title_rm_fav = $('input[name=titleConfirmationRemoveFavorite]').val();
  var text_rm_fav  = $('input[name=textConfirmationRemoveFavorite]').val();

  //POPIN demande confirmation suppression favoris$
  if ( title_rm_fav!=='' && text_rm_fav!=='') {
    $('.h5-rm-fav').html( title_rm_fav + ' <span class="span-rm-fav">' + text_rm_fav + '</span>');
  }

  $('.modal-btn-rm-fav').attr('onclick', 'confirmer_suppression('+post_id+',false)');
  $('#rm-fav-modal').modal('show');
}

function confirmer_suppression(post_id, is_from_start_icon) {
  var elt_cnt    = $('#nb-count-favori');
  var count      = elt_cnt.text();
  var remove_add = $('.simplefavorite-remove-add-' + post_id);

  //action suppression favoris from icon start slider projet
  if (is_from_start_icon) {
    if (remove_add.length > 0) {
      remove_add.trigger('click');
    }

    if ($('.add-fav').attr('data-id') === post_id) {
        remove_add.removeClass('active');
    }
  }
  //action suppression favoris from icon x listing favoris
  else {
    $('#simplefavorite-button' + post_id).trigger('click');
  }

  $('.list-favory-' + post_id).remove();

  if (remove_add.length > 0) {
    remove_add.siblings('a.add-fav').find(':first-child').attr('class', 'icobnd-star-outline');
  }

  if ( parseInt(count) > 0 ) {
    elt_cnt.text(count-1);
  }

  //POPIN succès suppression favoris
  var elt_rm_fav_ok = $('input[name=textSuccessRemoveFavorite]');
  var txt_rm_fav_ok = elt_rm_fav_ok.val() !== '' ? elt_rm_fav_ok.val() : 'PROJET RETIRÉ DE LA LISTE DES FAVORIS!';
  $('.info-modal-fav').text(txt_rm_fav_ok);
  $('#add-rm-fav-modal').modal('show');

  if ( parseInt(elt_cnt.text())===0 ) {
    $('.perfect-scroll').html('<ul class="ul-projet-fav"><p class="empty-favoris">Vous n\'avez pas encore de favoris !</p></ul>');
  }

  $('.close-favoris-link').trigger('click');
}
