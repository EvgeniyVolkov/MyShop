<?php
require_once 'BaseController.php';

class CategoryController extends BaseController
{
    public function allAction()
    {
        $this->render('category/all');
    }

    public function showAction()
    {
        $this->render('category/show');
    }
}