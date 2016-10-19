<?php

namespace shop\models;

class User extends BaseModel
{
    public function getUsers()
    {

    }

    public function saveUser(array $userData)
    {
        return $this->insert('user', $userData);
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM `user` where email  = '{$email}'";
        return $this->fetchOne($sql);
    }
}