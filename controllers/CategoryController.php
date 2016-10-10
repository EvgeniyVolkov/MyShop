<?php
require_once 'BaseController.php';
require_once 'models/Category.php';

class CategoryController extends BaseController
{
    public function allAction()
    {
        $categoryModel = new Category();

        $this->render(
            'category/all',
            array(
                'categories' => $categoryModel->getCategories(),
            )
        );
    }

    public function showAction()
    {
        $this->render('category/show');
    }
}