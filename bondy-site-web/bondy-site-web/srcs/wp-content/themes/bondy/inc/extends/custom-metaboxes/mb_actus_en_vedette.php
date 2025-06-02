<?php

/**
 * Initialisation
 */
add_action('add_meta_boxes','bondy_init_metabox_actus');
function bondy_init_metabox_actus(){
  add_meta_box('mb_note_actus_en_vedette', 'Mettre en vedette', 'bondy_field_actus_en_vedette', POST_TYPE_ACTUALITE, 'side');
}

/**
 * Ajout des champs
 */
function bondy_field_actus_en_vedette($post){
    $selected_value = intval(get_post_meta( $post->ID, FIELD_ACTUS_EN_VEDETTE, true ));
  echo '<label><input type="checkbox" name="' . FIELD_ACTUS_EN_VEDETTE . '" value="1" ' . ($selected_value == 1 ? 'checked="checked"' : '').  '/> Mettre en vedette</label>';


}

/** sauvegarde valeur champ */
add_action( 'save_post', 'bondy_save_posts_mb_actus_en_vedette_value', 10, 2);
function bondy_save_posts_mb_actus_en_vedette_value( $post_id, $post ){
  global $pagenow;

  if ( is_admin() && $pagenow == 'post.php' && $post->post_type == POST_TYPE_ACTUALITE ){
      if ( isset($_POST[FIELD_ACTUS_EN_VEDETTE]) && $_POST[FIELD_ACTUS_EN_VEDETTE] == 1 ){
          delete_post_meta_by_key(FIELD_ACTUS_EN_VEDETTE);
          update_post_meta($post->ID, FIELD_ACTUS_EN_VEDETTE, intval($_POST[FIELD_ACTUS_EN_VEDETTE]) );

      } else {
          delete_post_meta($post->ID, FIELD_ACTUS_EN_VEDETTE );
      }

  }
}
