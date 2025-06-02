<?php
/**
 * Created by PhpStorm.
 * User: narisoa.andria
 * Date: 05/06/2020
 * Time: 16:44
 */
$data_espce = get_query_var( 'data_espce');
?>

<!-- Modal content fiche arbre -->
<div class="ficheArbre-container">
    <?php if( $data_espce  ) { ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="photo-gallery-content">
                    <h4 class="modal-title titre-arbre d-block d-md-none">Title</h4>
                    <div class="owl-carousel full-photo" id="full-photo-modal">
                        <?php
                        $image_miniature = array();
                        $image = array();
                        foreach ($data_espce->galerie as $val):
                            $id_image = (!empty($val['image']) && isset($val['image'])) ? $val['image'] : "";
                            list($img_espece_arb_mobile)  = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_MOBILE);
                            list($img_espece_arb_tablet)  = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_TABLET);
                            list($img_espece_arb_desktop) = wp_get_attachment_image_src($id_image, IMAGE_ESPECE_ARBRE_DESKTOP);
                            ?>

                            <div class="item">
                                <figure class="ieobjectfit">
                                    <img src="<?php echo $img_espece_arb_desktop; ?>"
                                         srcset="
                                        <?php echo $img_espece_arb_mobile; ?> 320w,
                                        <?php echo $img_espece_arb_tablet; ?> 1024w,
                                        <?php echo $img_espece_arb_desktop; ?> 1920w"
                                         alt="<?php echo $data_espce->titre ?>"
                                    >
                                </figure>
                                <?php
                                $text_gallery = (!empty($data_espce->galerie_text_decriptif) && isset($data_espce->galerie_text_decriptif)) ? $data_espce->galerie_text_decriptif : "";
                                ?>
                                <?php $vala = substr($text_gallery, 20); ?>
                                
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="legend">
                            <p class="legende-img"><?php echo $text_gallery;?></p>
                            <div class="owl-nav" id="nav-slider-full-photo-modal"></div>
                        </div>
                    <div class="owl-carousel mini-photo" id="mini-photo-modal">
                        <?php foreach ($data_espce->galerie as $val):
                            $id_image = (!empty($val['image']) && isset($val['image'])) ? $val['image'] : "";
                            list($image_min)  = wp_get_attachment_image_src($id_image, HOME_EQUIPE_MOBILE);?>
                            <div class="item">
                                <figure class="ieobjectfit">
                                    <img src="<?php echo $image_min; ?>" alt="">
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="infoDetail-arbre-content custom-scroll">
                    <div class="infoDetail-innercontent">
                        <h5>Description :</h5>
                        <?php echo $data_espce->description_espece_darbre; ?>

                        <h5>Type d'utilisation :</h5>
                        <?php foreach ($data_espce->type_dutilisation as $item):
                            $pictogramme = CTypeUtilisation::getById($item['type_dutilisation']);
                            $description = (!empty($item['description_de_lutilisation']) && isset($item['description_de_lutilisation'])) ? $item['description_de_lutilisation'] : "";
                            $image_utilisation = (!empty(wp_get_attachment_image_url($item['image_type_dutilisation']))) ? wp_get_attachment_image_url($item['image_type_dutilisation']) : "";
                            if (!empty($pictogramme) && isset($pictogramme)):
                                $icon = $pictogramme->picto_utilisation;
                                $name = $pictogramme->picto_name;
                            endif;
                            ?>
                            <section class="bloc-content">
                                <p class="icon-desktop icons d-none d-lg-flex"><i class="icobnd-<?php echo $icon; ?>  icon-desk"></i></p>
                                <div class="description-txt">
                                    <h6 class="titre-with-icon icons"><i class="icobnd-<?php echo $icon; ?>  icon-desk"></i><span><?php echo $name; ?></span></h6>
                                    <div class="clearfix">
                                        <figure class="ieobjectfit">
                                            <img class="async-done" src="<?php echo $image_utilisation; ?>" alt="">
                                        </figure>
                                        <div class="txt">
                                            <?php echo $description; ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php endforeach;?>

                        <h5>Spécificités :</h5>
                        <?php foreach ($data_espce->specificite_espece_arbre as $item):
                            $pictogramme = CSpecificite::getById($item['specificite_espece']);
                            $description = (!empty($item['description_de_la_specificite']) && isset($item['description_de_la_specificite'])) ? $item['description_de_la_specificite'] : "";
                            $image_utilisation = (!empty(wp_get_attachment_image_url($item['image_specificite']))) ? wp_get_attachment_image_url($item['image_specificite']) : "";
                            if (!empty($pictogramme) && isset($pictogramme)):
                                $icon = $pictogramme->picto_utilisation;
                                $name = $pictogramme->picto_name;
                            endif;
                            ?>
                            <section class="bloc-content">
                                <p class="icon-desktop icons d-none d-lg-flex"><i class="icobnd-<?php echo $icon; ?>  icon-desk"></i></p>
                                <div class="description-txt">
                                    <h6 class="titre-with-icon icons"><i class="icobnd-<?php echo $icon; ?>  icon-desk"></i><span><?php echo $name; ?></span></h6>
                                    <div class="clearfix">
                                        <figure class="ieobjectfit">
                                            <img class="async-done" src="<?php echo $image_utilisation; ?>" alt="">
                                        </figure>
                                        <div class="txt"><?php echo $description; ?></div>
                                    </div>
                                </div>
                            </section>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<p class='no-infos text-center'>cette information n'est pas encore disponible</p>";
    }
    ?>
</div>
<!-- /Modal content fiche arbre -->
