<?php

    namespace practice\Router;

    class Router
    {
        public function Routing($url)
        {
            $action_name = 'show_main';
            $view_name= 'main';

            $id = 0;
            $category = $_GET['category'];

            $routes = explode('/', $url);

            if ( !empty($routes[1]) ) {   // get name views
                $view_name = strtolower($routes[1]);
            }

            if ( !empty($routes[2]) ) {  // get name action
                $action_name = strtolower($routes[2]);
            }

            if ( !empty($routes[3]) ) {
                $id = $routes[3];
            }

            $controller = new \practice\Controller\Controller();

            if(method_exists($controller, $action_name)) {  // call action controller
                if(!empty($category)) {
                    $controller->$action_name($view_name, $id, $category);
                } else {
                    $controller->$action_name($view_name, $id);
                }
            }
            else {
                header('Location: http://practice/404/show_404');
            }
        }
    }
