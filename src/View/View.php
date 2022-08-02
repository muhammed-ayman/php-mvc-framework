<?php


    namespace Psi\View;

    class View
    {
        public static function create($view, $params = [])
        {
            if (file_exists(views_path() . $view . '.php'))
                include views_path() . $view . '.php';
            else
                echo "404";
        }
    }