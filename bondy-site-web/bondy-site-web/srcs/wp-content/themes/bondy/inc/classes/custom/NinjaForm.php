<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 11/06/2020
 * Time: 14:16
 */

class NinjaForm
{
    public static function saveForm($formID, $formData, $tittle_forme)
    {

        $form_id = $formID;
        $sub = Ninja_Forms()->form($form_id)->sub()->get();
        $title = $tittle_forme;
        if($title == 'conctat-entreprise') $title = "Entreprise - Besoins";
        if($title == 'contact-terrain-valoriser') $title = "Particulier - Valorisation terrain";
        if($title == 'contact-benevole') $title = "Particulier - Bénévole";
        if($title == 'form_contact_particulier') $title = "Particulier - informations sur Bôndy";
        $dataArray = array();

        foreach ($formData as $field_id => $field_value) {
            if (substr($field_id, 0, 9) == "firstname" ){ $firstname = $field_value;}
            if (substr($field_id, 0, 8) == "lastname" ){ $lastname = $field_value;}
            if (substr($field_id, 0, 12) == "adresse_mail" ){ $clientMail = $field_value;}
            if (substr($field_id, 0, 6) == "phone_" ){ $tel = $field_value;}
            // Objectif
            if (substr($field_id, 0, strlen("quelle_solution_voulez")) == "quelle_solution_voulez" ){ $quelle_solution_voulez = $field_value;}
            // Information sur le terrain
            if (substr($field_id, 0, strlen("quelle_est_la_surface_de_votre_terrain")) == "quelle_est_la_surface_de_votre_terrain" ){ $surface = $field_value;}
            if (substr($field_id, 0, strlen("hectares_preci")) == "hectares_preci" ){ $surfacePreci = $field_value;}
            if (substr($field_id, 0, strlen("dans_quelle_region_de_madagascar")) == "dans_quelle_region_de_madagascar" ){ $region = $field_value;}
             // Budget
            if (substr($field_id, 0, strlen("montant_du_budget")) == "montant_du_budget" ){ $budget = $field_value;}
            if (substr($field_id, 0, strlen("disposez-vous_de_budget")) == "disposez-vous_de_budget" ){ $montant = $field_value;}
            //age
            if (substr($field_id, 0, 3) == "age" ){ $age = $field_value;}
            //localisation
            if (substr($field_id, 0, strlen("localisation")) == "localisation" ){ $localisation = $field_value;}
            //avez_vous_deja_participez_a_des_projets_de_reboisement
            if (substr($field_id, 0, strlen("avez_vous_deja_participez_a_des_projets_de_reboisement")) == "avez_vous_deja_participez_a_des_projets_de_reboisement" ){ $participez_reboisement = $field_value;}
            //objet message
            if (substr($field_id, 0, strlen("objet_de_votre_message")) == "objet_de_votre_message" ){ $objet_de_votre_message = $field_value;}
            // message
            if (substr($field_id, 0, strlen("saisissez_votre_message")) == "saisissez_votre_message" ){ $saisissez_votre_message = $field_value;}
            // compenser_mon_empreinte_carbone
            if (substr($field_id, 0, strlen("compenser_mon_empreinte_carbone")) == "compenser_mon_empreinte_carbone" ){ $compenser_mon_empreinte_carbone = $field_value;}
            // associer_mes_produits_et_services_a_des_arbres_plantes
            if (substr($field_id, 0, strlen("associer_mes_produits_et_services_a_des_arbres_plantes")) == "associer_mes_produits_et_services_a_des_arbres_plantes" ){ $associer_mes_produits_et_services_a_des_arbres_plantes = $field_value;}
            // vegetaliser_mon_site_entreprise
            if (substr($field_id, 0, strlen("vegetaliser_mon_site_entreprise")) == "vegetaliser_mon_site_entreprise" ){ $vegetaliser_mon_site_entreprise = $field_value;}
            // une_solution_rse_personnalisee
            if (substr($field_id, 0, strlen("une_solution_rse_personnalisee")) == "une_solution_rse_personnalisee" ){ $une_solution_rse_personnalisee = $field_value;}
            // quel_est_le_domaine_d_action_de_votre_entreprise
            if (substr($field_id, 0, strlen("quel_est_le_domaine_d_action_de_votre_entreprise")) == "quel_est_le_domaine_d_action_de_votre_entreprise" ){ $quel_est_le_domaine_d_action_de_votre_entreprise = $field_value;}
            // dans_quel_pays_se_trouve_le_siege_de_votre_entreprise
            if (substr($field_id, 0, strlen("dans_quel_pays_se_trouve_le_siege_de_votre_entreprise")) == "dans_quel_pays_se_trouve_le_siege_de_votre_entreprise" ){ $dans_quel_pays_se_trouve_le_siege_de_votre_entreprise = $field_value;}
            // nom_de_la_societe
            if (substr($field_id, 0, strlen("nom_de_la_societe")) == "nom_de_la_societe" ){ $nom_de_la_societe = $field_value;}
            // poste_occupe
            if (substr($field_id, 0, strlen("poste_occupe")) == "poste_occupe" ){ $poste_occupe = $field_value;}
            // departement rse
            if (substr($field_id, 0, strlen("avez-vous_un_departement_rse")) == "avez-vous_un_departement_rse" ){ $departement_rse = $field_value;}
            // terrain disponible
            if (substr($field_id, 0, strlen("avez-vous_des_terrains_disponibles")) == "avez-vous_des_terrains_disponibles" ){ $terrains_disponibles = $field_value;}
            // ajout solution
            if (substr($field_id, 0, strlen("voulez-vous_qu_on_ajoute_cela")) == "voulez-vous_qu_on_ajoute_cela" ){ $ajout_solution = $field_value;}

            $sub->update_field_value($field_id, $field_value);

        }
        $dataArray['title'] = $title;
        $dataArray['firstname'] = $firstname;
        $dataArray['lastname'] = $lastname;
        $dataArray['adresse_mail'] = $clientMail;
        $dataArray['phone'] = $tel;
        /* valoriser*/
        $dataArray['quelle_solution_voulez'] = $quelle_solution_voulez;
        $dataArray['surface'] = $surface;
        $dataArray['surfacePreci'] = $surfacePreci;
        $dataArray['region'] = $region;
        $dataArray['budget'] = $budget;
        $dataArray['montant'] = $montant;
        /* benevole */
        $dataArray['age'] = $age;
        $dataArray['localisation'] = $localisation;
        $dataArray['participez_reboisement'] = $participez_reboisement;
        /* particulier */
        $dataArray['objet_de_votre_message'] = $objet_de_votre_message;
        $dataArray['saisissez_votre_message'] = $saisissez_votre_message;
        /* entreprise */
        $dataArray['compenser_mon_empreinte_carbone'] = $compenser_mon_empreinte_carbone;
        $dataArray['associer_mes_produits_et_services_a_des_arbres_plantes'] = $associer_mes_produits_et_services_a_des_arbres_plantes;
        $dataArray['vegetaliser_mon_site_entreprise'] = $vegetaliser_mon_site_entreprise;
        $dataArray['une_solution_rse_personnalisee'] = $une_solution_rse_personnalisee;
        $dataArray['quel_est_le_domaine_d_action_de_votre_entreprise'] = $quel_est_le_domaine_d_action_de_votre_entreprise;
        $dataArray['dans_quel_pays_se_trouve_le_siege_de_votre_entreprise'] = $dans_quel_pays_se_trouve_le_siege_de_votre_entreprise;
        $dataArray['nom_de_la_societe'] = $nom_de_la_societe;
        $dataArray['poste_occupe'] = $poste_occupe;
        $dataArray['departement_rse'] = $departement_rse;
        $dataArray['terrains_disponibles'] = $terrains_disponibles;
        $dataArray['ajout_solution'] = $ajout_solution;
        $sub->save();
        //user posted variables
        //sendmail
        self::send_mail_contact_form($dataArray,$tittle_forme);
        return "Success";

    }

    public static function send_mail_contact_form($dataArray, $title_forme = '')
    {
        global $bondy_options;
        $title = $dataArray['title'];
        $firstname = $dataArray['firstname'];
        $lastname = $dataArray['lastname'];
        $tel = $dataArray['phone'];
        $sujetmail = $bondy_options['messageNotificationObjet'];
        $messageMailClient = $bondy_options['messageNotificationContenuDemandeur'];

        $bondy_options['messageNotificationDestinataire'] == null ? $mailAdmin = get_option('admin_email') : $mailAdmin = $bondy_options['messageNotificationDestinataire'];
        $mail = $dataArray['adresse_mail'];



        if (empty($messageMailClient)) {
            $messageMailClient = "Bonjour \r\n";
            $messageMailClient .= "Vous venez d'envoyer vos informations. \r\n";
            $messageMailClient .= "L'équipe Bôndy vous remercie";
        }

        /*sujet mail */
        if (!empty($sujetmail)) {
            $subject = $sujetmail;
        } else {
            $subject = "Notification soumission formulaire de contact";
        }
        $headers[] = 'MIME-Version: 1.0' . "\r\n";
        $headers[] = 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers[] = "X-Mailer: PHP \r\n";

        /* pour l'admin*/
        $jeton = array( '[name]', '[prenom]','[soumission]');
        $soumission = self::getHtmlSomission($dataArray, $title_forme);
        $messages = $bondy_options['messageNotificationContenu'];
        $message = str_replace( $jeton, array( $lastname, $firstname, $soumission ), nl2br($messages) );
        $typeMail = 'DEMANDE DE CONTACT';
        ob_start();
        include get_stylesheet_directory() . "/template-part/mail/send-mail.php";
        $html = ob_get_contents();
        ob_clean();
        $sent = wp_mail($mailAdmin, $subject, $html, $headers);
        /* end  */

        /* pour le client */
        $messages = $bondy_options['messageNotificationContenuDemandeur'];
        $message = str_replace( $jeton, array( $lastname, $firstname, $soumission ), nl2br($messages) );
        ob_start();
        include get_stylesheet_directory() . "/template-part/mail/send-mail.php";
        $htmls = ob_get_contents();
        ob_clean();
        $sents = wp_mail($mail, $subject, $htmls, $headers);
        /* end  */
    }


    public static function getHtmlSomission( $dataArray, $form_title ){
        $title = $dataArray['title'];
        $firstname = $dataArray['firstname'];
        $lastname = $dataArray['lastname'];
        $tel = $dataArray['phone'];
        $mail = $dataArray['adresse_mail'];

        /* valoriser*/
        $quelle_solution_voulez = $dataArray['quelle_solution_voulez'];
        $surface = $dataArray['surface'];
        $surfacePreci = $dataArray['surfacePreci'];
        $region = $dataArray['region'];
        $budget = $dataArray['budget'];
        $montant = $dataArray['montant'];

        /* benevole */
        $age = $dataArray['age'];
        $localisation = $dataArray['localisation'];
        $participez_reboisement = $dataArray['participez_reboisement'];

        /* particulier */
        $objet_de_votre_message = $dataArray['objet_de_votre_message'];
        $saisissez_votre_message = $dataArray['saisissez_votre_message'];


        /* entreprise */
        $compenser_mon_empreinte_carbone = $dataArray['compenser_mon_empreinte_carbone'];
        $associer_mes_produits_et_services_a_des_arbres_plantes = $dataArray['associer_mes_produits_et_services_a_des_arbres_plantes'];
        $vegetaliser_mon_site_entreprise = $dataArray['vegetaliser_mon_site_entreprise'];
        $une_solution_rse_personnalisee = $dataArray['une_solution_rse_personnalisee'];
        $quel_est_le_domaine_d_action_de_votre_entreprise = $dataArray['quel_est_le_domaine_d_action_de_votre_entreprise'];
        $dans_quel_pays_se_trouve_le_siege_de_votre_entreprise = $dataArray['dans_quel_pays_se_trouve_le_siege_de_votre_entreprise'];
        $nom_de_la_societe = $dataArray['nom_de_la_societe'];
        $poste_occupe = $dataArray['poste_occupe'];
        $departement_rse = $dataArray['departement_rse'];
        $terrains_disponibles = $dataArray['terrains_disponibles'];
        $ajout_solution = $dataArray['ajout_solution'];
        $html = '';
        switch ( $form_title ){
            case 'conctat-entreprise':
                $html = '
                    <H5>INFORMATIONS PERSONNELLES</H5>
                    <ul>
                        <li><strong>Nom : </strong>' . $lastname . '</li>
                        <li><strong>Prénom : </strong>' . $firstname . '</li>
                        <li><strong>Email : </strong>' . $mail . '</li>
                        <li><strong>Téléphone : </strong>' . $tel . '</li>
                        <li><strong>Nom de la Société : </strong>' . $nom_de_la_societe . '</li>
                        <li><strong>Poste occupé : </strong>' . $poste_occupe . '</li>
                    </ul>
                    <hr>                 
                    <H5>INFORMATIONS SUR VOS BESOINS</H5>
                    <p>Quelle(s) solution(s) voulez-vous constituer ?</p>
                    <ul>
                        <li>
                        <strong>Compenser mon empreinte carbone : </strong> ' . $compenser_mon_empreinte_carbone . ' 
                        </li>
                        <li>
                        <strong>Associer mes produits et services à des arbres plantés : </strong> ' . $associer_mes_produits_et_services_a_des_arbres_plantes . ' 
                        </li>
                        <li>
                        <strong>Végétaliser mon site entreprise : </strong> ' . $vegetaliser_mon_site_entreprise . ' 
                        </li>
                        <li>
                        <strong>Une solution RSE personnalisée : </strong> ' . $une_solution_rse_personnalisee . ' 
                        </li>
                    </ul>
                    <p>Quel est le domaine d\'action de votre entreprise ?</p>
                    <ul>
                        <li>
                        <strong>Domaine d\'action : </strong> ' . $quel_est_le_domaine_d_action_de_votre_entreprise . ' 
                        </li>
                        
                    </ul>
                    <p>Dans quel pays se trouve le siège de votre entreprise ?</p>
                    <ul>
                        <li>
                        <strong>Pays : </strong> ' . $dans_quel_pays_se_trouve_le_siege_de_votre_entreprise . ' 
                        </li>
                        
                    </ul>
                    <p>Avez-vous un département RSE ?</p>
                    <ul>
                        <li>
                        <strong>Département RSE : </strong> ' . $departement_rse . ' 
                        </li>
                        
                    </ul>
                    <p>Avez-vous des terrains disponibles pour votre action ?</p>
                    <ul>
                        <li>
                        <strong>Terrain disponible : </strong> ' . $terrains_disponibles . ' 
                        </li>
                        
                    </ul>
                    <p>Voulez-vous que l\'on ajoute cela à votre solution ?</p>
                    <ul>
                        <li>
                        <strong>Souhait pour la solution : </strong> ' . $ajout_solution . ' 
                        </li>
                        
                    </ul>
                ';
                break;
            case 'contact-terrain-valoriser':
                $html = '
                    <H5>INFORMATIONS PERSONNELLES</H5>
                    <ul>
                        <li><strong>Nom : </strong>' . $lastname . '</li>
                        <li><strong>Prénom : </strong>' . $firstname . '</li>
                        <li><strong>Email : </strong>' . $mail . '</li>
                        <li><strong>Téléphone : </strong>' . $tel . '</li>
                    </ul>
                    <H5>INFORMATIONS SUR VOTRE TERRAIN</H5>
                    <p>Quelle solution voulez-vous adopter ?</p>
                    <ul>
                        <li><strong>Solution : </strong>' . $quelle_solution_voulez . '</li>
                    </ul>
                    <p>Quelle est la surface de votre terrain ?</p>
                    <ul>
                        <li><strong>Surface : </strong>' . $surface . '</li>
                        <li><strong>Surface avec precision : </strong>' . $surfacePreci . '</li>
                    </ul>
                    <p>Dans quelle région de Madagascar se trouve votre terrain ?</p>
                    <ul>
                        <li><strong>Région : </strong>' . $region . '</li>
                    </ul>
                    <p>Disposez-vous de budget pour entreprendre votre projet ?</p>
                    <ul>
                        <li><strong>Budget : </strong>' . $montant . '</li>
                        <li><strong>Montant : </strong>' . $budget . '</li>
                    </ul>
                ';
                break;
            case 'contact-benevole':
                $html = '
                    <H5>INFORMATIONS PERSONNELLES</H5>
                    <ul>
                        <li><strong>Nom : </strong>' . $lastname . '</li>
                        <li><strong>Prénom : </strong>' . $firstname . '</li>
                        <li><strong>Email : </strong>' . $mail . '</li>
                        <li><strong>Téléphone : </strong>' . $tel . '</li>
                        <li><strong>Âge : </strong>' . $age . '</li>
                        <li><strong>Localisation : </strong>' . $localisation . '</li>
                    </ul>
                    <p>Avez vous déjà participez à des projets de reboisement</p>
                    <ul>
                        <li><strong>participation : </strong>' . $participez_reboisement . '</li>
                    </ul>
                ';
                break;
            case 'form_contact_particulier':
                $html = '
                    <H5>INFORMATIONS PERSONNELLES</H5>
                    <ul>
                        <li><strong>Nom : </strong>' . $lastname . '</li>
                        <li><strong>Prénom : </strong>' . $firstname . '</li>
                        <li><strong>Email : </strong>' . $mail . '</li>
                        <li><strong>Téléphone : </strong>' . $tel . '</li>
                    </ul>
                    <H5>MESSAGE</H5>
                    <ul>
                        <li><strong>Objet de votre message : </strong>' . $objet_de_votre_message . '</li>
                        <li><strong>Contenu de la message : </strong>' . $saisissez_votre_message . '</li>
                    </ul>                   
                ';
                break;
            default:
                break;
        }

        return $html;
    }

}