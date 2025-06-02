<?php
/**
 * Initialisation des custom sidebars
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */
function theme_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    //register other sidebar
    //http://generatewp.com/sidebar/
}
add_action( 'widgets_init', 'theme_widgets_init' );