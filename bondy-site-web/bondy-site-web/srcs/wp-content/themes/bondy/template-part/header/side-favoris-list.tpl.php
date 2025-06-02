<?php
if ( in_array('favorites/favorites.php', apply_filters('active_plugins', get_option('active_plugins') ) ) ) {
    $countFavorites = get_user_favorites_count();
    $tFavoriesList  = get_user_favorites(); ?>

    <!-- Side Favoris List -->
    <div class="sideFavorisList" id="sideFavorisList">
        <div class="sideFavorisList-header">
            <p class="titre-favoris">tous les projets favoris</hp><span class="close-favoris-link"><i class="icobnd-close"></i></span>
        </div>
        <?php
        if ( $countFavorites>0 ) { ?>
            <div class="perfect-scroll">
                <ul class="ul-projet-fav">
                    <?php
                    foreach ($tFavoriesList as $list) {
                        $oProjetFav = CProjet::getById($list); ?>
                        <li class="li-projet-fav list-favory-<?php echo $oProjetFav->id; ?>">
                            <a class="li-projet-link" href="<?php echo get_post_permalink($oProjetFav->id); ?>">
                                <div class="li-projet-fav-item">
                                    <div class="projet-fav-img"><img alt="" src="<?php echo $oProjetFav->image; ?>"></div>
                                    <div class="projet-fav-description">
                                        <h5 class="projet-fav-title"><?php echo $oProjetFav->titre; ?></h5>
                                        <p class="projet-fav-localisation"><?php echo $oProjetFav->projet_localisation; ?></p>
                                        <p class="projet-fav-status fav-icon-status"><i class="<?php echo $oProjetFav->icon_avancement; ?>"></i><?php echo $oProjetFav->avancement_projet[0]->name; ?></p>
                                    </div>
                                </div>
                            </a>
                            <button aria-label="Close" class="close project-fav-close rm-favoris" data-id="<?php echo $oProjetFav->id; ?>" type="button"><span aria-hidden="true"><i class="icobnd-close"></i></span></button>
                            <div class="simplefavorite-button active" id="simplefavorite-button<?php  echo $oProjetFav->id; ?>" data-postid="<?php echo $oProjetFav->id; ?>" data-siteid="1" data-groupid="1" data-favoritecount="1" style="display: none"><i class="icobnd-close"></i></div>
                        </li>
                        <?php
                    } ?>
                </ul>
            </div>
            <?php
        } else { ?>
            <div class="perfect-scroll">
                <ul class="ul-projet-fav">
                    <p class="empty-favoris">Vous n'avez pas encore de favoris !</p>
                </ul>
            </div>
            <?php
        } ?>
    </div>
    <div class="overlay"></div>
    <!-- /Side Favoris List -->

    <?php
}
