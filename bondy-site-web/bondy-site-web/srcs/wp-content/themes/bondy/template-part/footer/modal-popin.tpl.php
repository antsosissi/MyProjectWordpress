<!-- Modal simple-->
<div id="newsletter-modal" class="modal fade popup succes" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">newsletter bôndy</h3>
            </div>
            <div class="modal-body">
                <h4 class="sous-titre-modal"></h4>
                <p>Bonjour, </p>
                <p class="message-modal">Nous sommes très heureux de confirmer votre abonnement à la newsletter BÔNDY et de vous accueillir dans notre communauté.</p>
                <p>L'équipe BÔNDY</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">OK</button>
            </div>
        </div>

    </div>
</div>
<!-- /Modal simple-->

<!-- Modal with icon-->
<div id="newsletter-error-modal" class="modal modal-icon fade popup error newsletter-error-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-icon">
                    <img class="modal-icon" src="<?php echo get_template_directory_uri() ?>/assets/images/svg/color-icons/tree-colorized-color.svg" alt="">
                </div>
            </div>
            <div class="modal-body">
                <h4 class="sous-titre-modal"></h4>
                <p class="message-modal">Veuillez s'il vous plaît réessayer ultérieurement !</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">OK</button>
            </div>
        </div>

    </div>
</div>
<!-- /Modal with icon-->

<!-- Favoris Modal remove confirm-->
<div id="rm-fav-modal" class="modal modal-icon remove-confirm" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-icon">
                    <i class="icobnd-warning"></i>
                </div>
            </div>
            <div class="modal-body">
                <h4 class="h5-rm-fav">Confirmation ! <span class="span-rm-fav">Etes-vous sûr de vouloir retirer le projet de la liste des favoris</span></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md btn-outline modal-btn-rm-fav" data-dismiss="modal">OUI</button>
                <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">NON</button>
            </div>
        </div>

    </div>
</div>
<!-- /Favoris Modal remove confirm-->

<!-- Favoris Modal add/remove favoris information-->
<div id="add-rm-fav-modal" class="modal modal-icon remove-favoris" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-icon">
                    <i class="icobnd-check"></i>
                </div>
            </div>
            <div class="modal-body">
                <h4 class="info-modal-fav"> </h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">OK</button>
            </div>
        </div>

    </div>
</div>
<!-- /Favoris Modal add/remove favoris information-->

<div id="confiramtion-formulaire" class="modal modal-icon remove-favoris" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header-icon popup-mail-icon">
                    <i class="icobnd-check"></i>
                </div>
            </div>

            <div class="modal-body">
                <h4 class="titre-confiramtion"> </h4>
                <p class="message"></p>
                <p class="message1"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">OK</button>
            </div>
        </div>

    </div>
</div>

<!-- Favoris Modal Message -->
<div class="d-none">
    <?php
    global $bondy_options;
    $titleConfirmationRemoveFavorite = 'Confirmation !';
    $textConfirmationRemoveFavorite  = 'Etes-vous sûr de vouloir retirer le projet de la liste des favoris ?';
    $textSuccessRemoveFavorite       = 'Projet retiré de la liste des favoris!';
    $textSuccessAddFavorite          = 'Projet ajouté avec succès dans la liste de favoris !';

    if ( isset($bondy_options["titleConfirmationRemoveFavorite"]) && $bondy_options["titleConfirmationRemoveFavorite"] != '') {
        $titleConfirmationRemoveFavorite = $bondy_options["titleConfirmationRemoveFavorite"];
    }

    if ( isset($bondy_options["textConfirmationRemoveFavorite"]) && $bondy_options["textConfirmationRemoveFavorite"] != '') {
        $textConfirmationRemoveFavorite = $bondy_options["textConfirmationRemoveFavorite"];
    }

    if ( isset($bondy_options["textSuccessRemoveFavorite"]) && $bondy_options["textSuccessRemoveFavorite"] != '') {
        $textSuccessRemoveFavorite = $bondy_options["textSuccessRemoveFavorite"];
    }

    if ( isset($bondy_options["textSuccessAddFavorite"]) && $bondy_options["textSuccessAddFavorite"] != '') {
        $textSuccessAddFavorite = $bondy_options["textSuccessAddFavorite"];
    } ?>

    <input name="titleConfirmationRemoveFavorite" type="hidden" value="<?php echo $titleConfirmationRemoveFavorite; ?>">
    <input name="textConfirmationRemoveFavorite" type="hidden" value="<?php echo $textConfirmationRemoveFavorite; ?>">
    <input name="textSuccessRemoveFavorite" type="hidden" value="<?php echo $textSuccessRemoveFavorite; ?>">
    <input name="textSuccessAddFavorite" type="hidden" value="<?php echo $textSuccessAddFavorite; ?>">
</div>

<div class="modal-ficheArbre modal fade" id="modal-arbres" role="dialog" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="modal-arbres" aria-hidden="true" style="display: none;">
    <div id="layer-loader-modal" style="display: none;">
        <div class="loader">
            <figure>
                <img  src="<?php echo get_template_directory_uri() ."/assets/images/logo-bondy-vh-210.png"; ?>" alt="<?php echo bloginfo(); ?>" >
            </figure>
            <div class="loader-content">
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
                <div class="box-loader"></div>
            </div>
        </div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title titre-arbre d-none d-md-inline-flex">Title</h3>
                <p class="content-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="icobnd-close"></i></button>
                </p>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<!-- /Favoris Modal Message -->
