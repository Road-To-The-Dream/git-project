<?php

    class Sender implements iTemplate
    {
        private $setFrom;
        private $setTo;
        private $setBody;

        public function Configuration($setFrom, $setTo, $setBody)
        {
            $this->setFrom = $setFrom;
            $this->setTo = $setTo;
            $this->setBody = $setBody;
        }

        public function Send()
        {
            $transport = (new Swift_SmtpTransport('smtp.example.org', 25))
                ->setUsername('your username')
                ->setPassword('your password')
                ->setEncryption('tls');

            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message('Wonderful Subject'))
                ->setFrom(['john@doe.com' => 'John Doe'])
                ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
                ->setBody('Here is the message itself');

            $result = $mailer->send($message);
        }
    }