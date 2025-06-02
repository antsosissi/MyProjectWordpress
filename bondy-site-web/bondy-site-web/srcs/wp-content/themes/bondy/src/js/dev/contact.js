$(document).ready(function(){
    $('.surface-barNav').click(function(){
        checkeVamueSurface('hectares_preci');
    });
    $("#surface-precis").keyup(function(){
        checkeVamueSurface('hectares_preci');
    });

    /* montant */
    $('#entreprendre_votre_projet').click(function(){
        if(!$( "#entreprendre_votre_projet").is(":checked")){
            $('.montant_du_budget').attr('disabled','disabled');
            $('.montant_du_budget').val('');
            $(".group-message-montant").css('border-color', '#ced4da');
            $(".message-montant").text('');
        } else {
            $('.montant_du_budget').removeAttr('disabled');
        }
    });


    if(!$( "#entreprendre_votre_projet").is(":checked")){
        $('.montant_du_budget').attr('disabled','disabled');
        $('.montant_du_budget').val('');
    }
    /* end montant*/

    /* just number */
    $('input[name="number"]').keypress(function(key) {
        if(key.charCode < 48 || key.charCode > 57) return false;
    });

    $('input[name="number-surface"]').keypress(function(e) {


        if (/\d+|,+/i.test(e.key) ){
            var num = $('input[name="number-surface"]').val().split(",");
            if(num.length == 2 && e.key == ',')
                return false;
        } else {
            return false;
        }
    });

    $('.select-surface').change(function(){
        var valeur = $(this).val();
        $("input[name=radio_quelle_est_la_surface_de_votre_terrain][value='"+valeur+"']").prop('checked', true);
    })

    /* limite age */
    $('.age_contact_particulier_contribution').keypress(function(){
        if(parseInt($(this).val()) > 150){
            $(this).val(150);
            $(this).css('color', '#dc0000');
            $(this).next().text('Âge inferieur à 150');
        } else {
            $(this).next().text('');
        }
    })

    $('#solution-terrain-01').click(function(){
        $('.budget-entreprise').html('Disposez-vous de budget pour entreprendre votre projet ?');
    });
    $('#solution-terrain-02').click(function(){
        $('.budget-entreprise').html('Disposez-vous de budget pour entreprendre le domaine agroforestier ?');
    })

    //reset contact
    if ( $('#form-particulier-1').length > 0 ){
        $('#form-particulier-1 .reset-contact').on('click', function(){
            document.forms['form-particulier-1'].reset();
            $('.message-error').html('');
            $('.message-surface').html('');
            $(".group-message-montant").css('border-color', '#ced4da');
            $('#form-particulier-1').each(function(){
                $(this).find(':input').css("border-color", '#ced4da');
            });
        })
    }
    if ( $('#form-particulier-2').length > 0 ){
        $('#form-particulier-2 .reset-contact').on('click', function(){
            document.forms['form-particulier-2'].reset();
            $('.message-error').html('');
            $('#form-particulier-2').each(function(){
                $(this).find(':input').css("border-color", '#ced4da');
            });
        })
    }
    if ( $('#form-particulier-3').length > 0 ){
        $('#form-particulier-3 .reset-contact').on('click', function(){
            document.forms['form-particulier-3'].reset();
            $('.message-error').html('');
            $('#form-particulier-3').each(function(){
                $(this).find(':input').css("border-color", '#ced4da');
            });
        })
    }
    if ( $('#form-entreprise').length > 0 ){
        $('#form-entreprise .reset-contact').on('click', function(){
            document.forms['form-entreprise'].reset();
            $('.message-error').html('');
            $('#entreprise-form').each(function(){
                $(this).find(':input').css("border-color", '#ced4da');
            });
        })
    }

})

function numTele(classes){
    $('.'+ classes).keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            event.preventDefault(); // ne pas permettre la saisie de character lettre
        }
        else {
            var v_num = $(this).val();
            if(v_num.length<=13) {
                verify(v_num , classes, true)
            }
            else {
                $(this).val(v_num.substring(0,13));
                $("." + classes).css('border-color', '#ced4da');
                $("." + classes).next().text('');
            }
        }
    });
}
function verify(v_num , classes , suite){
    if(v_num.length <= 13){
        if(v_num.length == 3)
            suite == true ? $('.' + classes).val(v_num + ' ') : $('.' + classes).val( $('.' + classes).val() + ' ');
        if(v_num.length == 6)
            suite == true ? $('.' + classes).val(v_num + ' ') : $('.' + classes).val( $('.' + classes).val() + ' ');
        if(v_num.length == 10)
            suite == true ? $('.' + classes).val(v_num + ' ') : $('.' + classes).val( $('.' + classes).val() + ' ');
    }
}

function checkeVamueSurface(calsses) {
    var valu = $('.' + calsses).val();
    var surface = $("input:radio[name=radio_quelle_est_la_surface_de_votre_terrain]:checked").val();

    if(surface == '51-100 ha'){
        if(parseInt(valu) < 51 || parseInt(valu) >100) {
            $('.' + calsses).parent().css('border-color', '#dc0000');
            $('.message-surface').css('color', '#dc0000');
            $('.message-surface').text("Surface entre 51 à 100 ha");
        } else {
            $('.' + calsses).parent().css('border-color', '#e2e2e2');
            $('.message-surface').text("");
        }
    }
    if(surface == '1-50 ha'){

        if(parseInt(valu) < 1 || parseInt(valu) >50){
            $('.' + calsses).parent().css('border-color', '#dc0000');
            $('.message-surface').css('color', '#dc0000');
            $('.message-surface').text("Surface entre 1 à 50 ha");
        } else {
            $('.' + calsses).parent().css('border-color', '#e2e2e2');
            $('.message-surface').text("");
        }
    }
    if(surface == '+100 ha'){
        if(parseInt(valu) < 100){
            $('.' + calsses).parent().css('border-color', '#dc0000');
            $('.message-surface').css('color', '#dc0000');
            $('.message-surface').text("Surface plus de 100 ha");
        }
        else {
            $('.' + calsses).parent().css('border-color', '#e2e2e2');
            $('.message-surface').text("");
        }
    }
}

function  saveFormulair(parameters, formes) {

    var responses = $('#'+formes).val();
    var formid = '';
    var form = [];
    var arrayClass = [];
    var inputRequired = [];
    var responseExpired = false;
    if(parameters == 'conctat-entreprise') {
        formid = id_form_entreprise;
        form = _form_entreprise;
        arrayClass = ['ckeck_compenser_mon_empreinte_carbone', 'ckeck_associer_mes_produits_et_services_a_des_arbres_plantes','mail_adresse_contact_entreprise', 'ckeck_vegetaliser_mon_site_entreprise', 'ckeck_une_solution_rse_personnalisee', 'quel_est_le_domaine_d_action_de_votre_entreprise', 'dans_quel_pays_se_trouve_le_siege_de_votre_entreprise', 'check_avez-vous_un_departement_rse', 'check_avez-vous_des_terrains_disponibles_pour_votre_action', 'check_voulez-vous_qu_on_ajoute_cela_a_votre_solution', 'nom_contact_entreprise', 'prenom_contact_entreprise', 'nom_de_la_societe', 'poste_occupe', 'tel_contact_entreprise', 'adresse_contact_entreprise'];
        inputRequired = ['nom_contact_entreprise', 'prenom_contact_entreprise', 'nom_de_la_societe', 'poste_occupe', 'tel_contact_entreprise', 'mail_adresse_contact_entreprise', 'quel_est_le_domaine_d_action_de_votre_entreprise', 'dans_quel_pays_se_trouve_le_siege_de_votre_entreprise'];
        responseExpired = $('#expiredResponse0').val();
    }
    if(parameters == 'contact-terrain-valoriser'){

        formid = id_form_terrain_valoriser;
        form = _form_terrain_valoriser;
        arrayClass = ['radio_quelle_solutions_voulez-vous_adopter', 'radio_quelle_est_la_surface_de_votre_terrain', 'hectares_preci', 'dans_quelle_region_de_madagascar_se_trouve_votre_terrain', 'check_disposez-vous_de_budget_pour_entreprendre_votre_projet', 'montant_du_budget', 'nom_contact_particulier_valoriser', 'prenom_contact_particulier_valoriser', 'mail_adresse_mail_contact_particulier_valoriser', 'tel_contact_particulier_valoriser'];
        inputRequired = ['nom_contact_particulier_valoriser','montant_du_budget', 'prenom_contact_particulier_valoriser', 'mail_adresse_mail_contact_particulier_valoriser', 'tel_contact_particulier_valoriser','dans_quelle_region_de_madagascar_se_trouve_votre_terrain'];
        responseExpired = $('#expiredResponse1').val();
    }
    if(parameters == 'contact-benevole'){

        formid = id_form_contact_benevol;
        form = _form_contact_benevol;
        arrayClass = ['check_avez_vous_deja_participez_a_des_projets_de_reboisement', 'nom_contact_particulier_contribution', 'prenom_contact_particulier_contribution', 'mail_adresse_mail_contact_particulier_contribution', 'tel_contact_particulier_contribution', 'age_contact_particulier_contribution', 'localisation_contact_particulier_contribution'];
        inputRequired = ['nom_contact_particulier_contribution', 'prenom_contact_particulier_contribution', 'mail_adresse_mail_contact_particulier_contribution', 'tel_contact_particulier_contribution','age_contact_particulier_contribution','localisation_contact_particulier_contribution'];
        responseExpired = $('#expiredResponse2').val();
    }
    if(parameters == 'form_contact_particulier'){

        formid = id_form_contact_particulier;
        form = _form_contact_particulier;
        arrayClass = ['nom_contact_particulier_avoir_information', 'prenom_contact_particulier_avoir_information', 'mail_adresse_mail_contact_particulier_avoir_information', 'tel_contact_particulier_avoir_information', 'objet_de_votre_message', 'saisissez_votre_message'];
        inputRequired = ['nom_contact_particulier_avoir_information', 'prenom_contact_particulier_avoir_information', 'mail_adresse_mail_contact_particulier_avoir_information', 'tel_contact_particulier_avoir_information', 'saisissez_votre_message'];
        responseExpired = $('#expiredResponse3').val();
    }

    if(champRequired(inputRequired)){
        if(responses != '' && responseExpired != responses){
            $( ".messageRecapt").text("");
                sendForm(form, formid, arrayClass, responses,parameters);
        } else {
            $( ".messageRecapt").css('color', '#dc0000');
            $( ".messageRecapt").text("Champ non renseigné.");
        }
    }
}

function checkMail(classImput){
    var validation_mail = true;
    _mail = $("." + classImput).val();

    _regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(_mail !=''){
        if ( !_regex.test(_mail)) {
            $( "." + classImput ).css('border-color', '#dc0000');
            $( "." + classImput ).next().text("Email invalide. Veuillez verifier votre adresse email");
            $( "." + classImput ).next().css('color', '#dc0000');
            validation_mail = false;
        } else {
            $( "." + classImput ).next().text("");
        }
    }
    return validation_mail;
}

function champRequired(arrayClass){
    var tmp = true;
    var tmp2 = true;
    var tmp3 = true;
    $.each(arrayClass, function( index , value ){
        var valuer = $( "." + value ).val();
        var message = $( "." + value ).attr('role');
        if(valuer == '' && value != 'montant_du_budget'){
            tmp = false;
            if($('.' + value).hasClass('select-field')){
                $( "." + value ).next().next().text('Veuillez renseigner ' + message);
                $( "." + value ).next().next().css('color', '#dc0000');
            } else {
                $("." + value).css('border-color', '#dc0000');
                $("." + value).next().text('Veuillez renseigner votre ' + message);
                $("." + value).next().css('color', '#dc0000');
            }
        } else {
            if($('.' + value).hasClass('select-field')){
                $( "." + value ).next().next().text('');
            } else {
                if(value != 'montant_du_budget'){
                    $( "." + value ).css('border-color', '#ced4da');
                    $( "." + value ).next().text('');
                }
            }
        }

        if(value.substring(0,4) == 'mail'){
            if($( "." + value ).val() != ''){
                tmp = checkMail(value);
            }
        }
        if(value.substring(0,3) == 'tel'){
            if($( "." + value ).val().length <=12  ){
                $("." + value).css('border-color', '#dc0000');
                $("." + value).next().text('Veuillez renseigner votre téléphone');
                //$("." + value).next().css('color', '#dc0000');
                tmp = false;
            }
        }

        if(value == 'montant_du_budget' && $("#entreprendre_votre_projet").is(":checked")){
            if( valuer == '' || valuer == '0'){
                $(".group-message-montant").css('border-color', '#dc0000');
                $(".message-montant").css('color', '#dc0000');
                $(".message-montant").text('Veuillez renseigner votre ' + $(".montant_du_budget").attr('role'));
                tmp2 = false;
            } else {
                $(".group-message-montant").css('border-color', '#ced4da');
                $(".message-montant").text('');
            }
        }

        if($('.message-surface').html() != "") tmp3 = false;

    });
    return tmp * tmp2 * tmp3;
}

// array class -> value et validation des champs
function getKeyContactEntreprise(arrayClass){
    var contactParticulierValue = {};
    $.each(arrayClass, function( key , value ) {
        var tmp = $( "." + value ).val();
        if(value.substring(0,5) == 'check' || value.substring(0,5) == 'ckeck'){
            var idx = $( "." + value ).attr('id');
            $( "#" + idx ).is(":checked") ? tmp = 'Oui' : tmp = 'Non';
        }

        if(value.substring(0,5) == 'radio'){
            var manageradiorel = $("input:radio[name="+value+"]:checked").val();
            tmp = manageradiorel;
        }
        contactParticulierValue[value] = tmp;
    });
    return contactParticulierValue;
}

function sendForm(form,formid,arrayClass,responseRecaptcha,parameters){
    var responseArray = {};
    var contactEntrepriseKey = [];
    $.each(form, function( key , value ) {
        contactEntrepriseKey[value.element_class] = value.key;
    });

    $.each(getKeyContactEntreprise(arrayClass), function( index , value ){
        // key = class , value = value
        if(contactEntrepriseKey.hasOwnProperty(index)){
            responseArray[contactEntrepriseKey[index]] = value;
        }
    });
    if(!$.isEmptyObject( responseArray )){
        $("#layer-loader").show();
        $("body").addClass('page-loading');
        $.ajax({
            url: ajaxurl,
            data: {
                action      : 'my_ninja_forms_submission',
                formID        : formid,
                responseRecaptcha        : responseRecaptcha,
                form_data : responseArray,
                tittle_forme : parameters,
            },
            success: function( res ) {
                $("#layer-loader").hide();
                $("body").removeClass('page-loading');
                if(res == 'Erreur0'){
                    $(".popup-mail-icon").html('<i class="icobnd-warning"></i>');
                    $(".titre-confiramtion").html('DESOLE ! UNE ERREUR EST SURVENUE');
                    $(".message").html('Veillez s\'il vous plaît réessayer ultérieurement!');
                    $(".message1").html('');
                } else {
                    $(".popup-mail-icon").html('<i class="icobnd-check"></i>');
                    $(".titre-confiramtion").html('VOS INFORMATIONS ONT ÉTÉs BIEN ENVOYÉES');
                    $(".message").html('Merci de votre intérêt pour le projet BÔNDY');
                    $(".message1").html('Nous vous recontacterons ultérieurement');
                }
                $("#confiramtion-formulaire").modal('show');
            },
            error: function () {
                $("#layer-loader").hide();
                $("body").removeClass('page-loading');
                $(".titre-confiramtion").html('DESOLE ! UNE ERREUR EST SURVENUE');
                $(".message").html('Veillez s\'il vous plaît réessayer ultérieurement!');
                $(".message1").html('');
                $("#confiramtion-formulaire").modal('show');
            }
        });
        $('#confiramtion-formulaire').on('hidden.bs.modal', function () {
            location.reload();
            document.forms['form-particulier-1'].reset();
            document.forms['tabForm-particulier-2'].reset();
            document.forms['tabForm-particulier-3'].reset();
            document.forms['entreprise-form'].reset();
        });
    }
}