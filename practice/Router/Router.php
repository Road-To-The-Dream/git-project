<?php

namespace practice\Router;

class Router
{
    public function Routing($url)
    {
        $controller_name= 'Main';
        $action_name = 'index';
        $id = 0;

        $routes = explode('/', $url);

        if ( !empty($routes[1]) ) {   // get name views
            $controller_name = ucfirst(strtolower($routes[1]));
        }

        if ( !empty($routes[2]) ) {  // get name action
            $action_name = strtolower($routes[2]);
        }

        if ( !empty($routes[3]) ) {
            $id = $routes[3];
        }

        $controller_name = '\practice\Controller\Controller_'.$controller_name;

        $controller = new $controller_name;

        if(method_exists($controller, $action_name)) {  // call action controller
            $controller->$action_name($id);
        }
        else {
            header('Location: http://practice/404');
        }
    }
}
