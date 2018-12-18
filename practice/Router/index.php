<?php
//http://practice/catalog/show_all
    class Redirect
    {
        public function Routing($url)
        {
            $action_name = '';
            $view_name= '';

            $routes = explode('/', $url);

            if ( !empty($routes[1]) )                       //catalog
            {
                $view_name = strtolower($routes[1]);
            }

            // get name view
            if ( !empty($routes[2]) )                       //show_all
            {
                $action_name = strtolower($routes[2]);
            }

            require_once 'Controller/controller.php';

            $controller = new Controller;

            if(method_exists($controller, $action_name))
            {
                // call action controller
                $controller->$action_name($view_name);
            }
            else
            {
                header('Location: View/404.html');
                die();
            }
        }
    }
