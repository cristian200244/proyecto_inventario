<?php
namespace App;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;


class Mail
{
    /**
     * @param string $email Conrreo a quien se le enviar
     */
    public static function send(string $email, string $message): void {
        $pw = 'wlaejqxrsgpqolpm';
        $em = 'olveryucuna@gmail.com';
        $transport = Transport::fromDsn("gmail://$em:$pw@default");
        $mailer = new Mailer
        ($transport);

        $emailObject = new Email();
        $emailObject->from($em);
        $emailObject->to($email);
        $emailObject->text($message);

        $mailer->send($emailObject);
    }
}