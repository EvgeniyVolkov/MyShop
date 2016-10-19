<?php

namespace shop\models;

use shop\db\Db;

class BaseModel
{
    public function fetchAll($sql)
    {
        return Db::getConnection()->query($sql)->fetchAll();
    }

    public function fetchOne($sql)
    {
        return Db::getConnection()->query($sql)->fetch();
    }

    /**
     * @param $tableName
     * @param array $data
     * @return string
     */
    public function insert($tableName, array $data)
    {
        $keys = array_keys($data);
        $implodedKeys = implode(',', $keys);
        $keysForBinding = array();
        foreach ($keys as $key) {
            $keysForBinding[] = ':' . $key;
        }
        $implodedKeysForBinding = implode(',', $keysForBinding);
        $prepareSql = "INSERT INTO {$tableName} ({$implodedKeys}) VALUES ({$implodedKeysForBinding})";
        // "INSERT INTO user (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)";
        $stmt = Db::getConnection()->prepare($prepareSql);
        foreach ($data as $key => &$value) {
            $stmt->bindParam(':' . $key, $value);
        }
        $stmt->execute();

        return Db::getConnection()->lastInsertId();
    }
}