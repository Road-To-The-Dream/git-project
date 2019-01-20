<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:41
 */

namespace practice\Controller;


class Controller_Main extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();
        $this->objectView->generate('main');
    }

    public function Logout()
    {
        $auth = new \practice\Model\Authentication();
        $auth->CleanAndDestroySession();
        header('Location: http://practice/main');
    }

    public function ValidateIsLogin()
    {
        $objLoginValidation = new \practice\Model\LoginValidation();
        echo $objLoginValidation->CheckLogin();
    }

    public function ValidateIsRegister()
    {
        $objRegistrationValidation = new \practice\Model\RegistrationValidation();
        echo $objRegistrationValidation->CheckRegistration();
    }
}