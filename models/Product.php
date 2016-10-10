<?php

require_once 'db/Db.php';

class Product
{
    public function getProducts()
    {
        $sql = "SELECT id, title FROM product";
        return Db::getConnection()->query($sql)->fetchAll();
    }
}