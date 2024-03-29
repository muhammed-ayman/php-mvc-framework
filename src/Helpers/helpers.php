<?php
    
    use Psi\App;
    use Psi\View\View;

    if (!function_exists('env')) {
        function env($key) {
            return $_ENV[$key] ?? null;
        }
    }

    if (!function_exists('app_path')) {
        function app_path() {
            return dirname(__DIR__) . '/../';
        }
    }

    if (!function_exists('views_path')) {
        function views_path() {
            return app_path() . 'views/';
        }
    }

    if (!function_exists('app')) {
        function app() {
            static $instance = null;

            if (!$instance) {
                $instance = new App;
            }

            return $instance;
        }
    }

    if (!function_exists('view')) {
        function view($view, $params = []) {
            View::create($view, $params);
        }
    }