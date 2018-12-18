<?php
    class Route
    {
        public function Routing($url)
        {
            $action_name = '';
            $view_name= '';
            $id = 1;

            $routes = explode('/', $url);

            // get name view
            if ( !empty($routes[1]) )                       //catalog
            {
                $view_name = strtolower($routes[1]);
            }

            // get name action
            if ( !empty($routes[2]) )                       //show_all
            {
                $action_name = strtolower($routes[2]);
            }

            if ( !empty($routes[3]) )
            {
                $id = $routes[3];
            }

            require_once 'Controller/controller.php';

            $controller = new Controller;

            if(method_exists($controller, $action_name))
            {
                // call action controller
                $controller->$action_name($view_name, $id);
            }
            else
            {
                header('Location: View/404.html');
            }
        }
    }