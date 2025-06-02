<?php
/**
 * classe de service pour le type de post temoignage
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

class CTemoignage {

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

		if ( $p->post_type == POST_TYPE_TEMOIGNAGE ) {
			$element = new stdClass();

			//champs wp
			$element->id            =  $p->ID;
			$element->titre         =  $p->post_title;
			$element->extrait       =  !empty($p->post_excerpt) ? wp_limite_text($p->post_excerpt, 300) : wp_limite_text(  strip_tags( strip_shortcodes( $p->post_content ) ) , 300 );
			$element->description   = $p->post_content;
			$element->comment_count =  $p->comment_count;

			if ( $tbid = get_post_thumbnail_id($p->ID) ){
				list($element->image) = wp_get_attachment_image_src($tbid);
			}else{
				$element->image = get_template_directory_uri() . '/images/default.jpg';
			}
			$element->date = get_the_date('c', $p);
			//...

			//terms
//			$element->type_actus = wp_get_post_terms($p->ID, TAXONOMY_TYPE_{});
			//...

			//champs personnalisés
			if ( class_exists('Acf') ) {
				//Type de témoignage
				$element->type_de_temoignage = get_field(FIELD_TEMOIGNAGE_TYPE_TEMOIGNAGE, $p->ID);

				//Photo du témoigneur
				$element->photo_temoignage_id = get_field(FIELD_TEMOIGNAGE_TYPE_PHOTO_TEMOIGNAGE, $p->ID);

				//Nom du témoigneur
				$element->nom_temoigneur = get_field(FIELD_TEMOIGNAGE_NOM_TEMOIGNEUR, $p->ID);

				//lOCALISATION du temoignage
				$localisation_du_temoignage = get_field(FIELD_TEMOIGNAGE_LOCALISATION, $p->ID);

				//Poste occupé par le témoigneur si témoignage enterprise
				$poste_du_temoigneur = get_field(FIELD_TEMOIGNAGE_POSTE_TEMOIGNAGE, $p->ID);
				if ( $element->type_de_temoignage == 'entreprise' ){
                    $element->stitre = $poste_du_temoigneur;
                } elseif ( $element->type_de_temoignage == 'particulier' ){
                    $element->stitre = $localisation_du_temoignage;
                }

				//Contenu du témoignage
                $element->contenu_du_temoignage = get_field(FIELD_TEMOIGNAGE_CONTENU_TEMOIGNAGE, $p->ID);

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
			'post_type' => POST_TYPE_TEMOIGNAGE,
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

		$args['meta_query'] = array();
		if ( isset($meta_filters['lieu']) ){
			$args['meta_query'][] =
				array(
					'key'     => FIELD_TEMOIGNAGE_LOCALISATION,
					'value'   => $meta_filters['lieu'],
					'compare' => 'IN',
				);
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
		$columns['vignette'] = __("Photo", "bondy") ;
		$columns['lieu'] = __("Lieu", "bondy") ;
		return $columns;
	}

	//gestion des valeurs des colonnes BO
	public static function manage_column($column_name, $post_id){
		$temoignage = self::getById($post_id);
		$image = ( isset( $temoignage->photo_temoignage_id ) && !empty( $temoignage->photo_temoignage_id ) ) ? wp_get_attachment_image_url( $temoignage->photo_temoignage_id, 'thumbnail' ) : get_template_directory_uri() .'/images/default.jpg';
		switch($column_name){
			case 'vignette':
				echo '<img src="' . $image . '"/>';
				break;

			default:
		}
	}

	//set you custom function

}
add_action( 'manage_edit-' . POST_TYPE_TEMOIGNAGE . '_columns' , 'CTemoignage::add_column' );
add_action( 'manage_' . POST_TYPE_TEMOIGNAGE . '_posts_custom_column', 'CTemoignage::manage_column', 10, 2 );
