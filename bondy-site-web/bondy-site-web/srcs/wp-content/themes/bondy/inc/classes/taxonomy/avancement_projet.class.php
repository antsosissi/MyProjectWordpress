<?php
/**
 * classe de service pour la taxonomie avancement projet
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

class CAvancementProjet {

  private static $_elements;
	
  public function __construct() {
    
  }
  
  /**
   * fonction qui prend les informations son Id. 
   * 
   * @param type $pid
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
   * @param type $pid 
   */
  private static function _load($tid) {
	  $tid = intval($tid);
    $t = get_term($tid, TAXONOMY_AVANCEMENT_PROJET);

    $element = new stdClass();

    //champs wp
    $element->id = $t->term_id;
    $element->titre = $t->name;
    $element->slug = $t->slug;
    $element->description = $t->description;

    //champs personnalisés
    if ( class_exists('Acf') ) {
      $element->icon_avancement = get_field( FIELD_AVANCEMENT_PROJET_ICON, TAXONOMY_AVANCEMENT_PROJET . '_' . $tid);
    }

    //stocker dans le tableau statique
    self::$_elements[$tid] = $element;

  }
  
  /**
   * fonction qui retourne une liste filtrée
   * 
   */
  public static function getBy( ) {
	  $args = array (
      'hide_empty' => false,
    );
	
	  $elements = get_terms( TAXONOMY_AVANCEMENT_PROJET, $args);
    $elts = array();
    foreach ($elements as $t) {
    	$elt = self::getById(intval($t->term_id));
    	$elts[]=$elt;
    }
    return $elts;
    
  }

  //gestion de colonne BO
  public static function add_column($columns) {
    $columns['icone'] = __("Icone", "bondy");
    return $columns;
  }

  //gestion des valeurs des colonnes BO
  public static function manage_column($out, $column_name, $term_id){
    switch($column_name){
      case 'icone':
        $t = CAvancementProjet::getById($term_id);
        echo '<img src="' . $t->icone . '"/>';
        break;
      default:
        break;
    }

    return $out;
  }
}

add_filter('manage_edit-' . TAXONOMY_AVANCEMENT_PROJET . '_columns', 'CAvancementProjet::add_column');
add_action( 'manage_' . TAXONOMY_AVANCEMENT_PROJET . '_custom_column', 'CAvancementProjet::manage_column', 10, 3 );
?>