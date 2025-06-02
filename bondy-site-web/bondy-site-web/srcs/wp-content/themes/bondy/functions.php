<?php
/**
 * bondy functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, bondy_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'bondy_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

require_once( get_template_directory() . '/inc/constante.inc.php' );
require_once( get_template_directory() . '/inc/default.config.php' );
require_once( get_template_directory() . '/inc/utils/functions.php' );
require_once( get_template_directory() . '/login.php' );
require_once( get_template_directory() . '/inc/extends/pvc_bondy/change_pvc.php' );

//classes de service
require_once_files_in( get_template_directory() . '/inc/classes/posttype' );
require_once_files_in( get_template_directory() . '/inc/classes/taxonomy' );
require_once_files_in( get_template_directory() . '/inc/classes/user' );
require_once_files_in( get_template_directory() . '/inc/classes/menu' );
require_once_files_in( get_template_directory() . '/inc/classes/custom' );
require_once_files_in( get_template_directory() . '/inc/classes/page_view_count' );


if (is_admin()){
  require_once( get_template_directory() . '/admin-functions.php' );

  /*** Theme Option ***/
  if ( is_dir( get_template_directory() . '/theme-options' ) ){
    require get_template_directory() . '/theme-options/theme-options.php';
  }
}

//lib
require_once( get_template_directory() . '/lib/cssmin.php' );
require_once( get_template_directory()  . '/lib/jsmin.php' );

global $bondy_options;
$bondy_options = get_option( 'bondy_theme_options' );

/**
 * Tell WordPress to run bondy_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'bondy_setup' );

if ( ! function_exists( 'bondy_setup' ) ):
function bondy_setup() {

    require_once_files_in( get_template_directory() . '/inc/extends/custom-sidebar' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-fields/acf' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-metaboxes' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-rules' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-role' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-mce-tools' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-shortcodes' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-sidebar' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-types' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-taxonomies' );
    require_once_files_in( get_template_directory() . '/inc/extends/custom-widgets' );

	/* Make bondy available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on bondy, use a find and replace
	 * to change 'bondy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bondy', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	//add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'bondy' ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	add_image_size( IMAGE_SIZE_ACTUS_VIGNETTE, 100, 100, true );
	add_image_size( IMAGE_SIZE_ACTUS_MEDIUM, 500, 300 );

  add_image_size(HOME_WELCOME_MOBILE, 320, 226);
  add_image_size(HOME_WELCOME_TABLET, 1024, 768);
  add_image_size(HOME_WELCOME_DESKTOP, 1920, 1080);

  add_image_size(HOME_PARTENAIRE_DESKTOP, 155, 82);

  add_image_size(HOME_PILIER_MOBILE, 289,120);
  add_image_size(HOME_PILIER_TABLET, 130, 130);
  add_image_size(HOME_PILIER_DESKTOP,  242,242);

  add_image_size(HOME_CONTEXT_DESKTOP,  400,400);
  add_image_size(HOME_CONTEXT_TABLET,  300,300);


    add_image_size(HOME_EQUIPE_DESKTOP,  175,175);
    add_image_size(HOME_EQUIPE_MOBILE,  85,85);

    add_image_size(HOME_PROJET_IMG_STYLE, 380, 250);
    /*image gallery*/
    add_image_size(IMAGE_GALLERY, 70, 70);
    /*image format detaille espèce d'arbre*/
    add_image_size(IMAGE_ESPECE_ARBRE_MOBILE, 250, 175);
    add_image_size(IMAGE_ESPECE_ARBRE_TABLET, 382, 257);
    add_image_size(IMAGE_ESPECE_ARBRE_DESKTOP, 660, 450);
    /*add image actus*/
    add_image_size(IMAGE_ACTUS_MOBILE, 320, 207);
    add_image_size(IMAGE_ACTUS_TABLET, 944, 264);
    add_image_size(IMAGE_ACTUS_DESKTOP, 1632 , 457 );


}
endif; // bondy_setup


// disable guntenberg for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


register_nav_menus( array(
    'MenuFooterAccesRapide' => 'Menu Footer Acces Rapide',
    'MenuFooterNosServices' => 'Menu Footer Nos Services',
    'UrlApropos' => 'Url apropos',
    'MenuHeader' => 'Menu header',
    'LienContact' => 'Lien Contact',
    'LienActualite' => 'Lien Actualité',
));

/* add_action( 'wp_enqueue_scripts', 'bondy_enqueue_scripts' );
function bondy_enqueue_scripts(){
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/bondys.css', null, false, 'none' );
} */

/**
 * Enqueue scripts and styles.
 */
add_action('wp_enqueue_scripts', 'bondy_scripts');

if ( ! function_exists( 'bondy_scripts' ) ):
  function bondy_scripts() {
    // js footer
      wp_enqueue_script('bondy-jquery', get_template_directory_uri() . '/js/library/jquery-3.4.1.js', array(), false, true);
      wp_enqueue_script('axian-jquery', get_template_directory_uri() . '/assets/js/app.min.js', array(), false, true);
      wp_enqueue_script('ajax-mail', get_template_directory_uri() . '/js/library/ajax-mail.js', array(), false, true);
      //wp_enqueue_script('jquery_livequery', get_template_directory_uri() . '/js/library/livequery.js', array(), false, true);
      //wp_enqueue_script('jquery_livequery', plugins_url('js/jquery.livequery.js', __FILE__)  , array('jquery'));
      /*wp_localize_script('bondy-jquery-custom', 'bondy_settings', array(
          'ajax_url' => site_url('wp-admin/admin-ajax.php'),
      ));*/
      wp_localize_script( 'ajax-mail', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
  }
endif;

/*
 * ajax callback newsletter
 */
add_action('wp_ajax_newsletter_suscribe', 'bondy_ajax_newsletter_suscribe');
add_action('wp_ajax_nopriv_newsletter_suscribe', 'bondy_ajax_newsletter_suscribe');
function bondy_ajax_newsletter_suscribe(){
    global $bondy_options;
    if ( isset($_REQUEST['mail']) && !empty($_REQUEST['mail']) && bondy_check_email($_REQUEST['mail']) ){
        $email = $_REQUEST['mail'];
        $loc = $_REQUEST['loc'];
        echo $mailPoet = MailPoet::subscribeMail($email, $loc);
    }
}

//check dns email
function bondy_check_email( $email ){
    $response = null;
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = true;
    } else {
        $response = false;
    }
    return $response;
}

/**
 * add custom ACF WYSIWYG named 'WYSIWYG titre bondy'
 * for H2 title
 */
add_filter( 'acf/fields/wysiwyg/toolbars' , 'bondy_acf_toolbars'  );
function bondy_acf_toolbars( $toolbars )
{
  $toolbars['WYSIWYG titre bondy' ][1]= array(
    'styleselect'
  );

  return $toolbars;
}

// Remove old and Add ajax script to load page view count stats into footer
remove_action('wp_enqueue_scripts', array( '\A3Rev\PageViewsCount\A3_PVC', 'register_plugin_scripts' ) );
add_action( 'wp_enqueue_scripts', array( '\A3Rev\PageViewsCount\MY_A3_PVC', 'register_plugin_scripts' ) );

// Supprimer le PVC par défaut
if (class_exists("\A3Rev\PageViewsCount\A3_PVC")) {
    remove_filter('the_excerpt', array('\A3Rev\PageViewsCount\A3_PVC', 'excerpt_pvc_stats_show'), 8);
    remove_filter('the_content', array('\A3Rev\PageViewsCount\A3_PVC','pvc_stats_show'), 8);
}

/**
 * ajax callback to add post to favorite list
 */
add_action('wp_ajax_add_post_to_favorite_list', 'bondy_ajax_add_post_to_favorite_list');
add_action('wp_ajax_nopriv_add_post_to_favorite_list', 'bondy_ajax_add_post_to_favorite_list');
function bondy_ajax_add_post_to_favorite_list() {
  if ( isset($_REQUEST['post_id_fav']) ) {
    $post_id_fav = $_REQUEST['post_id_fav'];
    $oProjetFav  = CProjet::getById($post_id_fav);

    echo '
    <li class="li-projet-fav list-favory-' . $oProjetFav->id . '">
        <a class="li-projet-link" href="' . get_post_permalink($oProjetFav->id) . '">
            <div class="li-projet-fav-item">
                <div class="projet-fav-img"><img alt="" src="' . $oProjetFav->image . '"></div>
                <div class="projet-fav-description">
                    <h5 class="projet-fav-title">' . $oProjetFav->titre . '</h5>
                    <p class="projet-fav-localisation">' . $oProjetFav->projet_localisation . '</p>
                    <p class="projet-fav-status fav-icon-status"><i class="' . $oProjetFav->icon_avancement . '"></i>' . $oProjetFav->avancement_projet[0]->name . '</p>
                </div>
            </div>
        </a>
        <button aria-label="Close" class="close project-fav-close rm-favoris" data-id="' . $oProjetFav->id . '" type="button"><span aria-hidden="true"><i class="icobnd-close"></i></span></button>
        <div class="simplefavorite-button active" id="simplefavorite-button' . $oProjetFav->id . '" data-postid="' . $oProjetFav->id . '" data-siteid="1" data-groupid="1" data-favoritecount="1" style="display: none">x</div>
    </li>';
  }
  wp_die();
}

/*
 * ajax contact
 */
add_action('wp_ajax_my_ninja_forms_submission', 'bondy_ajax_my_ninja_forms_submission');
add_action('wp_ajax_nopriv_my_ninja_forms_submission', 'bondy_ajax_my_ninja_forms_submission');
function bondy_ajax_my_ninja_forms_submission(){
    if(isset($_REQUEST['formID']) && !empty($_REQUEST['form_data'])){
        $formID = $_REQUEST['formID'];
        $form_data = $_REQUEST['form_data'];
        $tittle_forme = $_REQUEST['tittle_forme'];
        $nj_form = NinjaForm::saveForm($formID, $form_data,$tittle_forme);
    } else {
        echo "Erreur";
    }
}

/* leav head bar administrator */
$userr = wp_get_current_user();
if ( in_array( USER_PROFILE_MEMBRE, (array) $userr->roles ) ||  empty($userr->roles)) {
    show_admin_bar( false );
}

/**
 * remove page editor
 */
add_action( 'admin_init', 'bondy_hide_editor' );
function bondy_hide_editor(){
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ( in_array( $template_file, array( 'page-templates/especes-d-arbres.php','page-templates/page-projets-bondy.php', 'page-templates/qui-sommes-nous.php', 'page-templates/particulier.php', 'page-templates/entreprises.php', 'page-templates/accueil.php', 'page-templates/contact.php' ) ) ){
        remove_post_type_support('page', 'editor');
    }
}
/**
* fil d'ariane
 **/
function bondy_breadcrumg(){
    global $post;
    $data = array();
    $postType = get_post_type($post->ID);

    switch( $postType ){
        case POST_TYPE_ACTUALITE:
            $pageActus = wp_get_post_by_template( 'actualites.php' );
            $data[]= array(
                  'title' =>   $pageActus->post_title,
                  'link' =>    get_permalink($pageActus->ID)
            );
            break;
        case POST_TYPE_PROJET:
            $pageProjet = wp_get_post_by_template( 'page-projets-bondy.php' );
            $data[]= array(
                'title' =>   $pageProjet->post_title,
                'link' =>    get_permalink($pageProjet->ID)
            );
            break;
        case POST_TYPE_PAGE:
            $parenPage = wp_get_post_parent_id($post->ID);
            if ( $parenPage ){
                $postParent = get_post( $parenPage );
                $data[]= array(
                    'title' =>   $postParent->post_title,
                    'link' =>    get_permalink($postParent->ID)
                );
            }
            break;
            default:

                break;
    }
    $data[]= array(
        'title' =>   $post->post_title,
        'link' =>    ''
    );
    return $data;

}

//add_filter('body_class', 'bondy_body_class');

function bondy_body_class($classes){
    $classes[] = 'page-loading';

    return $classes;
}
