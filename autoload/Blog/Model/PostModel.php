<?php

namespace Blog\Model;

class PostModel
{
    public function get_post()
    {
        return array(
            array('id' => 1,
                'title' => 'ela title',
                'body' => 'this is the post body'
            ),
            array('id' => 2,
                'title' => 'Post 2',
                'body' => 'this is the post body'
            )
        );
    }

    public function get_post_by_id($post_id){
        return $post_id;
    }

}
