<?php

namespace App\Services;
/**
 * Allows to send mails
 */

class Mail
{
    /**
    *Allows to send a mail from contact page
    * @param string $name User Name
    * @param string $firstname User Firstname
    * @param string $email User email
    * @param string $name User Message
    */
    public static function sendContactMail($name, $tel, $email, $message)
    {
        $to = $email;
        $expediteur = MAILADRESS;
        $email_subject = "Blog Formulaire de contact: $name";
        $email_body = "Vous avez reçu un nouveau message à partir du formulaire de contact du blog.\n\n";
        $email_body .= "Details :\n\nNom: $name\nEmail: $email\nTéléphone: $tel\nMessage: $message\n";
        $email_body .= "Voici le lien de mon cv: " . URL . "pageCv";
        $headers = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-Type: text/plain; charset=utf-8' . "\n";
        $headers .= 'Reply-To:i.fouhal@hotmail.com ' . "\n"; // Reply mail
        $headers .= 'From: "P5 Blog OP"<' . $expediteur . '>' . "\n"; // Sender
        $headers .= 'Delivered-to: ' . $to . "\n"; // Recipient
        mail($to, $email_subject, $email_body, $headers, '-f' . $expediteur);
    }
    /**
    * Allows to send an activation mail to creat an account
    * @param string $name User Name
    * @param string $firstname User Firstname
    * @param string $email User email
    * @param string $name User Message
    */
    public static function sendAccountActivationMail($name, $firstname, $email, $validation_key)
    {
        $to = $email;
        $expediteur = MAILADRESS;
        $email_subject = "Blog P5 confirmation inscription: " . $name . " " . $firstname;
        $email_body = "Vous avez reçu un nouveau message à partir du formulaire d'inscription du blog.\n\n";
        $email_body .= "Details du compte :\n\nNom: $name\nEmail: $email\n\n";
        $email_body .= "Voici le lien de confirmation de votre inscription: " . URL . "?email=" . $email . "&validation_key=" .$validation_key;
        $headers = 'MIME-Version: 1.0' . "\n"; // Version MIME
        $headers .= 'Content-Type: text/plain; charset=utf-8' . "\n";
        $headers .= 'Reply-To:i.fouhal@hotmail.com ' . "\n"; // Reply Mail
        $headers .= 'From: "P5 Blog OP"<' . $expediteur . '>' . "\n"; // Sender
        $headers .= 'Delivered-to: ' . $to . "\n"; // Recipient
        mail($to, $email_subject, $email_body, $headers, '-f' . $expediteur);
    }
}
