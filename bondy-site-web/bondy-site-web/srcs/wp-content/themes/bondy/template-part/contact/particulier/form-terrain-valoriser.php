<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 16/06/2020
 * Time: 11:12
 */
global $bondy_options;
$regions = array();
$regionsList = ( isset( $bondy_options['region_contact'] ) && !empty( $bondy_options['region_contact'] )  ) ? explode(',',$bondy_options['region_contact']) : array();
if ( !empty( $regionsList ) && count( $regionsList ) > 0 ){
    foreach ( $regionsList as $elt ){
        if ( !empty( trim($elt) ) ) {
            $regions[trim($elt)] = $elt;
        }
    }
    ksort($regions);
}
?>
<form action="" class="form-bloc form-particulier form-particulier-1 bloc-item" id="form-particulier-1">
    <div class="content-form-item">
        <h3>Informations sur votre terrain</h3>
        <div class="content-form">
            <div class="row">
                <div class="field-bloc col-xl-6">
                    <div class="form-group radio-list">
                        <label>Quelle solution voulez-vous adopter ?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Cultiver mon espace vert" name="radio_quelle_solutions_voulez-vous_adopter" id="solution-terrain-01" checked>
                            <label class="form-check-label" for="solution-terrain-01">
                                <span>Cultiver mon espace vert</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="Reboiser mon terrain" name="radio_quelle_solutions_voulez-vous_adopter" id="solution-terrain-02">
                            <label class="form-check-label" for="solution-terrain-02">
                                <span>Reboiser mon terrain</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="field-bloc col-xl-6">
                    <div class="form-group">
                        <label>Quelle est la surface de votre terrain ?</label>
                        <div class="surfaceTerrain-inputRadio">
                            <!-- mobile select --->
                            <div class="customSelect d-lg-none selectBox-surface">
                                <select class="select-field form-control select-surface">
                                    <option  value="1-50 ha">1 à 50 ha</option>
                                    <option  value="51-100 ha">50 à 100 ha</option>
                                    <option  value="+100 ha">+ de 100 ha</option>
                                </select>
                            </div>
                            <!-- /mobile select --->

                            <ul class="surface-barNav d-none d-lg-flex">
                                <li class="form-check">
                                    <input class="form-check-input" type="radio" value="1-50 ha" name="radio_quelle_est_la_surface_de_votre_terrain" id="surface-terrain-01" checked>
                                    <label class="form-check-label" for="surface-terrain-01"><span>1 à 50 ha</span></label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" type="radio" value="51-100 ha" name="radio_quelle_est_la_surface_de_votre_terrain" id="surface-terrain-02">
                                    <label class="form-check-label" for="surface-terrain-02"><span>50 à 100 ha</span></label>
                                </li>
                                <li class="form-check">
                                    <input class="form-check-input" type="radio" value="+100 ha" name="radio_quelle_est_la_surface_de_votre_terrain" id="surface-terrain-03">
                                    <label class="form-check-label" for="surface-terrain-03"><span>+ de 100 ha</span></label>
                                </li>

                            </ul>
                            <div class="surfacePrecis-field">
                                <label for="surface-precis">Hectares précis : <br>(Saisissez la surface)</label>
                                <div class="input-group">
                                    <input type="text" name="number-surface" class="form-control hectares_preci" id="surface-precis" aria-label="surface en ha">
                                    <label class="input-group-append" for="surface-precis">
                                        <span class="input-group-text">ha</span>
                                    </label>
                                </div>
                                <p class="message-surface"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group customSelect">
                        <label>Dans quelle région de Madagascar se trouve votre terrain ?<span class="required">*</span></label>
                        <select class="select-field form-control dans_quelle_region_de_madagascar_se_trouve_votre_terrain" required role="la région où se trouve votre terrain">
                            <option  value="">Choisissez la région</option>
                            <?php if ( !empty( $regions ) && count( $regions ) > 0 ):?>
                                <?php foreach ( $regions as $key => $region ):?>
                                    <option  value="<?php echo $key?>"><?php echo ucwords($region);?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <p class="message-error"></p>
                    </div>
                    <div class="form-group">
                        <label><span class="budget-entreprise">Disposez-vous de budget pour entreprendre votre projet&nbsp;?</span>&nbsp;<i class="icobnd-info-square" data-toggle="tooltip" data-trigger="hover" title="Bôndy collabore principalement avec des entreprises pour financer ses projets de reboisement. Ses partenaires n’ayant pas toujours des terrains pour établir les plantations, Bôndy fait appel aux particuliers souhaitant voir leurs terres reboisées."></i></label>
                        <div class="montant-budget-fieldItem">
                            <div class="switch">
                                <input type="checkbox" class="check_disposez-vous_de_budget_pour_entreprendre_votre_projet" value="Oui" data-toggle="toggle" id="entreprendre_votre_projet" checked>
                                <label for="entreprendre_votre_projet" class="slider-wrap">
                                    <span class="label-text label-oui">Oui</span>
                                    <span class="slider"></span>
                                    <span class="label-text label-non">Non</span>
                                </label>
                            </div>
                            <label for="montant-budget">Budget</label>
                            <div class="input-group group-message-montant">
                                <input type="text" name="number" class="form-control montant_du_budget" id="montant-budget" aria-label="Montant budget" role="budget">
                                <label class="input-group-append">
                                    <span class="input-group-text">Ar</span>
                                </label>
                            </div>
                        </div>
                        <p class="message-error message-montant"></p>
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
                            <label for="nom-perso-part1">Nom<span class="required">*</span></label>
                            <input type="text" class="form-control nom_contact_particulier_valoriser" id="nom-perso-part1" placeholder="Saisissez votre nom" role="nom" required>
                            <p class="message-error"></p>
                        </div>
                        <div class="form-group">
                            <label for="prenom-perso-part1">Prénom<span class="required">*</span></label>
                            <input type="text" class="form-control prenom_contact_particulier_valoriser" id="prenom-perso-part1" placeholder="Saisissez votre prénom" role="prénom" required>
                            <p class="message-error"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="mail-perso-part1">Adresse mail<span class="required">*</span></label>
                            <input type="text" class="form-control mail_adresse_mail_contact_particulier_valoriser" id="mail-perso-part1" placeholder="Saisissez votre adresse mail" role="adresse mail" required >
                            <p class="message-error"></p>
                            <!--p class="invalid-feedback">Champ non renseigné</p-->
                        </div>
                        <div class="form-group">
                            <label for="telephone-perso-part1">Téléphone<span class="required">*</span></label>
                            <input type="text" name="text" onkeypress="numTele('tel_contact_particulier_valoriser')" class="form-control tel_contact_particulier_valoriser" id="telephone-perso-part1" placeholder="Saisissez votre numéro de tél" role="téléphone" required>
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
        <div class="g-recaptcha-valorise" data-sitekey="<?php echo $dataArray[1] ?>" id="RecaptchaField1"></div>
        <input type="hidden" class="hiddenRecaptcha" id="valoriser_hiddenRecaptcha">
        <input type="hidden" class="expiredResponse1" id="expiredResponse1">
        <!--end captcah-->
        <p class="messageRecapt"></p>
    </div>

    <div class="btns-group" role="group">
        <button type="button" class="btn btn-secondary btn-sm  reset-contact">annuler</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="saveFormulair('contact-terrain-valoriser','valoriser_hiddenRecaptcha')">envoyer</button>
    </div>
</form>

<div style="display: none">
    <?php
    if($dataArray[0] != null){
        ninja_forms_display_form( $dataArray[0] );
        CPage::getVariableJS('form_terrain_valoriser',$dataArray[0]);
    }
    ?>
</div>
