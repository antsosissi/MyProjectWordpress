<?php
/**
 * register post type actualite
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_actus', 1);
function bondy_init_actus(){
    //post type
    $labels = get_custom_post_type_labels( 'actualité', 'actualités', 1 );
    $data   = array(
        'capabilities'        => wp_get_custom_posts_capabilities('post'),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt'),
        //'taxonomies'          => array( 'post_tag' ),
        'hierarchical'        => false,
        'exclude_from_search' => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'labels'              => $labels,
        'query_var'           => true,
    );
    register_post_type( POST_TYPE_ACTUALITE, $data);
}
