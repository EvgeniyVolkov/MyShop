<?php

// require_once 'db/Db.php';
namespace shop\models;
use shop\db\Db;

class Product
{
    public function getProducts($limitNum)
    {
        $sql = "SELECT id, title FROM product LIMIT {$limitNum}";
        return Db::getConnection()->query($sql)->fetchAll();
    }
}