<?php
/**
 * Created by PhpStorm.
 * User: Fanomezana
 * Date: 04/05/2020
 * Time: 11:26
 */

class MailPoet
{

    public static function subscribeMail($mail,$loc)
    {
        global $bondy_options;
        $response = "";
        $titreSuccess = "Confirmation INSCRIPTION";
        $titreErreur = "DESOLE ! UNE ERREUR EST SURVENUE";
        $Erreur = "Veuillez s'il vous plaît réessayer ultérieurement !";
        $DejaAbonner = $bondy_options["texteEmailDejaAbonne"];
        $Success = $bondy_options["texteInscriptionNewsletterSucces"];
        if (class_exists(\MailPoet\API\API::class)) {

            $mailpoet_api = \MailPoet\API\API::MP('v1');
            //add subscriber societes
            $Mail = str_replace(' ', '', $mail);
            $isNew = FALSE;
            $isExist = FALSE;
            try {
                $subcriber = $mailpoet_api->getSubscriber($Mail);
                $isExist = TRUE;
            } catch (Exception $exception) {
                $isNew = TRUE;
            }

            if($isExist){
                /* deja abonner */
                $response = "0/".$titreSuccess."/".$DejaAbonner;
                return $response;
            }

            if ($isNew || $isExist == FALSE) {
                try {
                    $mailpoet_api->addSubscriber(
                        array(
                            "email" => $Mail,
                        ),
                        array(),
                        array(
                            "skip_subscriber_notification" => false,
                            "schedule_welcome_email" => false
                        )
                    );
                    $response = "1/".$titreSuccess."/".$Success;
                    try {
                        $mailpoet_api->subscribeToList($mail, array(),array(
                                "skip_subscriber_notification" => false,
                                "schedule_welcome_email" => false
                            )
                        );

                    } catch (Exception $exception) {

                    }
                    /*sujet mail */
                    $bondy_options['messageNotificationDestinataire'] == null ? $mailAdmin = get_option('admin_email') : $mailAdmin = $bondy_options['messageNotificationDestinataire'];
                    $sujetmail = $bondy_options['mailConfirmationObjet'];
                    if (!empty($sujetmail)) {
                        $subject = $sujetmail;
                    } else {
                        $subject = "Notification abonnement";
                    }
                    $typeMail = 'INSCRIPTION - NEWSLETTER';
                    $title = 'ABONNEMENT';
                    $headers[] = 'MIME-Version: 1.0' . "\r\n";
                    $headers[] = 'Content-type: text/html; charset=UTF-8' . "\r\n";
                    $headers[] = "X-Mailer: PHP \r\n";
                    $messages = $bondy_options['mailConfirmation'];
                    $jeton = array( '[mail]');
                    $message = str_replace( $jeton, array( $Mail ), nl2br($messages) );
                    ob_start();
                    include get_stylesheet_directory() . "/template-part/mail/send-mail.php";
                    $htmls = ob_get_contents();
                    ob_clean();
                    $sents = wp_mail($mailAdmin, $subject, $htmls, $headers);
                    $message = $bondy_options['mailConfirmationDemander'];
                    $message = str_replace( $jeton, array( $Mail ), nl2br($message) );
                    ob_start();
                    include get_stylesheet_directory() . "/template-part/mail/send-mail.php";
                    $htmlDemander = ob_get_contents();
                    ob_clean();

                    $sents = wp_mail($Mail, $subject, $htmlDemander, $headers);
                    return $response;
                } catch (Exception $exception) {
                    //$isExist = FALSE;
                    $response = "2/".$titreErreur."/".$exception->getMessage();
                    return $response;
                }
            }
        }
        $response = "2/".$titreErreur."/".$Erreur;
        return $response;
    }
}