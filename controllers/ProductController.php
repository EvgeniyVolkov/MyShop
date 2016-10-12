<?php
//require_once 'BaseController.php';
//require_once 'models/Product.php';
namespace shop\controllers;
use shop\models\Product;

class ProductController extends BaseController
{
    public $limitNum;

    public function allAction($limitNum)
    {
        $this->limitNum = $limitNum;

        $productModel = new Product();

        $this->render(
            'product/all',
            array(
                'products' => $productModel->getProducts($this->limitNum),
            )
        );
    }
}