<!-- form entreprises -->

<?php
global $bondy_options;
$domaineActions = array();
$pays = array();
$domaineActionsList = ( isset( $bondy_options['domaine_action_contact'] ) && !empty( $bondy_options['domaine_action_contact'] )  ) ? explode(',',$bondy_options['domaine_action_contact']) : array();
if ( !empty( $domaineActionsList ) && count( $domaineActionsList ) > 0 ){
    foreach ( $domaineActionsList as $elt ){
        if ( !empty( trim($elt) ) ){
            $domaineActions[trim($elt)] = $elt;
        }

    }
    ksort($domaineActions);
}
$paysList = ( isset( $bondy_options['pays_contact'] ) && !empty( $bondy_options['pays_contact'] )  ) ? explode(',',$bondy_options['pays_contact']) : array();
if ( !empty( $paysList ) && count( $paysList ) > 0 ){
    foreach ( $paysList as $elt ){
        if ( !empty( trim($elt) ) ) {
            $pays[trim($elt)] = $elt;
        }
    }
    ksort($pays);
}

?>
<form action="" class="form-bloc form-entreprise bloc-item" id="form-entreprise">
	<p class="required-label"><span class="required">*</span>champ obligatoire</p>
	<div class="content-form-item">
		<h3>Informations sur vos besoins</h3>
		<div class="content-form">
			<div class="row">
                <div class="field-bloc col-lg-6">
                    <div class="form-group checkbox-list">
                        <label>Quelle(s) solution(s) voulez-vous constituer ?</label>
                        <div class="form-check">
                            <input class="form-check-input ckeck_compenser_mon_empreinte_carbone" type="checkbox" value="Oui" id="solution-type-01">
                            <label class="form-check-label" for="solution-type-01">
                                <span>Compenser mon empreinte carbone</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input ckeck_associer_mes_produits_et_services_a_des_arbres_plantes" type="checkbox" value="Oui" id="solution-type-02">
                            <label class="form-check-label" for="solution-type-02"><span>Associer mes produits et services à des arbres plantés</span></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input ckeck_vegetaliser_mon_site_entreprise" type="checkbox" value="Oui" id="solution-type-03">
                            <label class="form-check-label" for="solution-type-03"><span>Végétaliser mon site entreprise</span></label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input ckeck_une_solution_rse_personnalisee" type="checkbox" value="Oui" id="solution-type-04">
                            <label class="form-check-label" for="solution-type-04"><span>Une solution RSE personnalisée</span></label>
                        </div>
                    </div>
                    <div class="form-group customSelect">
                        <label>Quel est le domaine d'action de votre entreprise ?<span class="required">*</span></label>
                        <select class="select-field form-control quel_est_le_domaine_d_action_de_votre_entreprise" required role="le domaine d'action de votre entreprise">
                            <option  value="">Choisissez le domaine</option>
                            <?php if ( !empty( $domaineActions ) && count( $domaineActions ) > 0 ):?>
                                <?php foreach ( $domaineActions as $key=>$val ):?>
                                    <option  value="<?php echo $key?>"><?php echo ucwords($val);?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <p class="message-error"></p>
                    </div>
                    <div class="form-group customSelect">
                        <label>Dans quel pays se trouve le siège de votre entreprise ?<span class="required">*</span></label>
                        <select class="select-field form-control dans_quel_pays_se_trouve_le_siege_de_votre_entreprise" required role="le pays du siège de votre entreprise">
                            <option  value="">Choisissez le pays</option>
                            <?php if ( !empty( $pays ) && count( $pays ) > 0 ):?>
                                <?php foreach ( $pays as $key=>$val ):?>
                                    <option  value="<?php echo $key?>"><?php echo ucwords($val);?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                        <p class="message-error"></p>
                    </div>
                </div>
				<div class="field-bloc col-lg-6">
					<div class="form-group switch-fieldItem">
						<label>Avez-vous un département RSE ?</label>
						<div class="switch">
						  <input type="checkbox" value="Oui" class="check_avez-vous_un_departement_rse" data-toggle="toggle" id="departement-RSE-ent" checked>
						  <label for="departement-RSE-ent" class="slider-wrap">
							  <span class="label-text label-oui">Oui</span>
							  <span class="slider"></span>
							  <span class="label-text label-non">Non</span>
						  </label>
						</div>
					</div>
					<div class="form-group switch-fieldItem">
						<label>Avez-vous des terrains disponibles pour votre action ?</label>
						<div class="switch">
						  <input type="checkbox" value="Oui" class="check_avez-vous_des_terrains_disponibles_pour_votre_action"  data-toggle="toggle" id="terrains-dispo">
						  <label for="terrains-dispo" class="slider-wrap">
							  <span class="label-text label-oui">Oui</span>
							  <span class="slider"></span>
							  <span class="label-text label-non">Non</span>
						  </label>
						</div>
					</div>
					<div class="form-group switch-fieldItem">
						<label>Voulez-vous que l'on ajoute cela à votre solution ?</label>
						<div class="switch">
						  <input type="checkbox" value="Oui" class="check_voulez-vous_qu_on_ajoute_cela_a_votre_solution" data-toggle="toggle" id="votre-solution" checked>
						  <label for="votre-solution" class="slider-wrap">
							  <span class="label-text label-oui">Oui</span>
							  <span class="slider"></span>
							  <span class="label-text label-non">Non</span>
						  </label>
						</div>
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
					        <label for="nom-perso-ets">Nom<span class="required">*</span></label>
					        <input type="text" class="form-control nom_contact_entreprise" id="nom-perso-ets" placeholder="Saisissez votre nom" role="nom" required>
                  <p class="message-error"></p>
					    </div>
					    <div class="form-group">
					        <label for="prenom-perso-ets">Prénom<span class="required">*</span></label>
					        <input type="text" class="form-control prenom_contact_entreprise" id="prenom-perso-ets" placeholder="Saisissez votre prénom" role="prénom" required>
                  <p class="message-error"></p>
					    </div>
				    </div>
				        <div class="form-row">
					        <div class="form-group">
					            <label for="nom-societe-ets">Nom de la Société<span class="required">*</span></label>
					            <input type="text" class="form-control nom_de_la_societe" id="nom-societe-ets" placeholder="Saisissez le nom de votre société" role="nom de la Société" required>
                      <p class="message-error"></p>
					        </div>
					    <div class="form-group">
					        <label for="post-occupe-ets">Poste occupé<span class="required">*</span></label>
					        <input type="text" class="form-control poste_occupe" id="post-occupe-ets" placeholder="Saisissez le poste occupé" role="poste occupé"  equired>
                  <p class="message-error"></p>
					    </div>
				  </div>
				</div>
				<div class="col-lg-6">
					<div class="form-row">
						<div class="form-group">
					        <label for="mail-perso-ets">Adresse mail<span class="required">*</span></label>
					        <input type="text" class="form-control mail_adresse_contact_entreprise" id="mail-perso-ets" placeholder="Saisissez votre adresse mail" role="adresse mail" required>
                  <p class="message-error"></p>
					    </div>
	            <div class="form-group">
	                <label for="telephone-perso-ets">Téléphone<span class="required">*</span></label>
	                <input type="text" name="text" onkeypress="numTele('tel_contact_entreprise')" class="form-control tel_contact_entreprise" id="telephone-perso-ets" placeholder="Saisissez votre numéro de tél" role="téléphone" required>
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
        <div class="g-recaptcha-entreprise" data-sitekey="<?php echo $dataArray[1] ?>" id="RecaptchaField0"></div>
        <input type="hidden" class="hiddenRecaptcha" id="entreprise_hiddenRecaptcha">
        <input type="hidden" class="expiredResponse0" id="expiredResponse0">
        <!--end captcah-->
        <p class="messageRecapt"></p>
    </div>

	<div class="btns-group" role="group">
		<button type="button" class="btn btn-secondary btn-sm reset-contact">annuler</button>
  	    <button type="button" class="btn btn-primary btn-sm" onclick="saveFormulair('conctat-entreprise','entreprise_hiddenRecaptcha')">envoyer</button>
	</div>
</form>
<!-- form entreprises -->

<div style="display: none">
    <?php
    if($dataArray[0] != null){
        ninja_forms_display_form( $dataArray[0] );
        CPage::getVariableJS('form_entreprise',$dataArray[0]);
    }
    ?>
</div>

<!-- form entreprises -->


