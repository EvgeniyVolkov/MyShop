<?php

require_once 'BaseController.php';

class EvgeniyController extends BaseController
{
    public function indexAction()
    {
        $this->render('evgeniy/index');
    }
}