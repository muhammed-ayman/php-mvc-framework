<?php

    use Psi\Http\Route;
    
    Route::get('/', function() {
        return 'hello';
    });

    var_dump(Route::$routes['get']);