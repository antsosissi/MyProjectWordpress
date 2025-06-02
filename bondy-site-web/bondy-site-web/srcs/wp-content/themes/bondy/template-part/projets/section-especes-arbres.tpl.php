<?php
/**
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 09:50
 */
$objectPa = get_query_var( 'objectPage' );
$espece_arbre = $objectPa->espece_arbre;
$pageArbres = wp_get_post_by_template( 'especes-d-arbres.php' );
if($espece_arbre != null){
    $img_espece_id = $espece_arbre['image_espece_arbre'];
    $relation_espece = $espece_arbre['relation_espece_arbre'];

    ?>

    <article class="especeArbre-bloc bloc-item">
        <div class="container">
            <figure class="big-image ieobjectfit">

                    <?php
                    list($back_espece_arb_mobile)  = wp_get_attachment_image_src($img_espece_id, HOME_WELCOME_MOBILE);
                    list($back_espece_arb_tablet)  = wp_get_attachment_image_src($img_espece_id, HOME_WELCOME_TABLET);
                    list($back_espece_arb_desktop) = wp_get_attachment_image_src($img_espece_id, HOME_WELCOME_DESKTOP);
                    $back_espece_arb_mobile = ( !empty( $back_espece_arb_mobile ) ) ? $back_espece_arb_mobile : get_template_directory_uri() . '/images/default.jpg';
                    $back_espece_arb_tablet = ( !empty( $back_espece_arb_tablet ) ) ? $back_espece_arb_tablet : get_template_directory_uri() . '/images/default.jpg';
                    $back_espece_arb_desktop = ( !empty( $back_espece_arb_desktop ) ) ? $back_espece_arb_desktop : get_template_directory_uri() . '/images/default.jpg';
                    ?>
                    <img src="<?php echo $back_espece_arb_desktop; ?>"
                        srcset="
                              <?php echo $back_espece_arb_mobile; ?> 320w,
                              <?php echo $back_espece_arb_tablet; ?> 1024w,
                              <?php echo $back_espece_arb_desktop; ?> 1920w"
                        alt="<?php  ?>">
            </figure>
            <div class="info-content row no-gutters">
                <div class="offset-lg-4 col-lg-8">
                    <div class="inner-content">
                        <h2><?php echo $espece_arbre['titre_espece_arbre']; ?></h2>

                    <div class="list-espece-arbre">
                        <?php
                        if(!empty($relation_espece)) {
                            foreach ($relation_espece as $list) {
                                $data_espce = CEspeceArbre::getById($list);

                                set_query_var('objectPage', $data_espce);
                                get_template_part('template-part/especes-arbres/section-list-espece-arbre.tpl');
                                ?>
                            <?php }
                        }
                        ?>
                    </div>
                    <p class="wrap-btn-decouvrir text-center"><a href="<?php echo get_permalink($pageArbres->ID); ?>" class="btn btn-primary btn-lg btn-decouvrir"><span>Découvrir plus</span></a></p>
                </div>
            </div>
        </div>
    </article>
<?php }