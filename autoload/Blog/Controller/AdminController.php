<?php

namespace Blog\Controller;

/**
 * Class AdminController
 * @package Blog\Controller
 */
class AdminController {

    /**
     * @var ViewController
     */
    private $view;

    /**
     *
     */
    public function __construct(){
        $this->view = new ViewController();
    }

    /**
     *
     */
    public function index()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin' ){
            return $this->view->theme('admin_home', array('data' => 'ela'));
        } else {
            return $this->view->theme('login', array('data' => 'ela'));
           // header('Location: ?action=login');
        }
    }

}