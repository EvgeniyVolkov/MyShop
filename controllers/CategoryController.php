<?php
require_once 'BaseController.php';

class CategoryController extends BaseController
{
    public function allAction()
    {
        $categories = array(
            'Category 1',
            'Category 2',
            'Category 3',
            'Category 4'
        );
        $this->render(
            'category/all',
            array(
                'categories' => $categories,
                'variable' => 'Helllo!',
                'name' => 'Evgeniy',
                'lastname' => 'Volkov'
            )
        );
    }

    public function showAction()
    {
        $this->render('category/show');
    }
}