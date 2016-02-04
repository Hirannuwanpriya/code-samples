<?php

namespace Blog\Controller;

class ViewController
{

    private $themes = array(
        'home' => 'home.php',
        'post' => 'post.php',
        'admin_home' => 'Admin\home.php'
    );

    public function __construct()
    {

    }

    public function theme($theme_name, Array $data)
    {
        if (isset($theme_name) && !empty($data)) {
            if (isset($this->themes[$theme_name])) {
                extract($data);
                require ROOT_URL . '\Blog\View\\' . $this->themes[$theme_name];
            }
        }
    }

}