<?php

    namespace Psi\Http;
    use \Exception;

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
            self::validateRoute($route);    
            self::$routes['get'][$route] = $action;
        }

        public static function post($route, $action)
        {
            self::validateRoute($route);
            self::$routes['post'][$route] = $action;
        }

        public function resolve()
        {
            $method = $this->request->method();
            $path = $this->request->path();
            $params = array();
            $action = null;

            foreach (self::$routes[$method] as $route => $value) {
                if (preg_match($this->generateRouteRegex($route), $path)) {
                    $params = $this->getRouteParameters($route, $path);
                    $action = self::$routes[$method][$route];
                }
            }
            
            if (!$action) return;

            // Callback Handling
            if (is_callable($action)) call_user_func_array($action, [$params]);
            
            // Array Handling
            if (is_array($action)) call_user_func_array([new $action[0], $action[1]], $params);

            // 404 Handling
        }

        private function getRouteParameters($route, $path) {
            $params = array();
            $exploded_route = explode("/", trim($route, "/"));
            $path = explode("/", trim($path, "/"));

            for ($i = 0; $i < count($exploded_route); $i++) {
                if (str_contains($exploded_route[$i], '{')) {
                    $params[trim($exploded_route[$i], "{}")] = $path[$i];
                }
            }

            return $params;
        }

        private function generateRouteRegex($route) {
            $route_regex = preg_replace('/{(.*?)}/', '[.~_\d\w-]+', $route);
            $route_regex = '/^' . str_replace('/', '\/', $route_regex) . '$/';
            return $route_regex;
        }

        private static function validateRoute($route) {
            $route_pattern = '/^\/(?:(?:[.~_\d\w-]+|{[.~_\d\w-]+})(?:\/|$))*$/';

            try {
                if (!preg_match($route_pattern, $route))
                    throw new Exception("Invalid Route: $route");
            } catch(Exception $e) {
                echo $e->getMessage();
            }
        }
    }