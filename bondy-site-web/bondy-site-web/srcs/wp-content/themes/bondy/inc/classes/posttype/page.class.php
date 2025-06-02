<?php
/**
 * classe de service pour le type de publication page
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

class CPage
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
        $p = get_post($pid);

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
                //page accueil
                if (get_page_template_slug($p->ID) == 'page-templates/accueil.php') {
                    $bienvenue = get_field(FIELD_PAGE_ACCUEIL_BIENVENUE, $p->ID);
                    if ($bienvenue) {
                        //Image de bienvenue
                        $element->image_de_bienvenue_id = $bienvenue[FIELD_PAGE_ACCUEIL_IMG_BIENVENUE];
                        $image_de_bienvenue_gris = $bienvenue[FIELD_PAGE_ACCUEIL_IMG_BIENVENUE_GRIS];
                        list( $url_image_de_bienvenue_gris ) = ( !empty( $image_de_bienvenue_gris ) ) ? wp_get_attachment_image_src($image_de_bienvenue_gris, HOME_WELCOME_DESKTOP) : array( get_template_directory_uri() . '/assets/images/prehome-initial.jpg' );
                        $element->image_de_bienvenue_gris = $url_image_de_bienvenue_gris;
                        //Texte de bienvenue
                        $element->texte_de_bienvenue = $bienvenue[FIELD_PAGE_ACCUEIL_TEXT_BIENVENUE];
                    }

                    //bloc projet bondy
                    $projets_bondy = get_field(FIELD_PAGE_ACCUEIL_PROJETS_BONDY, $p->ID);
                    if ($projets_bondy) {
                        //Titre bloc projet bondy
                        $element->titre_home_projet_bondy = $projets_bondy[FIELD_PAGE_ACCUEIL_TITRE_HOME_PROJET_BONDY];

                        //Sous titre bloc projet bondy
                        $element->sous_titre_home_projet_bondy = $projets_bondy[FIELD_PAGE_ACCUEIL_SOUS_TITRE_HOME_PROJET_BONDY];

                        //Projets mise en avant
                        if ($projets_bondy[FIELD_PAGE_ACCUEIL_PROJETS_EN_AVANT] && count($projets_bondy[FIELD_PAGE_ACCUEIL_PROJETS_EN_AVANT]) > 0) {
                            $element->projets_mise_en_avant = $projets_bondy[FIELD_PAGE_ACCUEIL_PROJETS_EN_AVANT];
                            $element->count_projets_mise_en_avant = count($projets_bondy[FIELD_PAGE_ACCUEIL_PROJETS_EN_AVANT]);
                        } else {
                            $today = date_i18n("Ymd");

                            $a_projets_mise_en_avant = CProjet::getBy(10, array('order' => 'ASC', 'orderby' => 'meta_value'), array('date_now' => $today));
                            $element->projets_mise_en_avant = $a_projets_mise_en_avant;
                            $element->count_projets_mise_en_avant = count($a_projets_mise_en_avant);
                        }
                    }

                    //bloc savez-vous planter des arbres
                    $savez_vous_planter = get_field(FIELD_PAGE_ACCUEIL_SAVEZ_VOUS_PLANTER, $p->ID);
                    if ($savez_vous_planter) {
                        //titre savez-vous planter
                        $element->titre_svp = $savez_vous_planter[FIELD_PAGE_ACCUEIL_TITRE_SAVEZ_VOUS_PLANTER];

                        //sous-titre savez-vous planter
                        $element->sous_titre_svp = $savez_vous_planter[FIELD_PAGE_ACCUEIL_SOUS_TITRE_SAVEZ_VOUS_PLANTER];

                        //description savez-vous planter
                        $element->desc_svp = $savez_vous_planter[FIELD_PAGE_ACCUEIL_DESC_SAVEZ_VOUS_PLANTER];

                        //Rubriques
                        $rubriques = $savez_vous_planter[FIELD_PAGE_ACCUEIL_RUBRIQUES_SAVEZ_VOUS_PLANTER];
                        if ($rubriques) {
                            $element->rubriques = $rubriques;
                            $element->count_rubriques = count($rubriques);
                        }


                    }

                    //bloc engager votre entreprise
                    $engager = get_field(FIELD_PAGE_ACCUEIL_ENGAGER, $p->ID);
                    if ($engager) {
                        $element->is_engager = true;

                        //bannière bloc engager
                        $element->banniere_engager_id = $engager[FIELD_PAGE_ACCUEIL_BANNIERE_ENGAGER];

                        //titre bloc engager
                        $element->titre_engager = $engager[FIELD_PAGE_ACCUEIL_TITRE_ENGAGER];

                        //sous-titre bloc engager
                        $element->sous_titre_engager = $engager[FIELD_PAGE_ACCUEIL_SOUS_TITRE_ENGAGER];

                        //texte bouton bloc engager
                        $element->bouton_text_engager = $engager[FIELD_PAGE_ACCUEIL_BOUTON_TEXT_ENGAGER];
                        $element->bouton_lien_engager = $engager[FIELD_PAGE_ACCUEIL_LIEN_TEXT_ENGAGER];
                    } else {
                        $element->is_engager = false;
                    }


                    // Bloc ils_parlent_de_nous


                        //ils parlent de nous sous titre du bloc
                        $sous_titre_du_bloc = get_field(FIELD_BLOC_ILS_PARLENT_DE_NOUS_SOUS_TITRE,$p->ID);
                        if ($sous_titre_du_bloc) {
                            $element->ils_parlent_de_nous_titre = $sous_titre_du_bloc;
                        }

                        //ils parlent de nous description
                        $description_du_bloc = get_field(FIELD_BLOC_ILS_PARLENT_DE_NOUS_DESCRIPTION,$p->ID);
                        if ($description_du_bloc) {
                            $element->ils_parlent_de_nous_description = $description_du_bloc;
                        }

                        //ils parlent de nous erlation temoignage
                        $relation_temoignage_id = get_field(FIELD_TEMOIGNAGE_RELATION,$p->ID);
                        if ($relation_temoignage_id) {
                            $element->relation_temoignage_id = $relation_temoignage_id;
                        }

                    // Bloc tout le monde en parle
                    $tout_le_monde_en_parle = get_field(FIELD_BLOC_TOUT_LE_MONDE_EN_PARLENT, $p->ID);

                    if ($tout_le_monde_en_parle) {

                        //Tout le monde en parle sous titre du bloc
                        $sous_titre_du_blocs = $tout_le_monde_en_parle[FIELD_BLOC_TOUT_LE_MONDE_EN_PARLENT_SOUS_TITRE];
                        if ($sous_titre_du_blocs) {
                            $element->tout_le_monde_parle_titre = $sous_titre_du_blocs;
                        }

                        //Tout le monde en parle description
                        $description_du_blocs = $tout_le_monde_en_parle[FIELD_BLOC_TOUT_LE_MONDE_EN_PARLENT_DESCRIPTION];
                        if ($description_du_blocs) {
                            $element->tout_le_monde_parle_description = $description_du_blocs;
                        }

                        //Tout le monde en parle relation actualité
                        $relation_actualite_id = $tout_le_monde_en_parle[FIELD_ACTUALITE_RELATION];
                        if ($relation_actualite_id) {
                            $element->relation_actualite_id = $relation_actualite_id;
                        }
                    }


                    //bloc mettre en valeur nos terrains
                    $mettre_en_valeur = get_field(FIELD_BLOC_METTRE_EN_VALEUR, $p->ID);
                    if ($mettre_en_valeur) {
                        //Mettre en valeur mes terrain titre*/
                        $mettre_en_valeur_mes_terrains = $mettre_en_valeur[FIELD_BLOC_METTRE_EN_VALEUR_TITRE];
                        if ($mettre_en_valeur_mes_terrains != "") {
                            $element->mettre_en_valeur_mes_terrains = $mettre_en_valeur_mes_terrains;
                        }


                        //Mettre en valeur mes terrain description
                        $description_mettre_en_valeur = $mettre_en_valeur[FIELD_BLOC_METTRE_EN_VALEUR_DESCRIPTION];
                        if ($description_mettre_en_valeur) {
                            $element->description_mettre_en_valeur = $description_mettre_en_valeur;
                        }

                        //Mettre en valeur mes terrain lien
                        $en_savoir_plus = $mettre_en_valeur[FIELD_BLOC_METTRE_EN_VALEUR_LIEN];
                        if ($en_savoir_plus) {
                            $element->en_savoir_plus = $en_savoir_plus;
                        }

                        //mp($en_savoir_plus);

                        //Mettre en valeur mes terrain image
                        $image_mettre_en_valeur = $mettre_en_valeur[FIELD_BLOC_METTRE_EN_VALEUR_IMAGE];
                        if ($image_mettre_en_valeur) {
                            $element->image_mettre_en_valeur = $image_mettre_en_valeur;
                        }
                    }

                    //bloc equipe
                    $somme_pret = get_field(FIELD_BLOC_NOUS_SOMMES_PRET_CHANGER, $p->ID);
                    if ($somme_pret) {
                        $element->nous_sommes_pret_sous_titre = $somme_pret['sous-titre_du_bloc'];
                        $element->relation_equipe_id = get_field(FIELD_EQUIPE_RELATION, $p->ID);
                    }

                } else if (get_page_template_slug($p->ID) == 'page-templates/qui-sommes-nous.php') {

                    
                    //pilier titre
                    $bondy_banniere_pilier_titre = get_field('bondy_banniere_pilier_titre', $p->ID);
                    if ($bondy_banniere_pilier_titre) {
                        $element->bondy_banniere_pilier_titre = $bondy_banniere_pilier_titre;
                    }
                    //pilier description
                    $bondy_banniere_pilier_description = get_field('bondy_banniere_pilier_description', $p->ID);
                    if ($bondy_banniere_pilier_description) {
                        $element->bondy_banniere_pilier_description = $bondy_banniere_pilier_description;
                    }

                    //pilier valeurs
                    $bondy_banniere_pilier_valeur = get_field('bondy_banniere_pilier_valeur', $p->ID);
                    if ($bondy_banniere_pilier_valeur) {
                        $element->bondy_banniere_pilier_valeur = $bondy_banniere_pilier_valeur;
                    }
                    //Associer à un partenaire
                    $element->associe_partenaire_id = get_field(FIELD_PARTENAIRE_RELATION_TITRE, $p->ID);

                    //Nos partenaire
                    $qui_somme_nous_nos_partenaires = get_field('qui_somme_nous_nos_partenaires', $p->ID);
                    if ($qui_somme_nous_nos_partenaires) {
                        $element->qui_somme_nous_nos_partenaires = $qui_somme_nous_nos_partenaires;
                    }

                    //Nos partenaire description
                    $qui_somme_nous_nos_partenaires_description = get_field('qui_somme_nous_nos_partenaires_description', $p->ID);
                    if ($qui_somme_nous_nos_partenaires_description) {
                        $element->qui_somme_nous_nos_partenaires_description = $qui_somme_nous_nos_partenaires_description;
                    }
                }

                if (get_page_template_slug($p->ID) != 'page-templates/accueil.php') {

                    //valeurs titre
                    $bondy_banniere_valeurs_titre = get_field('bondy_banniere_valeurs_titre', $p->ID);
                    if ($bondy_banniere_valeurs_titre) {
                        $element->bondy_banniere_valeurs_titre = $bondy_banniere_valeurs_titre;
                    }
                    //valeurs image
                    $bondy_banniere_valeurs_image = get_field('bondy_banniere_valeurs_image', $p->ID);
                    if ($bondy_banniere_valeurs_image) {
                        $element->bondy_banniere_valeurs_image = $bondy_banniere_valeurs_image;
                    }
                    //valeurs
                    $bondy_banniere_valeurs = get_field('bondy_banniere_valeurs', $p->ID);
                    if ($bondy_banniere_valeurs) {
                        $element->bondy_banniere_valeurs = $bondy_banniere_valeurs;
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
                }

                if (get_page_template_slug($p->ID) == 'page-templates/page-projets-bondy.php'){

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

                    // Actualité
                    $relation_actualite_id = get_field('relation_actualite', $p->ID);
                    if ($relation_actualite_id) {
                        $element->relation_actualite_id = $relation_actualite_id;
                    }
                    $tout_le_monde_parle_titre = get_field('titre_du_bloc_tout_le_monde_en_parle', $p->ID);
                    if ($tout_le_monde_parle_titre) {
                        $element->tout_le_monde_parle_titre = $tout_le_monde_parle_titre;
                    }
                    $tout_le_monde_parle_description = get_field('description_du_bloc_tout_le_monde_en_parle', $p->ID);
                    if ($tout_le_monde_parle_description) {
                        $element->tout_le_monde_parle_description = $tout_le_monde_parle_description;
                    }

                    // Projet
                      // Contexte du projet
                    $context = get_field(FIELD_PROJETS_CONTEXTE, $p->ID);
                    if ($context) {
                        $element->context_projet = $context;
                    }
                      // Espece d'arbres
                    $espece_arbre = get_field(FIELD_ESPECE_ARBRE_PROJETS, $p->ID);
                    if ($espece_arbre) {
                        $element->espece_arbre = $espece_arbre;
                    }
                }
                if (get_page_template_slug($p->ID) == 'page-templates/especes-d-arbres.php'){
                    // Espece d'arbres
                    $espece_arbre = get_field(FIELD_ESPECE_ARBRE_PROJETS, $p->ID);
                    if ($espece_arbre) {
                        $element->espece_arbre = $espece_arbre;
                    }
                    $image_banniere = get_field(FIELD_BANNIERE_IMAGE, $p->ID);
                    $element->image_banniere = (!empty($image_banniere) && $image_banniere > 0) ? wp_get_attachment_image_url($image_banniere, FIELD_ESPECE_ARBRE_IMGAGE) : get_template_directory_uri() . '/images/default.jpg';
                    $element->titre_banniere = get_field(FIELD_BANNIERE_TITRE, $p->ID);
                    $element->description_banneur = get_field(FIELD_BANNIERE_DESCRIPTION, $p->ID);

                    //ils parlent de nous sous titre du bloc
                    $sous_titre_du_bloc = get_field(FIELD_BLOC_ILS_PARLENT_DE_NOUS_SOUS_TITRE,$p->ID);
                    if ($sous_titre_du_bloc) {
                        $element->ils_parlent_de_nous_titre = $sous_titre_du_bloc;
                    }

                    //ils parlent de nous description
                    $description_du_bloc = get_field(FIELD_BLOC_ILS_PARLENT_DE_NOUS_DESCRIPTION,$p->ID);
                    if ($description_du_bloc) {
                        $element->ils_parlent_de_nous_description = $description_du_bloc;
                    }

                    //ils parlent de nous erlation temoignage
                    $relation_temoignage_id = get_field(FIELD_TEMOIGNAGE_RELATION,$p->ID);
                    if ($relation_temoignage_id) {
                        $element->relation_temoignage_id = $relation_temoignage_id;
                    }
                }
                if (get_page_template_slug($p->ID) == 'page-templates/actualites.php'){
                    //liste actualiter
                    $context = get_field(FIELD_ACTUALITER, $p->ID);
                    if ($context) {
                        $element->context_projet = $context;
                    }
                    //actualiter mise en avant
                    $relation_actualite_id = get_field(FIELD_ACTUALITE_RELATION, $p->ID);
                    if ($relation_actualite_id) {
                        $element->relation_actualite_id = $relation_actualite_id;
                    }

                    //image banneur
                    $image_banniere = get_field(FIELD_BANNIERE_IMAGE, $p->ID);
                    $element->image_banniere = (!empty($image_banniere) && $image_banniere > 0) ? wp_get_attachment_image_url($image_banniere, FIELD_ESPECE_ARBRE_IMGAGE) : get_template_directory_uri() . '/images/default.jpg';
                    $element->titre_banniere = get_field(FIELD_BANNIERE_TITRE, $p->ID);
                    $element->description_banneur = get_field(FIELD_BANNIERE_DESCRIPTION, $p->ID);

                    //ils parlent de nous sous titre du bloc
                    $sous_titre_du_bloc = get_field(FIELD_BLOC_ILS_PARLENT_DE_NOUS_SOUS_TITRE,$p->ID);
                    if ($sous_titre_du_bloc) {
                        $element->ils_parlent_de_nous_titre = $sous_titre_du_bloc;
                    }

                    //ils parlent de nous description
                    $description_du_bloc = get_field(FIELD_BLOC_ILS_PARLENT_DE_NOUS_DESCRIPTION,$p->ID);
                    if ($description_du_bloc) {
                        $element->ils_parlent_de_nous_description = $description_du_bloc;
                    }

                    //ils parlent de nous erlation temoignage
                    $relation_temoignage_id = get_field(FIELD_TEMOIGNAGE_RELATION,$p->ID);
                    if ($relation_temoignage_id) {
                        $element->relation_temoignage_id = $relation_temoignage_id;
                    }
                }

                if ( get_page_template_slug($p->ID) == 'page-templates/contact.php' ){
                    $element->description = get_field('description_contact', $p->ID);
                }


            }


        }
        self::$_elements[$pid] = $element;
    }

    public static function getVariableJS($simple, $idForm){
        echo "<script> var _$simple = form.fields; var id_$simple = $idForm</script>";
    }

    //captcha

}