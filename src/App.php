<?php

    namespace Psi;
    use Psi\Http\Request;
    use Psi\Http\Response;
    use Psi\Http\Route;

    class App
    {
        protected Route $route;
        protected Request $request;
        protected Response $response;

        public function __construct()
        {
            $this->request = new Request;
            $this->response = new Response;
            $this->route = new Route($this->request, $this->response);
        }

        public function run()
        {
            $this->route->resolve();
        }
    }