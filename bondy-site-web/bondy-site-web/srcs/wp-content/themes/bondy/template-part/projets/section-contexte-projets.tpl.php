<?php
/**
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 09:51
 */
$objectPa = get_query_var( 'objectPage' );
if($objectPa != null){
    $contexte = $objectPa->context_projet;
    $premier_image_id = $contexte['premier_image_contexte_des_projets'];
    $second_image_id = $contexte['second_image_contexte_des_projets'];
    $listeCitation = $contexte['liste_des_citations'];
    if($listeCitation != null){ ?>
        <div class="contexte-projet bg-white">
            <div class="container">
                <?php echo $contexte['Titre'] ?>
                <div class="contexte-content">
                    <div class="contexte-txt">
                        <div class="citation">
                            <?php
                            foreach ($listeCitation as $lists){ ?>
                                <div class="citation-item">
                                    <h4><?php echo $lists['citation'] ?></h4>
                                    <p><?php echo $lists['label'] ?> <span><?php echo $lists['source'] ?></span></p>
                                </div>
                            <?php }
                            ?>
                        </div>

                        <div class="contenu-bloc rich-text">
                            <?php echo apply_filters('the_content',$contexte['contenu_du_bloc']); ?>
                        </div>
                    </div>
                    <div class="contexte-image">
                        <!-- photo 1 -->
                        <figure class="ieobjectfit compat-object-fit">
                            <?php
                            list($img_contexte_tablet)  = wp_get_attachment_image_src($premier_image_id, HOME_CONTEXT_TABLET);
                            //list($img_contexte_tablet)  = wp_get_attachment_image_src($premier_image_id, HOME_EQUIPE_MOBILE);
                            list($img_contexte_desktop) = wp_get_attachment_image_src($premier_image_id, HOME_CONTEXT_DESKTOP);
                            ?>
                            <img src="<?php echo $img_contexte_desktop; ?>"
                                 srcset="
                                                    <?php echo $img_contexte_tablet; ?> 1024w,
                                                    <?php echo $img_contexte_desktop; ?> 1920w"
                                 alt="<?php  ?>">
                        </figure>
                        <!-- photo 2 -->
                        <figure class="ieobjectfit compat-object-fit">
                            <?php
                            list($img_contexte2_tablet)  = wp_get_attachment_image_src($second_image_id, HOME_CONTEXT_TABLET);
                            //list($img_contexte2_tablet)  = wp_get_attachment_image_src($second_image_id, HOME_EQUIPE_MOBILE);
                            list($img_contexte2_desktop) = wp_get_attachment_image_src($second_image_id, HOME_CONTEXT_DESKTOP);
                            ?>
                            <img src="<?php echo $img_contexte2_desktop; ?>"
                                 srcset="
                                                <?php echo $img_contexte2_tablet; ?> 1024w,
                                                <?php echo $img_contexte2_desktop; ?> 1920w"
                                 alt="<?php ?>">
                        </figure>
                        <div class="titre-contexte-image"><?php echo $contexte['texte_sur_limage']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

<?php
}?>