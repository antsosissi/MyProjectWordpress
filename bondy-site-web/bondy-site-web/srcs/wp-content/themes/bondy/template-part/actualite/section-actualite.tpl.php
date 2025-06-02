<?php
/**
 * Created by PhpStorm.
 * Date: 11/05/2020
 * Time: 13:52
 */
global $post;
$idx = get_query_var( 'idx');
$chaqueActu = CActualite::getById($idx);
$imageActu=get_post_thumbnail_id($idx);
$class_actus = "actus-item";
if(empty($idx)){
    $chaqueActu = get_query_var('objectPage');
    $imageActu = get_post_thumbnail_id($chaqueActu->id);
}
$titre = ( !empty( $chaqueActu->titre ) && isset( $chaqueActu->titre ) && !empty( $chaqueActu->titre ) ) ? $chaqueActu->titre : "";
$description = ( !empty( $chaqueActu->extrait ) && isset( $chaqueActu->extrait ) && !empty( $chaqueActu->extrait ) ) ? $chaqueActu->extrait : $chaqueActu->description ;
$class_actus = "actus-item";
?>
<?php
    $class_img='';
    if (empty($imageActu)){
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
            </a>
            <span class="hover-status"><i class="icobnd-link-external"></i><span>Lire cet article</span></span>
            <?php 
            $class = "";
            if(!empty($titre) && strlen($titre)>70):
            $chaine_couper = substr($titre,0,70);
            $titre = substr($chaine_couper, 0, strrpos( $chaine_couper,' ') )."...";
            $originaltitre = substr($chaine_couper, 0, strrpos( $chaine_couper,' ') );
            $class = "tooltip";
            endif;?>
            <a  href="<?php echo get_post_permalink($chaqueActu->id); ?>">
                <h3 data-toggle="<?php echo $class;?>" data-placement="bottom" class="t-title" data-original-title="<?php echo $originaltitre;?>"><?php  echo $titre;?></h3>
            </a>
        
            <div class="desc-actus">
                <p><?php echo $description ;?></p>
            </div>
            <div class="bottom-bar">
                <?php $date = strtotime($chaqueActu->date); ?>
                <p><span class="label">Publié le <span class="separator">:</span></span><span class="value"><?php echo date_i18n('d/m/Y', $date);  ?></span></p>
                <!--<p><span class="label">Nbr de vues <span class="separator">:</span></span><span class="value"><?php //echo pvc_statss( $idx, 0 );?></span></p> -->
            </div>
        </div>