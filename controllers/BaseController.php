<?php

class BaseController
{
    public function render($viewName)
    {
        include 'views/' . $viewName . '.php';
    }
}