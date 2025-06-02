<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 16/06/2020
 * Time: 14:17
 */
?>
<form action="" class="form-bloc form-particulier form-particulier-2 bloc-item" id="form-particulier-2">
    <div class="content-form-item">
        <h3>En quelques clics, devenez un bôndien pour participez à nos projets de reboisement et recevoir les dernières news de bôndy</h3>
        <div class="content-form">
            <div class="field-bloc">
                <div class="form-group switch-fieldItem">
                    <label>Avez vous déjà participez à des projets de reboisement ?</label>
                    <div class="switch">
                      <input type="checkbox" data-toggle="toggle" class="check_avez_vous_deja_participez_a_des_projets_de_reboisement" value="Oui" id="participation-reboisement" checked>
                      <label for="participation-reboisement" class="slider-wrap">
                          <span class="label-text label-oui">Oui</span>
                          <span class="slider"></span>
                          <span class="label-text label-non">Non</span>
                      </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-form-item">
        <h3>Vos informations personnelles</h3>
        <div class="content-form infoPerso-field">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group">
                        <label for="nom-perso-part2">Nom<span class="required">*</span></label>
                        <input type="text" class="form-control nom_contact_particulier_contribution" id="nom-perso-part2" placeholder="Saisissez votre nom" role="nom" required>
                        <p class="message-error"></p>
                      </div>
                      <div class="form-group">
                        <label for="prenom-perso-part2">Prénom<span class="required">*</span></label>
                        <input type="text" class="form-control prenom_contact_particulier_contribution" id="prenom-perso-part2" placeholder="Saisissez votre prénom" role="prénom" required>
                        <p class="message-error"></p>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group mb-lg-0">
                        <label for="age-perso-part2">Age<span class="required">*</span></label>
                        <input type="text" name="number" maxlength="3" class="form-control age_contact_particulier_contribution" id="age-perso-part2" placeholder="Saisissez votre âge" role="âge" required>
                        <p class="message-error"></p>
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group">
                        <label for="mail-perso-part2">Adresse mail<span class="required">*</span></label>
                        <input type="text" class="form-control mail_adresse_mail_contact_particulier_contribution" id="mail-perso-part2" placeholder="Saisissez votre adresse mail" role="adresse mail" required>
                        <p class="message-error"></p>
                      </div>
                      <div class="form-group">
                        <label for="telephone-perso-part2">Téléphone<span class="required">*</span></label>
                        <input type="text" name="text" class="form-control tel_contact_particulier_contribution" onkeypress="numTele('tel_contact_particulier_contribution')" id="telephone-perso-part2" placeholder="Saisissez votre numéro de tél" role="téléphone" required>
                          <p class="message-error"></p>
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group mb-lg-0">
                        <label for="localisation-perso-part2">Localisation<span class="required">*</span></label>
                        <input type="text" class="form-control localisation_contact_particulier_contribution" id="localisation-perso-part2" placeholder="Saisissez votre ville" role="localisation" required>
                        <p class="message-error"></p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    $dataArray = get_query_var('dataArray');  // dataArray[idform, key recaptcha]
    ?>
    <div class="captcha-bloc">
        <!--captcah-->
        <div class="g-recaptcha-benevole" data-sitekey="<?php echo $dataArray[1] ?>" id="RecaptchaField2"></div>
        <input type="hidden" class="hiddenRecaptcha" id="benevole_hiddenRecaptcha">
        <input type="hidden" class="expiredResponse2" id="expiredResponse2">
        <!--end captcah-->
        <p class="messageRecapt"></p>
    </div>

    <div class="btns-group" role="group">
        <button type="button" class="btn btn-secondary btn-sm  reset-contact">annuler</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="saveFormulair('contact-benevole','benevole_hiddenRecaptcha')">envoyer</button>
    </div>
</form>
<div style="display: none">
    <?php
    if($dataArray[0] != null){
        ninja_forms_display_form( $dataArray[0] );
        CPage::getVariableJS('form_contact_benevol',$dataArray[0]);
    }
    ?>
</div>