<?php

/**
 * classe de service pour le type de post projet
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */
class CProjet
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

        if ($p->post_type == POST_TYPE_PROJET) {
            $element = new stdClass();

            //champs wp
            $element->id = $p->ID;
            $element->titre = $p->post_title;
            $element->extrait = !empty($p->post_excerpt) ? wp_limite_text($p->post_excerpt, 300) : wp_limite_text(strip_tags(strip_shortcodes($p->post_content)), 300);
            $element->description = $p->post_content;
            $element->comment_count = $p->comment_count;

            //Image mise en avant
            if ($tbid = get_post_thumbnail_id($p->ID)) {
                list($element->image) = wp_get_attachment_image_src($tbid, HOME_PROJET_IMG_STYLE);
            } else {
                $element->image = get_template_directory_uri() . '/images/default.jpg';
            }
            $element->date = get_the_date('c', $p);
            //...

            //terms
            $element->avancement_projet = wp_get_post_terms($p->ID, TAXONOMY_AVANCEMENT_PROJET);
            $element->icon_avancement = get_field('icon_avancement', $element->avancement_projet[0]);
            //...

            //champs personnalisés
            if (class_exists('Acf')) {
                //Sous-titre
                $element->projet_sousTitre = get_field(FIELD_PROJET_SOUSTITRE, $p->ID);

                //Date de début projet
                $element->projet_dateDebut = get_field(FIELD_PROJET_DATEDEBUT, $p->ID);

                //Date de fin projet
                $element->projet_dateFin = get_field(FIELD_PROJET_DATEFIN, $p->ID);

                //Code projet
                $element->projet_code = get_field(FIELD_PROJET_CODE, $p->ID);

                //Localisation
                $element->projet_localisation = get_field(FIELD_PROJET_LOCALISATION, $p->ID);

                // Titre bannier page qui sommes nous
                $element->projet_banner_titre = get_field(FIELD_QUI_SOMMES_NOUS_BANNIERE_TITRE, $p->ID);
                $element->projet_banner_image = get_field(FIELD_QUI_SOMMES_NOUS_BANNIERE_IMAGE, $p->ID);
                $element->projet_banner_description = get_field(FIELD_QUI_SOMMES_NOUS_BANNIERE_DESCRIPTION, $p->ID);


                
                // Ils_parlent_nous
                $ils_parlent_nous = get_field('sous-titre_du_bloc', $p->ID);
                if ($ils_parlent_nous) {
                    $element->ils_parlent_de_nous_titre = $ils_parlent_nous;
                }

                // Ils_parlnt_nous description_du_bloc
                $ils_parlent_description = get_field('description_du_bloc', $p->ID);
                if ($ils_parlent_description) {
                    $element->ils_parlent_de_nous_description = $ils_parlent_description;
                }

                //ils parlent de nous erlation temoignage
                $relation_temoignage_id = get_field(FIELD_TEMOIGNAGE_RELATION, $p->ID);
                if ($relation_temoignage_id) {
                    $element->relation_temoignage_id = $relation_temoignage_id;
                }
                $element->projet_galerie = get_field(FIELD_ESPECE_ARBRE_PROJET_GALERIE, $p->ID);
                // text descriptif
                $element->galerie_text_decriptif = get_field(FIELD_ESPECE_ARBRE_PROJET_TEXTE, $p->ID);

                // plus de details sur le projet
                $description_espece_arbre = get_field('description_espece_arbre', $p->ID);
                if ($description_espece_arbre) {
                    $element->description_espece_arbre = $description_espece_arbre;
                }

                $descriptif = get_field('descriptif', $p->ID);
                if ($descriptif) {
                    $element->plus_detail_description = $descriptif;
                }

                $element->nbr_arbre = get_field( 'nbr_arbre_projet', $p->ID );
            }

            //stocker dans le tableau statique
            self::$_elements[$pid] = $element;
        }
    }

    /**
     * fonction qui retourne une liste filtrée
     * @param int $numberposts
     * @param null $sorting
     * @param array $data_filters
     * @param array $tax_filters
     * @param array $meta_filters
     * @return array
     */
    public static function getBy($numberposts = -1, $sorting = null, $meta_filters = array(), $data_filters = array(), $tax_filters = array())
    {
        $args = array(
            'post_type' => POST_TYPE_PROJET,
            'post_status' => 'publish',
            'numberposts' => $numberposts,
            'meta_key' => FIELD_PROJET_DATEDEBUT,
            'order' => isset($sorting['order']) ? $sorting['order'] : 'DESC',
            'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : 'date'
        );

        $args['meta_query'] = array();
        if (isset($meta_filters['date_now'])) {
            $args['meta_query'][] = array(
                'relation' => 'OR',
                array(
                    'key' => FIELD_PROJET_DATEDEBUT,
                    'value' => $meta_filters['date_now'],
                    'compare' => '>'
                ),
                array(
                    'relation' => 'AND',
                    array(
                        'key' => FIELD_PROJET_DATEDEBUT,
                        'value' => $meta_filters['date_now'],
                        'compare' => '<'
                    ),
                    array(
                        'key' => FIELD_PROJET_DATEFIN,
                        'value' => $meta_filters['date_now'],
                        'compare' => '>='
                    )
                ),
            );
        }

        $posts = query_posts($args);
        $elts = array();
        foreach ($posts as $p) {
            $elt = intval($p->ID);
            $elts[] = $elt;
        }
        return $elts;
    }

    //gestion de colonne BO
    public static function add_column($columns)
    {
        $columns['vignette'] = __("Vignette", "bondy");
        return $columns;
    }

    //gestion des valeurs des colonnes BO
    public static function manage_column($column_name, $post_id)
    {
        $projet = self::getById($post_id);
        switch ($column_name) {
            case 'vignette':
                echo '<img src="' . $projet->image . '" width="100"/>';
                break;

            default:
        }
    }

    //set you custom function

    /**
     * @param int $pid projet id
     * @return int count nb espèce arbre
     */
    public static function getNbEspeceArbre($pid)
    {
        $nb = 0;
        $posts = get_posts(array(
            'numberposts' => -1,
            'post_type' => POST_TYPE_ESPECE_ARBRE,
            'meta_key' => FIELD_ESPECE_ARBRE_PROJET,
            'meta_value' => $pid
        ));

        if (count($posts) > 0) {
            $nb = count($posts);
        }

        return $nb;
    }

    // render Item espece arbre (PaginationLoading)
    public static function renderItemCallbackEspece($id)
    {
        $oProjet = CEspeceArbre::getById($id);
        ob_start();
        set_query_var('objectPage', $oProjet);
        get_template_part('template-part/especes-arbres/section-list-espece-arbre.tpl');
        $html = ob_get_contents();
        ob_clean();
        return $html;
    }

    // listes des projets de l'événement
    public static function getItemsCallbackEspeceByProjet($offset, $limit, $filters, $sorting, $extra)
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
        $data = array('posts' => $posts, 'count' => $wp_query->found_posts);
        wp_reset_postdata();
        wp_reset_query();
        return $data;
    }

    // render Item Projet (PaginationLoading)
    public static function renderItemCallbackProjet($id)
    {
        $oProjet = self::getById($id);
        $cntEspeceArbre = self::getNbEspeceArbre($id);
        $dataArray = [$oProjet, $cntEspeceArbre];

        ob_start();
        set_query_var('objectPage', $dataArray);
        get_template_part('template-part/projets/section-projet.tpl');
        $html = ob_get_contents();
        ob_clean();

        return $html;
    }

    // date
    public static function changeFormatDate($date)
    {
        //"dd/"mm/YY" => "mm/dd/YY";
        $dates = explode("/", $date);
        return $dates[1] . "/" . $dates[0] . "/" . $dates[2];
    }

    // listes des projets de l'événement
    public static function getItemsCallbackProjet($offset, $limit, $filters, $sorting, $extra)
    {
        $paged = intval($offset / $limit + 1);
        $args = array(
            'post_type' => POST_TYPE_PROJET,
            'post_status' => 'publish',
            'posts_per_page' => $limit,
            'paged' => $paged,
            'order' => isset($sorting['order']) ? $sorting['order'] : 'DESC',
            'orderby' => isset($sorting['orderby']) ? $sorting['orderby'] : FIELD_PROJET_DATEDEBUT,
            'meta_key' => FIELD_PROJET_DATEDEBUT,
            'fields' => 'ids',);

        if (!is_null($filters['avancement']) and $filters['avancement'] != 'all') {
            $args['tax_query'][] = array(
                'taxonomy' => TAXONOMY_AVANCEMENT_PROJET,
                'field' => 'id',
                'terms' => $filters['avancement'],
                'operator' => 'IN'
            );
        }

        /* format date m/d/y   */
        if (!is_null($filters['date_debut']) && !is_null($filters['date_fin'])) {
            if ($filters['date_debut'] != '' && $filters['date_fin'] != '') {

                $args['meta_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'key' => FIELD_PROJET_DATEDEBUT,
                        'value' => date_i18n('Y-m-d', strtotime(self::changeFormatDate($filters['date_debut']))),
                        'compare' => '>=',
                        'type' => 'DATE'
                    ),
                    array(
                        'key' => FIELD_PROJET_DATEDEBUT,
                        'value' => date_i18n('Y-m-d', strtotime(self::changeFormatDate($filters['date_fin']))),
                        'compare' => '<=',
                        'type' => 'DATE'
                    ),

                );
            }

        } else {

            if (!is_null($filters['date_debut']) && $filters['date_debut'] != '') {
                $args['meta_query'][] = array(
                    'relation' => 'OR',
                    array(
                        'key' => FIELD_PROJET_DATEDEBUT,
                        'value' => date_i18n('Y-m-d', strtotime(self::changeFormatDate($filters['date_debut']))),
                        'compare' => '>=',
                        'type' => 'DATE'
                    ),
                );
            }
            if (!is_null($filters['date_fin']) && $filters['date_fin'] != '') {
                $args['meta_query'][] = array(
                    'relation' => 'OR',
                    array(
                        'key' => FIELD_PROJET_DATEDEBUT,
                        'value' => date_i18n('Y-m-d', strtotime(self::changeFormatDate($filters['date_fin']))),
                        'compare' => '<=',
                        'type' => 'DATE'
                    ),
                );
            }
        };

        if (isset($extra['event_id']) && $extra['event_id'] > 0) {
            $args['meta_query'] = array(
                array(
                    'key' => FIELD_PROJET_SOUSTITRE,
                    'value' => ':"' . $extra['event_id'] . '"',
                    'compare' => 'LIKE',
                )

            );
        }
        $posts = query_posts($args);
        global $wp_query;
        $data = array('posts' => $posts, 'count' => $wp_query->found_posts);
        wp_reset_postdata();
        wp_reset_query();
        return $data;
    }

}

add_action('manage_edit-' . POST_TYPE_PROJET . '_columns', 'CProjet::add_column');
add_action('manage_' . POST_TYPE_PROJET . '_posts_custom_column', 'CProjet::manage_column', 10, 2);
