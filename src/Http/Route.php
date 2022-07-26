<?php

    namespace Psi\Http;

    class Route
    {
        public static array $routes = [];

        public static function get($route, $action)
        {
            self::$routes['get'][$route] = $action;
        }

        public static function post($route, $action)
        {
            self::$routes['post'][$route] = $action;
        }
    }