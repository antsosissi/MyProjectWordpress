<?php
/**
 * Template Name: 404
 *
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

get_header();

global $post;
$oPage = CPage::getById($post->ID);
//die(uniqid());
?>
    <div id="primary" class="<?php if( is_front_page() ) { echo "home-section-wrapper"; } ?>">
        <div class="section-error">
            <div class="container">
                <div class="row">
                    <div class="branding-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-bondy-vh-150.png" class="branding" alt="logo Bôndy" >
                    </div>
                    <h1 class="error-title col-lg-12">Erreur</h1>
                    <div class="picture-container">
                        <img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/color-icons/404-color.svg" class="picture-error" alt="page 404">
                    </div>
                    <p class="error-desc">Oups ! Cette page ne peut être trouvée. Rien de grave,</p>
                    <div class="quit-error">
                        <div class="row">
                            <a href="" class="back-home">Revenir à la page d'accueil</a>
                            <a href="" class="back-previous">Revenir à la page précédente</a>
                        </div>
                    </div>
                    <p class="copyright">Copyright 2019 © Bôndy. Tous droits réservés. Design & developed with <span class="heart"></span> by PULSE</p>    
                </div>
            </div>
        </div><!-- .section-error -->
    </div><!-- #primary -->
<?php
// get_footer();
