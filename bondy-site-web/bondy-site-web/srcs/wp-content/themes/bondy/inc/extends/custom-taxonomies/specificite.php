<?php
/**
 * register taxo spécificité
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_specificite', 2);
function bondy_init_specificite(){
    //taxonomies
    $labels = get_custom_taxonomy_labels( 'Spécificité', 'Spécificités', 0);
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( TAXONOMY_SPECIFICITE, POST_TYPE_ESPECE_ARBRE, $args );
}
