<?php

    use Psi\Http\Request;
    use Psi\Http\Response;
    use Psi\Http\Route;

    require_once __DIR__ . '/../src/Helpers/helpers.php';
    require_once app_path() . 'vendor/autoload.php';
    require_once app_path() . 'routes/web.php';

    $route = new Route(new Request, new Response);
    $route->resolve();