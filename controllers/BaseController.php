<?php

class BaseController
{
    const MAIN_TEMPLATE = 'main.php';

    public function render($viewName, $data = array())
    {
//        before
//        array(
//            'categories' => $categories,
//            'variable' => 'Helllo!'
//        )
        extract($data);
        // after
        // $categories;
        // $variable2;
        ob_start();
        include 'views/' . $viewName . '.php';
        $content = ob_get_clean();
        include 'views/template/' . self::MAIN_TEMPLATE;
    }
}