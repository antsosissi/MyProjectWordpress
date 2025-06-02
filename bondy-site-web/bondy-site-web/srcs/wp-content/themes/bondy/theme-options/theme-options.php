<?php
/**
 * Theme options
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
global $bondy_options;
require_once get_template_directory() . '/theme-options/options.php';
$bondy_options = get_option( 'bondy_theme_options' );

add_action( 'admin_init', 'bondy_options_init' );
function bondy_options_init(){
 register_setting( 'bondy_options', 'bondy_theme_options','bondy_options_validate');
} 

function bondy_options_validate($input)
{
   $allfields_settings = bondy_get_all_settings();

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
            $input[$i] = bondy_image_validation(esc_url_raw( $input[$i]));
            break;
          default:
        }
     }
   }

	  return $input;
}
function bondy_image_validation($bondy_imge_url){
	$bondy_filetype = wp_check_filetype($bondy_imge_url);
	$bondy_supported_image = array('gif','jpg','jpeg','png','ico');
	if (in_array($bondy_filetype['ext'], $bondy_supported_image)) {
		return $bondy_imge_url;
	} else {
	return '';
	}
}
function bondy_get_all_settings(){
  global $bondy_options_settings;
  $allfields = array();
  foreach ( $bondy_options_settings as $tab) {
      $allfields = array_merge( $allfields, $tab );
  }
  return $allfields;
}

add_action( 'admin_enqueue_scripts', 'bondy_framework_load_scripts' );
function bondy_framework_load_scripts(){
	wp_enqueue_media();
	wp_enqueue_style( 'bondy_framework', get_template_directory_uri(). '/theme-options/css/theme-options.css' ,false, '1.0.0');
	// Enqueue custom option panel JS
	wp_enqueue_script( 'options-custom', get_template_directory_uri(). '/theme-options/js/theme-options.js', array( 'jquery' ) );
	wp_enqueue_script( 'media-uploader', get_template_directory_uri(). '/theme-options/js/media-uploader.js', array( 'jquery') );		
}

add_action( 'admin_menu', 'bondy_options_add_page' );
function bondy_options_add_page() {
	add_theme_page( 'bondy Options', 'Theme Options', 'edit_theme_options', 'bondy_framework', 'bondy_framework_page');
}

function bondy_framework_page(){
  include 'admin-page.php';
}

//compatibilité WPML, rendre les options translatables
if ( function_exists('icl_register_string')){
  add_action('wp_ajax_icl_tl_rescan', 'bondy_options_wpml_translate');
  function bondy_options_wpml_translate(){
    $theme_options = get_option( 'bondy_theme_options' );
    foreach ( $theme_options as $key => $option ){
      if ( intval($option)>0 ) continue;
      if ( !is_string($option) ) continue;
      icl_register_string( 'bondy_options', $key, apply_filters('widget_text', $option));
    }
  }
}

function cookinfamily_settings_register() {
  //permet d'ajout le menu de l'option sur la page admin et aussi la page admin
  register_setting('cookinfamily_settings_fields', 'cookinfamily_settings_fields', 'cookinfamily_settings_fields_validate');
  add_settings_section('cookinfamily_settings_section', __('Paramètres', 'cookinfamily'), 'cookinfamily_settings_section_introduction', 'cookinfamily_settings_section');
  
  //permet d ajouter des champs personnalier
  add_settings_field('cookinfamily_settings_field_introduction', __('Introduction', 'cookinfamily'), 'cookinfamily_settings_field_introduction_output', 'cookinfamily_settings_section', 'cookinfamily_settings_section');
  add_settings_field('cookinfamily_settings_field_phone_number', __('Phone number', 'cookinfamily'), 'cookinfamily_settings_field_phone_number_output', 'cookinfamily_settings_section', 'cookinfamily_settings_section');
}
  
  function cookinfamily_settings_fields_validate($inputs) { 
        if(!empty($_POST)) {  
            if(!empty($_POST['cookinfamily_settings_field_introduction'])) {    
                  update_option('cookinfamily_settings_field_introduction', $_POST['cookinfamily_settings_field_introduction']);   
            }     
            if(!empty($_POST['cookinfamily_settings_field_phone_number'])) {       
                  update_option('cookinfamily_settings_field_phone_number', $_POST['cookinfamily_settings_field_phone_number']);   
            } 
          return $inputs; 
        }
  }

    function cookinfamily_settings_section_introduction() {
    
      _e('Paramètrez les différentes options de votre thème CookInFamily.', 'cookinfamily');
    }

    function cookinfamily_settings_field_introduction_output() {
      $value = get_option('cookinfamily_settings_field_introduction');
      echo '<input name="cookinfamily_settings_field_introduction" type="text" value="'.$value.'" />';
    }

    function cookinfamily_settings_field_phone_number_output(){
      $value = get_option('cookinfamily_settings_field_phone_number_output');
      echo '<input name="cookinfamily_settings_field_phone_number_output" type="text" value="'.$value.'" />';
    }

    function cookinfamily_theme_settings() {

      echo '<h1>'.esc_html( get_admin_page_title() ).'</h1>';
      
      echo '<form action="options.php" method="post" name="cookinfamily_settings">';
      
      echo '<div>';
      
      settings_fields('cookinfamily_settings_fields');
      
      do_settings_sections('cookinfamily_settings_section');
      
      submit_button();
      
      echo '</div>';
      
      echo '</form>';
      
    }
  
add_action('admin_init', 'cookinfamily_settings_register');

