<?php

  // MAIN DEFINITIONS ::

  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(dirname(__DIR__)));
  define('APP', dirname(__DIR__));
  define('CONTROLLERS', APP . DS . 'controllers');
  define('VIEWS', APP . DS . 'views');
  define('MODELS', APP . DS . 'models');
  define('CORE', APP . DS . 'core');
  define('LIBS', APP . DS . 'libs');

  // CLASS AUTOLOADING ::

  spl_autoload_register(function($class)
  {
    $class_path = explode('\\', $class);
    $class_name = ucwords(end($class_path)) . '.php';
    $class_path = ROOT . DS . strtolower(implode(DS, array_slice($class_path, 0, -1))) . DS . $class_name;
    if (file_exists($class_path)) {
      require_once($class_path);
    } else{
      App\Core\App::view('error_404');
      exit;
    }
  });

  // IMPORTING HELPERS

  require_once LIBS . DS . 'helpers' . DS . 'global.php';

  // INITIATING A NEW APPLICATION ::

  $app = new App\Core\App;

  // INITIATING ROUTER ::

  $router = new App\Core\Router;

  // IMPORTING ROUTES ::

  require_once CORE . DS . 'routes.php';

  // ROUTE ::

  $router::route();
