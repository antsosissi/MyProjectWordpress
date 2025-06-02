<?php
/**
 * Created by PhpStorm.
 * Date: 08/05/2020
 * Time: 16:50
 */
$temoignagesID = get_query_var( 'relation_temoignage_id' );
if($temoignagesID != null){
    $count = sizeof($temoignagesID);
    $nbItem = ceil($count/4);
    $arrayPar4 = array_chunk($temoignagesID, 4);

    foreach ($arrayPar4 as $chaqueArray){ ?>

        <div class="item">
            <?php
            foreach ($chaqueArray as $idx){ ?>
                <?php $chaqueTemoignage = CTemoignage::getById($idx);
                list($img_temoignage_mobile)  = wp_get_attachment_image_src($chaqueTemoignage->photo_temoignage_id, HOME_PARTENAIRE_MOBILE);
                list($img_temoignage_tablet)  = wp_get_attachment_image_src($chaqueTemoignage->photo_temoignage_id, HOME_PARTENAIRE_TABLET);
                list($img_temoignage_desktop) = wp_get_attachment_image_src($chaqueTemoignage->photo_temoignage_id, HOME_PARTENAIRE_DESKTOP);
                $img_temoignage_mobile = ( !empty( $img_temoignage_mobile ) ) ? $img_temoignage_mobile : ( ($chaqueTemoignage->type_de_temoignage == 'particulier') ? get_template_directory_uri() . '/images/default_user.png' : get_template_directory_uri() . '/images/default.jpg' );
                $img_temoignage_tablet = ( !empty( $img_temoignage_tablet ) ) ? $img_temoignage_tablet : ( ($chaqueTemoignage->type_de_temoignage == 'particulier') ? get_template_directory_uri() . '/images/default_user.png' : get_template_directory_uri() . '/images/default.jpg' );
                $img_temoignage_desktop = ( !empty( $img_temoignage_desktop ) ) ? $img_temoignage_desktop : ( ($chaqueTemoignage->type_de_temoignage == 'particulier') ? get_template_directory_uri() . '/images/default_user.png' : get_template_directory_uri() . '/images/default.jpg' );
                ?>
                <div class="tmg-item">
                    <div class="innerCnt-item">
                        <figure class="photo-id ieobjectfit <?php if($chaqueTemoignage->type_de_temoignage == 'particulier'){ echo 'user-pht'; } else { echo 'company-pht';} ?> ">
                            <img src="<?php echo $img_temoignage_desktop; ?>"
                                 srcset="
                                    <?php echo $img_temoignage_mobile; ?> 320w,
                                    <?php echo $img_temoignage_tablet; ?> 1024w,
                                    <?php echo $img_temoignage_desktop; ?> 1920w">
                        </figure> <!-- company-pht -->
                        <div class="detail-temoignage">
                            <hgroup>
                                <h3 --data-mh="nom-temoigneur-desktop"><?php echo $chaqueTemoignage->nom_temoigneur; ?></h3>
                                <p class="local">
                                    <?php echo $chaqueTemoignage->stitre; ?>
                                </p>
                            </hgroup>
                            <div class="desc-txt" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" title="<?php echo $chaqueTemoignage->contenu_du_temoignage; ?>">
                                <p><?php echo $chaqueTemoignage->contenu_du_temoignage; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
        <?php
    }
}