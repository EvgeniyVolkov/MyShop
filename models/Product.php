<?php

// require_once 'db/Db.php';
namespace shop\models;
use shop\db\Db;

class Product
{
    public function getProducts($limitNum)
    {
        if($limitNum != null){
            $sql = "SELECT id, title FROM product LIMIT {$limitNum}";
        } else {
            $sql = "SELECT id, title FROM product";
        }
//        echo $sql;exit;
        return Db::getConnection()->query($sql)->fetchAll();
    }
}