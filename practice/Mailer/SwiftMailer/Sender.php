<?php

    require_once 'SwiftMailerTransport.php';

    class Sender
    {
        public function send()
        {
            $mailer = new SwiftMailerTransport();
            $mailer = $mailer->getMailer();
            $message = new SwiftMailerTransport();
            $message = $message->getMessage();
            $result = $mailer->send($message);
            return $result;
        }
    }

