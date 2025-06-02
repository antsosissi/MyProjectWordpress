<?php
/**
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 10:03
 */
$objectPage = get_query_var( 'objectPage' );
$partenaireID = $objectPage->associe_partenaire_id;
if($partenaireID != null) {
    ?>
    <article class="about-us-partner">
        <div class="container slider-wrapper">
            <?php echo $objectPage->partenaire_titre ?>
            <div class="sous-titre-content">
                <div class="sous-titre-bloc">
                    <?php echo $objectPage->partenaire_description ?>
                </div>
                <span class="fxFlex"></span>
                <!-- Boutons de navigations [dots pour mobile/tablette/ desktop] -->
                <div class="custom-slider-nav owl-nav loop-nav desktop-nav" id="nav-slider-partner"></div>
                <!-- /Boutons de navigations [dots pour mobile/tablette/ desktop] -->
            </div>
            <div class="partner-slider-wrap">
                <div class="partner-slider  bloc-slider slider-type-1 owl-carousel" id="partner-slider">
                    <?php
                    $partenaireID = $objectPage->associe_partenaire_id;

                    foreach ($partenaireID as $listID) {
                        $partenaireMA = CPartenaire::getById($listID);
                        ?>
                        <div class="partner-item">
                            <div class="innerCnt-item">
                                <?php $link = $partenaireMA->lien_partenaire; ?>
                                <?php if ($link != null){ ?><a href="<?php echo $link; ?>"
                                                               target="_blank"><?php } ?>
                                    <?php

                                    list($img_partenaire_desktop) = wp_get_attachment_image_src($partenaireMA->logo_partenaire_id, HOME_PARTENAIRE_DESKTOP);
                                    $img_partenaire_desktop = (!empty($img_partenaire_desktop)) ? $img_partenaire_desktop : get_template_directory_uri() . '/images/default.jpg';

                                    ?>
                                    <img src="<?php echo $img_partenaire_desktop; ?>"
                                         alt="<?php echo $partenaireMA->titre; ?>" alt="<?php echo $partenaireMA->titre; ?>">
                                    <?php if ($partenaireMA != null){ ?> </a><?php } ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="nav-bottom">
                <div class="custom-slider-dots owl-dots text-center" id="dots-slider-partner-dsk-bloc"></div>
            </div>
        </div>
    </article>
    <?php
}?>
