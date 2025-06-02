<?php
/**
 * Created by PhpStorm.
 * Date: 26/05/2020
 * Time: 15:40
 */
$data_espce = get_query_var( 'objectPage' );
?>
<article class="esp-arbre-item">
    <div class="inner-item">
        <figure class="arbre-mntr ieobjectfit">
            <?php
            $titre = "";
            $titre = (!empty($data_espce->titre) && isset($data_espce->titre)) ? $data_espce->titre : "";
            if(!empty($titre) && strlen($titre)>20):
                $chaine_couper = substr($titre,0,30);
                $titre = substr($chaine_couper, 0, strrpos( $chaine_couper,' ') )."...";
            endif;
            ?>
            <a href="javascript:;" class="voir-modal-data"  data-postid="<?php echo $data_espce->id;?>"  title="Voir détails">
                <?php
                list($img_espece_arb_mobile)  = wp_get_attachment_image_src($data_espce->image_espece_darbre_id, HOME_EQUIPE_MOBILE);
                list($img_espece_arb_tablet)  = wp_get_attachment_image_src($data_espce->image_espece_darbre_id, IMAGE_ESPECE_ARBRE_TABLET);
                list($img_espece_arb_desktop) = wp_get_attachment_image_src($data_espce->image_espece_darbre_id, HOME_EQUIPE_DESKTOP);
                $img_espece_arb_mobile = ( !empty( $img_espece_arb_mobile ) ) ? $img_espece_arb_mobile : get_template_directory_uri() . '/images/default.jpg';
                $img_espece_arb_tablet = ( !empty( $img_espece_arb_tablet ) ) ? $img_espece_arb_tablet : get_template_directory_uri() . '/images/default.jpg';
                $img_espece_arb_desktop = ( !empty( $img_espece_arb_desktop ) ) ? $img_espece_arb_desktop : get_template_directory_uri() . '/images/default.jpg';
                ?>
                <img src="<?php echo $img_espece_arb_desktop; ?>"
                    srcset="
                        <?php echo $img_espece_arb_mobile; ?> 320w,
                        <?php echo $img_espece_arb_tablet; ?> 1024w,
                        <?php echo $img_espece_arb_desktop; ?> 1920w"
                    alt="<?php echo $titre; ?>"
                >
            </a>
        </figure>
        <div class="infoArbre-content">
                <?php
                    $titre = $data_espce->titre;
                    if(!empty($titre) && strlen($titre)>20):
                        $chaine_couper = substr($titre,0,30);
                        $titreAlt = substr($chaine_couper, 0, strrpos( $chaine_couper,' ') )."...";
                    endif;
                ?>
            <div class="head-content">
                <a href="javascript:;" class="voir-modal-data"  data-postid="<?php echo $data_espce->id;?>"  title="Voir détails">
                    <h3 data-toggle="tooltip" data-placement="bottom" class="t-title" data-original-title="<?php echo $titre;?>">
                        <?php echo $titre;?>
                    </h3>
                </a>
                <p class="famille-icons">
                    <?php
                    $type_utilisation = $data_espce->type_dutilisation;
                    if($type_utilisation != null){
                        foreach ($type_utilisation as $type_list){
                            $pictogramme = CTypeUtilisation::getById($type_list['type_dutilisation']);
                            $name = $pictogramme->picto_name; ?>
                            <i data-toggle="tooltip" title="<?php echo $name; ?>" data-placement="bottom" class="icobnd-<?php echo $pictogramme->picto_utilisation;?>  icon-desk" alt="<?php echo $pictogramme->picto_name;?>"></i>
                        <?php }
                    }?>
                    <?php
                    $specifik = $data_espce->specificite_espece_arbre;
                    if($specifik != null){
                        foreach ($specifik as $specificite_list){
                            $pictogramme = CSpecificite::getById($specificite_list['specificite_espece']);
                            $name = $pictogramme->picto_name; ?>
                            <i data-toggle="tooltip" title="<?php echo $name; ?>" data-placement="bottom" class="icobnd-<?php echo $pictogramme->picto_utilisation;?>  icon-desk" alt="<?php echo $pictogramme->picto_name;?>"></i>
                        <?php }
                    }?>

                </p>
            </div>
            <div class="wrap-link">
                <a href="javascript:;" class="voir-modal-data"  data-postid="<?php echo $data_espce->id;?>"  title="Voir détails"><span>Voir détails</span><i class="icobnd-chevron-right"></i></a>
            </div>
        </div>
    </div>
</article>
<!-- modal infos espèces arbres -->

