<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:41
 */

namespace practice\Controller;

use practice\Model\Redirect;
use practice\Model\Authentication;
use practice\Model\LoginValidation;
use practice\Model\RegistrationValidation;
use practice\Model\SendValidate;

class ControllerMain extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();
        $this->objectView->generate('main');
    }

    public function logout()
    {
        $auth = new Authentication();
        $auth->cleanAndDestroySession();

        Redirect::redirect('main');
    }

    public function validateIsLogin()
    {
        $objLoginValidation = new LoginValidation();
        echo $objLoginValidation->checkLogin();
    }

    public function validateIsRegister()
    {
        $objRegistrationValidation = new RegistrationValidation();
        echo $objRegistrationValidation->checkRegistration();
    }

    public function validateSend()
    {
        $objSendValidation = new SendValidate();
        echo $objSendValidation->checkSend($_POST['email'], $_POST['text_message']);
    }
}
