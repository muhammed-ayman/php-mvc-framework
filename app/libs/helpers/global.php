<?php

  // FUNCTION TO VIEW PAGES ::
  function view($view)
  {
    if (file_exists(VIEWS . DS . $view.'.php')) {
      require_once(VIEWS . DS . $view.'.php');
    } else{
      view('error_404');
    }
  }

  // FUNCTION TO GET THE VALUE OF THE URL VARIABLES ::
  function request($identifier)
  {
    global $app;
    echo $app->request_identifier($identifier);
  }

  // FUNCTION TO GET THE VALUE OF ENV VARIABLES ::
  function get_env($env_id){
    $env_value = isset($_ENV[$env_id]) ? $_ENV[$env_id] : '';
    return $env_value;
  }
