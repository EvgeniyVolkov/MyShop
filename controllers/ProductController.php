<?php
require_once 'BaseController.php';
require_once 'models/Product.php';

class ProductController extends BaseController
{
    public function allAction()
    {
        $productModel = new Product();

        $this->render(
            'product/all',
            array(
                'products' => $productModel->getProducts(),
            )
        );
    }
}