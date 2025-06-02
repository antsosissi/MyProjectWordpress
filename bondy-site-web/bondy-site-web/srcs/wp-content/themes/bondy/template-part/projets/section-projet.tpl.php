<?php
/**
 * Created by PhpStorm.
 * Date: 19/05/2020
 * Time: 10:55
 */
$oProjet = get_query_var( 'objectPage' );
$oProjet = $objectPage[0];
?>
<div class="item">
    <div class="inner-item">
        <?php
        if(in_array('favorites/favorites.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            $class_outline = 'icobnd-star-outline';
            $tFavoriesList = get_user_favorites();
            if (in_array($oProjet->id, $tFavoriesList)) {
                $class_outline = 'icobnd-star';
            }
            $favorite_add = get_favorites_button($oProjet->id);
            $favorite_add = str_replace('style', 'style="display: none"', $favorite_add);
            $favorite_add = str_replace('simplefavorite-button', 'simplefavorite-button simplefavorite-remove-add-'.$oProjet->id, $favorite_add);
            echo $favorite_add;
            ?>
            <a class="favoris-link add-fav" data-id="<?php echo $oProjet->id ?>">
                <i class="<?php echo $class_outline; ?>"></i>
                <i class="hover-icon icobnd-star"></i>
            </a>
            <!-- si selectionné :  ><i class="icobnd-star"></i>-->
            <?php
        } ?>
        <div class="project-cnt">
            <a href="<?php echo get_post_permalink($oProjet->id); ?>" class="big-link" >
                <div class="visuel-project">
                    <p class="hover-status"><i class="icobnd-link-external"></i><br><span>En savoir plus</span></p>
                    <figure class="ieobjectfit">
                        <img src="<?php echo $oProjet->image; ?>" alt="photo-projet-1">
                    </figure>
                    <div class="photo-desc">
                        <span class="initTxt"><?php echo strtoupper(substr($oProjet->projet_code, 0,2)); ?></span>
                        <p class="txt">
                            <span class="titre-pht" data-toggle="tooltip" data-placement="bottom" title="<?php echo esc_html($oProjet->titre);?>"><?php echo esc_html($oProjet->titre);?></span>
                            <span class="local-pht"><?php echo $oProjet->projet_localisation; ?></span>
                            <span class="status"><span class="icon-status"><i class="<?php echo $oProjet->icon_avancement; ?>"></i></span><?php echo $oProjet->avancement_projet[0]->name; ?></span>
                        </p>
                    </div>
                </div>
                <h3 class="project-titre"><?php echo $oProjet->projet_sousTitre; ?></h3>
            </a>
            <div class="txt-desc">
                <div class="wrap-text">
                    <p><?php echo $oProjet->extrait; ?></p>
                </div>
            </div>
            <div class="bottom-bar">
                <p>
                    <?php if ( isset( $oProjet->nbr_arbre ) && !empty( $oProjet->nbr_arbre ) ):?>
                    <span class="label">Nb d'arbres :</span><span class="text-red value"><?php echo $oProjet->nbr_arbre; ?></span>
                    <?php endif;?>
                </p>
                <p>
                    <?php if ( isset( $oProjet->projet_dateDebut ) && !empty( $oProjet->projet_dateDebut ) ):?>
                    <span class="label">Date de début :</span> <span class="value"><?php echo $oProjet->projet_dateDebut; ?></span>
                    <?php endif;?>
                </p>
            </div>
        </div>
    </div>
</div>
