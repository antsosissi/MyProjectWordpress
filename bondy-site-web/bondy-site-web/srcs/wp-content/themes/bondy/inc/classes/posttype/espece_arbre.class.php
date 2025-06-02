<?php
/**
 * classe de service pour le type de post espèce d'arbre
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

class CEspeceArbre {

    private static $_elements;

    public function __construct()
    {

    }

    /**
     * fonction qui prend les informations son Id.
     *
     * @param int $pid
     * @return bool
     */
    public static function getById($pid)
    {
        $pid = intval($pid);

        //On essaye de charger l'element
        if (!isset(self::$_elements[$pid])) {
            self::_load($pid);
        }
        //Si on a pas réussi à chargé l'article (pas publiée?)
        if (!isset(self::$_elements[$pid])) {
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

    if ( $p->post_type == POST_TYPE_ESPECE_ARBRE ) {
      $element = new stdClass();

      //champs wp
      $element->id            = $p->ID;
      $element->titre         = $p->post_title;
      $element->extrait       = !empty($p->post_excerpt) ? wp_limite_text($p->post_excerpt, 300) : wp_limite_text(  strip_tags( strip_shortcodes( $p->post_content ) ) , 300 );
      $element->description   = $p->post_content;
      $element->comment_count = $p->comment_count;

      if ( $tbid = get_post_thumbnail_id($p->ID) ) {
        list($element->image) = wp_get_attachment_image_src($tbid);
      } else {
        $element->image = get_template_directory_uri() . '/images/default.jpg';
      }
      $element->date = get_the_date('c', $p);
      //...

      //terms
      $element->type_utilisation = wp_get_post_terms($p->ID, TAXONOMY_TYPE_UTILISATION);
      $element->specificite      = wp_get_post_terms($p->ID, TAXONOMY_SPECIFICITE);
      $element->etiquette = wp_get_post_terms($p->ID, TAXONOMY_ESPECES_ARBRES);

      //champs personnalisés
      if ( class_exists('Acf') ) {
         // if (get_page_template_slug($p->ID) == 'page-templates/especes-d-arbres.php') {
          //detail espece d'arbre
              //Image
              $element->image_espece_darbre_id = get_field(FIELD_ESPECE_ARBRE_IMGAGE, $p->ID);

              //Description (wysiwig simple)
              $element->description_espece_darbre = get_field(FIELD_ESPECE_ARBRE_DESCRIPTION, $p->ID);

              //Associer à un projet
              $element->associe_au_projet_id = get_field(FIELD_ESPECE_ARBRE_PROJET, $p->ID);

              //Type d’utilisation
              $element->type_dutilisation = get_field(FIELD_ESPECE_ARBRE_TYPE_UTILISATION, $p->ID);

              //Spécificité
              $element->specificite_espece_arbre = get_field(FIELD_ESPECE_ARBRE_SPECIFICITE, $p->ID);

              //Galerie
              $element->galerie = get_field(FIELD_ESPECE_ARBRE_PROJET_GALERIE, $p->ID);

              // text descriptif
              $element->galerie_text_decriptif = get_field(FIELD_ESPECE_ARBRE_PROJET_TEXTE, $p->ID);
              //}
      }
      //var_dump($element,'fhgfdbjg');die();
      //stocker dans le tableau statique
      self::$_elements[$pid] = $element;

    }
  }

  /**
   * fonction qui retourne une liste filtrée
   * @param int $limit
   * @param null $sorting
   * @param array $data_filters
   * @param array $tax_filters
   * @param array $meta_filters
   * @return array
   */
    public static function getBy( $limit = -1, $sorting = null, $data_filters = array(), $tax_filters = array(), $args = array() ) {
	//public static function getBy( $limit = -1, $sorting = null, $data_filters = array(), $tax_filters = array(), $meta_filters  = array() ) {
        $default_args = array(
			'post_type' => POST_TYPE_ESPECE_ARBRE,
			'post_status' => 'publish',
			'posts_per_page' => $limit,
			'paged' => get_query_var('paged'),
			'order'=> isset($sorting['order']) ? $sorting['order'] : 'DESC',
			'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : 'date',
			'fields' => 'ids'
		);
        $args = wp_parse_args($args, $default_args);

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
	public static function getTaxonomieEtiquette(){
        $args['tax_query'][] = array (
            'taxonomy' => TAXONOMY_ESPECES_ARBRES,
           // 'terms' => wp_unslash( ( array ) $_POST[ $tax ] ),
            'field' => 'slug',
        );
        //$element->avancement_projet = wp_get_post_terms($p->ID, TAXONOMY_AVANCEMENT_PROJET);
        $posts = query_posts($args);
        global $wp_query;
        $data = array('posts' => $posts, 'count'=> $wp_query->found_posts);
        wp_reset_postdata();
        wp_reset_query();
        return $data;
    }

	//gestion de colonne BO
	public static function add_column( $columns ) {
		$columns['vignette'] = __("Vignette", "bondy") ;
		return $columns;
	}

	//gestion des valeurs des colonnes BO
	public static function manage_column($column_name, $post_id){
		$espece = self::getById($post_id);
        switch($column_name){
            case 'vignette':
                list($vignette)  = wp_get_attachment_image_src($espece->image_espece_darbre_id, IMAGE_SIZE_ACTUS_VIGNETTE);
                echo '<img src="' . $vignette . '"/>';
                break;

            default:
        }
	}


    // render Item espece d'arbre (PaginationLoading)
    public static function renderItemCallbackEspeceArbre($id){
        $EspeceArbre = self::getById($id);
        //mp($EspeceArbre);die();
        //$dataArray = [$EspeceArbre];
        ob_start();
        set_query_var( 'objectPage', $EspeceArbre );
        get_template_part('template-part/especes-arbres/section-list-espece-arbre.tpl');
        //get_template_part('template-part/especes_d_arbres/section_pagination_espece_arbre.tpl');
        $html = ob_get_contents();
        ob_clean();
        return $html;
    }

    // listes des projets de l'événement
    public  static function getItemsCallbackEspeceArbre($offset, $limit, $filters,$sorting, $extra)
    {
        $paged = intval($offset / $limit + 1);
        $args = array(
            'post_type' => POST_TYPE_ESPECE_ARBRE,
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'paged' => $paged,
            'order' => isset($sorting['order']) ? $sorting['order'] : 'DESC',
            'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : 'date',
            'fields' => 'ids'
        );

        if(!is_null($filters['filtre_etiquette_especes_arbres']) && $filters['filtre_etiquette_especes_arbres'] != 'all' ){
            $args['tax_query'][] = array (
                'taxonomy' => TAXONOMY_ESPECES_ARBRES,
                'field'    => 'id',
                'terms'    => $filters['filtre_etiquette_especes_arbres'],
                'operator' => 'IN'
            );
        }
        $posts = query_posts($args);
        global $wp_query;
        $data = array('posts' => $posts, 'count'=> $wp_query->found_posts);
        wp_reset_postdata();
        wp_reset_query();
        return $data;
    }

	//set you custom function
    // render Item espece d'abre (PaginationLoading)
    public static function renderItemCallbackEspece($id){

        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> POST_TYPE_ESPECE_ARBRE,
            'meta_key'		=> FIELD_ESPECE_ARBRE_PROJET,
            'meta_value'	=> $id
        ));

        $elts = array();
        foreach ($posts as $p) {
            $elt = intval($p->ID);
            $elts[]=$elt;
        }
        //return $elts;

        //$oProjet = self::getById($id);
        ob_start();
        set_query_var( 'objectPage', $elts );
        get_template_part('template-part/especes-arbres/section-list-espece-arbre.tpl');
        $html = ob_get_contents();
        ob_clean();

        return $html;
    }

    // listes des especes d'arbre de l'événement
    public  static function getItemsCallbackEspece($offset, $limit, $filters,$sorting, $extra)
    {
        $paged = intval($offset / $limit + 1);

        $args = array(
            'post_type' => POST_TYPE_ESPECE_ARBRE,
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'paged' => $paged,
            'order' => isset($sorting['order']) ? $sorting['order'] : 'DESC',
            'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : 'date',
            'fields' => 'ids'
        );

        $posts = query_posts($args);

        global $wp_query;
        $data = array('posts' => $posts, 'count'=> $wp_query->found_posts);
        wp_reset_postdata();
        wp_reset_query();
        return $data;
    }
    public static function ajax_success_especes_arbres_pagination_box(){
        $script = '
                jQuery(\'.t-title\').each(function(i, el) {
                    if(isLinecampActive(el)){
                        jQuery(el).addClass(\'tooltiped\');
                    }
                });  
                jQuery(\'[data-toggle="tooltip"]\').tooltip();
                    jQuery(".voir-modal-data").on(\'click\', function(){
                        var postId = jQuery(this).data(\'postid\');
                        jQuery("#modal-arbres .modal-body").html(\'\');
                        jQuery("#modal-arbres .modal-dialog .titre-arbre").html(\'\');
                        jQuery("#layer-loader-modal").show();
                        jQuery("#modal-arbres").modal(\'show\');
                        jQuery.ajax({
                            url: ajaxurl,
                            dataType : \'json\',
                            data: {
                                action      : \'show_modal_data\',
                                type        : \'POST\',
                                post_id_modal : postId,
                            },
                            success: function( res ) {
                                gallery_photo_content.init();
                                jQuery("#modal-arbres .modal-dialog .modal-body").html(res.html);
                                jQuery("#modal-arbres .modal-dialog .titre-arbre").html(res.title);
                                if(jQuery(".custom-scroll").length > 0) {
                                    jQuery(".custom-scroll").mCustomScrollbar({});
                                }
                                
                                jQuery("#layer-loader-modal").hide();
                            },
                            error: function () {
                
                            }
                        });
                    })
        ';
        return $script;
    }

    public static function ajax_show_modal_data(){
        $postId  = ( isset( $_REQUEST['post_id_modal'] ) && !empty( $_REQUEST['post_id_modal'] ) ) ? $_REQUEST['post_id_modal'] : '';
        $arbre = self::getById( intval($postId) );
        ob_start();
        set_query_var( 'data_espce', $arbre );
        get_template_part('template-part/modal/modal.tpl');
        $html = ob_get_contents();
        ob_clean();
        $titre = wp_trim_words($arbre->titre,20, '...');
        $data = array(
            'title' => $titre,
            'html' => $html
        );
        echo  json_encode($data);

        wp_die();

    }

}
add_action( 'manage_edit-' . POST_TYPE_ESPECE_ARBRE . '_columns' , 'CEspeceArbre::add_column' );
add_action( 'manage_' . POST_TYPE_ESPECE_ARBRE . '_posts_custom_column', 'CEspeceArbre::manage_column', 10, 2 );
add_filter( 'ajax_success_especes_arbres_pagination_box', 'CEspeceArbre::ajax_success_especes_arbres_pagination_box' );
add_filter('wp_ajax_show_modal_data', 'CEspeceArbre::ajax_show_modal_data');
add_filter('wp_ajax_nopriv_show_modal_data', 'CEspeceArbre::ajax_show_modal_data');
