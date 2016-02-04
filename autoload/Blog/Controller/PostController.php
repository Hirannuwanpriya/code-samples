<?php
namespace Blog\Controller;

use Blog\Model\BlogPostModel;
use Blog\Model\PostModel;

class PostController{

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
                if(isset($_GET['method'])) {
                    if($_GET['method'] == 'add') {
                        return $view->theme('post', array(
                            'posts' => $post->savePost($_POST)
                        ));
                    }else if($_GET['method'] == 'delete') {
                        return $view->theme('post', array(
                            'posts' => $post->deletePost($_GET['post'])
                        ));
                    }  else {
                        $posts = $post->get_post($_GET['post']);
                        if (!empty($posts)) {
                            foreach ($posts as $post) {
                                return $view->theme('post', array(
                                    'posts' => $post
                                ));
                             }
                        } else {
                            header('Location: ?action=admin');
                         }
                    }
                } else {

                    return $view->theme('post', array(
                        'posts' => $post->defaultPost()
                    ));
                }
            }

}