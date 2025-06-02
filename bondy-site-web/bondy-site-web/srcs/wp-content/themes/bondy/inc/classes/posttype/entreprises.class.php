<?php
/**
 * Created by PhpStorm.
 * Date: 08/06/2020
 * Time: 11:28
 */

class CEntreprise
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

                //banner Image
                $bondy_banniere_image = get_field('bondy_banniere_image', $p->ID);
                if ($bondy_banniere_image) {
                    $element->bondy_banniere_image = $bondy_banniere_image;
                }
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
                //Titre page
                $titre_page = get_field('titre_page', $p->ID);
                if ($titre_page) {
                    $element->titre_page = $titre_page;
                }
                //introduction page
                $introduction_page = get_field('introduction_page', $p->ID);
                if ($introduction_page) {
                    $element->introduction_page = $introduction_page;
                }
                //contenu entreprise
                $presentation_graphique = get_field('presentation_graphique', $p->ID);
                if ($presentation_graphique) {
                    $element->presentation_graphique = $presentation_graphique;
                }

                $contenu_de_lentreprise = get_field('contenu_de_lentreprise', $p->ID);
                if ($contenu_de_lentreprise) {
                    $element->contenu_de_lentreprise = $contenu_de_lentreprise;
                }
                //Nos partenaire
                $partenaire_titre = get_field('qui_somme_nous_nos_partenaires', $p->ID);
                if ($partenaire_titre) {
                    $element->partenaire_titre = $partenaire_titre;
                }
                $partenaire_description = get_field('qui_somme_nous_nos_partenaires_description', $p->ID);
                if ($partenaire_description) {
                    $element->partenaire_description = $partenaire_description;
                }
                $associe_partenaire_id = get_field('relation_partenaire_titre', $p->ID);
                if ($associe_partenaire_id) {
                    $element->associe_partenaire_id = $associe_partenaire_id;
                }
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

                //relation temoignage
                $relation_temoignage_id = get_field(FIELD_TEMOIGNAGE_RELATION,$p->ID);
                if ($relation_temoignage_id) {
                    $element->relation_temoignage_id = $relation_temoignage_id;
                }
                //representation graphique

                $titre_representation_1 = get_field('titre_representation_1', $p->ID);
                if ($titre_representation_1) {
                    $element->titre_representation_1 = $titre_representation_1;
                }

                $titre_representation_2 = get_field('titre_representation_2', $p->ID);
                if ($titre_representation_2) {
                    $element->titre_representation_2 = $titre_representation_2;
                }

                $titre_representation_3 = get_field('titre_representation_3', $p->ID);
                if ($titre_representation_3) {
                    $element->titre_representation_3 = $titre_representation_3;
                }

                $titre_representation_4 = get_field('titre_representation_4', $p->ID);
                if ($titre_representation_4) {
                    $element->titre_representation_4 = $titre_representation_4;
                }

                $titre_representation_5 = get_field('titre_representation_5', $p->ID);
                if ($titre_representation_5) {
                    $element->titre_representation_5 = $titre_representation_5;
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