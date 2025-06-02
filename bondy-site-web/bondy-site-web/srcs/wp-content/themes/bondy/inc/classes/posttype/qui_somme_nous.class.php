<?php
/**
 * Created by PhpStorm.
 * Date: 07/05/2020
 * Time: 11:12
 */
class Qsomme_nous
{

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
    private static function _load($pid)
    {
        $pid = intval($pid);
        $p   = get_post($pid);

        if ($p->post_type == POST_TYPE_PAGE) {
            $element = new stdClass();

            //traitement des données
            $element->id = $p->ID;
            $element->titre = $p->post_title;
            $element->extrait = !empty($p->post_excerpt) ? wp_limite_text($p->post_excerpt, 300) : wp_limite_text(strip_tags(strip_shortcodes($p->post_content)), 300);
            $element->description = $p->post_content;
            $element->auteur = $p->post_author;

            //champs personnalisés
            if (class_exists('Acf')) {

                //page qui sommes nous
                if (get_page_template_slug($p->ID) == 'page-templates/qui-sommes-nous.php') {
                    //banner Image
                    $bondy_banniere_image = get_field('bondy_banniere_image', $p->ID);
                    $element->bondy_banniere_image = ( !empty($bondy_banniere_image) ) ? $bondy_banniere_image : get_template_directory_uri() . '/images/default.jpg';
                    //banner Titre
                    $bondy_banniere_titre = get_field('bondy_banniere_titre', $p->ID);
                    if ($bondy_banniere_titre) {
                        $element->bondy_banniere_titre = $bondy_banniere_titre;
                    }
                    //banner description
                    $bondy_banniere_description = get_field('bondy_banniere_description', $p->ID);
                    if ($bondy_banniere_description) {
                        $element->bondy_banniere_description = $bondy_banniere_description;
                    }

                    /* BLOC VALEUR */
                    //valeurs titre
                    $bondy_banniere_valeurs_titre = get_field('bondy_banniere_valeurs_titre', $p->ID);
                    if ($bondy_banniere_valeurs_titre) {
                        $element->bondy_banniere_valeurs_titre = $bondy_banniere_valeurs_titre;
                    }

                    //valeurs image
                    $bondy_banniere_valeurs_image = get_field('bondy_banniere_valeurs_image', $p->ID);
                    $element->bondy_banniere_valeurs_image = ( !empty( $bondy_banniere_valeurs_image ) ) ? $bondy_banniere_valeurs_image : get_template_directory_uri() . '/images/default.jpg';

                    //valeurs
                    $bondy_banniere_valeurs = get_field('bondy_banniere_valeurs', $p->ID);
                    if ($bondy_banniere_valeurs) {
                        $element->bondy_banniere_valeurs = $bondy_banniere_valeurs;

                    }

                    /* BLOC PILIER */
                    //titre
                    $bondy_banniere_pilier_titre = get_field('bondy_banniere_pilier_titre', $p->ID);
                    if ($bondy_banniere_pilier_titre) {
                        $element->bondy_banniere_pilier_titre = $bondy_banniere_pilier_titre;
                    }
                    //pilier description
                    $bondy_banniere_pilier_description = get_field('bondy_banniere_pilier_description', $p->ID);
                    if ($bondy_banniere_pilier_description) {
                        $element->bondy_banniere_pilier_description = $bondy_banniere_pilier_description;
                    }

                    //pilier description
                    $nos_pilier = get_field('bondy_banniere_pilier_valeur', $p->ID);
                    if ($nos_pilier) {
                        $element->bondy_banniere_pilier_valeur = $nos_pilier;
                    }


                    // PARTENAIRE
                    //titre
                    $partenaire_titre = get_field('qui_somme_nous_nos_partenaires', $p->ID);

                    if ($partenaire_titre) {
                        $element->partenaire_titre = $partenaire_titre;
                    }
                    // description
                    $partenaire_description = get_field('qui_somme_nous_nos_partenaires_description', $p->ID);
                    if ($partenaire_description) {
                        $element->partenaire_description = $partenaire_description;
                    }
                    //Associer à un partenaire
                    $element->associe_partenaire_id = get_field(FIELD_PARTENAIRE_RELATION_TITRE, $p->ID);

                }

            }
            //stocker dans le tableau statique
            self::$_elements[$pid] = $element;
        }
    }
    public static function getBy($data_filters = array(), $tax = null)
    {
        $args = array(
            'post_type' => POST_TYPE_PAGE,
            'post_status' => 'publish',
            'numberposts' => -1,
            'offset' => 0,
            'order' => 'DESC',
            'orderby' => 'date',
            'fields' => 'ids'
        );
        $elements = get_posts($args);
        $elts = array();
        foreach ($elements as $id) {
            $elt = self::getById(intval($id));
            $elts[] = $elt;
        }
        return $elts;

    }
}