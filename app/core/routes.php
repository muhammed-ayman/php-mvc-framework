<?php

/*  Here are the main routes and you can create a route as follows ::
---------------------------------------------------------------------
    $router->get('/home/{username}', function()
    {
      echo $_SESSION['username'];
    });
=====================================================================
    $router->get('/about', function()
    {
      view('about');
    });
===================================================================== */


$router->get('/home/{id}', function()
{
  view('home');
});
