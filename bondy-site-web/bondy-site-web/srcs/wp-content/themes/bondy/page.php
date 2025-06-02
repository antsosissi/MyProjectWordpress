<?php
/**
 * Template Name: Standard
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
        <?php include get_template_directory() . '/template-part/banniere-page.php'; ?>
        <!-- breadcrumb -->
        <!-- fil d ariane -->
        <?php
        set_query_var( 'var', $oPage );
        get_template_part('template-part/fil_ariane.tpl');
        ?>
        <?php include get_template_directory() . '/template-part/titre-page.php'; ?>
        <div class="mentions-legales rich-text">
            <div class="container">
                <div class="row">
                    <h2 class="main-title col-12 text-center"><?php the_title(); ?></h2>
                    <div class="mentions-content col-9">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; // end of the loop. ?>

                    </div>
                </div>
            </div>
        </div><!-- .mentions-legales -->
    </div><!-- #primary -->
<?php
get_footer();
