<?php
/**
 * Template Name: qui sommes nous
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

get_header();

global $post;
$oPage = Qsomme_nous::getById($post->ID);
?>

    <div id="primary">

         <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>
        <!-- breadcrumb -->
        <!-- fil d ariane -->
        <?php
        set_query_var( 'var', $oPage );
        get_template_part('template-part/fil_ariane.tpl');
        ?>
        <?php include get_template_directory() . '/template-part/titre-page.php'; ?>

        <article class="decouvrez-valeurs bloc-item">
            <div class="container">
                <?php echo $oPage->bondy_banniere_valeurs_titre ?>
                <figure class="bloc-img ieobjectfit">
                    <img src="<?php echo $oPage->bondy_banniere_valeurs_image; ?>" alt="<?php echo bloginfo(); ?>" >
                </figure>
                <div class="content-txt">
                    <?php
                    $banierValeur = $oPage->bondy_banniere_valeurs;

                    if($banierValeur != null){
                        ?>
                        <div class="accordion-bloc" id="accordion-valeur" role="tablist" aria-multiselectable="true">
                            <?php
                            $i = 1;

                            foreach ($banierValeur as $listArray){ ?>
                                <div class="valeur-item" >
                                <i class="valeur-item-icon icobnd-<?php echo $listArray['bondy_banniere_valeurs_picto']; ?> hide-mobile"></i>
                                    <a class="valeur-head"  data-target="#acc-valeur-<?php echo $i; ?>" class="toggle-link" id="acc-valeur-link-<?php echo $i; ?>" data-toggle="collapse" data-parent="#accordion-valeur" role="button" aria-expanded="<?php echo $i == 1 ? 'true' : 'false' ?>" aria-controls="acc-valeur-<?php echo $i; ?>">
                                        <i class="valeur-item-icon <?php echo $listArray['bondy_banniere_valeurs_picto']; ?>"></i>
                                        <h3 class="titre-item titre-item-mobile"><span><?php echo $listArray['bondy_banniere_valeurs_texte'] ?></span></h3>
                                        <span class="circle-toggle">
                                            <span class="horizontal"></span>
                                            <span class="vertical"></span>
                                        </span>
                                    </a>
                                    <div class="valeur-content collapse <?php echo $i == 1 ? 'show' : '' ?>" id="acc-valeur-<?php echo $i; ?>" role="tabpanel" aria-labelledby="acc-valeur-link-<?php echo $i; ?>" data-parent="#accordion-valeur">
                                        <h3 class="titre-item titre-item-1024"><span><?php echo $listArray['bondy_banniere_valeurs_texte'] ?></span></h3>
                                        <p><?php echo $listArray['bondy_banniere_valeurs_texte_description'] ?></p>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php } ?>
                        </div>
                    <?php   }
                    ?>
                </div>
            </div>
            <?php get_template_part('template-part/section-abonnement.tpl'); ?>
        </article>

        <article class="about-us-pilier">
            <div class="container">
                <?php echo $oPage->bondy_banniere_pilier_titre ?>
                <div class="sous-titre-content">
                    <h3 class="sous-titre-bloc"><?php echo $oPage->bondy_banniere_pilier_description ?></h3>
                    <div class="row">
                        <?php
                        $pilierValeur = $oPage->bondy_banniere_pilier_valeur;

                        if($pilierValeur != null){
                            foreach ($pilierValeur as $listArray){
                                ?>
                                <div class="col-lg-4">
                                    <div class="pilier-item">
                                        <div class="pilier-content">
                                            <figure class="bloc-img ieobjectfit">

                                                <?php
                                                list($img_pilier_mobile)  = wp_get_attachment_image_src($listArray['bondy_banniere_pilier_valeur_image'], HOME_WELCOME_MOBILE);
                                                list($img_pilier_tablet)  = wp_get_attachment_image_src($listArray['bondy_banniere_pilier_valeur_image'], HOME_WELCOME_TABLET);
                                                list($img_pilier_desktop) = wp_get_attachment_image_src($listArray['bondy_banniere_pilier_valeur_image'], HOME_WELCOME_DESKTOP);
                                                $img_pilier_mobile = ( !empty($img_pilier_mobile)) ? $img_pilier_mobile : get_template_directory_uri() . '/images/default.jpg';
                                                $img_pilier_tablet = ( !empty( $img_pilier_tablet ) ) ? $img_pilier_tablet : get_template_directory_uri() . '/images/default.jpg';
                                                $img_pilier_desktop = ( !empty( $img_pilier_desktop ) ) ? $img_pilier_desktop : get_template_directory_uri() . '/images/default.jpg';
                                                ?>
                                                <img src="<?php echo $img_pilier_desktop; ?>"
                                                     srcset="
                                                    <?php echo $img_pilier_mobile; ?> 320w,
                                                    <?php echo $img_pilier_tablet; ?> 1024w,
                                                    <?php echo $img_pilier_desktop; ?> 1920W"
                                                     alt="<?php ?>" sizes="100vw">
                                            </figure>
                                            <h3 class="sous-titre-bloc"><span class="text-titre"><?php echo $listArray['bondy_banniere_pilier_valeur_titre']; ?></span></h3>
                                            <p><?php echo $listArray['bondy_banniere_pilier_valeur_description']; ?></p>
                                        </div>
                                        <div class="pilier-details">
                                            <div class="pilier-details-top">
                                                <?php
                                                $pilierValeurPicto = $listArray['bondy_banniere_pilier_valeur_picto'];
                                                if($pilierValeurPicto != null){
                                                    foreach ($pilierValeurPicto as $listArray2){
                                                        ?>
                                                        <div class="pilier-details-item col-sm-6">
                                                            <i class="icobnd-<?php echo $listArray2['bondy_banniere_pilier_valeur_picto_image'];?>  icon-desk"></i>
                                                            <span class="pict-img-title"><?php echo $listArray2['bondy_banniere_pilier_valeur_picto_titre']; ?></span>
                                                        </div>
                                                <?php }
                                                } ?>
                                            </div>
                                            <p class="pict-img"><?php echo $listArray['bondy_banniere_pilier_valeur_description_2']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </article>

        <!-- section partenaires template-part  -->
        <?php
        set_query_var( 'objectPage', $oPage );
        get_template_part('template-part/section-partenaires.tpl');
        ?>
        <!-- end partenaires -->
    </div><!-- #primary -->

<?php
get_footer();

