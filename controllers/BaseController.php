<?php

class BaseController
{
    const MAIN_TEMPLATE = 'main.php';

    public function render($viewName)
    {
        ob_start();
        include 'views/' . $viewName . '.php';
        $content = ob_get_clean();
        include 'views/template/' . self::MAIN_TEMPLATE;
    }
}