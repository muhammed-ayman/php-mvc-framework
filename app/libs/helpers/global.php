<?php

  function view($view)
  {
    if (file_exists(VIEWS . DS . $view.'.php')) {
      require_once(VIEWS . DS . $view.'.php');
    } else{
      view('error_404');
    }
  }

  function request($identifier)
  {
    global $app;
    echo $app->request_identifier($identifier);
  }
