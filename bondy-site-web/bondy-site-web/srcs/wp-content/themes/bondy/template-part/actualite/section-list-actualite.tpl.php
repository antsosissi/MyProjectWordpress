<?php
/**
 * Created by PhpStorm.
 * Date: 11/05/2020
 * Time: 13:52
 */
$objectPa = get_query_var( 'objectPage' );
$actualiteID =  $objectPa->relation_actualite_id;
$pageActualite = wp_get_post_by_template('actualites.php');
if($actualiteID != null) {
    ?>
    <section class="actus-bloc">
        <?php echo $objectPa->tout_le_monde_parle_titre; ?>
        <div class="actus-list slider-wrapper">
            <div class="sous-titre-content">
                <div class="intros-text">
                    <p><?php echo $objectPa->tout_le_monde_parle_description; ?></p>
                </div>
                <span class="fxFlex"></span>
                <a href="<?php echo get_permalink($pageActualite->ID); ?>"
                   class="btn btn-primary btn-outline btn-md btn-voirActus d-none d-lg-inline-flex"><span>Toutes les actus</span></a>
                <div class="custom-slider-nav owl-nav" id="nav-slider-actus"></div>
            </div>
            <div class="actus-slider bloc-slider slider-type-1 owl-carousel" id="actus-slider">
                <?php
                if ($actualiteID != null) {
                    foreach ($actualiteID as $idx) {
                        set_query_var('idx', $idx);
                        get_template_part('template-part/actualite/section-actualite.tpl'); ?>
                    <?php }
                } ?>
            </div>
            <div class="nav-bottom">
                <div class="custom-slider-dots owl-dots" id="dots-slider-actus"></div>
                <span class="fxFlex"></span>
                <a href="<?php echo get_permalink($pageActualite->ID); ?>"
                   class="btn btn-primary btn-sm btn-outline btn-voirActus d-lg-none text-nowrap">Toutes les actus</a>
            </div>
    </section>
    <?php
}