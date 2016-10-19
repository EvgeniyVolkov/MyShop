<?php
namespace shop\services;


class UserService
{
    const AUTH_KEY = 'login';

    /**
     * @param $login
     */
    public static function login($login)
    {
        SessionService::getInstance()->setValue(self::AUTH_KEY, $login);
    }

    public static function logout()
    {
        SessionService::getInstance()->deleteValue(self::AUTH_KEY);
    }

    /**
     * @return bool
     */
    public static function isGuest()
    {
        return SessionService::getInstance()->getValue(self::AUTH_KEY) === false;
    }
}