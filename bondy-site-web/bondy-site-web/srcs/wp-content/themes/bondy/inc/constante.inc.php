<?php
/*
 * Definir ici les constantes applicatives
 *
 * Essayez de bien organiser la declaration des constantes :
 * en regroupant les mêmes types de constantes
 * en prefixant les mêmes types de constantes
 * et en mettant des commentaires
 *
 * @package WordPress
 * @subpackage bondy
 * @since bondy 1.0
 * @author : Pulse
 */

//post types
define( 'POST_TYPE_ARTICLE', 'article' );
define( 'POST_TYPE_ACTUALITE', 'actualite' );
define( 'POST_TYPE_PAGE', 'page' );
define( 'POST_TYPE_PROJET', 'projet' );
define( 'POST_TYPE_ESPECE_ARBRE', 'espece_arbre' );
define( 'POST_TYPE_TEMOIGNAGE', 'temoignage' );
define( 'POST_TYPE_PARTENAIRE', 'partenaire' );
define( 'POST_TYPE_EQUIPE', 'equipe' );
define('POST_TYPE_ENTREPRISE','entreprise');

//taxonomies
define( 'TAXONOMOMY_CATEGORY', 'category' );
define( 'TAXONOMOMY_TAG', 'post_tag' );
define( 'TAXONOMY_TYPE_ACTUS', 'type_actualite' );
define( 'TAXONOMY_AVANCEMENT_PROJET', 'avancement_projet' );
define( 'TAXONOMY_TYPE_UTILISATION', 'type_utilisation' );
define( 'TAXONOMY_SPECIFICITE', 'specificite' );
define('TAXONOMY_ESPECES_ARBRES','etiquette_especes_arbres');
define('TAXONOMY_ACTUALITES','etiquette_actualites');

//champs personnalisés (meta value) : syntaxe FIELD_{type de post}_{nom du champ}
define ('FIELD_PROJET_SOUSTITRE', 'projet_sousTitre');
define ('FIELD_PROJET_RESUME', 'projet_resume');
define ('FIELD_PROJET_DATEDEBUT', 'projet_dateDebut');
define ('FIELD_PROJET_DATEFIN', 'projet_dateFin');
define ('FIELD_PROJET_CODE', 'projet_code');
define ('FIELD_PROJET_LOCALISATION', 'projet_localisation');

define ('FIELD_AVANCEMENT_PROJET_ICON', 'icon_avancement');
define ('FIELD_TYPE_UTILISATION_ICON', 'pictogramme_utilisation');

define ('FIELD_TEMOIGNAGE_TYPE_TEMOIGNAGE', 'type_de_temoignage');
define ('FIELD_TEMOIGNAGE_TYPE_PHOTO_TEMOIGNAGE', 'photo_temoignage');
define ('FIELD_TEMOIGNAGE_NOM_TEMOIGNEUR', 'nom_temoigneur');
define ('FIELD_TEMOIGNAGE_POSTE_TEMOIGNAGE', 'poste_du_temoigneur');
define ('FIELD_TEMOIGNAGE_CONTENU_TEMOIGNAGE', 'contenu_du_temoignage');
define ('FIELD_TEMOIGNAGE_RELATION', 'relation_temoignage');
define ('FIELD_TEMOIGNAGE_LOCALISATION', 'localisation_du_temoignage');
define ('FIELD_ACTUALITE_RELATION', 'relation_actualite');
define ('FIELD_EQUIPE_RELATION', 'relation_equipe');
define ('FIELD_PROJETS_CONTEXTE', 'contexte_projets');

/*banniere page*/
define('FIELD_BANNIERE_IMAGE','bondy_banniere_image');
define('FIELD_BANNIERE_TITRE','bondy_banniere_titre');
define('FIELD_BANNIERE_DESCRIPTION','bondy_banniere_description');

define ('FIELD_PARTENAIRE_LOGO', 'logo_partenaire');
define ('FIELD_PARTENAIRE_CLIENT', 'client_partenaire');
define ('FIELD_PARTENAIRE_CONCEPT', 'concept_partenaire');
define ('FIELD_PARTENAIRE_TEXT', 'texte_partenaire');
define ('FIELD_PARTENAIRE_LIEN', 'lien_partenaire');
define ('FIELD_PARTENAIRE_RELATION_TITRE', 'relation_partenaire_titre');

define ('FIELD_EQUIPE_PHOTO', 'photo_equipe');
define ('FIELD_EQUIPE_NOM', 'nom_equipe');
define ('FIELD_EQUIPE_PRENOM', 'prenom_equipe');
define ('FIELD_EQUIPE_FONCTION', 'fonction_equipe');
define ('FIELD_EQUIPE_CITATION', 'citation_equipe');
define ('FIELD_EQUIPE_FACEBOOK', 'equipe_facebook');
define ('FIELD_EQUIPE_INSTAGRAM', 'equipe_instagram');
define ('FIELD_EQUIPE_LINKEDIN', 'equipe_linkedin');

define ('FIELD_ESPECE_ARBRE_TITRE', 'titre_espece_darbre');
define ('FIELD_ESPECE_ARBRE_IMGAGE', 'image_espece_darbre');
define ('FIELD_ESPECE_ARBRE_DESCRIPTION', 'description_espece_darbre');
define ('FIELD_ESPECE_ARBRE_PROJET', 'associe_au_projet');
define ('FIELD_ESPECE_ARBRE_TYPE_UTILISATION', 'type_dutilisation');
define ('FIELD_ESPECE_ARBRE_SPECIFICITE', 'specificite_espece_arbre');
define ('FIELD_ESPECE_ARBRE_PROJET_GALERIE', 'galerie_photo');
define ('FIELD_ESPECE_ARBRE_PROJET_TEXTE', 'galerie_texte_decriptif');
define ('FIELD_ESPECE_ARBRE_PROJETS', 'especes_arbres');
define('FIELD_ACTUALITER','actualiter');
/*actualiter*/
define ('FIELD_ACTUALITE_BANNIERE', 'banniere_actualite');
define ('FIELD_IMAGE_ACTUALITE_VEDETTE', 'image_actus_vedette');
define ('FIELD_TITRE_ACTUALITE_VEDETTE', 'titre_actus_veddette');



define ('FIELD_PAGE_ACCUEIL_BIENVENUE', 'bienvenue');
define ('FIELD_PAGE_ACCUEIL_IMG_BIENVENUE', 'image_de_bienvenue');
define ('FIELD_PAGE_ACCUEIL_IMG_BIENVENUE_GRIS', 'image_de_bienvenue_gris');
define ('FIELD_PAGE_ACCUEIL_TEXT_BIENVENUE', 'texte_de_bienvenue');
define ('FIELD_PAGE_ACCUEIL_PROJETS_BONDY', 'projets_bondy');
define ('FIELD_PAGE_ACCUEIL_TITRE_HOME_PROJET_BONDY', 'titre_home_projet_bondy');
define ('FIELD_PAGE_ACCUEIL_SOUS_TITRE_HOME_PROJET_BONDY', 'sous_titre_home_projet_bondy');
define ('FIELD_PAGE_ACCUEIL_PROJETS_EN_AVANT', 'projets_mise_en_avant');
define ('FIELD_PAGE_ACCUEIL_SAVEZ_VOUS_PLANTER', 'savez_vous_planter');
define ('FIELD_PAGE_ACCUEIL_TITRE_SAVEZ_VOUS_PLANTER', 'titre_savez_vous_planter');
define ('FIELD_PAGE_ACCUEIL_SOUS_TITRE_SAVEZ_VOUS_PLANTER', 'sous_titre_savez_vous_planter');
define ('FIELD_PAGE_ACCUEIL_DESC_SAVEZ_VOUS_PLANTER', 'description_savez_vous_planter');
define ('FIELD_PAGE_ACCUEIL_RUBRIQUES_SAVEZ_VOUS_PLANTER', 'rubriques');
define ('FIELD_PAGE_ACCUEIL_TITRE_RUBRIQUES', 'titre_rubrique');
define ('FIELD_PAGE_ACCUEIL_DESC_RUBRIQUES', 'description_rubrique');
define ('FIELD_PAGE_ACCUEIL_ICON_RUBRIQUES', 'icon_rubrique');
define ('FIELD_PAGE_ACCUEIL_MOTS_CLES_RUBRIQUES', 'mots_cles_rubrique');
define ('FIELD_PAGE_ACCUEIL_ICON_MOTS_CLES_RUBRIQUES', 'icon_mots_cles');
define ('FIELD_PAGE_ACCUEIL_TEXT_MOTS_CLES_RUBRIQUES', 'texte_mots_cles');
define ('FIELD_PAGE_ACCUEIL_ENGAGER', 'engager_votre_entreprise');
define ('FIELD_PAGE_ACCUEIL_BANNIERE_ENGAGER', 'banniere_engager_entreprise');
define ('FIELD_PAGE_ACCUEIL_TITRE_ENGAGER', 'titre_engager_votre_entreprise');
define ('FIELD_PAGE_ACCUEIL_SOUS_TITRE_ENGAGER', 'sous_titre_engager_votre_entreprise');
define ('FIELD_PAGE_ACCUEIL_BOUTON_TEXT_ENGAGER', 'texte_bouton_engager_votre_entreprise');
define ('FIELD_PAGE_ACCUEIL_LIEN_TEXT_ENGAGER', 'lien_bouton_engager_votre_entreprise');

define ('FIELD_QUI_SOMMES_NOUS_BANNIERE_TITRE', 'bondy_banner_title');
define ('FIELD_QUI_SOMMES_NOUS_BANNIERE_IMAGE', 'bondy_banner_image');
define ('FIELD_QUI_SOMMES_NOUS_BANNIERE_DESCRIPTION', 'bondy_banniere_description');

define ('FIELD_QUI_SOMMES_NOUS_PILIER_TITRE', 'bondy_banniere_pilier_titre');
define ('FIELD_QUI_SOMMES_NOUS_PILIER_DESCRIPTION', 'bondy_banniere_pilier_description');
define ('FIELD_QUI_SOMMES_NOUS_PILIER_VALEUR', 'bondy_banniere_pilier_valeur');

define ('FIELD_QUI_SOMMES_NOUS_VALEUR_TITRE', 'bondy_banniere_valeurs_titre');
define ('FIELD_QUI_SOMMES_NOUS_VALEUR_IMAGE', 'bondy_banniere_valeurs_image');
define ('FIELD_QUI_SOMMES_NOUS_VALEURS', 'bondy_banniere_valeurs');
define ('FIELD_QUI_SOMMES_NOUS_VALEURS_PICTO', 'bondy_banniere_pilier_valeur_picto');
define('URL_QUI_SOMMES_NOUS','qui-sommes-nous');



define ('FIELD_QUI_SOMMES_NOUS_PARTENAIRE', 'qui_somme_nous_nos_partenaires');
define ('FIELD_QUI_SOMMES_NOUS_PARTENAIRE_DESCRIPTION', 'qui_somme_nous_nos_partenaires_description');

define ('FIELD_PAGE_TITRE', 'titre_page');
define ('FIELD_PAGE_INTRODUCTION', 'introduction_page');

define ('FIELD_BLOC_ILS_PARLENT_DE_NOUS', 'ils_parlent_de_nous');
define ('FIELD_BLOC_ILS_PARLENT_DE_NOUS_SOUS_TITRE', 'sous-titre_du_bloc');
define ('FIELD_BLOC_ILS_PARLENT_DE_NOUS_DESCRIPTION', 'description_du_bloc');

define ('FIELD_BLOC_TOUT_LE_MONDE_EN_PARLENT', 'tout_le_monde_en_parle');
define ('FIELD_BLOC_TOUT_LE_MONDE_EN_PARLENT_SOUS_TITRE', 'titre_du_bloc_tout_le_monde_en_parle');
define ('FIELD_BLOC_TOUT_LE_MONDE_EN_PARLENT_DESCRIPTION', 'description_du_bloc_tout_le_monde_en_parle');


define ('FIELD_BLOC_METTRE_EN_VALEUR_TITRE', 'mettre_en_valeur_mes_terrains');
define ('FIELD_BLOC_METTRE_EN_VALEUR_DESCRIPTION', 'description_mettre_en_valeur');
define ('FIELD_BLOC_METTRE_EN_VALEUR_LIEN', 'en_savoir_plus');
define ('FIELD_BLOC_METTRE_EN_VALEUR_IMAGE', 'image_mettre_en_valeur');
define ('FIELD_BLOC_METTRE_EN_VALEUR', 'mettre_en_valeur');

define ('FIELD_BLOC_NOUS_SOMMES_PRET_CHANGER', 'nous_sommes_pret');
define ('FIELD_BLOC_NOUS_SOMMES_PRET_SOUS_TITRE', 'sous_titre_nous_sommes_pret');

define ('FIELD_ENTREPRISE_CONTENU', 'contenu_de_lentreprise');
define ('FIELD_ENTREPRISE_PRESENTATION_GRAPH', 'presentation_graphique');
define ('FIELD_PARTICULIER_CONTENU', 'contenu_particulier');


//user role
define ('USER_PROFILE_MEMBRE', 'subscriber');
define ('USER_PROFILE_WEBMASTER', 'webmaster');
define ('USER_PROFILE_ADMIN', 'administrator');

//image size
define ('IMAGE_SIZE_ACTUS_VIGNETTE', 'actualite_vignette');
define ('IMAGE_SIZE_ACTUS_MEDIUM', 'actualite_medium');
define ('IMAGE_SIZE_PARTENAIRE', 'partenaire_image');
define ('HOME_WELCOME_MOBILE', 'home_welcome_mobile');
define ('HOME_WELCOME_TABLET', 'home_welcome_tablet');
define ('HOME_WELCOME_DESKTOP', 'home_welcome_desktop');
define ('HOME_PROJET_IMG_STYLE', 'home_projet_img_style');

define ('HOME_PARTENAIRE_MOBILE', 'home_partenaire_mobile');
define ('HOME_PARTENAIRE_DESKTOP', 'home_partenaire_desktop');
define ('HOME_PARTENAIRE_TABLET', 'home_partenaire_tablet');

define ('HOME_PILIER_MOBILE', 'home_pilier_mobile');
define ('HOME_PILIER_DESKTOP', 'home_pilier_desktop');
define ('HOME_PILIER_TABLET', 'home_pilier_tablet');

define ('HOME_CONTEXT_DESKTOP', 'home_context_desktop');
define ('HOME_CONTEXT_TABLET', 'home_context_tablet');

define ('HOME_EQUIPE_DESKTOP', 'home_equipe_desktop');
define ('HOME_EQUIPE_MOBILE', 'home_equipe_mobile');

//....
define('ID_LIST_REJOIGNEZ_LE_MOUVEMENT', 4);
define('ID_LIST_RENDEZ_LE_MONDE_PLUS_VERTE', 5);

define('NOMBRE_PAGINATON_PAR_PAGE', 8);
/*gallery image*/
define('IMAGE_GALLERY', 'image_taille');
define ('IMAGE_ESPECE_ARBRE_MOBILE','image_espece_arbre_mobile');
define ('IMAGE_ESPECE_ARBRE_TABLET','image_espece_arbre_desktop');
define ('IMAGE_ESPECE_ARBRE_DESKTOP','image_espece_arbre_tablet');
define('ACCUEIL','Accueil');
define('NBRE_PAGE_IN_DEBUT',6);
define('URL_QUI_SOMMES_NOUS','qui-sommes-nous');
define('POST_META_ACTUALITE_VEDETTE','actualite_vedette');
/*metaboxe actualiter*/
define('POST_META_ACTUALITER','metaboxe-actualiter');
define('FIELD_ACTUS_EN_VEDETTE','en-vedette');
/*image actus*/
define('IMAGE_ACTUS_MOBILE','image_actus_mobile');
define('IMAGE_ACTUS_TABLET','image_actus_tablet');
define('IMAGE_ACTUS_DESKTOP','image_actus_desktop');
