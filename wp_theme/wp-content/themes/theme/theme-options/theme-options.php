<?php
/**
 * Theme options
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */
global $theme_options;
require_once get_template_directory() . '/theme-options/options.php';
$theme_options = get_option( 'theme_theme_options' );

add_action( 'admin_init', 'theme_options_init' );
function theme_options_init(){
 register_setting( 'theme_options', 'theme_theme_options','theme_options_validate');
} 

function theme_options_validate($input)
{
   $allfields_settings = theme_get_all_settings();

   foreach ( $input as $i ){
     if ( isset($allfields_settings[$i]) ){
        switch ( $allfields_settings[$i]['type'] ){
          case 'text':
            $input[$i] = sanitize_text_field( $input[$i] );
            break;
          case 'select':
            break;
          case 'date':
            break;
          case 'url':
            $input[$i] = esc_url_raw( $input[$i] );
            break;
          case 'textarea':
            $input[$i] = sanitize_text_field( $input[$i] );
            break;
          case 'image':
            $input[$i] = theme_image_validation(esc_url_raw( $input[$i]));
            break;
          default:
        }
     }
   }

	  return $input;
}
function theme_image_validation($theme_imge_url){
	$theme_filetype = wp_check_filetype($theme_imge_url);
	$theme_supported_image = array('gif','jpg','jpeg','png','ico');
	if (in_array($theme_filetype['ext'], $theme_supported_image)) {
		return $theme_imge_url;
	} else {
	return '';
	}
}
function theme_get_all_settings(){
  global $theme_options_settings;
  $allfields = array();
  foreach ( $theme_options_settings as $tab) {
      $allfields = array_merge( $allfields, $tab );
  }
  return $allfields;
}

add_action( 'admin_enqueue_scripts', 'theme_framework_load_scripts' );
function theme_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'theme_framework', get_template_directory_uri(). '/theme-options/css/theme-options.css' ,false, '1.0.0');
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/theme-options.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
}

add_action( 'admin_menu', 'theme_options_add_page' );
function theme_options_add_page() {
	add_theme_page( 'theme Options', 'Theme Options', 'edit_theme_options', 'theme_framework', 'theme_framework_page');
}

function theme_framework_page(){
  include 'admin-page.php';
}

//compatibilité WPML, rendre les options translatables
if ( function_exists('icl_register_string')){
  add_action('wp_ajax_icl_tl_rescan', 'theme_options_wpml_translate');
  function theme_options_wpml_translate(){
    $theme_options = get_option( 'theme_theme_options' );
    foreach ( $theme_options as $key => $option ){
      if ( intval($option)>0 ) continue;
      if ( !is_string($option) ) continue;
      icl_register_string( 'theme_options', $key, apply_filters('widget_text', $option));
    }
  }
}