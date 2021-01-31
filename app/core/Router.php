<?php

  namespace App\Core;

  class Router
  {

    public static $routes = array(
      'GET' => array(),
      'POST' => array(),
    );

    public static $actions_identifiers = array(

    );

    public static $actions = array(

    );

    public function route()
    {
      $uri = trim($_SERVER['REQUEST_URI'],'/');
      $exists = 0;
      foreach (array_keys(self::$actions) as $key => $value) {
        if (preg_match($value, $uri)) {
          self::$actions[$value]();
          $uri_exploded = explode('/', $uri);
          foreach (array_keys(self::$actions_identifiers[$key]) as $identifier) {
            $_SESSION[self::$actions_identifiers[$key][$identifier]] = $uri_exploded[$identifier];
          }
          $exists = 1;
          break;
        }
      }
      if ($exists == 0) {
        view('error_404');
      }
    }

    public static function get($route, callable $action)
    {
      $route = self::validate_uri($route);
      $route = self::regex_uri($route);
      array_push(self::$routes['GET'], $route);
      self::$actions[$route] = $action;
    }

    public function regex_uri($uri)
    {
      $uri = explode('/', $uri);
      $regex_arr = array();
      for ($i=0; $i < count($uri) ; $i++) {
        if (preg_match('/^{[a-zA-Z0-9]+}$/',$uri[$i])) {
          $regex_arr[$i] = substr($uri[$i], 1, -1);
          $uri[$i] = '[a-zA-Z0-9]+';
        }
      }
      $uri = implode('\/', $uri);
      $uri = '/^' . $uri . '$/';
      array_push(self::$actions_identifiers, $regex_arr);
      return $uri;
    }

    public function validate_uri($uri)
    {
      $uri = trim($uri,'/');

      $true_match = "/^[a-zA-Z0-9{}\/]+$/";
      $false_match = "/([{][a-zA-Z0-9\/]*$)|(^[a-zA-Z0-9\/]*[}])|([}][a-zA-Z0-9\/]*[}])|([{][a-zA-Z0-9\/]*[{])|(^[{])|([{][a-zA-Z0-9]*[\/]+[a-zA-Z0-9]*[}])|([a-zA-Z0-9][{])|([{][}])|([}][a-zA-Z0-9])/";

      if(!preg_match($true_match, $uri) || preg_match($false_match, $uri)){
      echo 'Invalid URI';
      exit;
      }
      return $uri;
    }

  }
