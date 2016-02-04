<?php

namespace Blog\Model;

class PostModel
{
    public  function __construct(){

        $this->con = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD);

        if (!$this->con) {
            die('Not connected : ' . mysql_error());
        }
        $db_selected = mysqli_select_db($this->con, DATABASE_NAME);
        if (!$db_selected) {
            die('Can\'t use '.DATABASE_NAME.' : ' . mysql_error());
        }

    }

    public function get_post($post_id = NULL)
    {

        if (!empty($post_id)) {
            $sql = "SELECT * FROM posts WHERE id =" . $post_id;
        } else {
            $sql = "SELECT * FROM posts ";
        }

        $query = mysqli_query($this->con, $sql);

        $postArray = array();

        if ($query) {

            while ($row = mysqli_fetch_assoc($query)) {
                $myPost = new BlogPostModel();
                $myPost->setId($row['id']);
                $myPost->setTitle($row['title']);
                $myPost->setSummary($row['body']);
                $myPost->setDateCreated($row['created']);

                array_push($postArray, $myPost);
            }
            return $postArray;
        } else {
            header('Location: ?action=home');
        }

 //        return array(
//            array('id' => 1,
//                'title' => 'ela title',
//                'body' => 'this is the post body'
//            ),
//            array('id' => 2,
//                'title' => 'Post 2',
//                'body' => 'this is the post body'
//            )
//        );
    }

    public function get_post_by_id($post_id){
        return $post_id;
    }

    public function searchPost($searchtext){

        if (!empty($searchtext)) {
            $sql = "SELECT * FROM posts
                    WHERE MATCH (title)
                    AGAINST ('".$searchtext."' IN NATURAL LANGUAGE MODE)";
        } else {
            $sql = "SELECT * FROM posts ";
        }

        $query = mysqli_query($this->con, $sql);

        $postArray = array();

       // var_dump($query);
       // exit;

        if ($query) {

            while ($row = mysqli_fetch_assoc($query)) {
                $myPost = new BlogPostModel();
                $myPost->setId($row['id']);
                $myPost->setTitle($row['title']);
                $myPost->setSummary($row['body']);
                $myPost->setDateCreated($row['created']);

                array_push($postArray, $myPost);
            }
            return $postArray;
        } else {
            header('Location: ?action=search');
        }

    }

//
//    public function createPost(){
//
//        if(isset($_POST['title'])){
//            //Create blog post
//            $post = new BlogPostModel();
//            $post->setId($_POST['id']);
//            $post->setTitle($_POST['title']);
//            $post->setSummary($_POST['body']);
//            $this->savePost($post);
//        }
//    }

    public function savePost($data_post){
        $data = new BlogPostModel($data_post);
        $data->setId($data_post['id']);
        $data->setTitle($data_post['title']);
        $data->setBody($data_post['body']);

        if ($data->getId() == null) {
            //SQL insert
            $sql = "INSERT INTO posts(title, body, created) "
                . "VALUES ('{$data->getTitle()}', '{$data->getBody()}','" .date('Y-m-d H:i:s') . "');";

            mysqli_query($this->con, $sql);
        } else {
            $sql = "UPDATE posts SET title = '{$data->getTitle()}', body = '{$data->getBody()}', created = '" .date('Y-m-d H:i:s')."' "
                . "WHERE id = {$data->getId()} ";
            mysqli_query($this->con, $sql);
        }

        $posts = $this->get_post($data->getId());

        if (!empty($posts)) {
            return $posts[0];
        }
    }

    public function deletePost($post_id = NULL)
    {
        if (!empty($post_id)) {
            $sql = "DELETE  FROM posts WHERE id =" . $post_id;
        }

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            header('Location: ?action=admin');
        }
    }



    public function defaultPost(){
        $data = new BlogPostModel;
        $data->setId('');
        $data->setTitle('');
        $data->setBody('');
        $data->setDateCreated(date('Y-m-d H:i:s'));

        return $data;

    }


}
