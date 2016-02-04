<?php
namespace Blog\Controller;

use Blog\Model\BlogPostModel;
use Blog\Model\PostModel;

class SearchController{

    public function __construct(){
        session_start();
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

        if(isset($_POST['searchtext'])){
            return $view->theme('search', array(
                'posts' => $post->searchPost($_POST['searchtext'])
            ));
        }  else {
            return $view->theme('search', array(
                'posts' => ''
            ));
        }



    }

}