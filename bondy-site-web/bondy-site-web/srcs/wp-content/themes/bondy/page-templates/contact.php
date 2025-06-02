<?php
/**
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

get_header();

global $post;
$oPage = CPage::getById($post->ID);

$forms = Ninja_Forms()->form()->get_forms();
$hasEntreprise = ( isset( $_REQUEST['type'] ) && !empty( $_REQUEST['type'] ) && 1 === intval($_REQUEST['type']) ) ? $_REQUEST['type'] : false;
$hasParticular = ( isset( $_REQUEST['type_part'] ) && !empty( $_REQUEST['type_part'] ) && intval($_REQUEST['type_part']) > 0 ) ? $_REQUEST['type_part'] : false;
$benevole = $informationBondy = false;
if ( $hasParticular == 1 ){
    $benevole = true;
} elseif ( $hasParticular == 2 ){
    $informationBondy = true;
}
foreach ( $forms as $form ) {
    $form_name 	= $form->get_setting( 'title' );

    if($form_name == "Contact terrain à valoriser"){
        $form_terrain_valoriser_id = $form->get_id();
    }

    if($form_name == "Contact bénévole"){
        $form_contact_benevol_id = $form->get_id();
    }

    if($form_name == "Contact particulier"){
        $form_contact_particulier_id = $form->get_id();
    }

    if($form_name == "Contact entreprise"){
        $form_entreprise_id = $form->get_id();
    }
}
?>
    <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
    <!--script src="https://www.google.com/recaptcha/api.js" async defer></script-->
    <script type="text/javascript" charset="utf-8">
        var CaptchaCallback = function() {
            var widgetId0;
            var widgetId1;
            var widgetId2;
            var widgetId3;
            widgetId0 = grecaptcha.render('RecaptchaField0', {'sitekey' : '<?php echo $bondy_options['google_captcha_key_public'] ?>', 'callback' : correctCaptcha_entreprise, 'expired-callback': onRecaptchaExpired0 });
            widgetId1 = grecaptcha.render('RecaptchaField1', {'sitekey' : '<?php echo $bondy_options['google_captcha_key_public'] ?>', 'callback' : correctCaptcha_valoriser, 'expired-callback': onRecaptchaExpired1 });
            widgetId2 = grecaptcha.render('RecaptchaField2', {'sitekey' : '<?php echo $bondy_options['google_captcha_key_public'] ?>', 'callback' : correctCaptcha_benevole, 'expired-callback': onRecaptchaExpired2 });
            widgetId3 = grecaptcha.render('RecaptchaField3', {'sitekey' : '<?php echo $bondy_options['google_captcha_key_public'] ?>', 'callback' : correctCaptcha_particulier, 'expired-callback': onRecaptchaExpired3 });
        };
        var correctCaptcha_entreprise = function(response) {
            $("#entreprise_hiddenRecaptcha").val(response);
        };
        var correctCaptcha_valoriser = function(response) {
            $("#valoriser_hiddenRecaptcha").val(response);
        };
        var correctCaptcha_benevole = function(response) {
            $("#benevole_hiddenRecaptcha").val(response);
        };
        var correctCaptcha_particulier = function(response) {
            $("#particulier_hiddenRecaptcha").val(response);
        };
        var onRecaptchaExpired0 = function() {
            if ( $("#expiredResponse0").length > 0 ){
                $("#expiredResponse0").val($("#entreprise_hiddenRecaptcha").val());
            }
        };
        var onRecaptchaExpired1 = function() {
            if ($("#expiredResponse1").length >0){
                $("#expiredResponse1").val($("#valoriser_hiddenRecaptcha").val());
            }
        };
        var onRecaptchaExpired2 = function() {
            if ($("#expiredResponse2").length >0){
                $("#expiredResponse2").val( $("#benevole_hiddenRecaptcha").val());
            }
        };
        var onRecaptchaExpired3 = function() {
            if ($("#expiredResponse3").length >0){
                $("#expiredResponse3").val($("#particulier_hiddenRecaptcha").val());
            }
        };

    </script>

    <div class="contact-page">
        <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>

        <?php
            set_query_var( 'var', $oPage );
            get_template_part('template-part/fil_ariane.tpl');
        ?>
        <?php include get_template_directory() . '/template-part/titre-page.php'; ?>

        <div class="container container-contactForm">
            <!-- contenu formulaire contact -->
            <div class="contact-bloc">
                <!-- tabs Particulier/entreprises -->
                <nav class="tabs tabs-typeuser">
                    <p class="surTabs">Vous êtes :</p>
                    <ul class="nav nav-tabs" id="tabHead-form" role="tablist">
                        <li class="nav-item">
                            <a href="#particulier-form" title="Particulier" class="nav-link <?php if ( !$hasEntreprise ):?>active<?php endif;?>" id="particulier-tab" data-toggle="tab" role="tab" aria-controls="particulier-form" aria-selected="false">Particulier</a>
                        </li>
                        <li class="nav-item">
                            <a href="#entreprise-form" title="Entreprise" class="nav-link <?php if ( $hasEntreprise ):?>active<?php endif;?>" id="entreprise-tab" data-toggle="tab" role="tab" aria-controls="entreprise-form" aria-selected="true">Entreprise</a>
                        </li>
                    </ul>
                </nav>
                <!-- content all forms -->
                <div id="tabContent-form" class="tab-content" >
                    <div class="tab-pane fade <?php if ( !$hasEntreprise ):?>in active show<?php endif?>" id="particulier-form">
                        <?php include get_template_directory() . '/template-part/contact/form-particulier.php'; ?>
                    </div>
                    <div class="tab-pane fade <?php if ( $hasEntreprise ):?>in active show<?php endif?>" id="entreprise-form">
                        <?php
                        $array_ID_Captc = [$form_entreprise_id,$bondy_options['google_captcha_key_public']];
                        set_query_var( 'dataArray', $array_ID_Captc );
                        get_template_part('template-part/contact/form-entreprise');
                        ?>
                    </div>
                </div>
                <!-- /content all forms -->
                <div class="infos-contact">
                    <p>
                        <?php if ( isset( $oPage->description ) && !empty( $oPage->description ) ):
                                echo $oPage->description;
                            else:?>
                        En aucun cas Bôndy ou ses partenaires ne cherchent à acquérir les terrains des particuliers. Nous sommes une entreprise de service et tous nos partenariats sont accompagnés de contrats protégeant l’ensemble des parties prenantes, notamment les propriétaires terriens.
                        <?php endif;?>
                    </p>
                </div>
            </div>
            <!-- /contenu formulaire contact -->
        </div>
    </div>
<?php
get_footer();