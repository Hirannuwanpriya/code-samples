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
    //            $myPost = new BlogPostModel();
    //            $myPost->setId($row['id']);
    //            $myPost->setTitle($row['title']);
    //            $myPost->setSummary($row['body']);
    //            $myPost->setDateCreated($row['created']);
    //
                array_push($postArray, $row);
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

}
