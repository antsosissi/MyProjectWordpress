<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

get_header("empty"); ?>
	<div id="primary">
		<div id="content" role="main">
			<article id="post-0" class="post error404 not-found">
				<div class="section-error">
					<div class="container">
						<div class="row section-error-content">
						<div>
							<div class="branding-container col-12">
								<img src="<?php echo get_template_directory_uri(); ?>/src/images/logo-bondy-vh-150.png" class="branding" alt="logo Bôndy" >
							</div>
						</div>
						<div>
						<h1 class="error-title col-12">Erreur</h1>
							<div class="col-12 text-center">
								<img src="<?php echo get_template_directory_uri(); ?>/src/images/svg/color-icons/404-color.svg" class="picture-error" alt="page 404">
							</div>
							<p class="error-desc col-12">Oups ! Cette page ne peut être trouvée. Rien de grave,</p>
							<div class="quit-error col-12 text-center">
								<a href="<?php echo home_url( '/' ) ?>" class="error-link left-error btn btn-primary btn-red">Revenir à la page d'accueil</a>
                                <a href="javascript:history.back()" class="error-link left-error btn btn-primary">Revenir à la page précédente</a>
							</div>
						</div>
						<div>
							<p class="copyright col-12">Copyright 2019 © Bôndy. Tous droits réservés. Design & developed with <i class="icobnd-heart-outline"></i> by <b class="underlined">PULSE</b></p>    
						</div>
						</div>
					</div>
				</div><!-- .section-error -->
			</article><!-- #post-0 -->
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer("empty"); ?>