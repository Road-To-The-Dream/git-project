<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.01.2019
 * Time: 12:07
 */

namespace practice\Controller;

class SendMessage
{
    public static function send($email, $send)
    {
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('rpz14.sergey@gmail.com')
            ->setPassword('fhlbc2012');

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Shop - LAPTOP'))
            ->setFrom(['rpz14.sergey@gmail.com'])
            ->setTo(['rpz14.sergey@gmail.com'])
            ->setBody($email . ' ' . $send);

        $mailer->send($message);
    }
}
