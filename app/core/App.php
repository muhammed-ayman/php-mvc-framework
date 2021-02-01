<?php

  namespace App\Core;

  class App
  {

    protected $identifiers = array();

    public function register_identifier($identifier, $identifier_value)
    {
      $this->identifiers[$identifier] = $identifier_value;
    }

    public function request_identifier($identifier_req)
    {
      if (in_array($identifier_req, array_keys($this->identifiers))) {
        return $this->identifiers[$identifier_req];
      }
      else{
        return NULL;
      }
    }

  }
