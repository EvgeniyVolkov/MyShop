<?php
namespace shop\models;

class Category extends BaseModel
{
    public function getCategories()
    {
        $sql = "SELECT id, name FROM category";
        return $this->fetchAll($sql);
    }
}