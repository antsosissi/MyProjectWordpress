<?php
/**
 * register taxo avancement projet
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_etiquette_especes_arbres', 2);
function bondy_init_etiquette_especes_arbres(){
    //taxonomies
    $labels = get_custom_taxonomy_labels( 'Etiquette Espèces d\'Arbres', 'Etiquette Espèces d\'arbres', 1);
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );
    register_taxonomy( TAXONOMY_ESPECES_ARBRES, POST_TYPE_ESPECE_ARBRE, $args );
}