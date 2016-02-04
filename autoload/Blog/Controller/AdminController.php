<?php

namespace Blog\Controller;

use Blog\Model\BlogPostModel;
use Blog\Model\PostModel;

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
        session_start();
        $this->view = new ViewController();
    }

    /**
     *
     */
    public function index()
    {
        $post = new PostModel();

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin' ){

            if(isset($_GET['post'])){
                return $this->view->theme('home', array('posts' => $post->get_post($_GET['post'])));
            } else {
                return $this->view->theme('admin_home', array('posts' => $post->get_post()));
            }
        } else {
            if(isset($_POST['password'])) {
                $admin_array = array('username' => 'admin',
                    'password' => '0192023a7bbd73250516f069df18b500'); // admin123'

                if(md5($_POST['password']) == $admin_array['password'] ){
                    $_SESSION['admin'] = 'admin' ;
                    return $this->view->theme('admin_home', array('data' => ''));
                } else {
                    return $this->view->theme('login', array('data' => '<div class="alert alert-danger" role="alert">error in login</div>'));
                }
            }
            return $this->view->theme('login', array('data' => ''));
        }
    }

}