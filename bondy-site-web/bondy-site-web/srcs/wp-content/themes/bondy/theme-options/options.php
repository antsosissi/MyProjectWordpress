<?php
/**
 * Options du theme
 *
 * ajouter/modifier ici les options du themes
 */

global $bondy_options_settings;

$bondy_options_settings = array(
    'Configuration générale' => array(
        'logo' => array(
            'label' => ' Logo du site - Header',
            'type' => 'image',
            'description' => 'La taille optimale est de 242 X 210 pixels',
        ),
        'logo-retracte' => array(
            'label' => 'Logo du site rétracté – Header',
            'type' => 'image',
            'description' => 'La taille optimale est de 173 X 37 pixels',
        ),
        'logo-footer' => array(
            'label' => 'Logo du site - Footer',
            'type' => 'image',
            'description' => 'La taille optimale est de 242 X 210 pixels',
        ),
        'logo-footer1' => array(
            'label' => 'Logo du site responsive - Footer',
            'type' => 'image',
            'description' => 'La taille optimale est de 173 X 37 pixels',
        ),
        'favicon' => array(
            'label' => 'Favicon',
            'type' => 'image',
            'description' => '',
        ),
        'copyright' => array(
            'label' => 'Copyright',
            'type' => 'text',
            'description' => '',
        ),
        'texte-footer' => array(
            'label' => 'Texte footer',
            'type' => 'textarea',
            'description' => '',
        ),
        'reston-en-contact' => array(
            'label' => 'Restons en contact',
            'type' => 'text',
            'description' => '',
        ),
    ),
    'Réseaux sociaux' => array(
        'facebook' => array(
            'label' => 'Facebook',
            'type' => 'url',
            'description' => '',
        ),

        'linkedin' => array(
            'label' => 'Linked In',
            'type' => 'url',
            'description' => '',
        ),

        'instagram' => array(
            'label' => 'Instagram',
            'type' => 'url',
            'description' => '',
        ),
        'youtube' => array(
            'label' => 'Youtube',
            'type' => 'url',
            'description' => '',
        ),
    ),
    'Contact' => array(
        'telephone' => array(
            'label' => 'Téléphone',
            'type' => 'text',
            'description' => '',
        ),
        'email' => array(
            'label' => 'Email',
            'type' => 'text',
            'description' => '',
        ),
    ),
    'Page d\'accueil' => array(
        'nombrearticle' => array(
            'label' => 'Nombre d\'articles mis en avant',
            'type' => 'select',
            'options' => array(
                5 => '5 articles',
                10 => '10 articles',
                20 => '20 articles'
            ),
            'description' => 'Séléctionnez le nombre d\'articles mis en avant sur la page d\'accueil',
        ),
    ),
    /*'Analytics' => array(
        'ga' => array(
            'label' => 'Google analytics',
            'type' => 'textarea',
            'description' => 'Ajouter ici le script de google analytics',
        ),
    ),*/
    'Favoris' => array(
        'textSuccessAddFavorite' => array(
            'label' => 'Texte succès ajout à la liste des favoris',
            'type' => 'textarea',
        ),
        'titleConfirmationRemoveFavorite' => array(
            'label' => 'Titre confirmation suppression de la liste des favoris',
            'type' => 'text',
        ),
        'textConfirmationRemoveFavorite' => array(
            'label' => 'Texte de confirmation suppression de la liste des favoris',
            'type' => 'textarea',
        ),
        'textSuccessRemoveFavorite' => array(
            'label' => 'Texte succès suppression de la liste de favoris',
            'type' => 'textarea',
        ),
    ),
    'reCAPTCHA' => array(
        'google_captcha_key_public' => array(
            'label' => 'Google captcha clé publique',
            'type' => 'text',
        ),
        'google_captcha_key_private' => array(
            'label' => 'Google captcha clé privé',
            'type' => 'text',
        ),
    ),
    'Newsletter' => array(
        'titleNewsletterFooter' => array(
            'label' => 'Titre du  bloc newsletter footer',
            'type' => 'text',
        ),
        'texteNewsletterFooter' => array(
            'label' => 'Description du newsletter footer',
            'type' => 'textarea',
        ),
        'titleNewsletterPage' => array(
            'label' => 'Titre du bloc  newsletter page',
            'type' => 'text',
        ),
        'texteNewsletterPage' => array(
            'label' => 'Description newsletter - Footer',
            'type' => 'textarea',
        ),
        'texteEmailDejaAbonne' => array(
            'label' => 'Message de confirmation - Déjà abonné',
            'type' => 'textarea',
        ),
        'texteInscriptionNewsletterSucces' => array(
            'label' => 'Message de confirmation - Inscription',
            'type' => 'textarea',
        ),
    ),
    'Notifications par mail - Destinataire' => array(
        'messageNotificationDestinataire' => array(
            'label' => 'Destinataire des notifications par mail - Bôndy',
            'type' => 'text',
        ),
    ),
    'Notifications par mail - Newsletter' => array(
        'mailConfirmationObjet' => array(
            'label' => 'Objet du mail de confirmation Bôndy et demandeur',
            'type' => 'text',
        ),
        'mailConfirmation' => array(
            'label' => 'Mail de confirmation pour Bôndy',
            'type' => 'textarea',
        ),
        'mailConfirmationDemander' => array(
            'label' => 'Mail de confirmation pour demandeur',
            'type' => 'textarea',
        ),
    ),
    'Notifications par mail - Contact' => array(
        'messageNotificationObjet' => array(
            'label' => "Objet du mail - Bôndy et demandeur",
            'type' => 'text',
        ),
        'messageNotificationContenu' => array(
            'label' => 'Contenu de la notification pour Bôndy',
            'type' => 'textarea',
            'description' => 'On peut uliser les jetons (nom => [name], prenom => [prenom], soumission => [soumission])',
        ),
        'messageNotificationContenuDemandeur' => array(
            'label' => 'Contenu de la notification pour demandeur',
            'type' => 'textarea',
            'description' => 'On peut uliser les jetons (nom => [name], prenom => [prenom], soumission => [soumission])',
        ),
    ),
    'Liste dans les formulaires de contact ' => array(
        'region_contact' => array(
            'label' => 'Madagascar - Régions',
            'type' => 'text',
            'description' => 'Séparer les valeurs par un virgule',
        ),
        'message_objet_contact' => array(
            'label' => "Objet de votre message ",
            'type' => 'text',
            'description' => 'Séparer les valeurs par un virgule',
        ),
        'domaine_action_contact' => array(
            'label' => "Entreprise - Domaines d'actions  ",
            'type' => 'text',
            'description' => 'Séparer les valeurs par un virgule',
        ),
        'pays_contact' => array(
            'label' => "Entreprise - Siège (pays)",
            'type' => 'text',
            'description' => 'Séparer les valeurs par un virgule',
        ),
    ),

);
