<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bondy
 */
get_header();
global $post;
$oPage = CProjet::getById($post->ID);
$pageParticulier = wp_get_post_by_template( 'particulier.php' );
$pageEntreprise = wp_get_post_by_template( 'entreprises.php' );
$pageProjet = wp_get_post_by_template('page-projets-bondy.php');
?>
<div id="primary" class="fiche-projet enParle-bloc bloc-item full-temoignage-slide">
    <!-- fil ariane -->
    <?php
    set_query_var( 'var', $oPage );
    get_template_part('template-part/fil_ariane.tpl');
    ?>
    <div class="container">
        <section class="detail-fiche-projet">
            <!-- button next previous -->
            <div class="bouton-prev-next">
                <?php
                if(get_previous_post_link() == ""){ ?>
                <span class="disabled"><a href="#" rel="prev"><i class="icobnd-arrow-left-rounded" title=""></i></a></span>
                <?php } else { ?>
                <span><?php previous_post_link('%link','<i class="icobnd-arrow-left-rounded"  title="' . '%title'. '"></i>' ) ?></span>
                <?php } ?>
                <span><a class="bouton-tout-projet" href="<?php echo get_permalink($pageProjet->ID); ?>" title="<?php echo $pageProjet->post_title;?>"><span></span></a></span>
                <?php
                if(get_next_post_link() == ""){ ?>
                <span class="disabled"><a href="#" rel="next"><i class="icobnd-arrow-right-rounded" title=""></i></a></span>
                <?php } else { ?>
                <span><?php next_post_link( '%link','<i class="icobnd-arrow-right-rounded" title="' . '%title'. '"></i>' ); ?></span>
                <?php } ?>

            </div>

            <!-- end -->
            <div class="detail-fiche-projet-content">
                <!--  carrousel image projet -->
                <div class="detail-fiche-projet-carrousel <?php if( isset( $oPage->projet_galerie ) && empty( $oPage->projet_galerie ) ) :?>empty-detail-fiche<?php endif;?>">
                    <?php if( isset( $oPage->projet_galerie ) && !empty( $oPage->projet_galerie ) ) :?>
                    <a class="zoom-photo d-lg-block d-none" href="javascript:;"><i class="icobnd-enlarge"></i></a>
                    <div class="photo-gallery-content">
                        <div class="owl-carousel full-photo" id="full-photo">
                            <?php
                                foreach ($oPage->projet_galerie as $chaqueImg){?>
                                <div class="item">
                                    <figure class="ieobjectfit">
                                        <?php
                                            list($img_projet_mobile)  = wp_get_attachment_image_src($chaqueImg['image'], IMAGE_ESPECE_ARBRE_MOBILE);
                                            list($img_projet_tablet)  = wp_get_attachment_image_src($chaqueImg['image'], IMAGE_ESPECE_ARBRE_TABLET);
                                            list($img_projet_desktop) = wp_get_attachment_image_src($chaqueImg['image'], IMAGE_ESPECE_ARBRE_DESKTOP);
                                        ?>
                                        <a title="<?php echo $chaqueImg['texte']; ?>" class="gallery-item" data-fancybox="gallery-group" data-caption="<?php echo $text_gallery; ?>" href="<?php echo $img_projet_desktop; ?>" target="_blank">
                                            <img src="<?php echo $img_projet_desktop; ?>"
                                                srcset="
                                                    <?php echo $img_projet_mobile; ?> 320w,
                                                    <?php echo $img_projet_tablet; ?> 1024w,
                                                    <?php echo $img_projet_desktop; ?> 1920w"
                                                alt="<?php echo $chaqueImg->texte ?>"
                                            >
                                        </a>
                                    </figure>
                                    <?php 
                                     $text_gallery = (!empty($oPage->galerie_text_decriptif) && isset($oPage->galerie_text_decriptif)) ? $oPage->galerie_text_decriptif : "";
                                    ?>
                                     
                                </div>
                                    <?php
                                }
                            ?>
                        </div>
                        <div class="legend">
                            <p class="legende-img"><?php echo $text_gallery;?></p>
                            <div class="owl-nav" id="nav-slider-full-photo"></div>
                        </div>
                        <?php if ( isset( $oPage->projet_galerie ) && !empty( $oPage->projet_galerie ) && count( $oPage->projet_galerie ) > 0 ) :?>
                        <div class="owl-carousel mini-photo" id="mini-photo">
                                <?php

                                    foreach ($oPage->projet_galerie as $chaqueImg):
                                        $id_image = (!empty($chaqueImg['image']) && isset($chaqueImg['image'])) ? $chaqueImg['image'] : "";
                                        list($image_min)  = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_MOBILE);?>
                                        <div class="item">
                                            <figure class="ieobjectfit">
                                                <img src="<?php echo $image_min; ?>" alt="">
                                            </figure>
                                        </div>
                                    <?php endforeach;
                                 ?>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php endif;?>
                </div>
                <!-- end details -->
                <div class="detail-fiche-projet-description">
                    <!-- details projets -->
                    <h2><?php echo $oPage->titre ?></h2>
                    <!-- localisation -->
                    <span class="localisation"><?php echo $oPage->projet_localisation ?></span>
                    <div class="etat--partage">
                        <!-- avancement projet -->
                        <p class="icon-status"><span class="<?php echo $oPage->icon_avancement ?>"></span><?php echo $oPage->avancement_projet[0]->name ?></p>
                        <div class="partage">
                            <!-- partage sur reseau sociau -->
                            <label>Partager sur :</label>
                            <ul>
                                <?php get_template_part( 'template-part/partage-reseaux-sociaux.tpl'); ?>
                                    <!-- favoris -->
                                <?php
                                if(in_array('favorites/favorites.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                                    $class_outline = 'icobnd-star-outline';
                                    $tFavoriesList = get_user_favorites();
                                    if (in_array($oPage->id, $tFavoriesList)) {
                                        $class_outline = 'icobnd-star';
                                    }

                                    $favorite_add = get_favorites_button($oPage->id);
                                    $favorite_add = str_replace('style', 'style="display: none"', $favorite_add);
                                    $favorite_add = str_replace('simplefavorite-button', 'simplefavorite-button simplefavorite-remove-add-'.$oPage->id, $favorite_add);
                                    echo $favorite_add;
                                    ?>
                                    <a class="favoris-link add-fav" data-id="<?php echo $oPage->id ?>">
                                        <i class="<?php echo $class_outline; ?>"></i>
                                        <!-- <i class="hover-icon icobnd-star"></i> -->
                                    </a>
                                    <!-- si selectionné :  ><i class="icobnd-star"></i>-->
                                    <?php
                                } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- description -->
                    <div class="rich-text">
                        <p class="descriptif"><?php echo apply_filters('the_conten',$oPage->description); ?></p>
                    </div>
                    <div class="participez">
                        <div class="participez-content">
                            <label>Participez au projet</label>
                            <div class="lien-participez">
                                <a class="entreprise" href="<?php echo get_permalink($pageEntreprise->ID); ?>" title="Je suis une Entreprise"><span>Je suis une</span> Entreprise</a>
                                <a class="particulier" href="<?php echo get_permalink($pageParticulier->ID); ?>" title="Je suis un Particulier"><span>Je suis un</span> Particulier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="projet-bouton">
                <a class="btn btn-primary btn-outline btn-voirProjets d-lg-none d-flex text-nowrap" href="<?php echo get_permalink($pageProjet->ID); ?>" target="_blank">Tous les projets</a>
            </div>
        </section>
    </div>
    
    <section class="plus-detail-projet-bloc">
        <div class="container">
            <!-- espece d'abre  -->
            <?php
            /* pagination espece d'arbre */
            $espece_pagination = new WP_Infinite_Loading('espece-arbre-box');
            //set list or table view
            $espece_pagination->setListView('other');
            //number of item on first load
            $espece_pagination->setItemNumberOnLoad(NOMBRE_PAGINATON_PAR_PAGE);
            $espece_pagination->setItemNumberToLoad(NOMBRE_PAGINATON_PAR_PAGE);
            //container class
            $espece_pagination->setContainerClasses('espece_content_bondy');
            //item classes
            $espece_pagination->setItemClasses('espece-item-bondy');
            $espece_pagination->setMessageNotFound('Aucun espce d\'arbre pour le moment');
            //set function callback for customize item template
            $espece_pagination->setRenderItemCallback(array('CProjet','renderItemCallbackEspece'));
            //set function callback for getting items by offset, limit, filter and sort
            $espece_pagination->setGetItemsCallback(array('CProjet', 'getItemsCallbackEspeceByProjet'));

            $espece_pagination->setInfiniteLoadButton(
                array(
                    'id'=>'load-more',
                    'tpl'=>'<div class="footer" id="load-more"><a href="javascript:;" class="more-link">Voir plus</a></div>'
                ),
                array(
                    'id'=>'no-load-more',
                    'tpl'=>'<div id="no-load-more" class="footer-hide-button"></div>'
                )
            );
            ?>
            <!-- plus de detail version mobile accodion -->
            <div class="accordion-bloc d-lg-none d-block" id="accordion-plus-detail"  aria-multiselectable="true">
                <h3>Plus de détails sur le projet</h3>
                <div class="accordion-plus-detail-projet">
                    <div class="plus-detail-projet-item">
                        <a class="plus-detail-projet-head" data-target="#acc-plus-detail-projet-1" class="toggle-link" id="acc-plus-detail-projet-link-1" data-toggle="collapse" data-parent="#accordion-plus-detail" role="button" aria-expanded="true" aria-controls="acc-plus-detail-projet-1">
                            Espèces d'arbres
                            <span class="circle-toggle">
                                <span class="horizontal"></span>
                                <span class="vertical"></span>
                            </span>
                        </a>
                        <div class="plus-detail-projet collapse show" id="acc-plus-detail-projet-1" role="tabpanel" aria-labelledby="acc-plus-detail-projet-link-1" data-parent="#accordion-plus-detail">
                            <div class="especeArbre-bloc plus-detail-projet-content">
                                <div class="rich-text">
                                    <?php
                                        if($oPage->description_espece_arbre == null) { ?>
                                            Nos espèces d'arbres sont spécifiquement sélectionnées en fonction de chaque projet pour maximiser les impacts environnementaux, sociax et économiques.
                                        <?php } else {
                                        ?>
                                        <?php echo apply_filters('the_content',$oPage->description_espece_arbre); ?>
                                        <?php } ?>
                                </div>
                                <div class="list-espece-arbre bloc-slider slider-type-1 owl-carousel" id="slider-mobile-espece-arbre">
                                    <?php
                                    //display pagination loading box espece d'arbre
                                    $espece_pagination->displayItems();
                                    //display the pagination loading button
                                    $espece_pagination->displayInfiniteLoadButton();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plus-detail-projet-item">
                        <a class="plus-detail-projet-head" data-target="#acc-plus-detail-projet-2" class="toggle-link" id="acc-plus-detail-projet-link-2" data-toggle="collapse" data-parent="#accordion-plus-detail" role="button" aria-expanded="" aria-controls="acc-plus-detail-projet-2">
                            Vue d'ensemble
                            <span class="circle-toggle">
                                <span class="horizontal"></span>
                                <span class="vertical"></span>
                            </span>
                        </a>
                        <div class="plus-detail-projet collapse" id="acc-plus-detail-projet-2" role="tabpanel" aria-labelledby="acc-plus-detail-projet-link-2" data-parent="#accordion-plus-detail">
                            <div class="rich-text plus-detail-projet-content">
                                <?php echo apply_filters('the_content', $oPage->plus_detail_description);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- plus de detail version desktop tabs -->
            <div class="detail-projet-tabs d-lg-block d-none">
                <h3>Plus de détails sur le projet</h3>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" role="tab" title="Espèces d'arbres" data-toggle="tab" href="#espece-arbres-tabs">Espèces d'arbres</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" title="Vue d'ensemble" role="tab" href="#vue-ensemble-tabs">Vue d'ensemble</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="espece-arbres-tabs" class="tab-pane active">
                        <div class="especeArbre-bloc">
                            <div class="rich-text">
                                <?php
                                if($oPage->description_espece_arbre == null) { ?>
                                    Nos espèces d'arbres sont spécifiquement sélectionnées en fonction de chaque projet pour maximiser les impacts environnementaux, sociax et économiques.
                                <?php } else {
                                    ?>
                                    <?php echo apply_filters('the_content',$oPage->description_espece_arbre); ?>
                                <?php } ?>
                            </div>
                            <div class="list-espece-arbre bloc-item">
                                <?php
                                //display pagination loading box espece d'arbre
                                $espece_pagination->displayItems();
                                //display the pagination loading button
                                $espece_pagination->displayInfiniteLoadButton();
                                ?>
                            </div>
                        </div>
                    </div>
                    <!--- vue d'ensemble -->
                    <div role="tabpanel" id="vue-ensemble-tabs" class="tab-pane rich-text">
                        <?php echo apply_filters( 'the_content', $oPage->plus_detail_description);?>
                    </div>
                </div>
            </div>
            <hr></hr>
        </div>
    </section>

    <!-- participation au projet -->
    <div class="enParle-bloc full-temoignage-slider">
        <div class="container">
            <!-- ils parles de nous-->
            <?php
            set_query_var( 'objectPage', $oPage );
            get_template_part('template-part/ils_parle_de_nous.tpl');
            ?>
        </div>
    </div>
</div>
    

<?php
get_footer();


