<?php

/**
 * classe de service pour le type de post actualite
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
class CActualite
{

    private static $_elements;

    public function __construct()
    {

    }

    /**
     * fonction qui prend les informations par son Id.
     *
     * @param int $pid
     *
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
    private static function _load($pid)
    {
        $pid = intval($pid);
        $p = get_post($pid);

        if ($p->post_type == POST_TYPE_ACTUALITE) {
            $element = new stdClass();

            //champs wp
            $element->id = $p->ID;
            $element->titre = $p->post_title;
            $element->extrait = !empty($p->post_excerpt) ? wp_limite_text($p->post_excerpt, 600) : wp_limite_text(strip_tags(strip_shortcodes($p->post_content)), 300);
            $element->description = $p->post_content;
            $element->comment_count = $p->comment_count;
            $type_actus = wp_get_post_terms($p->ID, "etiquette_actualites");
            $listTypeActu = array();
            if (!empty($type_actus) && count($type_actus)> 0 ){
                foreach ( $type_actus as $type ){
                    $listTypeActu[] = $type->term_id;
                }
            }
            $element->type_actus = $listTypeActu;
            $element->date = date( 'd/m/Y', strtotime( $p->post_date ) );
            if ($tbid = get_post_thumbnail_id($p->ID)) {
                list($element->image) = wp_get_attachment_image_src($tbid);
            } else {
                $element->image = get_template_directory_uri() . '/images/default.jpg';
            }
            $element->date = get_the_date('c', $p);
            $element->etiquette_actualiter = wp_get_post_terms($p->ID, TAXONOMY_ACTUALITES);

            //champs personnalisés
            if (class_exists('Acf')) {
                //Bannière actualité
                $element->banniere_actualite = get_field(FIELD_ACTUALITE_BANNIERE, $p->ID);
                //$element->relation_actualite_id = get_field(FIELD_ACTUALITE_RELATION, $p->ID);
                $element->id_relation = CPage::getById(get_field(FIELD_ACTUALITE_RELATION, $p->ID));
                //get image gallery
                $element->image_gallery = get_field(FIELD_ESPECE_ARBRE_PROJET_GALERIE, $p->ID);
                // text descriptif
                $element->galerie_text_decriptif = get_field(FIELD_ESPECE_ARBRE_PROJET_TEXTE, $p->ID);
            }

            //en vedette
            $en_vedette = intval(get_post_meta( $p->ID, FIELD_ACTUS_EN_VEDETTE, true ));
            $element->en_vedette = $en_vedette;

            //stocker dans le tableau statique
            self::$_elements[$pid] = $element;
        }
    }

    public static function getBy($limit = -1, $sorting = null, $data_filters = array(), $args = array(), $tax = null)
    {
        $default_args = array(
            'post_type' => POST_TYPE_ACTUALITE,
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'paged' => get_query_var('paged'),
            //'meta_key' => FIELD_ACTUALITE_RELATION,
            'order' => isset($sorting['order']) ? $sorting['order'] : 'DESC',
            'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : 'date',
            'fields' => 'ids'
        );
        $args = wp_parse_args($args, $default_args);
        if (!is_null($tax)) {
            $args['tax_query'][] = array(
                'taxonomy' => TAXONOMY_ACTUALITES,
                'field' => 'id',
                'terms' => $tax,
                'operator' => 'IN'
            );
        }
        $posts = query_posts($args);
        $elts = array();
        foreach ($posts as $id) {
            $elt = self::getById(intval($id));
            $elts[] = $elt;
        }
        return $elts;

    }

//  /**
//   * fonction qui retourne une liste filtrée

    //gestion de colonne BO
    public static function add_column($columns)
    {
        $columns['vignette'] = __("Vignette", "bondy");
        $columns['lieu'] = __("Lieu", "bondy");
        return $columns;
    }

    //gestion des valeurs des colonnes BO
    public static function manage_column($column_name, $post_id)
    {
        $actu = self::getById($post_id);
        switch ($column_name) {
            case 'vignette':
                echo '<img src="' . $actu->image . '"/>';
                break;
            case 'lieu':
                echo $actu->lieu;
                break;
            default:
        }
    }

    public function bondy_get_actualiter_vedette(){
        $data_actus_vedette = self::getBy();
        $id_actus_vedette = $data_actus_vedette[0]->id_relation->context_projet['relation_actualite'][0];
        return $id_actus_vedette;

    }

    /*paination loading actualiter*/
    public function renderItemCallbackActualites($id){
        $Actualiter = self::getById($id);
        ob_start();
        set_query_var('idx', $id);
        get_template_part('template-part/actualite/section-actualite-en-vedette.tpl');
        $html = ob_get_contents();
        ob_clean();
        return $html;
    }

    public function getItemsCallbackActualites($offset, $limit, $filters, $sorting){
        /*if ( self::hasActuMisEnAvant($offset, $limit, $filters, $sorting) && 0 === $offset ){
            $limit = NBRE_PAGE_IN_DEBUT;
        }*/
        $second_orderby = isset($sorting['orderby']) ? $sorting['orderby'] : 'date';
        $second_order = isset($sorting['order']) ? $sorting['order'] : 'DESC';

        $args = array(
            'post_type' => POST_TYPE_ACTUALITE,
            'post_status' => 'publish',
            'numberposts' => $limit,
            'offset' => $offset,
            'orderby'  => array( 'meta_value_num' => 'DESC', $second_orderby => $second_order ),
            'fields' => 'ids'
        );
        if (isset( $filters['filtre_etiquette_actualiter'] ) && !empty( $filters['filtre_etiquette_actualiter'] )) {
            $args['tax_query'][] = array(
                'taxonomy' => TAXONOMY_ACTUALITES,
                'field' => 'id',
                'terms' => $filters['filtre_etiquette_actualiter'],
                'operator' => 'IN'
            );
        }

        $args['meta_query'][] = array(
            'relation' => 'OR',
            array(
                'key' =>  FIELD_ACTUS_EN_VEDETTE,
                'compare' => 'NOT EXISTS'
            ),
            array(
                'key' =>  FIELD_ACTUS_EN_VEDETTE,
                'value' => 1
            )
        );

        $actuMisEnAvantId = self::getActuMisEnAvant();
        if ( $actuMisEnAvantId ){
            //$args['post__not_in'] = array( $actuMisEnAvantId );
        }
        $posts = get_posts($args);
        //var_dump($posts);
        return $posts;
    }

    public static function getAfterItemsCallbackActualites($offset, $limit, $filters, $sorting)
    {
        $htmlData = '';
        $actuMisEnAvantId = self::getActuMisEnAvant();
        if ($actuMisEnAvantId) {
            $chaqueActu = CActualite::getById($actuMisEnAvantId);
            $filterData = array_merge(array('all'), $chaqueActu->type_actus );
            if ( $filters['filtre_etiquette_actualiter'] == "" || ( isset( $filters['filtre_etiquette_actualiter']) && !empty($filters['filtre_etiquette_actualiter']) && in_array( $filters['filtre_etiquette_actualiter'], $filterData) ) ){
                $imageActu = get_post_thumbnail_id($actuMisEnAvantId);
                $img_not_exist = empty($imageActu);
                list($img_actus_mobile) = wp_get_attachment_image_src($imageActu, IMAGE_ACTUS_MOBILE);
                list($img_actus_tablet) = wp_get_attachment_image_src($imageActu, IMAGE_ACTUS_TABLET);
                list($img_actus_desktop) = wp_get_attachment_image_src($imageActu, IMAGE_ACTUS_DESKTOP);
                $class_img = '';
                if ($img_not_exist) {
                    $class_img = 'no-img-actu';
                }
                $dateActu = strtotime($chaqueActu->date);
                $html = '<div class="actus_vedette ' . $class_img . '" >
                    <a href="' . get_post_permalink($chaqueActu->id) . '" class="actus-cnt" title="' . $chaqueActu->titre . '">
                            <figure class="photo-actus ieobjectfit">
                                <img src="' . $img_actus_desktop . '"
                                     srcset="
                                        ' . $img_actus_mobile . ' 320w,
                                        ' . $img_actus_tablet . ' 1024w,
                                        ' . $img_actus_desktop . ' 1920w"
                                     alt="' . $chaqueActu->titre . '">
                            </figure>
                        <span class="etiquette-vedette">en vedette</span>
                        <span class="overlay"></span>
                    </a>
                    <span class="hover-status"><i class="icobnd-link-external"></i><span>Lire cet article</span></span>
                    <a href="' . get_post_permalink($chaqueActu->id) . '"><h3>' . $chaqueActu->titre . '</h3></a>
                    <div class="desc-actus">
                        <p>' . $chaqueActu->extrait . '</p>
                    </div>
                    <div class="bottom-bar">                   
                        <p><span class="label">Publié le <span class="separator">:</span></span><span class="value">' . date_i18n("d/m/Y", $dateActu) . '</span></p>                       
                    </div>

                </div>
                    ';
                $htmlData = $html;
            }

        }
        return $htmlData;
    }

    //set you custom function
    public static function getActuMisEnAvant(){
        $pageActus = wp_get_post_by_template('actualites.php');
        $actuNew = get_field('actualiter', $pageActus->ID);
        if (!empty($actuNew) && isset($actuNew['relation_actualite'][0]) && !empty($actuNew['relation_actualite'][0])) {
            return $actuNew['relation_actualite'][0];

        } else {
            return false;
        }
    }

    public static function getActusVedette(){

        $args = array(
            'post_type' => POST_TYPE_ACTUALITE,
            'post_status' => 'publish',
            'meta_key' => FIELD_ACTUS_EN_VEDETTE,
            'meta_value' => 1,
            'fields' => 'ids'
        );
        return get_posts($args);

    }

    public static function display_post_states( $post_states, $post ) {
        if( $post->post_type == POST_TYPE_ACTUALITE ) {
            $actus = self::getById($post->ID);
            if ( $actus->en_vedette ){
                $post_states[] = 'En vedette';
            }

        }
        return $post_states;
    }
}

add_action('manage_edit-' . POST_TYPE_ACTUALITE . '_columns', 'CActualite::add_column');
add_action('manage_' . POST_TYPE_ACTUALITE . '_posts_custom_column', 'CActualite::manage_column', 10, 2);
add_filter('wpil_get_after_items_actualiter_pagination_box', 'CActualite::getAfterItemsCallbackActualites', 10, 4);
//add_action( 'manage_' . POST_TYPE_ACTUALITE . '_posts_custom_column', 'CActualite::bondy_test_actus_vedette_exist', 10, 2 );
add_filter( 'display_post_states', 'CActualite::display_post_states', 10, 2 );
