<?php
/**
 * register taxo type d'utilisation
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_type_utilisation', 2);
function bondy_init_type_utilisation(){
    //taxonomies
    $labels = get_custom_taxonomy_labels( 'Type d\'utilisation', 'Type d\'utilisation', 1);
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( TAXONOMY_TYPE_UTILISATION, POST_TYPE_ESPECE_ARBRE, $args );
}
