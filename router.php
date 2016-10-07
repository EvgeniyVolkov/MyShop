<?php

class Router
{
    const DEFAULT_CONTROLLER = 'index';

    const DEFAULT_ACTION = 'index';

    public static function start()
    {
        $request = isset($_GET['r']) ? $_GET['r'] : null; // r=category/all

        $controller = self::DEFAULT_CONTROLLER;
        $action = self::DEFAULT_ACTION;
        if ($request !== null && $request !== '') {
            $explodedRequest = explode('/', $request);
            $controller = $explodedRequest[0]; // category
            if (isset($explodedRequest[1])) {
                $action = $explodedRequest[1]; // all
            }
        }

        $controllerName = ucfirst($controller) . 'Controller'; // CategoryController
        $fileControllerPath = 'controllers/' . $controllerName . '.php'; // controllers/CategoryController.php
        if (file_exists($fileControllerPath)) { // true
            include $fileControllerPath;

            $controllerInstance = new $controllerName; // new CategoryController();
            $actionName = $action . 'Action'; // allAction
            if (method_exists($controllerInstance, $actionName)) {
                $controllerInstance->{$actionName}(); // $controllerInstance->allAction();
            } else {
                self::renderNotFoundPage();
            }
        } else {
            self::renderNotFoundPage();
        }
    }

    public static function renderNotFoundPage()
    {
        include 'views/404.php';
        die;
    }
}