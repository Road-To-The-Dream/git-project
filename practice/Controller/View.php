<?php

    namespace Controller;

    class View
    {
        function generate($content_view, $data = null)
        {
            require_once 'view/'.$content_view;
        }
    }