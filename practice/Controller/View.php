<?php

    class View
    {
        function generate($content_view, $data = null)
        {
            require_once 'View/'.$content_view;
        }
    }