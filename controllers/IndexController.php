<?php
namespace shop\controllers;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $this->render('index/index');
    }
}