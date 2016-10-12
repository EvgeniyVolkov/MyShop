<?php
namespace shop\controllers;

use shop\models\Category;
//use shop\helper\Category as HelperCategory; // 1

class CategoryController extends BaseController
{
    public function allAction()
    {
        $categoryModel = new Category();
        $helperCategory = new \shop\helper\Category(); // 2
        $helperProduct = new \shop\helper\Product();
        $helperCategory->test();
        $limit = null;
        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
        }

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