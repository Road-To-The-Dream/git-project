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
    public static function send($config, $email, $send)
    {
        $transport = (new
        \Swift_SmtpTransport($config['host'], $config['port'], $config['encryption']))
            ->setUsername($config['username'])
            ->setPassword($config['password']);

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Shop - LAPTOP'))
            ->setFrom([$config['username']])
            ->setTo([$config['username']])
            ->setBody(self::prepareBody($email, $send), 'text/html');

        $mailer->send($message);
    }

    private static function prepareBody($email, $send)
    {
        $body = '<html>' .
                ' <body>' .
                '<strong>' . 'My email: ' . '</strong>' . $email . '<br>' .
                '<strong>' . 'Body message: ' . '</strong>' . $send .
                ' </body>' .
                '</html>';
        return $body;
    }
}
