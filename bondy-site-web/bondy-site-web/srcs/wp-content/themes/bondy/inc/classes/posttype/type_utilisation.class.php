<?php
/**
 * Created by PhpStorm.
 * Date: 20/05/2020
 * Time: 14:11
 */


class CTypeUtilisation {

    private static $_elements;

    public function __construct() {

    }

    /**
     * fonction qui prend les informations par son Id.
     *
     * @param int $pid
     *
     * @return bool
     */
    public static function getById($pid) {
        $pid = intval($pid);

        //On essaye de charger l'element
        if(!isset(self::$_elements[$pid])) {
            self::_load($pid);
        }
        //Si on a pas réussi à chargé l'article (pas publiée?)
        if(!isset(self::$_elements[$pid])) {
            return FALSE;
        }

        return self::$_elements[$pid];
    }

    /**
     * fonction qui charge toutes les informations dans le variable statique $_elements.
     *
     * @param int $pid
     */
    private static function _load($pid) {
        $pid = intval($pid);

        $element = new stdClass();
        if ( class_exists('Acf') ) {
            $type_utilisation = get_term($pid);
            $element->picto_name = $type_utilisation->name;
            $element->picto_utilisation = get_field( 'pictogramme_utilisation', TAXONOMY_TYPE_UTILISATION . '_' . $pid);
        }
        self::$_elements[$pid] = $element;
    }

    //set you custom function

}
