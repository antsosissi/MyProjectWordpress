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
$oPage = CActualite::getById($post->ID);
set_query_var( 'var', $oPage );
get_template_part('template-part/fil_ariane.tpl');
$titre = (!empty($oPage->titre) && isset($oPage->titre)? $oPage->titre :'');
$description = (!empty($oPage->description) && isset($oPage->description)? $oPage->description : $oPage->extrait);
$new_content = wp_strip_all_tags( $new_content );
setlocale(LC_TIME, "fr_FR");
$pageActualite = wp_get_post_by_template( 'actualites.php' );

?>
<!-- fin fil ariane -->
<?php //pvc_statss_update( $post->ID, 0 ); ?>
<div class="detail-actus">
    <div class="container">
        <h1 class="titre-bloc"><span><?php echo $titre;?><span></h1>
        <div class="photo-publier">
            <div class="publication-partage">              
                <p>Publié le : <?php echo strftime("%d %B %G", strtotime($oPage->date));  ?></p>
                <div class="actus-partage">
                    <label>Partager sur :</label>
                    <ul>
                        <?php get_template_part( 'template-part/partage-reseaux-sociaux.tpl'); ?>
                    </ul>
                </div>
            </div>
        <?php
        //var_dump($oPage->banniere_actualite);
        if(!empty($oPage->banniere_actualite)):?>
        <figure class="ieobjectfit">
            <?php
            list($img_actus_mobile)  = wp_get_attachment_image_src($oPage->banniere_actualite, IMAGE_ACTUS_MOBILE);
            list($img_actus_tablet)  = wp_get_attachment_image_src($oPage->banniere_actualite, IMAGE_ACTUS_TABLET);
            list($img_actus_desktop) = wp_get_attachment_image_src($oPage->banniere_actualite, IMAGE_ACTUS_DESKTOP);
            ?>
            <img src="<?php echo $img_actus_desktop; ?>"
                srcset="
                                <?php echo $img_actus_mobile; ?> 320w,
                                <?php echo $img_actus_tablet; ?> 1024w,
                                <?php echo $img_actus_desktop; ?> 1920w"
                alt="<?php echo $titre; ?>">
        </figure>

        <?php endif;?>
        </div>
        <div class="rich-text description">
         <?php
            echo apply_filters("the_content", $description);
            ?>
        </div>

        <div class="gallery">
            <?php if(!empty($oPage->image_gallery)):?>
            <p>Photos</p>
            <div class="list-gallery photo-gallery-content">

                <?php foreach ($oPage->image_gallery as $val):
                    $id_image = (!empty($val['image']) && isset($val['image'])) ? $val['image'] : "";
                    $titre = (!empty($val['texte']) && isset($val['texte'])) ? $val['texte'] : "";?>
                    <figure >
                        <?php
                        list($img_actus_mobile)  = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_MOBILE);
                        list($img_actus_tablet)  = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_TABLET);
                        list($img_actus_desktop) = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_DESKTOP);
                        ?>
                        <a title="<?php echo $titre; ?>" class="gallery-item" data-fancybox="gallery-group" data-caption="<?php echo $titre; ?>"  href="<?php echo $img_actus_desktop; ?>" target="_blank">
                            <img src="<?php echo $img_actus_desktop; ?>"
                                srcset="
                                        <?php echo $img_actus_mobile; ?> 320w,
                                        <?php echo $img_actus_tablet; ?> 1024w,
                                        <?php echo $img_actus_desktop; ?> 1920w"
                                alt="<?php echo $titre; ?>">
                        </a>
                    </figure>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
        <div class="list-tag">
            <?php
            if(!empty($oPage->etiquette_actualiter)):?>
            <label for="">Tags :</label>
               <?php  foreach ($oPage->etiquette_actualiter as $val):?>
                    <a class="btn" href="<?php echo add_query_arg('tags', $val->term_id,get_permalink($pageActualite->ID));?>" title="<?php echo $val->name;?>"><?php echo $val->name;?></a>
            <?php  endforeach;
            endif;
            ?>
        </div>
        <?php $lienActu = get_permalink($pageActualite->ID);
        ?>

        <div class="revenir-actus">
            <a class="btn btn-default btn-lg btn-back-actus"href="<?php echo $lienActu;?>">Revenir aux actus</a>
        </div>
        <hr class="d-lg-none d-block">
        <?php
        if(!empty($oPage->etiquette_actualiter) && [$oPage->etiquette_actualiter] != 0):
            ?>
            <?php
            $data_litse_actus = CActualite::getBy( -1,  null, array(), array(),$oPage->etiquette_actualiter[0]->term_id);
            ?>
            <div class="actus-similaire actus-bloc">
                <div class="titre">
                    <h2 class="titre-bloc">Actualités <span>similaires</span></h2>
                    <div class="custom-slider-nav owl-nav" id="nav-slider-actus"></div>
                </div>
                <div class="actus-slider bloc-slider owl-carousel" id="actus-slider">
                    <?php
                        foreach($data_litse_actus as $actu_value){
                            set_query_var( 'objectPage', $actu_value);
                            get_template_part('/template-part/actualite/section-actualite.tpl');
                        }
                    ?>
                </div>
                <div class="nav-bottom">
                    <div class="custom-slider-dots owl-dots" id="dots-slider-actus"></div>
              </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();?>


