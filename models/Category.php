<?php
namespace shop\models;

use shop\db\Db;

class Category
{
    public function getCategories()
    {
        $sql = "SELECT id, name FROM category";
        return Db::getConnection()->query($sql)->fetchAll();
    }
}