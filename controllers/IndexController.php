<?php
namespace shop\controllers;

use shop\services\SessionService;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $session = SessionService::getInstance();
        $login = $session->getValue('login');
        if (isset($login)) {
            echo 'Привет, ' . $login;
        } else {
            $session->setValue('login', 'bogdan');
        }

        $this->render('index/index');
    }
}