<?php
/**
 * register taxo avancement projet
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_etiquette_actualites', 2);
function bondy_init_etiquette_actualites(){
    //taxonomies
    $labels = get_custom_taxonomy_labels( 'Etiquette Actualité', 'Etiquette Actualité', 1);
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( TAXONOMY_ACTUALITES, POST_TYPE_ACTUALITE, $args );
}