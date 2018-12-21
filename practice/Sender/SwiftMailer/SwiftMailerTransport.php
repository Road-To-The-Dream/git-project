<?php

    require_once 'TransportInterface.php';
    require_once 'Render.php';
    require_once 'vendor/autoload.php';

    class SwiftMailerTransport implements iTransport
    {
        private $config;
        private $mailer;
        private $message;

        public function __construct()
        {
            $this->config = require_once 'config.php';
        }

        public function createTransport()
        {
            $config = $this->config;

            $transport = (new Swift_SmtpTransport($config['host'], $config['port']))
                ->setUsername($config['username'])
                ->setPassword($config['password'])
                ->setEncryption($config['encryption']);
            return $transport;
        }

        public function createMailer()
        {
            $transport = $this->createTransport();
            $mailer = new Swift_Mailer($transport);
            return $mailer;
        }

        public function getMailer()
        {
            if (null == $this->mailer)
            {
                $this->mailer = $this->createMailer();
            }
            return $this->mailer;
        }

        public function getMessage()
        {
            if (null == $this->message)
            {
                $this->message = $this->createMessage();
            }
            return $this->message;
        }

        public function createMessage(){
            $params = new Render();
            $params = $params->getSendingData();

            $page = new Render();
            $page = $page->loadFile();
            $message = (new Swift_Message($params['subject']))
                ->setFrom([$params['fromEmail'] => $params['fromName']])
                ->setTo([$params['email'], $params['email'] =>$params['firstName']])
                ->setBody($page, 'text/html');
            return $message;
        }
    }