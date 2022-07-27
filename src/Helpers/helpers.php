<?php

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