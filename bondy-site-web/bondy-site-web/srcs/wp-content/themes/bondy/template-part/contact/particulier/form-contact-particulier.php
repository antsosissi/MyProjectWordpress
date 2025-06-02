<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 16/06/2020
 * Time: 14:17
 */
global $bondy_options;
$objetMessage = array();
$objetMessageList = ( isset( $bondy_options['message_objet_contact'] ) && !empty( $bondy_options['message_objet_contact'] )  ) ? explode(',',$bondy_options['message_objet_contact']) : array();
if ( !empty( $objetMessageList ) && count( $objetMessageList ) > 0 ){
    foreach ( $objetMessageList as $elt ){
        if ( !empty( trim($elt) ) ) {
            $objetMessage[trim($elt)] = $elt;
        }
    }
    ksort($objetMessage);
}
?>
<form action="" class="form-bloc form-particulier form-particulier-3 bloc-item" id="form-particulier-3">
    <!-- <p>formulaire particulier-3</p> -->
    <div class="content-form-item">
        <h3>Vos informations personnelles</h3>
        <div class="content-form infoPerso-field">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nom-perso-part3">Nom<span class="required">*</span></label>
                            <input type="text" class="form-control nom_contact_particulier_avoir_information" id="nom-perso-part3" placeholder="Saisissez votre nom" required role="nom">
                            <p class="message-error"></p>
                        </div>
                        <div class="form-group">
                            <label for="prenom-perso-part3">Prénom<span class="required">*</span></label>
                            <input type="text" class="form-control prenom_contact_particulier_avoir_information" id="prenom-perso-part3" placeholder="Saisissez votre prénom" required role="prénom">
                            <p class="message-error"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mail-perso-part3">Adresse mail<span class="required">*</span></label>
                            <input type="text" class="form-control mail_adresse_mail_contact_particulier_avoir_information" id="mail-perso-part3" placeholder="Saisissez votre adresse mail" role="adresse mail" required>
                            <p class="message-error"></p>
                        </div>
                        <div class="form-group">
                            <label for="telephone-perso-part3">Téléphone<span class="required">*</span></label>
                            <input type="text" name="text" onkeypress="numTele('tel_contact_particulier_avoir_information')" class="form-control tel_contact_particulier_avoir_information" id="telephone-perso-part3" placeholder="Saisissez votre numéro de tél" required role="téléphone">
                            <p class="message-error"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-form-item">
        <h3>Message</h3>
        <div class="content-form">
            <div class="form-group customSelect">
                <label>Objet de votre message :</label>
                <select class="select-field form-control objet_de_votre_message" role="message">
                    <option  value="">Choisissez l'objet</option>
                    <?php if ( !empty( $objetMessage ) && count( $objetMessage ) > 0 ):?>
                        <?php foreach ( $objetMessage as $key=>$val ):?>
                            <option  value="<?php echo $key?>"><?php echo ucwords($val);?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
                <p class="message-error"></p>
            </div>
            <div class="form-group customSelect">
                <label>Saisissez VOTRE MESSAGE<span class="required">*</span></label>
                <textarea class="form-control saisissez_votre_message" name="" id="" cols="30" rows="10" placeholder="Saisir votre message" role="message"></textarea>
                <p class="message-error"></p>
            </div>

        </div>
    </div>
    <?php
    $dataArray = get_query_var('dataArray');  // dataArray[idform, key recaptcha]
    ?>
    <div class="captcha-bloc">
        <!--captcah-->
        <div class="g-recaptcha-benevole" data-sitekey="<?php echo $dataArray[1] ?>" id="RecaptchaField3"></div>
        <input type="hidden" class="hiddenRecaptcha" id="particulier_hiddenRecaptcha">
        <input type="hidden" class="expiredResponse3" id="expiredResponse3">
        <!--end captcah-->
        <p class="messageRecapt"></p>
    </div>

    <div class="btns-group" role="group">
        <button type="button" class="btn btn-secondary btn-sm  reset-contact">annuler</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="saveFormulair('form_contact_particulier','particulier_hiddenRecaptcha')">envoyer</button>
    </div>
</form>
<div style="display: none">
    <?php
    if($dataArray[0] != null){
        ninja_forms_display_form( $dataArray[0] );
        CPage::getVariableJS('form_contact_particulier',$dataArray[0]);
    }
    ?>
</div>
