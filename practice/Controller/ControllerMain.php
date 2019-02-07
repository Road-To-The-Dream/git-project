<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:41
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Product;
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
        View::generate('main');
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
        $objSendValidation->setEmail($_POST['email']);
        $objSendValidation->setText($_POST['text_message']);
        echo $objSendValidation->checkSend();
    }

    public function search()
    {
        $obj = new Product();
        $obj->setName($_POST['query']);
        echo json_encode($obj->selectProductSearch());
    }
}
