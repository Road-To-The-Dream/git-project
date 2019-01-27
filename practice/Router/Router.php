<?php

namespace practice\Router;

use practice\Model\Redirect;

class Router
{
    public function routing($url)
    {
        $controller_name = 'Main';
        $action_name = 'index';

        $id = 0;
        $category = $_GET['category'];

        $routes = explode('/', $url);

        if (!empty($routes[1])) {   // get name views
            $controller_name = ucfirst(strtolower($routes[1]));
        }

        if (!empty($routes[2])) {  // get name action
            $action_name = strtolower($routes[2]);
        }

        if (!empty($routes[3])) {
            $id = $routes[3];
        }

        $controller_name = '\practice\Controller\Controller' . $controller_name;

        $controller = new $controller_name;

        if (method_exists($controller, $action_name)) {  // call action controller
            if (!empty($category)) {
                $controller->$action_name($id, $category);
            } else {
                $controller->$action_name($id);
            }
        } else {
            Redirect::redirect('http://practice/404');
        }
    }
}
