<?php
/**
 * Created by PhpStorm.
 * Date: 11/05/2020
 * Time: 13:52
 */
global $post;
$idx = get_query_var( 'objectPage');
$chaqueActu = CActualite::getById($idx);
$imageActu=get_post_thumbnail_id($idx);
?>
<?php
$class_actus = "actus-item";
if($chaqueActu->id_relation->context_projet['relation_actualite'][0] == $chaqueActu->id){
    $class_actus = "actus_vedette";
}
?>
<?php
$img_not_exist=empty($imageActu);
$class_img='';
if ($img_not_exist){
    $class_img='no-img-actu';
}
?>
<div class="<?php echo $class_actus;?> <?php echo $class_img ;?>" >
    <a href="<?php echo get_post_permalink($chaqueActu->id); ?>" class="actus-cnt">
        <?php
        if(!empty($imageActu)):?>
            <figure class="photo-actus ieobjectfit">
                <?php
                list($img_actus_mobile)  = wp_get_attachment_image_src($imageActu, IMAGE_ESPECE_ARBRE_MOBILE);
                list($img_actus_tablet)  = wp_get_attachment_image_src($imageActu, IMAGE_ESPECE_ARBRE_TABLET);
                list($img_actus_desktop) = wp_get_attachment_image_src($imageActu, IMAGE_ESPECE_ARBRE_DESKTOP);?>
                <img src="<?php echo $img_actus_desktop; ?>"
                     srcset="
                        <?php echo $img_actus_mobile; ?> 320w,
                        <?php echo $img_actus_tablet; ?> 1024w,
                        <?php echo $img_actus_desktop; ?> 1920w"
                     alt="<?php echo $chaqueActu->titre; ?>">
            </figure>
        <?php endif;?>
        <span class="etiquette-vedette">en vedette</span>
        <span class="overlay"></span>
    </a>
    <span class="hover-status"><i class="icobnd-link-external"></i><span>Lire cet article</span></span>
    <a href="<?php echo get_post_permalink($chaqueActu->id); ?>"><h3><?php  echo $chaqueActu->titre ;?></h3></a>
    <div class="desc-actus">
        <p><?php echo $chaqueActu->extrait ;?></p>
    </div>
    <div class="bottom-bar">
        <?php $date = strtotime($chaqueActu->date); ?>
        <p><span class="label">Publié le <span class="separator">:</span></span><span class="value"><?php echo date_i18n('d/m/Y', $date);  ?></span></p>

    </div>
</div>