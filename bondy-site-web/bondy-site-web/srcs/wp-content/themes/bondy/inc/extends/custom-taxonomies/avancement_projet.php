<?php
/**
 * register taxo avancement projet
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

add_action('init', 'bondy_init_avancementprojet', 2);
function bondy_init_avancementprojet(){
  //taxonomies
  $labels = get_custom_taxonomy_labels( 'Avancement projet', 'Avancement projet', 1);
  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
  );
  register_taxonomy( TAXONOMY_AVANCEMENT_PROJET, POST_TYPE_PROJET, $args );
}