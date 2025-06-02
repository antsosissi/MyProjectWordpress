<?php
/*
 * fonctions personnalistion de l'interface admin
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

/**
 * add font bondy to admin page
 */
add_action( 'admin_enqueue_scripts', 'bondy_admin_add_admin_font');
function bondy_admin_add_admin_font() {
  wp_enqueue_style('admin-bondy-font', get_template_directory_uri() . '/css/admin-icon-bondy.css');
}
