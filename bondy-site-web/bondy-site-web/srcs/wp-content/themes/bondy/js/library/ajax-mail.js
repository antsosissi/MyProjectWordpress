
$(document).ready(function () {
    $('#formNewslettersFooter input').keydown(function (e) {
        if (e.keyCode == 13) {
            bondy_submit_newsletter_form('newsletter_mail', 'footer');
            return false;
        }
    });

    $('#formNewslettersPage input').keydown(function (e) {
        if (e.keyCode == 13) {
            bondy_submit_newsletter_form('newsletter_mail_page', 'no-footer');
            return false;
        }
    });

    $(".footer .send-MailNl").click(function(){
        bondy_submit_newsletter_form('newsletter_mail', 'footer');
    });

    $(".no-footer .send-MailNl").click(function(){
        bondy_submit_newsletter_form('newsletter_mail_page', 'no-footer');
    });
});


function bondy_submit_newsletter_form( _input_id , _parent_class){
    var _input = $('#' + _input_id);
    _input.blur();
    _mail = _input.val();
    if ( _mail == '' ){
        _input.addClass('error');
        $('.' + _parent_class + ' .span-message-mail').html("Champ vide. Veuillez entrer votre adresse email");
        return false;
    }

    _regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !_regex.test(_mail) ) {
        _input.addClass('error');
        $('.' + _parent_class + ' .span-message-mail').html("Email invalide. Veuillez verifier votre adresse email");
        return false;
    }
    _input.removeClass('error');
    $('.' + _parent_class + ' .span-message-mail').html("");
    _input.addClass('loading');
    $.ajax({
        url: ajaxurl,
        data: {
            action : 'newsletter_suscribe',
            mail : _mail,
            loc: _parent_class
        },
        beforeSend: function() {
            $("#layer-loader").show();
            $("body").addClass('page-loading');
        },
        success: function( _result ){
            var arrayResult = _result.split('/');
            var option = arrayResult[0] ;//_result.substring(0,1);
            var titre = arrayResult[1]; //_result.substring(0,1);
            var message = arrayResult[2].slice(0, -1); //_result.substring(2,_result.length-1);
            $("#layer-loader").hide();
            $("body").removeClass('page-loading');
            _input.removeClass('loading');
            if ( option == '1' ){  // mail success
                $(".sous-titre-modal").html(titre);
                $(".message-modal").html(message);
                $("#newsletter-modal").modal('show');
            } else if ( option == '2' ){ // mail erreur
                $(".sous-titre-modal").html(titre);
                $(".message-modal").html(message);
                $("#newsletter-error-modal").modal('show');
            } else if ( option == '0'){ // mail deja abonné
                $(".sous-titre-modal").html(titre);
                $(".message-modal").html(message);
                $("#newsletter-error-modal").modal('show');
            } else {
                $(".sous-titre-modal").html(titre);
                $(".message-modal").html("Email invalide. Veuillez entrer votre adresse email");
                $("#newsletter-error-modal").modal('show');
            }
        }
    })
    return false;
}