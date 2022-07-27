<?php

    namespace Psi\Http;

    class Route
    {

        protected Request $request;
        protected Response $response;

        public function __construct(Request $request, Response $response)
        {
            $this->request = $request;
            $this->response = $response;
        }

        public static array $routes = [];

        public static function get($route, $action)
        {
            self::$routes['get'][$route] = $action;
        }

        public static function post($route, $action)
        {
            self::$routes['post'][$route] = $action;
        }

        public function resolve()
        {
            $method = $this->request->method();
            $path = $this->request->path();
            $action = self::$routes[$method][$path] ?? null;

            if (!$action) return;

            // Callback Handling
            if (is_callable($action)) call_user_func_array($action, []);
            
            // Array Handling
            if (is_array($action)) call_user_func_array([new $action[0], $action[1]], []);

            // 404 Handling
        }
    }