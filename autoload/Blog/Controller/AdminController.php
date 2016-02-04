<?php

namespace Blog\Controller;

class AdminController {

    private $view;

    public function __construct(){
        $this->view = new ViewController();
    }

    public function index()
    {
        return $this->view->theme('admin_home', array('data' => 'ela'));
    }

}