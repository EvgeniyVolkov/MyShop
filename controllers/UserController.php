<?php
namespace shop\controllers;

use shop\models\User;
//use shop\helper\Category as HelperCategory; // 1

class UserController extends BaseController
{
    public function allAction()
    {
        $this->render('user/all');
    }
}