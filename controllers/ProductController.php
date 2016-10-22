<?php
//require_once 'BaseController.php';
//require_once 'models/Product.php';
namespace shop\controllers;
use shop\models\Product;

class ProductController extends BaseController
{
    public $limit;

    public function allAction()
    {
        $this->limit = null;

        if (isset($_GET['limit']) && $_GET['limit'] != '') {
            $this->limit = $_GET['limit'];
        }

        $productModel = new Product();

        $this->render(
            'product/all',
            array(
                'products' => $productModel->getProducts($this->limit),
            )
        );
    }
}