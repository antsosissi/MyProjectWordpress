<?php
/**
 * register post type partenaire
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_partenaires', 1);
function bondy_init_partenaires() {
	//post type
	$labels = get_custom_post_type_labels( 'partenaire', 'partenaires', 1 );
	$data = array(
		'capabilities'         => wp_get_custom_posts_capabilities('post'),
		'supports'             => array( 'title'),
		'hierarchical'         => false,
		'exclude_from_search'  => false,
		'public'               => false,
		'show_ui'              => true,
		'show_in_nav_menus'    => true,
		'menu_icon'            => 'dashicons-welcome-widgets-menus',
		'labels'               => $labels,
		'query_var'            => true,
	);
	register_post_type( POST_TYPE_PARTENAIRE, $data);

}
