<?php
namespace Blog\Controller;

use Blog\Model\PostModel;

class HomeController{

    public function __construct(){
//        echo'ela';
    }

    public function index(){

//        $post = new Models\PostModel();

        $post = new PostModel();



        $view = new ViewController();
        return $view->theme('home', array(
            'posts' => $post->get_post(),
            'date' => date('Y-m-d')
        ));
    }

}