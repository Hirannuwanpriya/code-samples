<?php
namespace Blog\Controller;

use Blog\Model\BlogPostModel;
use Blog\Model\PostModel;

class HomeController{

    public function __construct(){
//        echo'ela';
    }

    public function index(){

        $blog_post = new BlogPostModel();

        $blog_post->setAuthor('Hiran');

        $blog_post->setBody('Adooo');

        $blog_post->getSummary('this is the summary');


       // var_dump($blog_post);



//        $post = new Models\PostModel();

        $post = new PostModel();

        $view = new ViewController();
        if(isset($_GET['post'])){
            return $view->theme('home', array(
                'posts' => $post->get_post($_GET['post']),
                'date' => date('Y-m-d')
            ));
        }
//        else if(isset($_GET['search'])){
//            return $view->theme('home', array(
//                'posts' => $post->get_post($_GET['post']),
//                'date' => date('Y-m-d')
//            ));
//        }
        else {
            return $view->theme('home', array(
                'posts' => $post->get_post(),
                'date' => date('Y-m-d')
            ));
        }



    }

}