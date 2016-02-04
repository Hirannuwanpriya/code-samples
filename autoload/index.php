<?php
/**
 * Always as action is takesn as a controller
 */

define('ROOT_URL', __DIR__);

/**
 * Global auto load method to load the action controllers
 * @param $object
 */
function __autoload($object)
{
    $class_name = __DIR__ . '\\' . $object . '.php';
    // Check if the controller file exists
    if (file_exists($class_name)) {
        require_once $class_name;
    } else {
        echo 'Class not found';
    }
}

if (isset($_GET['action'])) {
    $object = '\\Blog\\Controller\\' . ucfirst($_GET['action']) . 'Controller';

    if(class_exists($object)){
        $controller = new $object;
        $controller->index();
    }


} else {
    $controller = new Blog\Controller\HomeController();
    $controller->index();
}




