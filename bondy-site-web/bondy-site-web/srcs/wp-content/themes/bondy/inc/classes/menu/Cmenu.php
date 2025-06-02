<?php
/**
 * classe de service pour le menu
 *
 * @package WordPress
 * @subpackage Fondation action
 * @since Fondation   axian 1.0
 * @author : Pulse
 */
Class Cmenu
{
    public function __construct()
    {

    }

    public static function get_menu($location){
        // Retrieve menu from location
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[$location]);
        // Retrieve menu items
        $menu_items = wp_get_nav_menu_items($menu->term_id, array('update_post_term_cache' => false));

        return $menu_items;
    }


    public static function get_CountSubMenu($_location, $_itemId){
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object( $locations[$_location] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $countChild = 0;
        if(is_array($menu_items)) {
            foreach ($menu_items as $menu_item) {
                if ($menu_item->menu_item_parent == $_itemId) {
                    $countChild++;
                }
            }
        }
        return $countChild;
    }

}