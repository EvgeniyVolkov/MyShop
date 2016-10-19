<?php
namespace shop\services;

class SessionService
{
    /**
     * @var null|SessionService
     */
    protected static $currentSession = null;

    public function init()
    {
        if (!$this->isActive()) {
            session_start();
        }
    }

    /**
     * @return SessionService
     */
    public static function getInstance()
    {
        if (self::$currentSession === null) {
            self::$currentSession = new self; // new SessionService();
            self::$currentSession->init();
        }

        return self::$currentSession;
    }

    /**
     * @param $key
     * @return bool|string
     */
    public function getValue($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
    }

    /**
     * @param $key
     * @param $value
     */
    public function setValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key
     */
    public function deleteValue($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * @return bool
     */
    protected function isActive()
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }
}