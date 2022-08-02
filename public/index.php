<?php
    
    use Dotenv\Dotenv;

    require_once __DIR__ . '/../src/Helpers/helpers.php';
    require_once app_path() . 'vendor/autoload.php';
    require_once app_path() . 'routes/web.php';

    $dotenv = Dotenv::createImmutable(app_path());
    $dotenv->load();

    app()->run();