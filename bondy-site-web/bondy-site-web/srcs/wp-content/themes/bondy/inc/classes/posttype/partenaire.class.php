<?php
/**
 * classe de service pour le type de post partenaire
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

class CPartenaire {

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
		$p   = get_post($pid);

		if ( $p->post_type == POST_TYPE_PARTENAIRE ) {
			$element = new stdClass();

			//champs wp
			$element->id            = $p->ID;
			$element->titre         = $p->post_title;
			$element->extrait       = !empty($p->post_excerpt) ? wp_limite_text($p->post_excerpt, 300) : wp_limite_text(  strip_tags( strip_shortcodes( $p->post_content ) ) , 300 );
			$element->comment_count = $p->comment_count;

			if ( $tbid = get_post_thumbnail_id($p->ID) ) {
				list($element->image) = wp_get_attachment_image_src($tbid);
			} else {
				$element->image = get_template_directory_uri() . '/images/default.jpg';
			}
			$element->date = get_the_date('c', $p);
			//...

			//terms
			//...
			//champs personnalisés
			if ( class_exists('Acf') ) {

				//Logo du partenaire
				$element->logo_partenaire_id = get_field(FIELD_PARTENAIRE_LOGO, $p->ID);

				//Lien partenaire
				$element->lien_partenaire = get_field(FIELD_PARTENAIRE_LIEN, $p->ID);

				//concept
                $element->concept = get_field( 'concept_partner', $p->ID );
                $element->description = get_field( 'description_partner', $p->ID );
			}

			//stocker dans le tableau statique
			self::$_elements[$pid] = $element;
		}
	}

	/**
	 * fonction qui retourne une liste filtrée
	 *
	 */
	public static function getBy( $limit = -1, $sorting = null, $data_filters = array(), $tax_filters = array(), $meta_filters  = array() ) {
		$args = array(
			'post_type' => POST_TYPE_PARTENAIRE,
			'post_status' => 'publish',
			'posts_per_page' => $limit,
			'paged' => get_query_var('paged'),
			'order'=> isset($sorting['order']) ? $sorting['order'] : 'DESC',
			'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : 'date',
			'fields' => 'ids'
		);

		if ( isset($data_filters['author']) ){
			$args['author'] = $data_filters['author'];
		}
		if ( isset($data_filters['search']) ) {
			$args['s'] = $data_filters["search"];
		}



		if(!empty($tax_filters)) {
			foreach ($tax_filters as $filter => $filterby) {
				if($filterby>0){
					$args['tax_query'][] = array (
						'taxonomy' => $filter,
						'field' => 'id',
						'terms' => array(intval($filterby)),
						'operator' => 'IN',
						'include_children' => true
					);
				}
			}
			$args['tax_query']['relation'] = 'AND';
		}

		$posts = query_posts($args);
		$elts = array();
		foreach ($posts as $id) {
			$elt = self::getById(intval($id));
			$elts[]=$elt;
		}
		return $elts;
	}

	//gestion de colonne BO
	public static function add_column( $columns ) {
		$columns['vignette'] = __("Vignette", "bondy") ;
		return $columns;
	}

	//gestion des valeurs des colonnes BO
	public static function manage_column($column_name, $post_id){
		$partenaire = self::getById($post_id);
		switch($column_name){
			case 'vignette':
                list($vignette)  = wp_get_attachment_image_src($partenaire->logo_partenaire_id, IMAGE_SIZE_ACTUS_VIGNETTE);
				echo '<img src="' . $vignette . '"/>';
				break;

			default:
		}
	}

	//set you custom function

}
add_action( 'manage_edit-' . POST_TYPE_PARTENAIRE . '_columns' , 'CPartenaire::add_column' );
add_action( 'manage_' . POST_TYPE_PARTENAIRE . '_posts_custom_column', 'CPartenaire::manage_column', 10, 2 );
