<?php

    namespace Psi\Http;

    class Request
    {

        public function method()
        {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        public static function path()
        {
            return explode("?", $_SERVER['REQUEST_URI'])[0];
        }

    }