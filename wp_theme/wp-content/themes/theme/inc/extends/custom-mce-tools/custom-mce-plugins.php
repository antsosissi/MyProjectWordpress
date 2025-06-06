<?php
/*
 * Ajout de plugin mce custom
 *
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */

add_filter("mce_external_plugins", "theme_add_tinymce_plugin");
function theme_add_tinymce_plugin( $plugin_array ){
  //ajouter votre fichier js
  $plugin_array['hr_custom'] = get_template_directory_uri() . '/inc/extends/custom-mce-tools/hr/hr_tinymce_plugin.js';
  $plugin_array['media_pdf'] = get_template_directory_uri() . '/inc/extends/custom-mce-tools/pdf/pdf_tinymce_plugin.js';
  $plugin_array['media_link'] = get_template_directory_uri() . '/inc/extends/custom-mce-tools/link/link_tinymce_plugin.js';
  $plugin_array['video'] = get_template_directory_uri() . '/inc/extends/custom-mce-tools/video/video_tinymce_plugin.js';

  return $plugin_array;
}

add_filter('mce_buttons', "theme_register_tinymce_button");
function theme_register_tinymce_button($buttons) {
  array_push($buttons, "|", "video");
  array_push($buttons, "|", "hr_custom");
  array_push($buttons, "|", "media_pdf");
  array_push($buttons, "|", "media_link");

  foreach ($buttons as $k=>$v) {
    if(
      $buttons[$k]=="hr" ||
      $buttons[$k]=="wp_more"
    ){
      unset($buttons[$k]);
    }
  }

  return $buttons;
}