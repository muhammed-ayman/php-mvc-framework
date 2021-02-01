<?php

  // CONFIG FILE ::

  require_once __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

  // VENDOR AUTOLOAD ::

  require_once VENDOR . DS . 'autoload.php';

  // Dotenv NAMESPACES ::

  use Dotenv\Environment\Adapter\EnvConstAdapter;
  use Dotenv\Environment\Adapter\ServerConstAdapter;
  use Dotenv\Environment\DotenvFactory;
  use Dotenv\Dotenv;

  // .ENV CONFIGURATIONS

  $dotenv = Dotenv::createImmutable(ROOT);
  $dotenv->load();

  // CLASS AUTOLOADING ::

  spl_autoload_register(function($class)
  {
    $class_path = explode('\\', $class);
    $class_name = ucwords(end($class_path)) . '.php';
    $class_path = ROOT . DS . strtolower(implode(DS, array_slice($class_path, 0, -1))) . DS . $class_name;
    if (file_exists($class_path)) {
      require_once($class_path);
    } else{
      view('error_404');
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

  require_once ROUTES . DS . 'routes.php';

  // ROUTE ::

  $router::route();
