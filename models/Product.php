<?php

// require_once 'db/Db.php';
namespace shop\models;
use shop\db\Db;

class Product
{
    public function getProducts()
    {
        $sql = "SELECT id, title FROM product";
        return Db::getConnection()->query($sql)->fetchAll();
    }
}