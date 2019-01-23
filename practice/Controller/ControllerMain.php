<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:41
 */

namespace practice\Controller;

use practice\Model\Redirect;

class ControllerMain extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();
        $this->objectView->generate('main');
    }

    public function logout()
    {
        $auth = new \practice\Model\Authentication();
        $auth->cleanAndDestroySession();

        Redirect::redirect('http://practice/main');
    }

    public function validateIsLogin()
    {
        $objLoginValidation = new \practice\Model\LoginValidation();
        echo $objLoginValidation->checkLogin();
    }

    public function validateIsRegister()
    {
        $objRegistrationValidation = new \practice\Model\RegistrationValidation();
        echo $objRegistrationValidation->checkRegistration();
    }

    public function send()
    {
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('rpz14.sergey@gmail.com')
            ->setPassword('fhlbc2012');

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Wonderful Subject'))
            ->setFrom(['fhlbc2012@gmail.com'])
            ->setTo(['rpz14.sergey@gmail.com'])
            ->setBody('Here is the message itself');

        $mailer->send($message);
    }
}
