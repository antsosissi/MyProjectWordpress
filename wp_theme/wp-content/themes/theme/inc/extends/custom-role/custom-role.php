<?php
/**
 * Déclaration des profils users
 *
 * @package WordPress
 * @subpackage theme
 * @since theme 1.0
 * @author : sissi
 */

add_action('init', 'theme_init_role');
function theme_init_role(){
  add_role( USER_PROFILE_ADMIN, 'Administrateur');
  add_role( USER_PROFILE_WEBMASTER, 'Webmaster');
  add_role( USER_PROFILE_MEMBRE, 'Membre');
}