<?php
/**
 * register post type temoignage
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_temoignages', 1);
function bondy_init_temoignages(){
	//post type
	$labels = get_custom_post_type_labels( 'temoignage', 'temoignages', 1 );
	$data = array(
		'capabilities'         => wp_get_custom_posts_capabilities('post'),
		'supports'             => array( 'title', 'editor'),
		'hierarchical'         => false,
		'exclude_from_search'  => false,
		'public'               => false,
		'show_ui'              => true,
		'show_in_nav_menus'    => true,
		'menu_icon'            => 'dashicons-welcome-widgets-menus',
		'labels'               => $labels,
		'query_var'            => true,
	);
	register_post_type( POST_TYPE_TEMOIGNAGE, $data);

}
